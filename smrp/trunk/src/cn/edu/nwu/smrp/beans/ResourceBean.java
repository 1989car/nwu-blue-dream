package cn.edu.nwu.smrp.beans;

/* "name",
 "object",
 "phase",
 "type",
 "tag",
 "describe",
 "intime",
 "downtimes",
 "owner"*/

public class ResourceBean {
	private int resource_id;
	private String resource_object;
	private String resource_phase;
	private String resource_type;
	private String resource_tag;
	private String resource_describe;
	private String resource_intime;
	private String resource_downtimes;
	private String resource_owner;

	public int getResource_id() {
		return resource_id;
	}

	public void setResource_id(int resourceId) {
		resource_id = resourceId;
	}

	public String getResource_object() {
		return resource_object;
	}

	public void setResource_object(String resourceObject) {
		resource_object = resourceObject;
	}

	public String getResource_phase() {
		return resource_phase;
	}

	public void setResource_phase(String resourcePhase) {
		resource_phase = resourcePhase;
	}

	public String getResource_type() {
		return resource_type;
	}

	public void setResource_type(String resourceType) {
		resource_type = resourceType;
	}

	public String getResource_tag() {
		return resource_tag;
	}

	public void setResource_tag(String resourceTag) {
		resource_tag = resourceTag;
	}

	public String getResource_describe() {
		return resource_describe;
	}

	public void setResource_describe(String resourceDescribe) {
		resource_describe = resourceDescribe;
	}

	public String getResource_intime() {
		return resource_intime;
	}

	public void setResource_intime(String resourceIntime) {
		resource_intime = resourceIntime;
	}

	public String getResource_downtimes() {
		return resource_downtimes;
	}

	public void setResource_downtimes(String resourceDowntimes) {
		resource_downtimes = resourceDowntimes;
	}

	public String getResource_owner() {
		return resource_owner;
	}

	public void setResource_owner(String resourceOwner) {
		resource_owner = resourceOwner;
	}

}
