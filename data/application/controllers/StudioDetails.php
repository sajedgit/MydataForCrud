<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudioDetails extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('studio_details_model');
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
				$this->lang->load('studio_details_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('studio_details_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('studio_details_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('studio_details_it','italian');
		}
 
		
		
	}
	

	public function create_studio_details()
	{
		$data['content'] = 'studio_details/add_studio_details_form';
		$data['title'] =$this->lang->line('create_studio_details');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('studio_details_client_code', $this->lang->line('studio_details_studio_details_client_code'), 'trim|required');
		$this->form_validation->set_rules('studio_details_name', $this->lang->line('studio_details_studio_details_name'), 'trim|required');
		$this->form_validation->set_rules('studio_details_license_piva', $this->lang->line('studio_details_studio_details_license_piva'), 'trim|required');
		$this->form_validation->set_rules('studio_details_password', $this->lang->line('studio_details_studio_details_password'), 'trim|required');
		$this->form_validation->set_rules('studio_details_flag_block', $this->lang->line('studio_details_studio_details_flag_block'), 'trim');
		$this->form_validation->set_rules('studio_details_operating_systems', $this->lang->line('studio_details_studio_details_operating_systems'), 'trim|required');
		$this->form_validation->set_rules('studio_details_branch_location_id', $this->lang->line('studio_details_studio_details_branch_location_id'), 'trim|required');
		$this->form_validation->set_rules('studio_details_all_email_address', $this->lang->line('studio_details_studio_details_all_email_address'), 'trim');
		$this->form_validation->set_rules('studio_details_blance', $this->lang->line('studio_details_studio_details_blance'), 'trim|required');
		$this->form_validation->set_rules('studio_details_all_services_list', $this->lang->line('studio_details_studio_details_all_services_list'), 'trim|required');
		$this->form_validation->set_rules('studio_details_active', $this->lang->line('studio_details_studio_details_active'), 'trim');
		$this->form_validation->set_rules('studio_details_last_updated_date_time', $this->lang->line('studio_details_studio_details_last_updated_date_time'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'studio_details_client_code' =>$this->input->post('studio_details_client_code',TRUE),
			'studio_details_name' =>$this->input->post('studio_details_name',TRUE),
			'studio_details_license_piva' =>$this->input->post('studio_details_license_piva',TRUE),
			'studio_details_password' =>$this->input->post('studio_details_password',TRUE),
			'studio_details_flag_block' =>$this->input->post('studio_details_flag_block',TRUE),
			'studio_details_operating_systems' =>$this->input->post('studio_details_operating_systems',TRUE),
			'studio_details_branch_location_id' =>$this->input->post('studio_details_branch_location_id',TRUE),
			'studio_details_all_email_address' =>$this->input->post('studio_details_all_email_address',TRUE),
			'studio_details_blance' =>$this->input->post('studio_details_blance',TRUE),
			'studio_details_all_services_list' =>$this->input->post('studio_details_all_services_list',TRUE),
			'studio_details_active' =>$this->input->post('studio_details_active',TRUE),
			'studio_details_last_updated_date_time' =>$this->input->post('studio_details_last_updated_date_time',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->studio_details_model->studio_details_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_studio_details/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_studio_details($limit=null)
	{
		$data['content'] = 'studio_details/all_studio_details_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->studio_details_model->get_all_studio_details_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->studio_details_model->no_of_rows_studio_details_list();	/* get the total rows from the query */
		$url=base_url()."studio_details/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_studio_details($id)
	{
	
		$data['content'] = 'studio_details/edit_studio_details_form';
		$data['title'] = $this->lang->line('update_studio_details');
		
		$this->form_validation->set_rules('studio_details_client_code', $this->lang->line('studio_details_studio_details_client_code'), 'trim|required');
		$this->form_validation->set_rules('studio_details_name', $this->lang->line('studio_details_studio_details_name'), 'trim|required');
		$this->form_validation->set_rules('studio_details_license_piva', $this->lang->line('studio_details_studio_details_license_piva'), 'trim|required');
		$this->form_validation->set_rules('studio_details_password', $this->lang->line('studio_details_studio_details_password'), 'trim|required');
		$this->form_validation->set_rules('studio_details_flag_block', $this->lang->line('studio_details_studio_details_flag_block'), 'trim');
		$this->form_validation->set_rules('studio_details_operating_systems', $this->lang->line('studio_details_studio_details_operating_systems'), 'trim|required');
		$this->form_validation->set_rules('studio_details_branch_location_id', $this->lang->line('studio_details_studio_details_branch_location_id'), 'trim|required');
		$this->form_validation->set_rules('studio_details_all_email_address', $this->lang->line('studio_details_studio_details_all_email_address'), 'trim');
		$this->form_validation->set_rules('studio_details_blance', $this->lang->line('studio_details_studio_details_blance'), 'trim|required');
		$this->form_validation->set_rules('studio_details_all_services_list', $this->lang->line('studio_details_studio_details_all_services_list'), 'trim|required');
		$this->form_validation->set_rules('studio_details_active', $this->lang->line('studio_details_studio_details_active'), 'trim');
		$this->form_validation->set_rules('studio_details_last_updated_date_time', $this->lang->line('studio_details_studio_details_last_updated_date_time'), 'trim|required');
		
		
			$edit_query_result=$this->studio_details_model->get_studio_details_by_id($id);
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
			'studio_details_client_code' =>$this->input->post('studio_details_client_code',TRUE),
			'studio_details_name' =>$this->input->post('studio_details_name',TRUE),
			'studio_details_license_piva' =>$this->input->post('studio_details_license_piva',TRUE),
			'studio_details_password' =>$this->input->post('studio_details_password',TRUE),
			'studio_details_flag_block' =>$this->input->post('studio_details_flag_block',TRUE),
			'studio_details_operating_systems' =>$this->input->post('studio_details_operating_systems',TRUE),
			'studio_details_branch_location_id' =>$this->input->post('studio_details_branch_location_id',TRUE),
			'studio_details_all_email_address' =>$this->input->post('studio_details_all_email_address',TRUE),
			'studio_details_blance' =>$this->input->post('studio_details_blance',TRUE),
			'studio_details_all_services_list' =>$this->input->post('studio_details_all_services_list',TRUE),
			'studio_details_active' =>$this->input->post('studio_details_active',TRUE),
			'studio_details_last_updated_date_time' =>$this->input->post('studio_details_last_updated_date_time',TRUE),
				);
			
		
			//Transfering data to Model
			$this->studio_details_model->studio_details_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_studio_details/".$id);
		}
		
	}
	
	public function view_studio_details($id)
	{
	
		$data['content'] = 'studio_details/single_studio_details_view';
		$data['title'] =  $this->lang->line('view_studio_details');
		$query_result=$this->studio_details_model->get_studio_details_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_studio_details($id,$url)
	{
		$result=$this->studio_details_model->delete_studio_details_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_studio_details'):$this->lang->line('not_deleted_studio_details');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('studio_details'));
			
	}
	
	
 

	
}
	
	

	
	
	