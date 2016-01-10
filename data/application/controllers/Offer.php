<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('offer_model');
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
				$this->lang->load('offer_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('offer_it','italian');
		}
 
		
		
	}
	

	public function create_offer()
	{
		$data['content'] = 'offer/add_offer_form';
		$data['title'] =$this->lang->line('create_offer');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('offer_title', $this->lang->line('offer_offer_title'), 'trim');
		$this->form_validation->set_rules('offer_details', $this->lang->line('offer_offer_details'), 'trim|required');
		$this->form_validation->set_rules('offer_any_ending_date', $this->lang->line('offer_offer_any_ending_date'), 'trim');
		$this->form_validation->set_rules('offer_starting_date', $this->lang->line('offer_offer_starting_date'), 'trim|required');
		$this->form_validation->set_rules('offer_starting_time', $this->lang->line('offer_offer_starting_time'), 'trim');
		$this->form_validation->set_rules('offer_ending_date', $this->lang->line('offer_offer_ending_date'), 'trim');
		$this->form_validation->set_rules('offer_ending_time', $this->lang->line('offer_offer_ending_time'), 'trim');
		$this->form_validation->set_rules('offer_is_push_message', $this->lang->line('offer_offer_is_push_message'), 'trim');
		$this->form_validation->set_rules('offer_created_admin_panel_login_id', $this->lang->line('offer_offer_created_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('offer_created_date_time', $this->lang->line('offer_offer_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('offer_edited_admin_panel_login_id', $this->lang->line('offer_offer_edited_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('offer_edited_date_time', $this->lang->line('offer_offer_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('offer_send_now', $this->lang->line('offer_offer_send_now'), 'trim');
		$this->form_validation->set_rules('offer_send_later', $this->lang->line('offer_offer_send_later'), 'trim');
		$this->form_validation->set_rules('offer_send_later_date_time', $this->lang->line('offer_offer_send_later_date_time'), 'trim');
		$this->form_validation->set_rules('offer_is_already_sent', $this->lang->line('offer_offer_is_already_sent'), 'trim');
		$this->form_validation->set_rules('offer_sending_date_time', $this->lang->line('offer_offer_sending_date_time'), 'trim');
		$this->form_validation->set_rules('offer_active', $this->lang->line('offer_offer_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'offer_title' =>$this->input->post('offer_title',TRUE),
			'offer_details' =>$this->input->post('offer_details',TRUE),
			'offer_any_ending_date' =>$this->input->post('offer_any_ending_date',TRUE),
			'offer_starting_date' =>$this->input->post('offer_starting_date',TRUE),
			'offer_starting_time' =>$this->input->post('offer_starting_time',TRUE),
			'offer_ending_date' =>$this->input->post('offer_ending_date',TRUE),
			'offer_ending_time' =>$this->input->post('offer_ending_time',TRUE),
			'offer_is_push_message' =>$this->input->post('offer_is_push_message',TRUE),
			'offer_created_admin_panel_login_id' =>$this->input->post('offer_created_admin_panel_login_id',TRUE),
			'offer_created_date_time' =>$this->input->post('offer_created_date_time',TRUE),
			'offer_edited_admin_panel_login_id' =>$this->input->post('offer_edited_admin_panel_login_id',TRUE),
			'offer_edited_date_time' =>$this->input->post('offer_edited_date_time',TRUE),
			'offer_send_now' =>$this->input->post('offer_send_now',TRUE),
			'offer_send_later' =>$this->input->post('offer_send_later',TRUE),
			'offer_send_later_date_time' =>$this->input->post('offer_send_later_date_time',TRUE),
			'offer_is_already_sent' =>$this->input->post('offer_is_already_sent',TRUE),
			'offer_sending_date_time' =>$this->input->post('offer_sending_date_time',TRUE),
			'offer_active' =>$this->input->post('offer_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->offer_model->offer_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_offer/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_offer($limit=null)
	{
		$data['content'] = 'offer/all_offer_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->offer_model->get_all_offer_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->offer_model->no_of_rows_offer_list();	/* get the total rows from the query */
		$url=base_url()."offer/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_offer($id)
	{
	
		$data['content'] = 'offer/edit_offer_form';
		$data['title'] = $this->lang->line('update_offer');
		
		$this->form_validation->set_rules('offer_title', $this->lang->line('offer_offer_title'), 'trim');
		$this->form_validation->set_rules('offer_details', $this->lang->line('offer_offer_details'), 'trim|required');
		$this->form_validation->set_rules('offer_any_ending_date', $this->lang->line('offer_offer_any_ending_date'), 'trim');
		$this->form_validation->set_rules('offer_starting_date', $this->lang->line('offer_offer_starting_date'), 'trim|required');
		$this->form_validation->set_rules('offer_starting_time', $this->lang->line('offer_offer_starting_time'), 'trim');
		$this->form_validation->set_rules('offer_ending_date', $this->lang->line('offer_offer_ending_date'), 'trim');
		$this->form_validation->set_rules('offer_ending_time', $this->lang->line('offer_offer_ending_time'), 'trim');
		$this->form_validation->set_rules('offer_is_push_message', $this->lang->line('offer_offer_is_push_message'), 'trim');
		$this->form_validation->set_rules('offer_created_admin_panel_login_id', $this->lang->line('offer_offer_created_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('offer_created_date_time', $this->lang->line('offer_offer_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('offer_edited_admin_panel_login_id', $this->lang->line('offer_offer_edited_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('offer_edited_date_time', $this->lang->line('offer_offer_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('offer_send_now', $this->lang->line('offer_offer_send_now'), 'trim');
		$this->form_validation->set_rules('offer_send_later', $this->lang->line('offer_offer_send_later'), 'trim');
		$this->form_validation->set_rules('offer_send_later_date_time', $this->lang->line('offer_offer_send_later_date_time'), 'trim');
		$this->form_validation->set_rules('offer_is_already_sent', $this->lang->line('offer_offer_is_already_sent'), 'trim');
		$this->form_validation->set_rules('offer_sending_date_time', $this->lang->line('offer_offer_sending_date_time'), 'trim');
		$this->form_validation->set_rules('offer_active', $this->lang->line('offer_offer_active'), 'trim');
		
		
			$edit_query_result=$this->offer_model->get_offer_by_id($id);
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
			'offer_title' =>$this->input->post('offer_title',TRUE),
			'offer_details' =>$this->input->post('offer_details',TRUE),
			'offer_any_ending_date' =>$this->input->post('offer_any_ending_date',TRUE),
			'offer_starting_date' =>$this->input->post('offer_starting_date',TRUE),
			'offer_starting_time' =>$this->input->post('offer_starting_time',TRUE),
			'offer_ending_date' =>$this->input->post('offer_ending_date',TRUE),
			'offer_ending_time' =>$this->input->post('offer_ending_time',TRUE),
			'offer_is_push_message' =>$this->input->post('offer_is_push_message',TRUE),
			'offer_created_admin_panel_login_id' =>$this->input->post('offer_created_admin_panel_login_id',TRUE),
			'offer_created_date_time' =>$this->input->post('offer_created_date_time',TRUE),
			'offer_edited_admin_panel_login_id' =>$this->input->post('offer_edited_admin_panel_login_id',TRUE),
			'offer_edited_date_time' =>$this->input->post('offer_edited_date_time',TRUE),
			'offer_send_now' =>$this->input->post('offer_send_now',TRUE),
			'offer_send_later' =>$this->input->post('offer_send_later',TRUE),
			'offer_send_later_date_time' =>$this->input->post('offer_send_later_date_time',TRUE),
			'offer_is_already_sent' =>$this->input->post('offer_is_already_sent',TRUE),
			'offer_sending_date_time' =>$this->input->post('offer_sending_date_time',TRUE),
			'offer_active' =>$this->input->post('offer_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->offer_model->offer_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_offer/".$id);
		}
		
	}
	
	public function view_offer($id)
	{
	
		$data['content'] = 'offer/single_offer_view';
		$data['title'] =  $this->lang->line('view_offer');
		$query_result=$this->offer_model->get_offer_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_offer($id,$url)
	{
		$result=$this->offer_model->delete_offer_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_offer'):$this->lang->line('not_deleted_offer');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('offer'));
			
	}
	
	
 

	
}
	
	

	
	
	