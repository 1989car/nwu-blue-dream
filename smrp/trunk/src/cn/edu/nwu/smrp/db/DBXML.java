package cn.edu.nwu.smrp.db;

import java.io.FileNotFoundException;

import com.sleepycat.dbxml.XmlContainer;
import com.sleepycat.dbxml.XmlException;
import com.sleepycat.dbxml.XmlManager;
import com.sleepycat.dbxml.XmlQueryContext;
import com.sleepycat.dbxml.XmlQueryExpression;
import com.sleepycat.dbxml.XmlResults;
import com.sleepycat.dbxml.XmlUpdateContext;
import com.sleepycat.dbxml.XmlValue;

public class DBXML {
	XmlManager m_mgr = null;
	XmlContainer m_cont = null;
	XmlUpdateContext m_uc = null;
	XmlQueryContext m_qc = null;

	 public void create(String strDbName) throws XmlException, FileNotFoundException {
	       m_mgr = new XmlManager();
	        if (m_mgr.existsContainer(strDbName) != 0) {
	        m_cont = m_mgr.openContainer(strDbName);
	        } else {
	        m_cont = m_mgr.createContainer(strDbName);
	        }
	        m_uc = m_mgr.createUpdateContext();
	        m_qc = m_mgr.createQueryContext();
	    }

	 public void close() {
	       if (m_cont != null)
	           m_cont.delete();
	           if (m_mgr != null)
	           m_mgr.delete();
	    }

	 public void addXmlData(String strName, String strXml)
     throws XmlException {

     m_cont.putDocument(strName, strXml, m_uc);
  }

	 public void queryXmlData(String strQuery) throws XmlException {
	       XmlQueryExpression expr = m_mgr.prepare(strQuery, m_qc);
	        XmlResults res = expr.execute(m_qc);

	        XmlValue value = new XmlValue();
	        System.out.print("Result: ");
	        while ((value = res.next()) != null) {
	        System.out.println("\t" + value.asString());
	        value.delete();
	        }
	        res.delete();
	        expr.delete();
	    }

	 public void editXmlData(String strName, String strNewXml) throws XmlException {
	       m_cont.deleteDocument(strName, m_uc);
	       m_cont.putDocument(strName, strNewXml, m_uc);
	    }

	 public void deleteXmlData(String strName) throws XmlException {
	       m_cont.deleteDocument(strName, m_uc);
	    }

	 public boolean isEmpty(String strQuery, String strName) throws XmlException {
	       m_qc.setVariableValue("name", new XmlValue(strName));
	       XmlQueryExpression expr = m_mgr.prepare(strQuery, m_qc);
	        XmlResults res = expr.execute(m_qc);

	        XmlValue value = new XmlValue();
	        System.out.print("Result: ");
	        if ((value = res.next()) != null) {
	        value.delete();
	        res.delete();
	           expr.delete();
	        return false;
	        }
	        res.delete();
	        expr.delete();
	        return true;
	    }

}



/*


static final private String m_StrDbName = "phone.dbxml";
static final private String m_StrName1 = "phone1";
static final private String m_StrXml1 = "<phonebook><name><first>Tom</first><last>Jones</last></name><phone type=\"home\">420-203-2033</phone></phonebook>";
static final private String m_StrName2 = "phone2";
static final private String m_StrXml2 = "<phonebook><name><first>Lisa</first><last>Smith</last></name> <phone type=\"home\">420-992-4801</phone><phone type=\"cell\">390-812-4292</phone></phonebook>";
static final private String m_StrName3 = "phone3";
static final private String m_StrXml3 = "<phonebook><name><first>Tom</first><last>Jones</last></name><phone type=\"home\">420-203-2033</phone></phonebook>";

static final private String m_strquery = "collection('phone.dbxml')/phonebook";
static final private String m_strquery1 = "collection('phone.dbxml')/phonebook[name/first=$name]";



public static void main(String[] args) {
   // TODO 自动生成方法存根
   DbXmlTest dbxml = new DBXML();
   try {
       dbxml.create(m_StrDbName);

       if (dbxml.isEmpty(m_strquery1, "Tom")) {
          dbxml.addXmlData(m_StrName1, m_StrXml1);
          dbxml.queryXmlData(m_strquery);
       }
       if (dbxml.isEmpty(m_strquery1, "Lisa")) {
          dbxml.addXmlData(m_StrName2, m_StrXml2);
          dbxml.queryXmlData(m_strquery);
       }
       if (dbxml.isEmpty(m_strquery1, "Tom")) {
          dbxml.addXmlData(m_StrName3, m_StrXml3);
          dbxml.queryXmlData(m_strquery);
       } else {
          System.out.println("已经存在");
       }
       dbxml.deleteXmlData(m_StrName2);
       dbxml.queryXmlData(m_strquery);
       dbxml.editXmlData(m_StrName1, m_StrXml2);
       dbxml.queryXmlData(m_strquery);

       dbxml.close();
   } catch (XmlException e) {
       // TODO 自动生成 catch 块
       System.out.print("XmlException");
       e.printStackTrace();
   } catch (FileNotFoundException e) {
       // TODO 自动生成 catch 块
       System.out.print("未找到数据文件");
   }
}*/
