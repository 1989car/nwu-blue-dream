package cn.edu.nwu.smrp.dao;

import java.util.ArrayList;

import cn.edu.nwu.smrp.beans.AdminBean;
import cn.edu.nwu.smrp.db.MysqlDB;

public class AdminDao extends MysqlDB {
	// ��ӹ���Ա
	public boolean AdminAdd(AdminBean admin) {
		String sql = "INSERT INTO admin(admin_name,admin_pwd,admin_email,admin_level) VALUES("
				+ admin.getAdmin_name()
				+ ","
				+ admin.getAdmin_pwd()
				+ ","
				+ admin.getAdmin_email() + "," + admin.getAdmin_level() + ");";
		return executeData(sql);
	}

	// ɾ�����Ա
	public boolean AdminDelete(int admin_id) {
		String sql = "DELETE FROM admin WHERE admin_id=" + admin_id + ";";

		return executeData(sql);
	}
	
	// ����Ա��¼
	public AdminBean AdminLogin(AdminBean admin) {
		
		String sql = "SELETE * FROM admin WHERE admin_name="+admin.getAdmin_name()+" and admin_pwd="+admin.getAdmin_pwd()+";";
		AdminBean admin_temp = null;

		try {
			rs = queryData(sql);
			while (rs.next()) {
				admin_temp = new AdminBean();
				admin_temp.setAdmin_id(rs.getInt(1));
				admin_temp.setAdmin_name(rs.getString(2));
				admin_temp.setAdmin_pwd(rs.getString(3));
				admin_temp.setAdmin_email(rs.getString(4));
				admin_temp.setAdmin_level(rs.getInt(5));
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("AdminLogin failed");
		}
		return admin_temp;
	}
	
	// ����Ա���ϸ���
	public boolean AdminUpdate(AdminBean admin) {
		String sql = "UPDATE admin SET admin_pwd="+admin.getAdmin_pwd()+",admin_email="+admin.getAdmin_email()+",admin_level="+admin.getAdmin_level()+" WHERE admin_id="+admin.getAdmin_id()+";";
		return executeData(sql);
	}
	
	// ��ѯָ��ID����Ա�ĸ�����Ϣ
	public AdminBean AdminInfo(int admin_id) {
		String sql = "SELECT * FROM admin WHERE admin_id="+admin_id+";";
		AdminBean admin_temp = new AdminBean();

		try {
			rs = queryData(sql);

			while (rs.next()) {
				admin_temp.setAdmin_id(rs.getInt(1));
				admin_temp.setAdmin_name(rs.getString(2));
				admin_temp.setAdmin_pwd(rs.getString(3));
				admin_temp.setAdmin_email(rs.getString(4));
				admin_temp.setAdmin_level(rs.getInt(5));
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("AdminInfo failed");
		}
		return admin_temp;
	}
	
	// ��ѯ���й���Ա
	public ArrayList AdminAll() {
		String sql = "SELECT * FROM Admin;";
		
		ArrayList array = new ArrayList();
		try {
			
			rs = queryData(sql);

			while (rs.next()) {
				AdminBean admin_temp = new AdminBean();

				admin_temp.setAdmin_id(rs.getInt(1));
				admin_temp.setAdmin_name(rs.getString(2));
				admin_temp.setAdmin_pwd(rs.getString(3));
				admin_temp.setAdmin_email(rs.getString(4));
				admin_temp.setAdmin_level(rs.getInt(5));

				array.add(admin_temp);
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("AdminAll failed");
		}
		return array;
	}
}
