package cn.edu.nwu.smrp.db.dbxml;

import java.io.ByteArrayInputStream;   
import java.io.IOException;   
import java.io.InputStreamReader;   
  
import javax.xml.bind.JAXBContext;   
import javax.xml.bind.JAXBElement;   
import javax.xml.bind.Unmarshaller;   
import javax.xml.transform.stream.StreamSource;   
  
import javax.xml.bind.annotation.XmlAccessType;   
import javax.xml.bind.annotation.XmlAccessorType;   
import javax.xml.bind.annotation.XmlAttribute;   
import javax.xml.bind.annotation.XmlElement;   
import javax.xml.bind.annotation.XmlType;   
  
@XmlAccessorType(XmlAccessType.FIELD)   
@XmlType(name = "PhoneBook", propOrder = {   
    "name",   
    "phone"  
})   
/*  
<phonebook>  
        <name><first>Lisa</first><last>Smith</last></name>   
        <phone type=\"home\">420-992-4801</phone>  
        <phone type=\"cell\">390-812-4292</phone>  
</phonebook>  
*/         
public class PhoneBook {   
    @XmlElement(required = true)   
    private PhoneBook.Name name;   
    private PhoneBook.Phone phone;   
       
    @XmlAccessorType(XmlAccessType.FIELD)   
    @XmlType(name = "")   
    public static class Name {   
        @XmlElement(name = "first", required = true)   
        private String first;   
        @XmlElement(name = "last", required = true)   
        private String last;   
        public String getFirst() {   
            return first;   
        }   
        public void setFirst(String first) {   
            this.first = first;   
        }   
        public String getLast() {   
            return last;   
        }   
        public void setLast(String last) {   
            this.last = last;   
        }   
           
    }   
       
    @XmlAccessorType(XmlAccessType.FIELD)   
    @XmlType(name = "")   
    public static class Phone {   
        @XmlAttribute(name = "type", required = true)   
        private String type;   
  
        public String getType() {   
            return type;   
        }   
  
        public void setType(String type) {   
            this.type = type;   
        }   
           
    }   
  
    public PhoneBook.Name getName() {   
        return name;   
    }   
  
    public void setName(PhoneBook.Name name) {   
        this.name = name;   
    }   
  
    public PhoneBook.Phone getPhone() {   
        return phone;   
    }   
  
    public void setPhone(PhoneBook.Phone phone) {   
        this.phone = phone;   
    }   
}  
