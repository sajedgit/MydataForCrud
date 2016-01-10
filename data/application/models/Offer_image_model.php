<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Offer_image_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_offer_image_list($limit,$per_page)
	it will retun all  offer_image list*/
	public function get_all_offer_image_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from offer_image	 order by  offer_image_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_offer_image_list()
	it will retun total no of row of offer_image list	*/
	public function no_of_rows_offer_image_list()
	{
		
		$sql="select * from offer_image	  order by  offer_image_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : offer_image_insert($data)
	it will insert a offer_image details 
	*/
	function offer_image_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('offer_image', $data);
		
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
	FUNCTION NAME : offer_image_update($data,$id)
	it will update a offer_image deatails 
	*/
	function offer_image_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('offer_image_id', $id);
		$this->db->update('offer_image', $data);
		
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
	FUNCTION NAME : get_offer_image_by_id()
	it will get a offer_image by offer_image id */
	public function get_offer_image_by_id($id)
	{
		$query = $this->db->get_where('offer_image', array('offer_image_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_offer_image_by_id()
	it will delete the offer_image by offer_image id */
	public function delete_offer_image_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('offer_image_id', $id);
		$this->db->delete('offer_image');
		
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
	