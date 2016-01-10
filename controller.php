<?php
function create_column_to_readable($column)
{
$new_column_name="";
$column_name_captalize=ucwords($column);
$column_arr=preg_split("/[-,_,#,\s]+/", $column_name_captalize);
foreach($column_arr as $data):
$new_column_name.=ucwords($data)." ";
endforeach;

return	$new_column_name;	

}


function get_controller_data($arr,$table_name,$table_name_to_class)
{

	$table_name_captalize=ucwords($table_name);
	$table_model=$table_name."_model";
	$edit_table_form="edit_".$table_name."_form";
	$add_table_form="add_".$table_name."_form";
	$all_table_view="all_".$table_name."_view";
	$single_table_view="single_".$table_name."_view";
	
	$language_en=$table_name."_en";
	$language_it=$table_name."_it";
	
	$required="";
	$function_create_table="create_".$table_name;
	$function_insert=$table_name."_insert";
	$function_update=$table_name."_update";
	$function_get_table_by_id="get_".$table_name."_by_id";
	$function_delete_event_by_id="delete_".$table_name."_by_id";
	$function_get_event_by_id="get_".$table_name."_by_id";
	$function_status_update="status_update";
	$primary_id=$arr[0][0];
	
	$function_get_all_table_list="get_all_".$table_name."_list";
	$function_no_of_rows_table_list="no_of_rows_".$table_name."_list";
	
	
	$validation_str="";
	$query_data = "array(" ;
	for($i=1;$i<count($arr);$i++)
	{

	$column=$arr[$i][0];
	$lang_column=$table_name."_".$column;
	
	
	if($arr[$i][2]=="NO")
		$validation_str.="\$this->form_validation->set_rules('$column', \$this->lang->line('$lang_column'), 'trim|required');\n		" ;	
	else
		$validation_str.="\$this->form_validation->set_rules('$column', \$this->lang->line('$lang_column'), 'trim');\n		" ;
	
	
	
	$query_data.="\n			'$column' =>\$this->input->post('$column',TRUE),";
	}
	

	
	$query_data.="\n				);" ;
	$primary_id=$arr[0][0];
	
	$page_data = <<<EOF
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class $table_name_to_class extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		\$this->load->library('session');
		\$this->load->helper(array('form'));
		\$this->load->model('common_model');
		\$this->load->model('$table_model');
		\$this->load->library('form_validation');
		
		if(\$this->session->userdata('login')!=1)
		{
			redirect(site_url('login'));
		}  
 		
		if(\$this->session->userdata('language'))
		{
			if(\$this->session->userdata('language')==LANG_EN)
			{
				\$this->lang->load('menu_en','english');
				\$this->lang->load('$language_en','english');
			}
			else if(\$this->session->userdata('language')==LANG_IT)
			{
				\$this->lang->load('menu_it','italian');
				\$this->lang->load('$language_it','italian');
			}
			else
			{
				\$this->lang->load('menu_it','italian');
				\$this->lang->load('$language_it','italian');
			}
		}
		else
		{
			\$this->lang->load('menu_it','italian');
			\$this->lang->load('$language_it','italian');
		}
 
		
		
	}
	

	public function $function_create_table()
	{
		\$data['content'] = '$table_name/$add_table_form';
		\$data['title'] =\$this->lang->line('create_$table_name');
		\$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$validation_str
		
		
		if (\$this->form_validation->run() == FALSE) 
		{
			\$this->load->vars(\$data);
			\$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		\$query_data=$query_data
			
			//Transfering data to Model
			
			\$return_id=\$this->$table_model->$function_insert(\$query_data);
			if(\$return_id>0)
			{
				\$data['message'] = \$this->lang->line('done_status');
				redirect('view_$table_name/'.\$return_id);
			}
			else
			{
				\$data['message'] =  \$this->lang->line('not_done_status');
				
				\$this->load->vars(\$data);
				\$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_$table_name(\$limit=null)
	{
		\$data['content'] = '$table_name/$all_table_view';
		\$data['title'] =\$this->lang->line('title');

		\$per_page=5;
		\$limit=\$this->uri->segment(3, 1);
		\$data['query_result']=\$this->$table_model->$function_get_all_table_list(\$limit,\$per_page);	/* for view all data to admin */
		\$total_rows=\$this->$table_model->$function_no_of_rows_table_list();	/* get the total rows from the query */
		\$url=base_url()."$table_name/page/";
		\$data['paging']=\$this->common_model->custom_pager(\$url,\$per_page,\$total_rows);

		\$this->load->vars(\$data);
		\$this->load->view('layout/main_layout');
	}
			
	public function edit_$table_name(\$id)
	{
	
		\$data['content'] = '$table_name/$edit_table_form';
		\$data['title'] = \$this->lang->line('update_$table_name');
		
		$validation_str
		
			\$edit_query_result=\$this->$table_model->$function_get_table_by_id(\$id);
			\$edit_query_result= \$edit_query_result->result();
			\$data['edit_query_result'] = \$edit_query_result[0];
			
		
		if (\$this->form_validation->run() == FALSE) 
		{
		
			\$this->load->vars(\$data);
			\$this->load->view('layout/main_layout');
		} 
		else 
		{
			\$query_data=$query_data
			
		
			//Transfering data to Model
			\$this->$table_model->$function_update(\$query_data,\$id);
		
			\$msg = \$this->lang->line('modify_info');
			\$this->session->set_flashdata('msg', \$msg);
			redirect("edit_$table_name/".\$id);
		}
		
	}
	
	public function view_$table_name(\$id)
	{
	
		\$data['content'] = '$table_name/$single_table_view';
		\$data['title'] =  \$this->lang->line('view_$table_name');
		\$query_result=\$this->$table_model->$function_get_event_by_id(\$id);
		\$query_result= \$query_result->result();
		\$data['query_result'] = \$query_result[0];
		\$this->load->vars(\$data);
		\$this->load->view('layout/main_layout');
	}
	
	public function delete_$table_name(\$id,\$url)
	{
		\$result=\$this->$table_model->$function_delete_event_by_id(\$id);
		\$msg=\$result>0?\$this->lang->line('deleted_$table_name'):\$this->lang->line('not_deleted_$table_name');
		\$this->session->set_flashdata('msg', \$msg);
		redirect(site_url('$table_name'));
			
	}
	
	
 

	
}
	
	

	
	
	
EOF;



	return	$page_data;

}


?>