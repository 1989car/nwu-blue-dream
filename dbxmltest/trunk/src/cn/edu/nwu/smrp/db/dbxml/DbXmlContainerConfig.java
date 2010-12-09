package cn.edu.nwu.smrp.db.dbxml;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;

import com.sleepycat.db.DatabaseException;
import com.sleepycat.db.Environment;
import com.sleepycat.db.EnvironmentConfig;
import com.sleepycat.dbxml.XmlContainer;
import com.sleepycat.dbxml.XmlContainerConfig;
import com.sleepycat.dbxml.XmlException;
import com.sleepycat.dbxml.XmlManager;
import com.sleepycat.dbxml.XmlManagerConfig;
  
public class DbXmlContainerConfig {   
    private Logger log = Logger.getAnonymousLogger();   
    private String fileHomePath = "D:/xammp/DBXML/data";   
       
    private static DbXmlContainerConfig dbxmlObj = null;   
    private Environment env = null;   
    private XmlManager xManager = null;   
    private XmlContainer xCont = null;   
    private Map<String, XmlContainer> xmlContainerMap;   
  
    /**  
     * 初始化  
     */  
    private DbXmlContainerConfig(){   
        setEnvironment();   
        setXmlManager();   
        xmlContainerMap = new HashMap<String, XmlContainer>();   
    }   
    /**  
     * 获得实例  
     * @return  
     */  
    public static DbXmlContainerConfig getInstance(){   
        if(dbxmlObj == null){   
            dbxmlObj = new DbXmlContainerConfig();   
        }   
        return dbxmlObj;   
    }   
       
    /**  
     * 创建Environment对象  
     */  
    public void setEnvironment(){   
        log.info("创建Environment对象..");   
        //创建EnvironmentConfig对象   
        EnvironmentConfig envConf = new EnvironmentConfig();   
        envConf.setAllowCreate(true);       //如果设置了true则表示当数据库环境不存在时候重新创建一个数据库环境，默认为false   
        envConf.setInitializeCache(true);   //是否打开初始化缓存   
        envConf.setInitializeLocking(true); //是否开启锁子系统   
        envConf.setInitializeLogging(true); //是否开启日志子系统   
        envConf.setTransactional(true);     //是否使用事务，默认为false   
        envConf.setRunRecovery(true);   
//      envConf.setThreaded(true);   
//      envConf.setLogAutoRemove(true);   
        envConf.setMutexIncrement(22);   
//      envConf.setLogInMemory(true);   
        envConf.setLogRegionSize(1024 * 1024);   
//      envConf.setLogBufferSize(30 * 1024 * 1024);   
        envConf.setCacheSize(64 * 1024 * 1024);   
//      envConf.setLockDetectMode(LockDetectMode.MINWRITE);   
           
        //创建Environment对象，并初始化存储位置   
        File fileHome = new File(fileHomePath);   
        try {   
            env = new Environment(fileHome, envConf);   
        } catch (FileNotFoundException e) {   
            e.printStackTrace();   
            log.info("文件位置未找到！");   
        } catch (DatabaseException e) {   
            e.printStackTrace();   
            log.info("数据库加载错误");   
        }   
    }   
       
    /**  
     * 创建XmlManager对象  
     */  
    public void setXmlManager(){   
        System.out.println("setXmlManager......");   
        XmlManagerConfig managerConfig = new XmlManagerConfig();   
        managerConfig.setAdoptEnvironment(true);   
//        managerConfig.setAllowAutoOpen(true);   
//        managerConfig.setAllowExternalAccess(true);   
        try {   
            xManager = new XmlManager(env, managerConfig);   
        } catch (XmlException ex) {   
            ex.printStackTrace();   
        }   
    }   
       
    /**  
     * 获得Environment对象  
     * @return  
     */  
    public Environment getEnvironment(){   
        return env;   
    }   
       
    /**  
     * 获得XmlManager对象  
     * @return  
     */  
    public XmlManager getXmlManager(){   
        return xManager;   
    }   
       
    /**  
     * 获得XmlContainer对象  
     * @param dbxmlName  
     * @return  
     * @throws XmlException  
     */  
    public XmlContainer getXmlContainer(String dbxmlName) throws XmlException{   
        log.info("获得XmlContainer对象..");   
        if (dbxmlName == null || dbxmlName.equals("")) {   
            return null;   
        }   
        if (xmlContainerMap.containsKey(dbxmlName)) {   
            return xmlContainerMap.get(dbxmlName);   
        }   
        XmlContainerConfig xmlContainerConfig = new XmlContainerConfig();   
        xmlContainerConfig.setTransactional(true);   
        xmlContainerConfig.setAllowCreate(true);   
//        xmlContainerConfig.setNodeContainer(false);   
        try {   
            XmlContainer xmlContainer = xManager.openContainer(dbxmlName, xmlContainerConfig);   
            xmlContainerMap.put(dbxmlName, xmlContainer);   
            return xmlContainer;   
        } catch (XmlException ex) {   
            Logger.getLogger(DbXmlContainerConfig.class.getName()).log(Level.SEVERE, null, ex);   
        }   
        return null;   
    }   
}  

