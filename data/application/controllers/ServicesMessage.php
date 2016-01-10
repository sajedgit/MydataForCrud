<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServicesMessage extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('services_message_model');
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
				$this->lang->load('services_message_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('services_message_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('services_message_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('services_message_it','italian');
		}
 
		
		
	}
	

	public function create_services_message()
	{
		$data['content'] = 'services_message/add_services_message_form';
		$data['title'] =$this->lang->line('create_services_message');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_services_message_message_id', $this->lang->line('services_message_ref_services_message_message_id'), 'trim|required');
		$this->form_validation->set_rules('ref_services_message_services_id', $this->lang->line('services_message_ref_services_message_services_id'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_services_message_message_id' =>$this->input->post('ref_services_message_message_id',TRUE),
			'ref_services_message_services_id' =>$this->input->post('ref_services_message_services_id',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->services_message_model->services_message_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_services_message/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_services_message($limit=null)
	{
		$data['content'] = 'services_message/all_services_message_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->services_message_model->get_all_services_message_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->services_message_model->no_of_rows_services_message_list();	/* get the total rows from the query */
		$url=base_url()."services_message/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_services_message($id)
	{
	
		$data['content'] = 'services_message/edit_services_message_form';
		$data['title'] = $this->lang->line('update_services_message');
		
		$this->form_validation->set_rules('ref_services_message_message_id', $this->lang->line('services_message_ref_services_message_message_id'), 'trim|required');
		$this->form_validation->set_rules('ref_services_message_services_id', $this->lang->line('services_message_ref_services_message_services_id'), 'trim|required');
		
		
			$edit_query_result=$this->services_message_model->get_services_message_by_id($id);
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
			'ref_services_message_message_id' =>$this->input->post('ref_services_message_message_id',TRUE),
			'ref_services_message_services_id' =>$this->input->post('ref_services_message_services_id',TRUE),
				);
			
		
			//Transfering data to Model
			$this->services_message_model->services_message_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_services_message/".$id);
		}
		
	}
	
	public function view_services_message($id)
	{
	
		$data['content'] = 'services_message/single_services_message_view';
		$data['title'] =  $this->lang->line('view_services_message');
		$query_result=$this->services_message_model->get_services_message_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_services_message($id,$url)
	{
		$result=$this->services_message_model->delete_services_message_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_services_message'):$this->lang->line('not_deleted_services_message');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('services_message'));
			
	}
	
	
 

	
}
	
	

	
	
	