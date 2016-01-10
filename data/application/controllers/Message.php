<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('message_model');
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
				$this->lang->load('message_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('message_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('message_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('message_it','italian');
		}
 
		
		
	}
	

	public function create_message()
	{
		$data['content'] = 'message/add_message_form';
		$data['title'] =$this->lang->line('create_message');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_message_message_type_id', $this->lang->line('message_ref_message_message_type_id'), 'trim|required');
		$this->form_validation->set_rules('message_title', $this->lang->line('message_message_title'), 'trim|required');
		$this->form_validation->set_rules('message_details', $this->lang->line('message_message_details'), 'trim|required');
		$this->form_validation->set_rules('message_any_ending_date', $this->lang->line('message_message_any_ending_date'), 'trim');
		$this->form_validation->set_rules('message_ending_date', $this->lang->line('message_message_ending_date'), 'trim');
		$this->form_validation->set_rules('message_is_push_message', $this->lang->line('message_message_is_push_message'), 'trim');
		$this->form_validation->set_rules('message_created_by_admin_panel_login_id', $this->lang->line('message_message_created_by_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('message_created_date_time', $this->lang->line('message_message_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('message_edited_by_admin_panel_login_id', $this->lang->line('message_message_edited_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('message_edited_date_time', $this->lang->line('message_message_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('message_send_now', $this->lang->line('message_message_send_now'), 'trim');
		$this->form_validation->set_rules('message_send_later_date_time', $this->lang->line('message_message_send_later_date_time'), 'trim');
		$this->form_validation->set_rules('message_is_already_sent', $this->lang->line('message_message_is_already_sent'), 'trim');
		$this->form_validation->set_rules('message_sending_date_time', $this->lang->line('message_message_sending_date_time'), 'trim');
		$this->form_validation->set_rules('message_active', $this->lang->line('message_message_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_message_message_type_id' =>$this->input->post('ref_message_message_type_id',TRUE),
			'message_title' =>$this->input->post('message_title',TRUE),
			'message_details' =>$this->input->post('message_details',TRUE),
			'message_any_ending_date' =>$this->input->post('message_any_ending_date',TRUE),
			'message_ending_date' =>$this->input->post('message_ending_date',TRUE),
			'message_is_push_message' =>$this->input->post('message_is_push_message',TRUE),
			'message_created_by_admin_panel_login_id' =>$this->input->post('message_created_by_admin_panel_login_id',TRUE),
			'message_created_date_time' =>$this->input->post('message_created_date_time',TRUE),
			'message_edited_by_admin_panel_login_id' =>$this->input->post('message_edited_by_admin_panel_login_id',TRUE),
			'message_edited_date_time' =>$this->input->post('message_edited_date_time',TRUE),
			'message_send_now' =>$this->input->post('message_send_now',TRUE),
			'message_send_later_date_time' =>$this->input->post('message_send_later_date_time',TRUE),
			'message_is_already_sent' =>$this->input->post('message_is_already_sent',TRUE),
			'message_sending_date_time' =>$this->input->post('message_sending_date_time',TRUE),
			'message_active' =>$this->input->post('message_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->message_model->message_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_message/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_message($limit=null)
	{
		$data['content'] = 'message/all_message_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->message_model->get_all_message_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->message_model->no_of_rows_message_list();	/* get the total rows from the query */
		$url=base_url()."message/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_message($id)
	{
	
		$data['content'] = 'message/edit_message_form';
		$data['title'] = $this->lang->line('update_message');
		
		$this->form_validation->set_rules('ref_message_message_type_id', $this->lang->line('message_ref_message_message_type_id'), 'trim|required');
		$this->form_validation->set_rules('message_title', $this->lang->line('message_message_title'), 'trim|required');
		$this->form_validation->set_rules('message_details', $this->lang->line('message_message_details'), 'trim|required');
		$this->form_validation->set_rules('message_any_ending_date', $this->lang->line('message_message_any_ending_date'), 'trim');
		$this->form_validation->set_rules('message_ending_date', $this->lang->line('message_message_ending_date'), 'trim');
		$this->form_validation->set_rules('message_is_push_message', $this->lang->line('message_message_is_push_message'), 'trim');
		$this->form_validation->set_rules('message_created_by_admin_panel_login_id', $this->lang->line('message_message_created_by_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('message_created_date_time', $this->lang->line('message_message_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('message_edited_by_admin_panel_login_id', $this->lang->line('message_message_edited_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('message_edited_date_time', $this->lang->line('message_message_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('message_send_now', $this->lang->line('message_message_send_now'), 'trim');
		$this->form_validation->set_rules('message_send_later_date_time', $this->lang->line('message_message_send_later_date_time'), 'trim');
		$this->form_validation->set_rules('message_is_already_sent', $this->lang->line('message_message_is_already_sent'), 'trim');
		$this->form_validation->set_rules('message_sending_date_time', $this->lang->line('message_message_sending_date_time'), 'trim');
		$this->form_validation->set_rules('message_active', $this->lang->line('message_message_active'), 'trim');
		
		
			$edit_query_result=$this->message_model->get_message_by_id($id);
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
			'ref_message_message_type_id' =>$this->input->post('ref_message_message_type_id',TRUE),
			'message_title' =>$this->input->post('message_title',TRUE),
			'message_details' =>$this->input->post('message_details',TRUE),
			'message_any_ending_date' =>$this->input->post('message_any_ending_date',TRUE),
			'message_ending_date' =>$this->input->post('message_ending_date',TRUE),
			'message_is_push_message' =>$this->input->post('message_is_push_message',TRUE),
			'message_created_by_admin_panel_login_id' =>$this->input->post('message_created_by_admin_panel_login_id',TRUE),
			'message_created_date_time' =>$this->input->post('message_created_date_time',TRUE),
			'message_edited_by_admin_panel_login_id' =>$this->input->post('message_edited_by_admin_panel_login_id',TRUE),
			'message_edited_date_time' =>$this->input->post('message_edited_date_time',TRUE),
			'message_send_now' =>$this->input->post('message_send_now',TRUE),
			'message_send_later_date_time' =>$this->input->post('message_send_later_date_time',TRUE),
			'message_is_already_sent' =>$this->input->post('message_is_already_sent',TRUE),
			'message_sending_date_time' =>$this->input->post('message_sending_date_time',TRUE),
			'message_active' =>$this->input->post('message_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->message_model->message_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_message/".$id);
		}
		
	}
	
	public function view_message($id)
	{
	
		$data['content'] = 'message/single_message_view';
		$data['title'] =  $this->lang->line('view_message');
		$query_result=$this->message_model->get_message_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_message($id,$url)
	{
		$result=$this->message_model->delete_message_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_message'):$this->lang->line('not_deleted_message');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('message'));
			
	}
	
	
 

	
}
	
	

	
	
	