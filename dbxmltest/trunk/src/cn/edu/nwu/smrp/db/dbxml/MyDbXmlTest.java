package cn.edu.nwu.smrp.db.dbxml;

import com.sleepycat.dbxml.XmlContainer;   
import com.sleepycat.dbxml.XmlDocument;   
import com.sleepycat.dbxml.XmlException;   
import com.sleepycat.dbxml.XmlIndexLookup;   
import com.sleepycat.dbxml.XmlIndexSpecification;   
import com.sleepycat.dbxml.XmlManager;   
import com.sleepycat.dbxml.XmlQueryContext;   
import com.sleepycat.dbxml.XmlQueryExpression;   
import com.sleepycat.dbxml.XmlResults;   
import com.sleepycat.dbxml.XmlTransaction;   
import com.sleepycat.dbxml.XmlUpdateContext;   
import com.sleepycat.dbxml.XmlValue;   
  
public class MyDbXmlTest {   
    protected DbXmlContainerConfig dbxmlConf =  null;   
       
       
    private String dbxmlName = "phone.dbxml";   
    static final private String m_StrName1 = "phone1";   
    static final private String m_StrXml1 = "<PhoneBook><name><first>Tom</first><last>Jones</last></name><phone type=\"home\">420-203-2033</phone></PhoneBook>";   
    static final private String m_StrName2 = "phone2";   
    static final private String m_StrXml2 = "<PhoneBook><name><first>Lisa</first><last>Smith</last></name> <phone type=\"home\">420-992-4801</phone><phone type=\"cell\">390-812-4292</phone></PhoneBook>";   
    static final private String m_StrName3 = "phone3";   
    static final private String m_StrXml3 = "<PhoneBook><name><first>Tom</first><last>Jones</last></name><phone type=\"home\">420-203-2033</phone></PhoneBook>";   
       
    static final private String m_strquery = "collection('phone.dbxml')/phonebook";   
    static final private String m_strquery1 = "collection('phone.dbxml')/phonebook[name/first=$name]";   
       
    public MyDbXmlTest(){   
        dbxmlConf = DbXmlContainerConfig.getInstance();   
    }   
       
    public static void main(String[] args){   
        MyDbXmlTest myDb = new MyDbXmlTest();   
        try {   
            /*添加文档*/  
//          myDb.addDoc(m_StrName1, m_StrXml1);   
//          myDb.addDoc(m_StrName2, m_StrXml2);   
            /*修改文档*/  
//          myDb.updateDoc(m_StrName1, m_StrXml2);   
            /*查询文档*/  
            myDb.queryXmlData(m_strquery);   
            if(myDb.getDocByKey(m_StrName3) == null){   
                myDb.addDoc(m_StrName3, m_StrXml3);   
            }else{   
                System.out.println("Tom 已经存在!");   
                //删除文档   
//              myDb.deleteDoc(m_StrName3);   
            }   
               
        } catch (XmlException e) {   
            e.printStackTrace();   
        }   
    }   
       
    /**  
     * 保存文档  
     * @throws XmlException   
     */  
    public void addDoc(String docName, String docStr) throws XmlException{   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        XmlContainer x_cont = dbxmlConf.getXmlContainer(dbxmlName);   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlUpdateContext x_updateCon = x_mng.createUpdateContext();   
        x_cont.putDocument(x_tran, docName, docStr, x_updateCon);   
        x_tran.commit();   
    }   
       
    /**  
     * 更新文档  
     * @param docName  
     * @param docStr  
     * @throws XmlException  
     */  
    public void updateDoc(String docName, String docStr) throws XmlException{   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        XmlUpdateContext m_uc = x_mng.createUpdateContext();   
        XmlContainer x_cont = dbxmlConf.getXmlContainer(dbxmlName);   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlDocument doc = x_cont.getDocument(x_tran, docName);   
        doc.setContent(docStr);   
        x_cont.updateDocument(x_tran, doc);   
        x_tran.commit();   
//      x_cont.deleteDocument(docName, m_uc);   
//      x_cont.putDocument(docName, docStr, m_uc);   
    }   
       
