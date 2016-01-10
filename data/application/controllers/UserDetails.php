<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserDetails extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('user_details_model');
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
				$this->lang->load('user_details_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('user_details_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('user_details_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('user_details_it','italian');
		}
 
		
		
	}
	

	public function create_user_details()
	{
		$data['content'] = 'user_details/add_user_details_form';
		$data['title'] =$this->lang->line('create_user_details');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_user_details_user_type_id', $this->lang->line('user_details_ref_user_details_user_type_id'), 'trim|required');
		$this->form_validation->set_rules('ref_user_details_studio_details_id', $this->lang->line('user_details_ref_user_details_studio_details_id'), 'trim|required');
		$this->form_validation->set_rules('user_details_first_name', $this->lang->line('user_details_user_details_first_name'), 'trim|required');
		$this->form_validation->set_rules('user_details_last_name', $this->lang->line('user_details_user_details_last_name'), 'trim|required');
		$this->form_validation->set_rules('user_details_user_name', $this->lang->line('user_details_user_details_user_name'), 'trim|required');
		$this->form_validation->set_rules('user_details_password_hash_value', $this->lang->line('user_details_user_details_password_hash_value'), 'trim|required');
		$this->form_validation->set_rules('user_details_sex', $this->lang->line('user_details_user_details_sex'), 'trim');
		$this->form_validation->set_rules('user_details_birth_date', $this->lang->line('user_details_user_details_birth_date'), 'trim');
		$this->form_validation->set_rules('user_details_city', $this->lang->line('user_details_user_details_city'), 'trim');
		$this->form_validation->set_rules('user_details_post_code', $this->lang->line('user_details_user_details_post_code'), 'trim');
		$this->form_validation->set_rules('user_details_country', $this->lang->line('user_details_user_details_country'), 'trim');
		$this->form_validation->set_rules('user_details_email_address', $this->lang->line('user_details_user_details_email_address'), 'trim');
		$this->form_validation->set_rules('user_details_cell_phone', $this->lang->line('user_details_user_details_cell_phone'), 'trim');
		$this->form_validation->set_rules('user_details_created_edited_date_time', $this->lang->line('user_details_user_details_created_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('user_details_active', $this->lang->line('user_details_user_details_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_user_details_user_type_id' =>$this->input->post('ref_user_details_user_type_id',TRUE),
			'ref_user_details_studio_details_id' =>$this->input->post('ref_user_details_studio_details_id',TRUE),
			'user_details_first_name' =>$this->input->post('user_details_first_name',TRUE),
			'user_details_last_name' =>$this->input->post('user_details_last_name',TRUE),
			'user_details_user_name' =>$this->input->post('user_details_user_name',TRUE),
			'user_details_password_hash_value' =>$this->input->post('user_details_password_hash_value',TRUE),
			'user_details_sex' =>$this->input->post('user_details_sex',TRUE),
			'user_details_birth_date' =>$this->input->post('user_details_birth_date',TRUE),
			'user_details_city' =>$this->input->post('user_details_city',TRUE),
			'user_details_post_code' =>$this->input->post('user_details_post_code',TRUE),
			'user_details_country' =>$this->input->post('user_details_country',TRUE),
			'user_details_email_address' =>$this->input->post('user_details_email_address',TRUE),
			'user_details_cell_phone' =>$this->input->post('user_details_cell_phone',TRUE),
			'user_details_created_edited_date_time' =>$this->input->post('user_details_created_edited_date_time',TRUE),
			'user_details_active' =>$this->input->post('user_details_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->user_details_model->user_details_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_user_details/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_user_details($limit=null)
	{
		$data['content'] = 'user_details/all_user_details_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->user_details_model->get_all_user_details_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->user_details_model->no_of_rows_user_details_list();	/* get the total rows from the query */
		$url=base_url()."user_details/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_user_details($id)
	{
	
		$data['content'] = 'user_details/edit_user_details_form';
		$data['title'] = $this->lang->line('update_user_details');
		
		$this->form_validation->set_rules('ref_user_details_user_type_id', $this->lang->line('user_details_ref_user_details_user_type_id'), 'trim|required');
		$this->form_validation->set_rules('ref_user_details_studio_details_id', $this->lang->line('user_details_ref_user_details_studio_details_id'), 'trim|required');
		$this->form_validation->set_rules('user_details_first_name', $this->lang->line('user_details_user_details_first_name'), 'trim|required');
		$this->form_validation->set_rules('user_details_last_name', $this->lang->line('user_details_user_details_last_name'), 'trim|required');
		$this->form_validation->set_rules('user_details_user_name', $this->lang->line('user_details_user_details_user_name'), 'trim|required');
		$this->form_validation->set_rules('user_details_password_hash_value', $this->lang->line('user_details_user_details_password_hash_value'), 'trim|required');
		$this->form_validation->set_rules('user_details_sex', $this->lang->line('user_details_user_details_sex'), 'trim');
		$this->form_validation->set_rules('user_details_birth_date', $this->lang->line('user_details_user_details_birth_date'), 'trim');
		$this->form_validation->set_rules('user_details_city', $this->lang->line('user_details_user_details_city'), 'trim');
		$this->form_validation->set_rules('user_details_post_code', $this->lang->line('user_details_user_details_post_code'), 'trim');
		$this->form_validation->set_rules('user_details_country', $this->lang->line('user_details_user_details_country'), 'trim');
		$this->form_validation->set_rules('user_details_email_address', $this->lang->line('user_details_user_details_email_address'), 'trim');
		$this->form_validation->set_rules('user_details_cell_phone', $this->lang->line('user_details_user_details_cell_phone'), 'trim');
		$this->form_validation->set_rules('user_details_created_edited_date_time', $this->lang->line('user_details_user_details_created_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('user_details_active', $this->lang->line('user_details_user_details_active'), 'trim');
		
		
			$edit_query_result=$this->user_details_model->get_user_details_by_id($id);
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
			'ref_user_details_user_type_id' =>$this->input->post('ref_user_details_user_type_id',TRUE),
			'ref_user_details_studio_details_id' =>$this->input->post('ref_user_details_studio_details_id',TRUE),
			'user_details_first_name' =>$this->input->post('user_details_first_name',TRUE),
			'user_details_last_name' =>$this->input->post('user_details_last_name',TRUE),
			'user_details_user_name' =>$this->input->post('user_details_user_name',TRUE),
			'user_details_password_hash_value' =>$this->input->post('user_details_password_hash_value',TRUE),
			'user_details_sex' =>$this->input->post('user_details_sex',TRUE),
			'user_details_birth_date' =>$this->input->post('user_details_birth_date',TRUE),
			'user_details_city' =>$this->input->post('user_details_city',TRUE),
			'user_details_post_code' =>$this->input->post('user_details_post_code',TRUE),
			'user_details_country' =>$this->input->post('user_details_country',TRUE),
			'user_details_email_address' =>$this->input->post('user_details_email_address',TRUE),
			'user_details_cell_phone' =>$this->input->post('user_details_cell_phone',TRUE),
			'user_details_created_edited_date_time' =>$this->input->post('user_details_created_edited_date_time',TRUE),
			'user_details_active' =>$this->input->post('user_details_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->user_details_model->user_details_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_user_details/".$id);
		}
		
	}
	
	public function view_user_details($id)
	{
	
		$data['content'] = 'user_details/single_user_details_view';
		$data['title'] =  $this->lang->line('view_user_details');
		$query_result=$this->user_details_model->get_user_details_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_user_details($id,$url)
	{
		$result=$this->user_details_model->delete_user_details_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_user_details'):$this->lang->line('not_deleted_user_details');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('user_details'));
			
	}
	
	
 

	
}
	
	

	
	
	