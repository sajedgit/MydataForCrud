<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Training_course_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_training_course_list($limit,$per_page)
	it will retun all  training_course list*/
	public function get_all_training_course_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from training_course	 order by  training_course_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_training_course_list()
	it will retun total no of row of training_course list	*/
	public function no_of_rows_training_course_list()
	{
		
		$sql="select * from training_course	  order by  training_course_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : training_course_insert($data)
	it will insert a training_course details 
	*/
	function training_course_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('training_course', $data);
		
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
	FUNCTION NAME : training_course_update($data,$id)
	it will update a training_course deatails 
	*/
	function training_course_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('training_course_id', $id);
		$this->db->update('training_course', $data);
		
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
	FUNCTION NAME : get_training_course_by_id()
	it will get a training_course by training_course id */
	public function get_training_course_by_id($id)
	{
		$query = $this->db->get_where('training_course', array('training_course_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_training_course_by_id()
	it will delete the training_course by training_course id */
	public function delete_training_course_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('training_course_id', $id);
		$this->db->delete('training_course');
		
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
	