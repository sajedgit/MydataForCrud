<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('events_model');
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
				$this->lang->load('events_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('events_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('events_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('events_it','italian');
		}
 
		
		
	}
	

	public function create_events()
	{
		$data['content'] = 'events/add_events_form';
		$data['title'] =$this->lang->line('create_events');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('events_name', $this->lang->line('events_events_name'), 'trim|required');
		$this->form_validation->set_rules('events_description', $this->lang->line('events_events_description'), 'trim|required');
		$this->form_validation->set_rules('event_any_web_link', $this->lang->line('events_event_any_web_link'), 'trim');
		$this->form_validation->set_rules('event_web_link_details', $this->lang->line('events_event_web_link_details'), 'trim');
		$this->form_validation->set_rules('events_start_date', $this->lang->line('events_events_start_date'), 'trim|required');
		$this->form_validation->set_rules('events_start_time', $this->lang->line('events_events_start_time'), 'trim|required');
		$this->form_validation->set_rules('events_any_ending_date', $this->lang->line('events_events_any_ending_date'), 'trim');
		$this->form_validation->set_rules('events_end_date', $this->lang->line('events_events_end_date'), 'trim');
		$this->form_validation->set_rules('events_end_time', $this->lang->line('events_events_end_time'), 'trim');
		$this->form_validation->set_rules('events_created_admin_panel_login_id', $this->lang->line('events_events_created_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('events_edited_admin_panel_login_id', $this->lang->line('events_events_edited_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('events_created_date_time', $this->lang->line('events_events_created_date_time'), 'trim');
		$this->form_validation->set_rules('events_edited_date_time', $this->lang->line('events_events_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('events_active', $this->lang->line('events_events_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'events_name' =>$this->input->post('events_name',TRUE),
			'events_description' =>$this->input->post('events_description',TRUE),
			'event_any_web_link' =>$this->input->post('event_any_web_link',TRUE),
			'event_web_link_details' =>$this->input->post('event_web_link_details',TRUE),
			'events_start_date' =>$this->input->post('events_start_date',TRUE),
			'events_start_time' =>$this->input->post('events_start_time',TRUE),
			'events_any_ending_date' =>$this->input->post('events_any_ending_date',TRUE),
			'events_end_date' =>$this->input->post('events_end_date',TRUE),
			'events_end_time' =>$this->input->post('events_end_time',TRUE),
			'events_created_admin_panel_login_id' =>$this->input->post('events_created_admin_panel_login_id',TRUE),
			'events_edited_admin_panel_login_id' =>$this->input->post('events_edited_admin_panel_login_id',TRUE),
			'events_created_date_time' =>$this->input->post('events_created_date_time',TRUE),
			'events_edited_date_time' =>$this->input->post('events_edited_date_time',TRUE),
			'events_active' =>$this->input->post('events_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->events_model->events_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_events/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_events($limit=null)
	{
		$data['content'] = 'events/all_events_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->events_model->get_all_events_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->events_model->no_of_rows_events_list();	/* get the total rows from the query */
		$url=base_url()."events/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_events($id)
	{
	
		$data['content'] = 'events/edit_events_form';
		$data['title'] = $this->lang->line('update_events');
		
		$this->form_validation->set_rules('events_name', $this->lang->line('events_events_name'), 'trim|required');
		$this->form_validation->set_rules('events_description', $this->lang->line('events_events_description'), 'trim|required');
		$this->form_validation->set_rules('event_any_web_link', $this->lang->line('events_event_any_web_link'), 'trim');
		$this->form_validation->set_rules('event_web_link_details', $this->lang->line('events_event_web_link_details'), 'trim');
		$this->form_validation->set_rules('events_start_date', $this->lang->line('events_events_start_date'), 'trim|required');
		$this->form_validation->set_rules('events_start_time', $this->lang->line('events_events_start_time'), 'trim|required');
		$this->form_validation->set_rules('events_any_ending_date', $this->lang->line('events_events_any_ending_date'), 'trim');
		$this->form_validation->set_rules('events_end_date', $this->lang->line('events_events_end_date'), 'trim');
		$this->form_validation->set_rules('events_end_time', $this->lang->line('events_events_end_time'), 'trim');
		$this->form_validation->set_rules('events_created_admin_panel_login_id', $this->lang->line('events_events_created_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('events_edited_admin_panel_login_id', $this->lang->line('events_events_edited_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('events_created_date_time', $this->lang->line('events_events_created_date_time'), 'trim');
		$this->form_validation->set_rules('events_edited_date_time', $this->lang->line('events_events_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('events_active', $this->lang->line('events_events_active'), 'trim');
		
		
			$edit_query_result=$this->events_model->get_events_by_id($id);
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
			'events_name' =>$this->input->post('events_name',TRUE),
			'events_description' =>$this->input->post('events_description',TRUE),
			'event_any_web_link' =>$this->input->post('event_any_web_link',TRUE),
			'event_web_link_details' =>$this->input->post('event_web_link_details',TRUE),
			'events_start_date' =>$this->input->post('events_start_date',TRUE),
			'events_start_time' =>$this->input->post('events_start_time',TRUE),
			'events_any_ending_date' =>$this->input->post('events_any_ending_date',TRUE),
			'events_end_date' =>$this->input->post('events_end_date',TRUE),
			'events_end_time' =>$this->input->post('events_end_time',TRUE),
			'events_created_admin_panel_login_id' =>$this->input->post('events_created_admin_panel_login_id',TRUE),
			'events_edited_admin_panel_login_id' =>$this->input->post('events_edited_admin_panel_login_id',TRUE),
			'events_created_date_time' =>$this->input->post('events_created_date_time',TRUE),
			'events_edited_date_time' =>$this->input->post('events_edited_date_time',TRUE),
			'events_active' =>$this->input->post('events_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->events_model->events_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_events/".$id);
		}
		
	}
	
	public function view_events($id)
	{
	
		$data['content'] = 'events/single_events_view';
		$data['title'] =  $this->lang->line('view_events');
		$query_result=$this->events_model->get_events_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_events($id,$url)
	{
		$result=$this->events_model->delete_events_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_events'):$this->lang->line('not_deleted_events');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('events'));
			
	}
	
	
 

	
}
	
	

	
	
	