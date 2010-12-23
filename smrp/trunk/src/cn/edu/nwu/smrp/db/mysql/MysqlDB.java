package cn.edu.nwu.smrp.db.mysql;

import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import java.sql.Connection;

/**
 * JDBC辅助类
 * 
 * @author Yellow
 * 
 */
public final class MysqlDB {
	private static String url = "jdbc:mysql://localhost:3306/smrp"; // 连接数据库连接
	private static String use = "root"; // 登陆数据库用户名
	private static String password = "mysql"; // 登陆数据库密码

	private MysqlDB() {

	}

	/**
	 * 使用静态模块来进行注册驱动
	 */
	static {
		// 1. 注册驱动
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			throw new ExceptionInInitializerError(e);
		}
	}

	/**
	 * 建立数据库连接
	 * 
	 * @return 返回数据库连接
	 * @throws SQLException
	 */
	public static Connection getConnection() throws SQLException {
		return DriverManager.getConnection(url, use, password);
	}

	/**
	 * 释放数据资源
	 * 
	 * @param rs
	 * @param st
	 * @param conn
	 */
	public static void free(ResultSet rs, Statement st, Connection conn) {
		try {
			if (rs != null)
				rs.close();
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			try {
				if (st != null)
					st.close();
			} catch (SQLException e) {
				e.printStackTrace();
			} finally {
				if (conn != null)
					try {
						conn.close();
					} catch (SQLException e) {
						e.printStackTrace();
					}
			}
		}
	}

	public static void ExecuteData(String sql) throws SQLException {
		Connection conn = null;
		Statement st = null;
		ResultSet rs = null;
		try {
			// 建立连接
			conn = MysqlDB.getConnection();
			// 创建sql语句
			st = conn.createStatement();
			// 执行SQL语句
			st.executeUpdate(sql);

		} finally {
			MysqlDB.free(rs, st, conn);
		}
	}

	public static ResultSet QueryData(String sql) throws SQLException {
		Connection conn = null;
		Statement st = null;
		ResultSet rs = null;

		try {
			// 建立连接
			conn = MysqlDB.getConnection();
			// 创建sql语句
			st = conn.createStatement();
			// 执行SQL语句
			rs = st.executeQuery(sql);

		} finally {
			MysqlDB.free(rs, st, conn);
		}
		return rs;
	}
}
