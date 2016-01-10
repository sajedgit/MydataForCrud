<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Offer_extra_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_offer_extra_list($limit,$per_page)
	it will retun all  offer_extra list*/
	public function get_all_offer_extra_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from offer_extra	 order by  offer_extra_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_offer_extra_list()
	it will retun total no of row of offer_extra list	*/
	public function no_of_rows_offer_extra_list()
	{
		
		$sql="select * from offer_extra	  order by  offer_extra_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : offer_extra_insert($data)
	it will insert a offer_extra details 
	*/
	function offer_extra_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('offer_extra', $data);
		
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
	FUNCTION NAME : offer_extra_update($data,$id)
	it will update a offer_extra deatails 
	*/
	function offer_extra_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('offer_extra_id', $id);
		$this->db->update('offer_extra', $data);
		
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
	FUNCTION NAME : get_offer_extra_by_id()
	it will get a offer_extra by offer_extra id */
	public function get_offer_extra_by_id($id)
	{
		$query = $this->db->get_where('offer_extra', array('offer_extra_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_offer_extra_by_id()
	it will delete the offer_extra by offer_extra id */
	public function delete_offer_extra_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('offer_extra_id', $id);
		$this->db->delete('offer_extra');
		
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
	