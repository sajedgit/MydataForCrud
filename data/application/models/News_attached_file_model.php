<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class News_attached_file_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_news_attached_file_list($limit,$per_page)
	it will retun all  news_attached_file list*/
	public function get_all_news_attached_file_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from news_attached_file	 order by  news_attached_file_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_news_attached_file_list()
	it will retun total no of row of news_attached_file list	*/
	public function no_of_rows_news_attached_file_list()
	{
		
		$sql="select * from news_attached_file	  order by  news_attached_file_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : news_attached_file_insert($data)
	it will insert a news_attached_file details 
	*/
	function news_attached_file_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('news_attached_file', $data);
		
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
	FUNCTION NAME : news_attached_file_update($data,$id)
	it will update a news_attached_file deatails 
	*/
	function news_attached_file_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('news_attached_file_id', $id);
		$this->db->update('news_attached_file', $data);
		
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
	FUNCTION NAME : get_news_attached_file_by_id()
	it will get a news_attached_file by news_attached_file id */
	public function get_news_attached_file_by_id($id)
	{
		$query = $this->db->get_where('news_attached_file', array('news_attached_file_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_news_attached_file_by_id()
	it will delete the news_attached_file by news_attached_file id */
	public function delete_news_attached_file_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('news_attached_file_id', $id);
		$this->db->delete('news_attached_file');
		
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
	