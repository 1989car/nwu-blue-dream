package cn.edu.nwu.smrp.dao;

import java.util.ArrayList;

import cn.edu.nwu.smrp.beans.UserBean;
import cn.edu.nwu.smrp.db.mysql.MysqlDB;

public class UserDao extends MysqlDB {
	// 添加用户
	public boolean UserAdd(UserBean user) {
		String sql = "INSERT INTO user(user_name,user_pwd,user_email,user_phone,user_addr) VALUES("
				+ user.getUser_name()
				+ user.getUser_pwd()
				+ user.getUser_email()
				+ user.getUser_phone()
				+ user.getUser_addr() + ");";
		return executeData(sql);
	}

	// 删除用户
	public boolean UserDelete(int user_id) {
		String sql = "DELETE FROM user WHERE user_id=" + user_id + ";";
		return executeData(sql);
	}

	// 用户登录
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

	// 用户资料更新
	public boolean UserUpdate(UserBean user) {
		String sql = "UPDATE user SET user_pwd=" + user.getUser_pwd()
				+ ",user_email=" + user.getUser_email() + ",user_level="
				+ user.getUser_level() + ",user_phone=" + user.getUser_phone()
				+ ",user_addr=" + user.getUser_addr() + " WHERE user_id="
				+ user.getUser_id() + ";";

		return executeData(sql);
	}

	// 查询指定ID用户的个人信息
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

	// 查询所有用户
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