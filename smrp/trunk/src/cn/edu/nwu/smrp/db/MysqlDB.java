package cn.edu.nwu.smrp.db;

import java.sql.*;

public class MysqlDB {

	protected Connection conn = null;
	protected PreparedStatement pstat = null;
	protected ResultSet rs = null;

	public Connection getConn() {
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (Exception e) {
			e.printStackTrace();
			System.err.println("initialization of jdbc failed");
		}
		String url = "jdbc:mysql://localhost:3306/smrp";
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
				System.err.println("rs�ر�ʧ��");
			}
		}
		if (pstat != null) {
			try {
				pstat.close();
			} catch (Exception e) {
				e.printStackTrace();
				System.err.println("pstat�ر�ʧ��");
			}
		}
		if (conn != null) {
			try {
				conn.close();
			} catch (Exception e) {
				e.printStackTrace();
				System.err.println("conn�ر�ʧ��");
			}
		}
	}

	public boolean executeData(String sql) {
		boolean flag = false;
		try {
			conn = this.getConn();
			pstat = conn.prepareStatement(sql);
			int i = pstat.executeUpdate();
			if(i>0){flag = true;}

		} catch (Exception e) {
		} finally {
			this.closeAll(conn, pstat, rs);
		}
		return flag;
	}

	public ResultSet queryData(String sql) {
		rs = null;
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
