package cn.edu.nwu.smrp.dao;

import java.util.ArrayList;

import cn.edu.nwu.smrp.beans.UserBean;
import cn.edu.nwu.smrp.db.MysqlDB;

public class UserDao extends MysqlDB {
	// ����û�
	public boolean UserAdd(UserBean user) {
		String sql = "INSERT INTO user(user_name,user_pwd,user_email,user_phone,user_addr) VALUES("
				+ user.getUser_name()
				+ user.getUser_pwd()
				+ user.getUser_email()
				+ user.getUser_phone()
				+ user.getUser_addr() + ");";
		return executeData(sql);
	}

	// ɾ���û�
	public boolean UserDelete(int user_id) {
		String sql = "DELETE FROM user WHERE user_id=" + user_id + ";";
		return executeData(sql);
	}

	// �û���¼
	public UserBean UserLogin(UserBean user) {
		UserBean user_temp = null;

		String sql = "SELECT * FROM user WHERE user_name="
				+ user.getUser_name() + " and user_pwd=" + user.getUser_pwd()
				+ ";";

		try {
			rs = queryData(sql);

			while (rs.next()) {
				user_temp = new UserBean();
				user_temp.setUser_id(rs.getInt(1));
				user_temp.setUser_name(rs.getString(2));
				user_temp.setUser_pwd(rs.getString(3));
				user_temp.setUser_email(rs.getString(4));
				user_temp.setUser_level(rs.getInt(5));
				user_temp.setUser_phone(rs.getString(6));
				user_temp.setUser_addr(rs.getString(7));
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("UserLogin fail");
		}
		return user_temp;
	}

	// �û����ϸ���
	public boolean UserUpdate(UserBean user) {
		String sql = "UPDATE user SET user_pwd=" + user.getUser_pwd()
				+ ",user_email=" + user.getUser_email() + ",user_level="
				+ user.getUser_level() + ",user_phone=" + user.getUser_phone()
				+ ",user_addr=" + user.getUser_addr() + " WHERE user_id="
				+ user.getUser_id() + ";";

		return executeData(sql);
	}

	// ��ѯָ��ID�û��ĸ�����Ϣ
	public UserBean UserInfo(int user_id) {
		rs = null;

		String sql = "SELECT * FROM user WHERE user_id=" + user_id + ";";
		rs = queryData(sql);

		UserBean user_temp = new UserBean();

		try {
			while (rs.next()) {
				user_temp.setUser_id(rs.getInt(1));
				user_temp.setUser_name(rs.getString(2));
				user_temp.setUser_pwd(rs.getString(3));
				user_temp.setUser_email(rs.getString(4));
				user_temp.setUser_level(rs.getInt(5));
				user_temp.setUser_phone(rs.getString(6));
				user_temp.setUser_addr(rs.getString(7));
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("UserInfo failed");
		}
		return user_temp;
	}

	// ��ѯ�����û�
	public ArrayList UserAll() {
		String sql = "SELECT * FROM user;";
		rs = queryData(sql);
		ArrayList array = new ArrayList();
		try {
			while (rs.next()) {
				UserBean user_temp = new UserBean();

				user_temp.setUser_id(rs.getInt(1));
				user_temp.setUser_name(rs.getString(2));
				user_temp.setUser_pwd(rs.getString(3));
				user_temp.setUser_email(rs.getString(4));
				user_temp.setUser_level(rs.getInt(5));
				user_temp.setUser_phone(rs.getString(6));
				user_temp.setUser_addr(rs.getString(7));

				array.add(user_temp);
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("UserAll failed");
		}
		return array;
	}
}