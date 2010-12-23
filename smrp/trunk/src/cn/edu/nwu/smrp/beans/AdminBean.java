package cn.edu.nwu.smrp.beans;

public class AdminBean {
	private int admin_id;
	private String admin_name;
	private String admin_pwd;
	private String admin_email;
	private int admin_level;

	public int getAdmin_id() {
		return admin_id;
	}

	public void setAdmin_id(int adminId) {
		admin_id = adminId;
	}

	public String getAdmin_name() {
		return admin_name;
	}

	public void setAdmin_name(String adminName) {
		admin_name = adminName;
	}

	public String getAdmin_pwd() {
		return admin_pwd;
	}

	public void setAdmin_pwd(String adminPwd) {
		admin_pwd = adminPwd;
	}

	public String getAdmin_email() {
		return admin_email;
	}

	public void setAdmin_email(String adminEmail) {
		admin_email = adminEmail;
	}

	public int getAdmin_level() {
		return admin_level;
	}

	public void setAdmin_level(int adminLevel) {
		admin_level = adminLevel;
	}
}
