<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Services_message_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_services_message_list($limit,$per_page)
	it will retun all  services_message list*/
	public function get_all_services_message_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from services_message	 order by  services_message_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_services_message_list()
	it will retun total no of row of services_message list	*/
	public function no_of_rows_services_message_list()
	{
		
		$sql="select * from services_message	  order by  services_message_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : services_message_insert($data)
	it will insert a services_message details 
	*/
	function services_message_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('services_message', $data);
		
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
	FUNCTION NAME : services_message_update($data,$id)
	it will update a services_message deatails 
	*/
	function services_message_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('services_message_id', $id);
		$this->db->update('services_message', $data);
		
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
	FUNCTION NAME : get_services_message_by_id()
	it will get a services_message by services_message id */
	public function get_services_message_by_id($id)
	{
		$query = $this->db->get_where('services_message', array('services_message_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_services_message_by_id()
	it will delete the services_message by services_message id */
	public function delete_services_message_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('services_message_id', $id);
		$this->db->delete('services_message');
		
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
	