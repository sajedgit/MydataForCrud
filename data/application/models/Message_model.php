<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Message_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_message_list($limit,$per_page)
	it will retun all  message list*/
	public function get_all_message_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from message	 order by  message_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_message_list()
	it will retun total no of row of message list	*/
	public function no_of_rows_message_list()
	{
		
		$sql="select * from message	  order by  message_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : message_insert($data)
	it will insert a message details 
	*/
	function message_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('message', $data);
		
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
	FUNCTION NAME : message_update($data,$id)
	it will update a message deatails 
	*/
	function message_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('message_id', $id);
		$this->db->update('message', $data);
		
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
	FUNCTION NAME : get_message_by_id()
	it will get a message by message id */
	public function get_message_by_id($id)
	{
		$query = $this->db->get_where('message', array('message_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_message_by_id()
	it will delete the message by message id */
	public function delete_message_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('message_id', $id);
		$this->db->delete('message');
		
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
	