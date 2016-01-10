<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class User_details_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_user_details_list($limit,$per_page)
	it will retun all  user_details list*/
	public function get_all_user_details_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from user_details	 order by  user_details_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_user_details_list()
	it will retun total no of row of user_details list	*/
	public function no_of_rows_user_details_list()
	{
		
		$sql="select * from user_details	  order by  user_details_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : user_details_insert($data)
	it will insert a user_details details 
	*/
	function user_details_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('user_details', $data);
		
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
	FUNCTION NAME : user_details_update($data,$id)
	it will update a user_details deatails 
	*/
	function user_details_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('user_details_id', $id);
		$this->db->update('user_details', $data);
		
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
	FUNCTION NAME : get_user_details_by_id()
	it will get a user_details by user_details id */
	public function get_user_details_by_id($id)
	{
		$query = $this->db->get_where('user_details', array('user_details_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_user_details_by_id()
	it will delete the user_details by user_details id */
	public function delete_user_details_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('user_details_id', $id);
		$this->db->delete('user_details');
		
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
	