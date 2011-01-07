package cn.edu.nwu.smrp.dao;

import java.util.ArrayList;

import cn.edu.nwu.smrp.beans.ResourceBean;
import cn.edu.nwu.smrp.db.MysqlDB;

public class ResourceDao extends MysqlDB{
	// �����Դ
	public boolean ResourceAdd(ResourceBean resource) {
		String sql =
			"INSERT INTO Resource(resource_name,resource_object,resource_phase,resource_type,resource_tag,resource_describe,resource_intime,resource_downtimes,resource_owner) " +
			"VALUES("
				+ resource.getResource_name()
				+ ","
				+ resource.getResource_object()
				+ ","
				+ resource.getResource_phase()
				+ ","
				+ resource.getResource_type()
				+ ","
				+ resource.getResource_tag()
				+ ","
				+ resource.getResource_describe()
				+ ","
				+ resource.getResource_intime()
				+ ","
				+ resource.getResource_downtimes()
				+ ","
				+ resource.getResource_owner()
				+ ","
				+ ");";
		return executeData(sql);
	}

	// ɾ����Դ
	public boolean resourceDelete(int resource_id) {
		String sql = "DELETE FROM resource WHERE resource_id=" + resource_id + ";";

		return executeData(sql);
	}
	
	
	
	// ��Դ����
	public boolean resourceUpdate(ResourceBean resource) {
		String sql = "UPDATE resource " +
				"SET resource_name="+resource.getResource_name()+",resource_object="+resource.getResource_object()+",resource_phase="+resource.getResource_phase()+",resource_type="+resource.getResource_type()+",resource_tag="+resource.getResource_tag()+",resource_describe="+resource.getResource_describe()+",resource_intime="+resource.getResource_intime()+",resource_downtimes="+resource.getResource_downtimes()+",resource_owner="+resource.getResource_owner()+"" 
				+
						" WHERE resource_id="+resource.getResource_id()+";";
		return executeData(sql);
	}
	
	// ��ѯָ��ID����Ա�ĸ�����Ϣ
	public ResourceBean resourceInfo(int resource_id) {
		String sql = "SELECT * FROM resource WHERE resource_id="+resource_id+";";
		ResourceBean resource_temp = new ResourceBean();

		try {
			rs = queryData(sql);

			while (rs.next()) {
				resource_temp.setResource_id(rs.getInt(1));
				resource_temp.setResource_name(rs.getString(2));
				resource_temp.setResource_object(rs.getString(3));
				resource_temp.setResource_phase(rs.getString(4));
				resource_temp.setResource_type(rs.getString(5));
				resource_temp.setResource_tag(rs.getString(6));
				resource_temp.setResource_describe(rs.getString(7));
				resource_temp.setResource_intime(rs.getString(8));
				resource_temp.setResource_downtimes(rs.getString(9));
				resource_temp.setResource_owner(rs.getString(10));
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("resourceInfo failed");
		}
		return resource_temp;
	}
	
	// ��ѯ���й���Ա
	public ArrayList resourceAll() {
		String sql = "SELECT * FROM resource;";
		
		ArrayList array = new ArrayList();
		try {
			
			rs = queryData(sql);

			while (rs.next()) {
				ResourceBean resource_temp = new ResourceBean();

				resource_temp.setResource_id(rs.getInt(1));
				resource_temp.setResource_name(rs.getString(2));
				resource_temp.setResource_object(rs.getString(3));
				resource_temp.setResource_phase(rs.getString(4));
				resource_temp.setResource_type(rs.getString(5));
				resource_temp.setResource_tag(rs.getString(6));
				resource_temp.setResource_describe(rs.getString(7));
				resource_temp.setResource_intime(rs.getString(8));
				resource_temp.setResource_downtimes(rs.getString(9));
				resource_temp.setResource_owner(rs.getString(10));

				array.add(resource_temp);
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("resourceAll failed");
		}
		return array;
	}
	
	public ArrayList resourcebyName(String resource_name) {
		String sql = "SELECT * FROM resource where name="+resource_name+";";
		
		ArrayList array = new ArrayList();
		try {
			
			rs = queryData(sql);

			while (rs.next()) {
				ResourceBean resource_temp = new ResourceBean();

				resource_temp.setResource_id(rs.getInt(1));
				resource_temp.setResource_name(rs.getString(2));
				resource_temp.setResource_object(rs.getString(3));
				resource_temp.setResource_phase(rs.getString(4));
				resource_temp.setResource_type(rs.getString(5));
				resource_temp.setResource_tag(rs.getString(6));
				resource_temp.setResource_describe(rs.getString(7));
				resource_temp.setResource_intime(rs.getString(8));
				resource_temp.setResource_downtimes(rs.getString(9));
				resource_temp.setResource_owner(rs.getString(10));

				array.add(resource_temp);
			}
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("resourceAll failed");
		}
		return array;
	}
}
