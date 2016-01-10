<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Events_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_events_list($limit,$per_page)
	it will retun all  events list*/
	public function get_all_events_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from events	 order by  events_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_events_list()
	it will retun total no of row of events list	*/
	public function no_of_rows_events_list()
	{
		
		$sql="select * from events	  order by  events_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : events_insert($data)
	it will insert a events details 
	*/
	function events_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('events', $data);
		
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
	FUNCTION NAME : events_update($data,$id)
	it will update a events deatails 
	*/
	function events_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('events_id', $id);
		$this->db->update('events', $data);
		
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
	FUNCTION NAME : get_events_by_id()
	it will get a events by events id */
	public function get_events_by_id($id)
	{
		$query = $this->db->get_where('events', array('events_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_events_by_id()
	it will delete the events by events id */
	public function delete_events_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('events_id', $id);
		$this->db->delete('events');
		
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
	