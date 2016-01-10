<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserType extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('user_type_model');
		$this->load->library('form_validation');
		
		if($this->session->userdata('login')!=1)
		{
			redirect(site_url('login'));
		}  
 		
		if($this->session->userdata('language'))
		{
			if($this->session->userdata('language')==LANG_EN)
			{
				$this->lang->load('menu_en','english');
				$this->lang->load('user_type_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('user_type_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('user_type_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('user_type_it','italian');
		}
 
		
		
	}
	

	public function create_user_type()
	{
		$data['content'] = 'user_type/add_user_type_form';
		$data['title'] =$this->lang->line('create_user_type');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('user_type_name', $this->lang->line('user_type_user_type_name'), 'trim|required');
		$this->form_validation->set_rules('user_type_description', $this->lang->line('user_type_user_type_description'), 'trim');
		$this->form_validation->set_rules('user_type_active', $this->lang->line('user_type_user_type_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'user_type_name' =>$this->input->post('user_type_name',TRUE),
			'user_type_description' =>$this->input->post('user_type_description',TRUE),
			'user_type_active' =>$this->input->post('user_type_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->user_type_model->user_type_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_user_type/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_user_type($limit=null)
	{
		$data['content'] = 'user_type/all_user_type_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->user_type_model->get_all_user_type_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->user_type_model->no_of_rows_user_type_list();	/* get the total rows from the query */
		$url=base_url()."user_type/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_user_type($id)
	{
	
		$data['content'] = 'user_type/edit_user_type_form';
		$data['title'] = $this->lang->line('update_user_type');
		
		$this->form_validation->set_rules('user_type_name', $this->lang->line('user_type_user_type_name'), 'trim|required');
		$this->form_validation->set_rules('user_type_description', $this->lang->line('user_type_user_type_description'), 'trim');
		$this->form_validation->set_rules('user_type_active', $this->lang->line('user_type_user_type_active'), 'trim|required');
		
		
			$edit_query_result=$this->user_type_model->get_user_type_by_id($id);
			$edit_query_result= $edit_query_result->result();
			$data['edit_query_result'] = $edit_query_result[0];
			
		
		if ($this->form_validation->run() == FALSE) 
		{
		
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			$query_data=array(
			'user_type_name' =>$this->input->post('user_type_name',TRUE),
			'user_type_description' =>$this->input->post('user_type_description',TRUE),
			'user_type_active' =>$this->input->post('user_type_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->user_type_model->user_type_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_user_type/".$id);
		}
		
	}
	
	public function view_user_type($id)
	{
	
		$data['content'] = 'user_type/single_user_type_view';
		$data['title'] =  $this->lang->line('view_user_type');
		$query_result=$this->user_type_model->get_user_type_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_user_type($id,$url)
	{
		$result=$this->user_type_model->delete_user_type_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_user_type'):$this->lang->line('not_deleted_user_type');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('user_type'));
			
	}
	
	
 

	
}
	
	

	
	
	