<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Admin_panel_login_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_admin_panel_login_list($limit,$per_page)
	it will retun all  admin_panel_login list*/
	public function get_all_admin_panel_login_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from admin_panel_login	 order by  admin_panel_login_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_admin_panel_login_list()
	it will retun total no of row of admin_panel_login list	*/
	public function no_of_rows_admin_panel_login_list()
	{
		
		$sql="select * from admin_panel_login	  order by  admin_panel_login_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : admin_panel_login_insert($data)
	it will insert a admin_panel_login details 
	*/
	function admin_panel_login_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('admin_panel_login', $data);
		
		$inserted_id=$this->db->insert_id();
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return $inserted_id;
		}
		
	}
	
	
	/*
	FUNCTION NAME : admin_panel_login_update($data,$id)
	it will update a admin_panel_login deatails 
	*/
	function admin_panel_login_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('admin_panel_login_id', $id);
		$this->db->update('admin_panel_login', $data);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	
	}
	


	
	/*
	FUNCTION NAME : get_admin_panel_login_by_id()
	it will get a admin_panel_login by admin_panel_login id */
	public function get_admin_panel_login_by_id($id)
	{
		$query = $this->db->get_where('admin_panel_login', array('admin_panel_login_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_admin_panel_login_by_id()
	it will delete the admin_panel_login by admin_panel_login id */
	public function delete_admin_panel_login_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('admin_panel_login_id', $id);
		$this->db->delete('admin_panel_login');
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return 1;
		}
		
	}
	

	
}
	