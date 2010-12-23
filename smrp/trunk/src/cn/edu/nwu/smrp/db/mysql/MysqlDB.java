package cn.edu.nwu.smrp.db.mysql;

import java.sql.*;

public class MysqlDB {

	Connection conn = null;
	PreparedStatement pstat = null;
	ResultSet rs = null;

	public Connection getConn() {
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (Exception e) {
			e.printStackTrace();
			System.err.println("initialization of jdbc failed");
		}
		String url = "jdbc:mysql://localhost:3306/smrptest";
		String user = "root";
		String password = "mysql";
		try {
			conn = DriverManager.getConnection(url, user, password);
			System.out.println("getConn succeed");

		} catch (Exception e) {
			e.printStackTrace();
			System.err.println("getConn failed");
		}
		return conn;
	}

	public void closeAll(Connection conn, PreparedStatement pstat, ResultSet rs) {
		if (rs != null) {
			try {
				rs.close();
			} catch (Exception e) {
				e.printStackTrace();
				System.err.println("rsπÿ±’ ß∞‹");
			}
		}
		if (pstat != null) {
			try {
				pstat.close();
			} catch (Exception e) {
				e.printStackTrace();
				System.err.println("pstatπÿ±’ ß∞‹");
			}
		}
		if (conn != null) {
			try {
				conn.close();
			} catch (Exception e) {
				e.printStackTrace();
				System.err.println("connπÿ±’ ß∞‹");
			}
		}
	}

	public void executeData(String sql) {

		try {
			conn = this.getConn();
			pstat = conn.prepareStatement(sql);
			pstat.executeUpdate();

		} catch (Exception e) {
		} finally {
			this.closeAll(conn, pstat, rs);
		}
	}

	public ResultSet queryData(String sql) {
		try {
			conn = this.getConn();
			pstat = conn.prepareStatement(sql);
			pstat.executeQuery();
		} catch (Exception e) {
		} finally {
			this.closeAll(conn, pstat, rs);
		}

		return rs;
	}
}
