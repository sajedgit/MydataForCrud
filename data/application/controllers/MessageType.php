<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MessageType extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('message_type_model');
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
				$this->lang->load('message_type_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('message_type_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('message_type_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('message_type_it','italian');
		}
 
		
		
	}
	

	public function create_message_type()
	{
		$data['content'] = 'message_type/add_message_type_form';
		$data['title'] =$this->lang->line('create_message_type');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('message_type_name', $this->lang->line('message_type_message_type_name'), 'trim|required');
		$this->form_validation->set_rules('message_type_description', $this->lang->line('message_type_message_type_description'), 'trim');
		$this->form_validation->set_rules('message_type_active', $this->lang->line('message_type_message_type_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'message_type_name' =>$this->input->post('message_type_name',TRUE),
			'message_type_description' =>$this->input->post('message_type_description',TRUE),
			'message_type_active' =>$this->input->post('message_type_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->message_type_model->message_type_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_message_type/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_message_type($limit=null)
	{
		$data['content'] = 'message_type/all_message_type_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->message_type_model->get_all_message_type_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->message_type_model->no_of_rows_message_type_list();	/* get the total rows from the query */
		$url=base_url()."message_type/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_message_type($id)
	{
	
		$data['content'] = 'message_type/edit_message_type_form';
		$data['title'] = $this->lang->line('update_message_type');
		
		$this->form_validation->set_rules('message_type_name', $this->lang->line('message_type_message_type_name'), 'trim|required');
		$this->form_validation->set_rules('message_type_description', $this->lang->line('message_type_message_type_description'), 'trim');
		$this->form_validation->set_rules('message_type_active', $this->lang->line('message_type_message_type_active'), 'trim|required');
		
		
			$edit_query_result=$this->message_type_model->get_message_type_by_id($id);
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
			'message_type_name' =>$this->input->post('message_type_name',TRUE),
			'message_type_description' =>$this->input->post('message_type_description',TRUE),
			'message_type_active' =>$this->input->post('message_type_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->message_type_model->message_type_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_message_type/".$id);
		}
		
	}
	
	public function view_message_type($id)
	{
	
		$data['content'] = 'message_type/single_message_type_view';
		$data['title'] =  $this->lang->line('view_message_type');
		$query_result=$this->message_type_model->get_message_type_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_message_type($id,$url)
	{
		$result=$this->message_type_model->delete_message_type_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_message_type'):$this->lang->line('not_deleted_message_type');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('message_type'));
			
	}
	
	
 

	
}
	
	

	
	
	