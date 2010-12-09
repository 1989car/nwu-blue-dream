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
     * ��ʼ��  
     */  
    private DbXmlContainerConfig(){   
        setEnvironment();   
        setXmlManager();   
        xmlContainerMap = new HashMap<String, XmlContainer>();   
    }   
    /**  
     * ���ʵ��  
     * @return  
     */  
    public static DbXmlContainerConfig getInstance(){   
        if(dbxmlObj == null){   
            dbxmlObj = new DbXmlContainerConfig();   
        }   
        return dbxmlObj;   
    }   
       
    /**  
     * ����Environment����  
     */  
    public void setEnvironment(){   
        log.info("����Environment����..");   
        //����EnvironmentConfig����   
        EnvironmentConfig envConf = new EnvironmentConfig();   
        envConf.setAllowCreate(true);       //���������true���ʾ�����ݿ⻷��������ʱ�����´���һ�����ݿ⻷����Ĭ��Ϊfalse   
        envConf.setInitializeCache(true);   //�Ƿ�򿪳�ʼ������   
        envConf.setInitializeLocking(true); //�Ƿ�������ϵͳ   
        envConf.setInitializeLogging(true); //�Ƿ�����־��ϵͳ   
        envConf.setTransactional(true);     //�Ƿ�ʹ������Ĭ��Ϊfalse   
        envConf.setRunRecovery(true);   
//      envConf.setThreaded(true);   
//      envConf.setLogAutoRemove(true);   
        envConf.setMutexIncrement(22);   
//      envConf.setLogInMemory(true);   
        envConf.setLogRegionSize(1024 * 1024);   
//      envConf.setLogBufferSize(30 * 1024 * 1024);   
        envConf.setCacheSize(64 * 1024 * 1024);   
//      envConf.setLockDetectMode(LockDetectMode.MINWRITE);   
           
        //����Environment���󣬲���ʼ���洢λ��   
        File fileHome = new File(fileHomePath);   
        try {   
            env = new Environment(fileHome, envConf);   
        } catch (FileNotFoundException e) {   
            e.printStackTrace();   
            log.info("�ļ�λ��δ�ҵ���");   
        } catch (DatabaseException e) {   
            e.printStackTrace();   
            log.info("���ݿ���ش���");   
        }   
    }   
       
    /**  
     * ����XmlManager����  
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
     * ���Environment����  
     * @return  
     */  
    public Environment getEnvironment(){   
        return env;   
    }   
       
    /**  
     * ���XmlManager����  
     * @return  
     */  
    public XmlManager getXmlManager(){   
        return xManager;   
    }   
       
    /**  
     * ���XmlContainer����  
     * @param dbxmlName  
     * @return  
     * @throws XmlException  
     */  
    public XmlContainer getXmlContainer(String dbxmlName) throws XmlException{   
        log.info("���XmlContainer����..");   
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

