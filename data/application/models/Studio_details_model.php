<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Studio_details_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_studio_details_list($limit,$per_page)
	it will retun all  studio_details list*/
	public function get_all_studio_details_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from studio_details	 order by  studio_details_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_studio_details_list()
	it will retun total no of row of studio_details list	*/
	public function no_of_rows_studio_details_list()
	{
		
		$sql="select * from studio_details	  order by  studio_details_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : studio_details_insert($data)
	it will insert a studio_details details 
	*/
	function studio_details_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('studio_details', $data);
		
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
	FUNCTION NAME : studio_details_update($data,$id)
	it will update a studio_details deatails 
	*/
	function studio_details_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('studio_details_id', $id);
		$this->db->update('studio_details', $data);
		
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
	FUNCTION NAME : get_studio_details_by_id()
	it will get a studio_details by studio_details id */
	public function get_studio_details_by_id($id)
	{
		$query = $this->db->get_where('studio_details', array('studio_details_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_studio_details_by_id()
	it will delete the studio_details by studio_details id */
	public function delete_studio_details_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('studio_details_id', $id);
		$this->db->delete('studio_details');
		
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
	