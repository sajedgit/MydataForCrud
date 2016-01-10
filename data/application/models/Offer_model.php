<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Offer_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_offer_list($limit,$per_page)
	it will retun all  offer list*/
	public function get_all_offer_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from offer	 order by  offer_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_offer_list()
	it will retun total no of row of offer list	*/
	public function no_of_rows_offer_list()
	{
		
		$sql="select * from offer	  order by  offer_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : offer_insert($data)
	it will insert a offer details 
	*/
	function offer_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('offer', $data);
		
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
	FUNCTION NAME : offer_update($data,$id)
	it will update a offer deatails 
	*/
	function offer_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('offer_id', $id);
		$this->db->update('offer', $data);
		
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
	FUNCTION NAME : get_offer_by_id()
	it will get a offer by offer id */
	public function get_offer_by_id($id)
	{
		$query = $this->db->get_where('offer', array('offer_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_offer_by_id()
	it will delete the offer by offer id */
	public function delete_offer_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('offer_id', $id);
		$this->db->delete('offer');
		
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
	