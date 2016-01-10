<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Studio_services_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_studio_services_list($limit,$per_page)
	it will retun all  studio_services list*/
	public function get_all_studio_services_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from studio_services	 order by  studio_services_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_studio_services_list()
	it will retun total no of row of studio_services list	*/
	public function no_of_rows_studio_services_list()
	{
		
		$sql="select * from studio_services	  order by  studio_services_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : studio_services_insert($data)
	it will insert a studio_services details 
	*/
	function studio_services_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('studio_services', $data);
		
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
	FUNCTION NAME : studio_services_update($data,$id)
	it will update a studio_services deatails 
	*/
	function studio_services_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('studio_services_id', $id);
		$this->db->update('studio_services', $data);
		
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
	FUNCTION NAME : get_studio_services_by_id()
	it will get a studio_services by studio_services id */
	public function get_studio_services_by_id($id)
	{
		$query = $this->db->get_where('studio_services', array('studio_services_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_studio_services_by_id()
	it will delete the studio_services by studio_services id */
	public function delete_studio_services_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('studio_services_id', $id);
		$this->db->delete('studio_services');
		
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
	