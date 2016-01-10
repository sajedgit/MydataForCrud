<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudioServices extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('studio_services_model');
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
				$this->lang->load('studio_services_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('studio_services_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('studio_services_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('studio_services_it','italian');
		}
 
		
		
	}
	

	public function create_studio_services()
	{
		$data['content'] = 'studio_services/add_studio_services_form';
		$data['title'] =$this->lang->line('create_studio_services');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_studio_services_studio_details_id', $this->lang->line('studio_services_ref_studio_services_studio_details_id'), 'trim|required');
		$this->form_validation->set_rules('ref_studio_services_services_id', $this->lang->line('studio_services_ref_studio_services_services_id'), 'trim|required');
		$this->form_validation->set_rules('services_active', $this->lang->line('studio_services_services_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_studio_services_studio_details_id' =>$this->input->post('ref_studio_services_studio_details_id',TRUE),
			'ref_studio_services_services_id' =>$this->input->post('ref_studio_services_services_id',TRUE),
			'services_active' =>$this->input->post('services_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->studio_services_model->studio_services_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_studio_services/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_studio_services($limit=null)
	{
		$data['content'] = 'studio_services/all_studio_services_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->studio_services_model->get_all_studio_services_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->studio_services_model->no_of_rows_studio_services_list();	/* get the total rows from the query */
		$url=base_url()."studio_services/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_studio_services($id)
	{
	
		$data['content'] = 'studio_services/edit_studio_services_form';
		$data['title'] = $this->lang->line('update_studio_services');
		
		$this->form_validation->set_rules('ref_studio_services_studio_details_id', $this->lang->line('studio_services_ref_studio_services_studio_details_id'), 'trim|required');
		$this->form_validation->set_rules('ref_studio_services_services_id', $this->lang->line('studio_services_ref_studio_services_services_id'), 'trim|required');
		$this->form_validation->set_rules('services_active', $this->lang->line('studio_services_services_active'), 'trim');
		
		
			$edit_query_result=$this->studio_services_model->get_studio_services_by_id($id);
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
			'ref_studio_services_studio_details_id' =>$this->input->post('ref_studio_services_studio_details_id',TRUE),
			'ref_studio_services_services_id' =>$this->input->post('ref_studio_services_services_id',TRUE),
			'services_active' =>$this->input->post('services_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->studio_services_model->studio_services_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_studio_services/".$id);
		}
		
	}
	
	public function view_studio_services($id)
	{
	
		$data['content'] = 'studio_services/single_studio_services_view';
		$data['title'] =  $this->lang->line('view_studio_services');
		$query_result=$this->studio_services_model->get_studio_services_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_studio_services($id,$url)
	{
		$result=$this->studio_services_model->delete_studio_services_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_studio_services'):$this->lang->line('not_deleted_studio_services');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('studio_services'));
			
	}
	
	
 

	
}
	
	

	
	
	