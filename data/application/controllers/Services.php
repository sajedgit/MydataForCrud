<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('services_model');
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
				$this->lang->load('services_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('services_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('services_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('services_it','italian');
		}
 
		
		
	}
	

	public function create_services()
	{
		$data['content'] = 'services/add_services_form';
		$data['title'] =$this->lang->line('create_services');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('services_code', $this->lang->line('services_services_code'), 'trim|required');
		$this->form_validation->set_rules('services_name', $this->lang->line('services_services_name'), 'trim');
		$this->form_validation->set_rules('services_details', $this->lang->line('services_services_details'), 'trim');
		$this->form_validation->set_rules('services_active', $this->lang->line('services_services_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'services_code' =>$this->input->post('services_code',TRUE),
			'services_name' =>$this->input->post('services_name',TRUE),
			'services_details' =>$this->input->post('services_details',TRUE),
			'services_active' =>$this->input->post('services_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->services_model->services_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_services/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_services($limit=null)
	{
		$data['content'] = 'services/all_services_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->services_model->get_all_services_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->services_model->no_of_rows_services_list();	/* get the total rows from the query */
		$url=base_url()."services/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_services($id)
	{
	
		$data['content'] = 'services/edit_services_form';
		$data['title'] = $this->lang->line('update_services');
		
		$this->form_validation->set_rules('services_code', $this->lang->line('services_services_code'), 'trim|required');
		$this->form_validation->set_rules('services_name', $this->lang->line('services_services_name'), 'trim');
		$this->form_validation->set_rules('services_details', $this->lang->line('services_services_details'), 'trim');
		$this->form_validation->set_rules('services_active', $this->lang->line('services_services_active'), 'trim');
		
		
			$edit_query_result=$this->services_model->get_services_by_id($id);
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
			'services_code' =>$this->input->post('services_code',TRUE),
			'services_name' =>$this->input->post('services_name',TRUE),
			'services_details' =>$this->input->post('services_details',TRUE),
			'services_active' =>$this->input->post('services_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->services_model->services_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_services/".$id);
		}
		
	}
	
	public function view_services($id)
	{
	
		$data['content'] = 'services/single_services_view';
		$data['title'] =  $this->lang->line('view_services');
		$query_result=$this->services_model->get_services_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_services($id,$url)
	{
		$result=$this->services_model->delete_services_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_services'):$this->lang->line('not_deleted_services');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('services'));
			
	}
	
	
 

	
}
	
	

	
	
	