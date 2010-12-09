package cn.edu.nwu.smrp.db.dbxml;

import java.io.ByteArrayInputStream;   
import java.io.IOException;   
import java.io.InputStreamReader;   
  
import javax.xml.bind.JAXBContext;   
import javax.xml.bind.JAXBElement;   
import javax.xml.bind.Unmarshaller;   
import javax.xml.transform.stream.StreamSource;   
  
public class JAXBUtils {   
       
    public static <T> T convertDocToJava(Class<T> bindClass, String docContent){   
        JAXBContext jc;   
        Unmarshaller umn;   
        InputStreamReader is = null;   
        StreamSource ss;   
        try {   
            jc = JAXBContext.newInstance(bindClass);   
            umn = jc.createUnmarshaller();   
            is = new InputStreamReader(new ByteArrayInputStream(docContent.getBytes("utf-8")), "utf-8");   
            ss = new StreamSource(is);   
            JAXBElement<T> book = umn.unmarshal(ss, bindClass);   
            return book.getValue();   
        } catch (Exception e) {   
            e.printStackTrace();   
            return null;   
        }finally{   
            if(is != null){   
                try {   
                    is.close();   
                } catch (IOException e) {   
                    e.printStackTrace();   
                }   
            }   
        }   
    }   
}  
