<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class News_Model extends CI_Model
{
	
	
	public function __construct()
	{
	
		$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : get_all_news_list($limit,$per_page)
	it will retun all  news list*/
	public function get_all_news_list($limit,$per_page)
	{
		$limit--;
		$limit=$limit<0?0:$limit;
		$limit*=$per_page;
		$sql="select *  from news	 order by  news_id DESC limit ".$limit.",$per_page";
		$query=$this->db->query($sql);
		return $query->result_object();
	}
	
	
		/*
	FUNCTION NAME : no_of_rows_news_list()
	it will retun total no of row of news list	*/
	public function no_of_rows_news_list()
	{
		
		$sql="select * from news	  order by  news_id DESC";
		$query=$this->db->query($sql);
		return $query->num_rows;
	}

	
	/*
	FUNCTION NAME : news_insert($data)
	it will insert a news details 
	*/
	function news_insert($data)
	{
		
		$this->db->trans_start();
		
		$this->db->insert('news', $data);
		
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
	FUNCTION NAME : news_update($data,$id)
	it will update a news deatails 
	*/
	function news_update($data,$id)
	{
		$this->db->trans_start();
			
		$this->db->where('news_id', $id);
		$this->db->update('news', $data);
		
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
	FUNCTION NAME : get_news_by_id()
	it will get a news by news id */
	public function get_news_by_id($id)
	{
		$query = $this->db->get_where('news', array('news_id' => $id));
		return $query;
	}
	
	/*
	FUNCTION NAME : delete_news_by_id()
	it will delete the news by news id */
	public function delete_news_by_id($id)
	{
		
			
		$this->db->trans_start();
		
		$this->db->where('news_id', $id);
		$this->db->delete('news');
		
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
	