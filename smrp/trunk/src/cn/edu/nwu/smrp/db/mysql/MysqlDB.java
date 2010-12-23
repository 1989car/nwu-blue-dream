package cn.edu.nwu.smrp.db.mysql;

import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import java.sql.Connection;

/**
 * JDBC������
 * 
 * @author Yellow
 * 
 */
public final class MysqlDB {
	private static String url = "jdbc:mysql://localhost:3306/smrp"; // �������ݿ�����
	private static String use = "root"; // ��½���ݿ��û���
	private static String password = "mysql"; // ��½���ݿ�����

	private MysqlDB() {

	}

	/**
	 * ʹ�þ�̬ģ��������ע������
	 */
	static {
		// 1. ע������
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			throw new ExceptionInInitializerError(e);
		}
	}

	/**
	 * �������ݿ�����
	 * 
	 * @return �������ݿ�����
	 * @throws SQLException
	 */
	public static Connection getConnection() throws SQLException {
		return DriverManager.getConnection(url, use, password);
	}

	/**
	 * �ͷ�������Դ
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
			// ��������
			conn = MysqlDB.getConnection();
			// ����sql���
			st = conn.createStatement();
			// ִ��SQL���
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
			// ��������
			conn = MysqlDB.getConnection();
			// ����sql���
			st = conn.createStatement();
			// ִ��SQL���
			rs = st.executeQuery(sql);

		} finally {
			MysqlDB.free(rs, st, conn);
		}
		return rs;
	}
}
