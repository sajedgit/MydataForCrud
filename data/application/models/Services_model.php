<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Services_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_services_list($limit,$per_page)
	it will retun all  services list*/
	public function get_all_services_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from services	 order by  services_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_services_list()
	it will retun total no of row of services list	*/
	public function no_of_rows_services_list()
	{
		
		$sql="select * from services	  order by  services_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : services_insert($data)
	it will insert a services details 
	*/
	function services_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('services', $data);
		
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
	FUNCTION NAME : services_update($data,$id)
	it will update a services deatails 
	*/
	function services_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('services_id', $id);
		$this->db->update('services', $data);
		
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
	FUNCTION NAME : get_services_by_id()
	it will get a services by services id */
	public function get_services_by_id($id)
	{
		$query = $this->db->get_where('services', array('services_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_services_by_id()
	it will delete the services by services id */
	public function delete_services_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('services_id', $id);
		$this->db->delete('services');
		
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
	