    /**  
     * 删除文档  
     * @param docName  
     * @throws XmlException  
     */  
    public void deleteDoc(String docName) throws XmlException{   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlUpdateContext m_uc = x_mng.createUpdateContext();   
        XmlContainer x_cont = dbxmlConf.getXmlContainer(dbxmlName);   
        x_cont.deleteDocument(x_tran, docName, m_uc);   
        x_tran.commit();   
        System.out.println("已经删除!");   
    }   
  
    /**  
     * 查询数据，使用xquery  
     * @param strQuery  
     * @throws XmlException  
     */  
    public void queryXmlData(String strQuery) throws XmlException {   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        XmlContainer x_cont = dbxmlConf.getXmlContainer(dbxmlName);   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlQueryContext m_qc = x_mng.createQueryContext();   
        XmlQueryExpression expr = x_mng.prepare(x_tran, strQuery, m_qc);   
        XmlResults res = expr.execute(m_qc);   
        x_tran.commit();   
           
        XmlValue value = new XmlValue();   
        /*System.out.print("Result: ");  
        while ((value = res.next()) != null) {  
            System.out.println("\t" + value.asString());  
            value.delete();  
        }*/  
           
        //把查询结果对应对象   
        while ((value = res.next()) != null) {   
            String tempStr = value.asString();   
            if (tempStr != null && !tempStr.equals("")) {   
                PhoneBook objData = JAXBUtils.convertDocToJava(PhoneBook.class, tempStr);   
                System.out.println("name=" + objData.getName().getFirst() + "+" + objData.getName().getLast());   
                if(objData.getPhone() != null){   
                    System.out.println("phone=" + objData.getPhone().getType());   
                }   
            }   
            value.delete();   
        }   
        expr.delete();   
    }   
    /**  
     * 判断名称是否存在  
     * @param name  
     * @return  
     * @throws XmlException  
     */  
    public boolean isEmpty(String name) throws XmlException{   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlQueryContext m_qc = x_mng.createQueryContext();   
        m_qc.setVariableValue("name", new XmlValue(name));   
        XmlQueryExpression xqe = x_mng.prepare(x_tran, m_strquery1, m_qc);   
        XmlResults rs = xqe.execute(m_qc);   
        if(rs.size() > 0){   
            return false;   
        }   
        return true;   
    }   
    /**  
     * 根据文档名称查找文档  
     * @param key  
     * @return  
     * @throws XmlException  
     */  
    public String getDocByKey(String key) throws XmlException{   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlContainer x_cont = dbxmlConf.getXmlContainer(dbxmlName);   
        XmlDocument doc = null;   
        try{   
            doc = x_cont.getDocument(x_tran, key);   
        }catch(XmlException ex){   
            if(ex.getErrorCode() == XmlException.DOCUMENT_NOT_FOUND){   
                x_tran.abort();   
                return null;   
            }   
        }   
        x_tran.commit();   
        String str = doc.getContentAsString();   
        if(doc != null && doc.getContent() != null){   
            return doc.getContentAsString();   
        }   
        return null;   
    }   
       
    /**  
     * 添加索引  
     * @throws XmlException  
     */  
    public void AddIndex() throws XmlException{   
        XmlManager x_mng = dbxmlConf.getXmlManager();   
        //创建事务   
        XmlTransaction x_tran = x_mng.createTransaction();   
        XmlUpdateContext m_uc = x_mng.createUpdateContext();   
        XmlContainer x_cont = dbxmlConf.getXmlContainer(dbxmlName);   
        XmlIndexSpecification ins = x_cont.getIndexSpecification(x_tran);   
        //[unique]-{path type}-{node type}-{key type}-{syntax type}   
        ins.addIndex("", "firstName", "node-element-substring-string");   
//      ins.addIndex("", "PRICE", "node-element-equality-double");   
        //更新索引到容器中   
        XmlUpdateContext xuc = x_mng.createUpdateContext();   
        x_cont.setIndexSpecification(x_tran, ins, xuc);   
        x_tran.commit();   
    }   
       
}  
