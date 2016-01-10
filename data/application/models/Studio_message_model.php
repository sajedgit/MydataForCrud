<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Studio_message_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_studio_message_list($limit,$per_page)
	it will retun all  studio_message list*/
	public function get_all_studio_message_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from studio_message	 order by  studio_message_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_studio_message_list()
	it will retun total no of row of studio_message list	*/
	public function no_of_rows_studio_message_list()
	{
		
		$sql="select * from studio_message	  order by  studio_message_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : studio_message_insert($data)
	it will insert a studio_message details 
	*/
	function studio_message_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('studio_message', $data);
		
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
	FUNCTION NAME : studio_message_update($data,$id)
	it will update a studio_message deatails 
	*/
	function studio_message_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('studio_message_id', $id);
		$this->db->update('studio_message', $data);
		
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
	FUNCTION NAME : get_studio_message_by_id()
	it will get a studio_message by studio_message id */
	public function get_studio_message_by_id($id)
	{
		$query = $this->db->get_where('studio_message', array('studio_message_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_studio_message_by_id()
	it will delete the studio_message by studio_message id */
	public function delete_studio_message_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('studio_message_id', $id);
		$this->db->delete('studio_message');
		
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
	