<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminPanelLogin extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('admin_panel_login_model');
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
				$this->lang->load('admin_panel_login_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('admin_panel_login_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('admin_panel_login_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('admin_panel_login_it','italian');
		}
 
		
		
	}
	

	public function create_admin_panel_login()
	{
		$data['content'] = 'admin_panel_login/add_admin_panel_login_form';
		$data['title'] =$this->lang->line('create_admin_panel_login');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('admin_panel_login_user_name', $this->lang->line('admin_panel_login_admin_panel_login_user_name'), 'trim|required');
		$this->form_validation->set_rules('admin_panel_login_password_hash_value', $this->lang->line('admin_panel_login_admin_panel_login_password_hash_value'), 'trim|required');
		$this->form_validation->set_rules('admin_panel_login_sex', $this->lang->line('admin_panel_login_admin_panel_login_sex'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_birth_date', $this->lang->line('admin_panel_login_admin_panel_login_birth_date'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_city', $this->lang->line('admin_panel_login_admin_panel_login_city'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_post_code', $this->lang->line('admin_panel_login_admin_panel_login_post_code'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_country', $this->lang->line('admin_panel_login_admin_panel_login_country'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_email_address', $this->lang->line('admin_panel_login_admin_panel_login_email_address'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_cell_phone', $this->lang->line('admin_panel_login_admin_panel_login_cell_phone'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_created_edited_date_time', $this->lang->line('admin_panel_login_admin_panel_login_created_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('admin_panel_login_active', $this->lang->line('admin_panel_login_admin_panel_login_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'admin_panel_login_user_name' =>$this->input->post('admin_panel_login_user_name',TRUE),
			'admin_panel_login_password_hash_value' =>$this->input->post('admin_panel_login_password_hash_value',TRUE),
			'admin_panel_login_sex' =>$this->input->post('admin_panel_login_sex',TRUE),
			'admin_panel_login_birth_date' =>$this->input->post('admin_panel_login_birth_date',TRUE),
			'admin_panel_login_city' =>$this->input->post('admin_panel_login_city',TRUE),
			'admin_panel_login_post_code' =>$this->input->post('admin_panel_login_post_code',TRUE),
			'admin_panel_login_country' =>$this->input->post('admin_panel_login_country',TRUE),
			'admin_panel_login_email_address' =>$this->input->post('admin_panel_login_email_address',TRUE),
			'admin_panel_login_cell_phone' =>$this->input->post('admin_panel_login_cell_phone',TRUE),
			'admin_panel_login_created_edited_date_time' =>$this->input->post('admin_panel_login_created_edited_date_time',TRUE),
			'admin_panel_login_active' =>$this->input->post('admin_panel_login_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->admin_panel_login_model->admin_panel_login_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_admin_panel_login/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_admin_panel_login($limit=null)
	{
		$data['content'] = 'admin_panel_login/all_admin_panel_login_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->admin_panel_login_model->get_all_admin_panel_login_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->admin_panel_login_model->no_of_rows_admin_panel_login_list();	/* get the total rows from the query */
		$url=base_url()."admin_panel_login/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_admin_panel_login($id)
	{
	
		$data['content'] = 'admin_panel_login/edit_admin_panel_login_form';
		$data['title'] = $this->lang->line('update_admin_panel_login');
		
		$this->form_validation->set_rules('admin_panel_login_user_name', $this->lang->line('admin_panel_login_admin_panel_login_user_name'), 'trim|required');
		$this->form_validation->set_rules('admin_panel_login_password_hash_value', $this->lang->line('admin_panel_login_admin_panel_login_password_hash_value'), 'trim|required');
		$this->form_validation->set_rules('admin_panel_login_sex', $this->lang->line('admin_panel_login_admin_panel_login_sex'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_birth_date', $this->lang->line('admin_panel_login_admin_panel_login_birth_date'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_city', $this->lang->line('admin_panel_login_admin_panel_login_city'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_post_code', $this->lang->line('admin_panel_login_admin_panel_login_post_code'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_country', $this->lang->line('admin_panel_login_admin_panel_login_country'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_email_address', $this->lang->line('admin_panel_login_admin_panel_login_email_address'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_cell_phone', $this->lang->line('admin_panel_login_admin_panel_login_cell_phone'), 'trim');
		$this->form_validation->set_rules('admin_panel_login_created_edited_date_time', $this->lang->line('admin_panel_login_admin_panel_login_created_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('admin_panel_login_active', $this->lang->line('admin_panel_login_admin_panel_login_active'), 'trim');
		
		
			$edit_query_result=$this->admin_panel_login_model->get_admin_panel_login_by_id($id);
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
			'admin_panel_login_user_name' =>$this->input->post('admin_panel_login_user_name',TRUE),
			'admin_panel_login_password_hash_value' =>$this->input->post('admin_panel_login_password_hash_value',TRUE),
			'admin_panel_login_sex' =>$this->input->post('admin_panel_login_sex',TRUE),
			'admin_panel_login_birth_date' =>$this->input->post('admin_panel_login_birth_date',TRUE),
			'admin_panel_login_city' =>$this->input->post('admin_panel_login_city',TRUE),
			'admin_panel_login_post_code' =>$this->input->post('admin_panel_login_post_code',TRUE),
			'admin_panel_login_country' =>$this->input->post('admin_panel_login_country',TRUE),
			'admin_panel_login_email_address' =>$this->input->post('admin_panel_login_email_address',TRUE),
			'admin_panel_login_cell_phone' =>$this->input->post('admin_panel_login_cell_phone',TRUE),
			'admin_panel_login_created_edited_date_time' =>$this->input->post('admin_panel_login_created_edited_date_time',TRUE),
			'admin_panel_login_active' =>$this->input->post('admin_panel_login_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->admin_panel_login_model->admin_panel_login_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_admin_panel_login/".$id);
		}
		
	}
	
	public function view_admin_panel_login($id)
	{
	
		$data['content'] = 'admin_panel_login/single_admin_panel_login_view';
		$data['title'] =  $this->lang->line('view_admin_panel_login');
		$query_result=$this->admin_panel_login_model->get_admin_panel_login_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_admin_panel_login($id,$url)
	{
		$result=$this->admin_panel_login_model->delete_admin_panel_login_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_admin_panel_login'):$this->lang->line('not_deleted_admin_panel_login');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('admin_panel_login'));
			
	}
	
	
 

	
}
	
	

	
	
	