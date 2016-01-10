<?php

function get_model_data($arr,$table_name)
{

	$table_name_captalize=ucwords($table_name)."_Model";
	$function_insert=$table_name."_insert";
	$function_update=$table_name."_update";
	$function_get_table_by_id="get_".$table_name."_by_id";
	$function_delete_table_by_id="delete_".$table_name."_by_id";
	$function_get_all_table_list="get_all_".$table_name."_list";
	$function_no_of_rows_table_list="no_of_rows_".$table_name."_list";
	//print_r($arr[0][0]);die();
	$primary_id=$arr[0][0];
	
	$page_data = <<<EOF
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class $table_name_captalize extends CI_Model
{
	
	
	public function __construct()
	{
	
		\$this->load->database(); 
	}
	
	/*
	FUNCTION NAME : $function_get_all_table_list(\$limit,\$per_page)
	it will retun all  $table_name list*/
	public function $function_get_all_table_list(\$limit,\$per_page)
	{
		\$limit--;
		\$limit=\$limit<0?0:\$limit;
		\$limit*=\$per_page;
		\$sql="select *  from $table_name	 order by  $primary_id DESC limit ".\$limit.",\$per_page";
		\$query=\$this->db->query(\$sql);
		return \$query->result_object();
	}
	
	
		/*
	FUNCTION NAME : $function_no_of_rows_table_list()
	it will retun total no of row of $table_name list	*/
	public function $function_no_of_rows_table_list()
	{
		
		\$sql="select * from $table_name	  order by  $primary_id DESC";
		\$query=\$this->db->query(\$sql);
		return \$query->num_rows;
	}

	
	/*
	FUNCTION NAME : $function_insert(\$data)
	it will insert a $table_name details 
	*/
	function $function_insert(\$data)
	{
		
		\$this->db->trans_start();
		
		\$this->db->insert('$table_name', \$data);
		
		\$inserted_id=\$this->db->insert_id();
		
		\$this->db->trans_complete();
		
		if (\$this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return \$inserted_id;
		}
		
	}
	
	
	/*
	FUNCTION NAME : $function_update(\$data,\$id)
	it will update a $table_name deatails 
	*/
	function $function_update(\$data,\$id)
	{
		\$this->db->trans_start();
			
		\$this->db->where('$primary_id', \$id);
		\$this->db->update('$table_name', \$data);
		
		\$this->db->trans_complete();
		
		if (\$this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	
	}
	


	
	/*
	FUNCTION NAME : $function_get_table_by_id()
	it will get a $table_name by $table_name id */
	public function $function_get_table_by_id(\$id)
	{
		\$query = \$this->db->get_where('$table_name', array('$primary_id' => \$id));
		return \$query;
	}
	
	/*
	FUNCTION NAME : $function_delete_table_by_id()
	it will delete the $table_name by $table_name id */
	public function $function_delete_table_by_id(\$id)
	{
		
			
		\$this->db->trans_start();
		
		\$this->db->where('$primary_id', \$id);
		\$this->db->delete('$table_name');
		
		\$this->db->trans_complete();
		
		if (\$this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return 1;
		}
		
	}
	

	
}
	
EOF;



	return	$page_data;

}


function get_common_model_data($arr,$table_name)
{
	
	$page_data = <<<EOF
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');//setlocale(LC_TIME, 'it_IT');
/*
NAME : Sajed Amed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

class Common_Model extends CI_Model
{
	public function __construct()
	{
		\$this->load->database(); 
	}
	
	public function get_login_user_id()
	{
	
		return 1;
	}

	/*
	FUNCTION NAME : custom_pager()
	it will return the paination accordingly to the query */	
	public function custom_pager(\$url,\$per_page,\$total_rows)
	{
		
		\$this->load->library('pagination');
		\$config['base_url'] = \$url;
		\$config['total_rows'] =\$total_rows;
		\$config['per_page'] = \$per_page;
		\$config['use_page_numbers'] = TRUE;
		\$config['first_url'] = \$url.'1'; 
		\$config['first_link'] = 'First';
		\$config['full_tag_open'] = '<ul class="pagination">';
		\$config['full_tag_close'] = '</ul>';
		\$this->pagination->initialize(\$config);
		return \$this->pagination;
	}
	

	
	
}
	
EOF;



	return	$page_data;

}


?>