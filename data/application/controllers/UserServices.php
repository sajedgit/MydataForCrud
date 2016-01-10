<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserServices extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('user_services_model');
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
				$this->lang->load('user_services_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('user_services_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('user_services_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('user_services_it','italian');
		}
 
		
		
	}
	

	public function create_user_services()
	{
		$data['content'] = 'user_services/add_user_services_form';
		$data['title'] =$this->lang->line('create_user_services');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_user_services_user_details_id', $this->lang->line('user_services_ref_user_services_user_details_id'), 'trim|required');
		$this->form_validation->set_rules('ref_user_services_services_id', $this->lang->line('user_services_ref_user_services_services_id'), 'trim|required');
		$this->form_validation->set_rules('user_services_added_by', $this->lang->line('user_services_user_services_added_by'), 'trim');
		$this->form_validation->set_rules('user_services_active', $this->lang->line('user_services_user_services_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_user_services_user_details_id' =>$this->input->post('ref_user_services_user_details_id',TRUE),
			'ref_user_services_services_id' =>$this->input->post('ref_user_services_services_id',TRUE),
			'user_services_added_by' =>$this->input->post('user_services_added_by',TRUE),
			'user_services_active' =>$this->input->post('user_services_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->user_services_model->user_services_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_user_services/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_user_services($limit=null)
	{
		$data['content'] = 'user_services/all_user_services_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->user_services_model->get_all_user_services_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->user_services_model->no_of_rows_user_services_list();	/* get the total rows from the query */
		$url=base_url()."user_services/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_user_services($id)
	{
	
		$data['content'] = 'user_services/edit_user_services_form';
		$data['title'] = $this->lang->line('update_user_services');
		
		$this->form_validation->set_rules('ref_user_services_user_details_id', $this->lang->line('user_services_ref_user_services_user_details_id'), 'trim|required');
		$this->form_validation->set_rules('ref_user_services_services_id', $this->lang->line('user_services_ref_user_services_services_id'), 'trim|required');
		$this->form_validation->set_rules('user_services_added_by', $this->lang->line('user_services_user_services_added_by'), 'trim');
		$this->form_validation->set_rules('user_services_active', $this->lang->line('user_services_user_services_active'), 'trim');
		
		
			$edit_query_result=$this->user_services_model->get_user_services_by_id($id);
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
			'ref_user_services_user_details_id' =>$this->input->post('ref_user_services_user_details_id',TRUE),
			'ref_user_services_services_id' =>$this->input->post('ref_user_services_services_id',TRUE),
			'user_services_added_by' =>$this->input->post('user_services_added_by',TRUE),
			'user_services_active' =>$this->input->post('user_services_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->user_services_model->user_services_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_user_services/".$id);
		}
		
	}
	
	public function view_user_services($id)
	{
	
		$data['content'] = 'user_services/single_user_services_view';
		$data['title'] =  $this->lang->line('view_user_services');
		$query_result=$this->user_services_model->get_user_services_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_user_services($id,$url)
	{
		$result=$this->user_services_model->delete_user_services_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_user_services'):$this->lang->line('not_deleted_user_services');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('user_services'));
			
	}
	
	
 

	
}
	
	

	
	
	