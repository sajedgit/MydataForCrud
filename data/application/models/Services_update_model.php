<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Services_update_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_services_update_list($limit,$per_page)
	it will retun all  services_update list*/
	public function get_all_services_update_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from services_update	 order by  services_update_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_services_update_list()
	it will retun total no of row of services_update list	*/
	public function no_of_rows_services_update_list()
	{
		
		$sql="select * from services_update	  order by  services_update_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : services_update_insert($data)
	it will insert a services_update details 
	*/
	function services_update_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('services_update', $data);
		
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
	FUNCTION NAME : services_update_update($data,$id)
	it will update a services_update deatails 
	*/
	function services_update_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('services_update_id', $id);
		$this->db->update('services_update', $data);
		
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
	FUNCTION NAME : get_services_update_by_id()
	it will get a services_update by services_update id */
	public function get_services_update_by_id($id)
	{
		$query = $this->db->get_where('services_update', array('services_update_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_services_update_by_id()
	it will delete the services_update by services_update id */
	public function delete_services_update_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('services_update_id', $id);
		$this->db->delete('services_update');
		
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
	