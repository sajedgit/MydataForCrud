<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Training_course_type_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_training_course_type_list($limit,$per_page)
	it will retun all  training_course_type list*/
	public function get_all_training_course_type_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from training_course_type	 order by  training_course_type_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_training_course_type_list()
	it will retun total no of row of training_course_type list	*/
	public function no_of_rows_training_course_type_list()
	{
		
		$sql="select * from training_course_type	  order by  training_course_type_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : training_course_type_insert($data)
	it will insert a training_course_type details 
	*/
	function training_course_type_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('training_course_type', $data);
		
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
	FUNCTION NAME : training_course_type_update($data,$id)
	it will update a training_course_type deatails 
	*/
	function training_course_type_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('training_course_type_id', $id);
		$this->db->update('training_course_type', $data);
		
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
	FUNCTION NAME : get_training_course_type_by_id()
	it will get a training_course_type by training_course_type id */
	public function get_training_course_type_by_id($id)
	{
		$query = $this->db->get_where('training_course_type', array('training_course_type_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_training_course_type_by_id()
	it will delete the training_course_type by training_course_type id */
	public function delete_training_course_type_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('training_course_type_id', $id);
		$this->db->delete('training_course_type');
		
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
	