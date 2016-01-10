<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class User_services_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_user_services_list($limit,$per_page)
	it will retun all  user_services list*/
	public function get_all_user_services_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from user_services	 order by  user_services_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_user_services_list()
	it will retun total no of row of user_services list	*/
	public function no_of_rows_user_services_list()
	{
		
		$sql="select * from user_services	  order by  user_services_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : user_services_insert($data)
	it will insert a user_services details 
	*/
	function user_services_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('user_services', $data);
		
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
	FUNCTION NAME : user_services_update($data,$id)
	it will update a user_services deatails 
	*/
	function user_services_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('user_services_id', $id);
		$this->db->update('user_services', $data);
		
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
	FUNCTION NAME : get_user_services_by_id()
	it will get a user_services by user_services id */
	public function get_user_services_by_id($id)
	{
		$query = $this->db->get_where('user_services', array('user_services_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_user_services_by_id()
	it will delete the user_services by user_services id */
	public function delete_user_services_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('user_services_id', $id);
		$this->db->delete('user_services');
		
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
	