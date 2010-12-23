package cn.edu.nwu.smrp.beans;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;

@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "Resource", propOrder = {
    "name",
    "object",
    "phase",
    "type",
    "tag",
    "describe",
    "intime",
    "downtimes",
    "owner"
})
/*
<Resource>
		<name>fdsafsa</name> 
		<object>420-992-4801</object>
		<phase>420-992-4801</phase>
		<type>420-992-4801</type>
		<tag>420-992-4801</tag>
		<describe>420-992-4801</describe>
		<intime>2000.1.0</intime>
		<downtimes>15051</downtimes>
		<owner>Oishi</owner>	
</Resource>
*/		

public class ResourceBean {
	
		
		
}
