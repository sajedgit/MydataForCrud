<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServicesUpdate extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('services_update_model');
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
				$this->lang->load('services_update_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('services_update_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('services_update_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('services_update_it','italian');
		}
 
		
		
	}
	

	public function create_services_update()
	{
		$data['content'] = 'services_update/add_services_update_form';
		$data['title'] =$this->lang->line('create_services_update');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_services_update_services_id', $this->lang->line('services_update_ref_services_update_services_id'), 'trim|required');
		$this->form_validation->set_rules('services_update_title', $this->lang->line('services_update_services_update_title'), 'trim');
		$this->form_validation->set_rules('services_update_details', $this->lang->line('services_update_services_update_details'), 'trim');
		$this->form_validation->set_rules('services_update_link', $this->lang->line('services_update_services_update_link'), 'trim|required');
		$this->form_validation->set_rules('services_update_has_any_available_date', $this->lang->line('services_update_services_update_has_any_available_date'), 'trim');
		$this->form_validation->set_rules('services_update_available_date', $this->lang->line('services_update_services_update_available_date'), 'trim');
		$this->form_validation->set_rules('services_update_is_push_message', $this->lang->line('services_update_services_update_is_push_message'), 'trim');
		$this->form_validation->set_rules('services_update_created_by_admin_panel_login_id', $this->lang->line('services_update_services_update_created_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('services_update_created_date_time', $this->lang->line('services_update_services_update_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('services_update_edited_by_admin_panel_login_id', $this->lang->line('services_update_services_update_edited_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('services_update_edited_date_time', $this->lang->line('services_update_services_update_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('services_update_send_now', $this->lang->line('services_update_services_update_send_now'), 'trim');
		$this->form_validation->set_rules('services_update_send_later_date_time', $this->lang->line('services_update_services_update_send_later_date_time'), 'trim');
		$this->form_validation->set_rules('services_update_is_already_sent', $this->lang->line('services_update_services_update_is_already_sent'), 'trim');
		$this->form_validation->set_rules('services_update_sending_date_time', $this->lang->line('services_update_services_update_sending_date_time'), 'trim');
		$this->form_validation->set_rules('services_update_active', $this->lang->line('services_update_services_update_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_services_update_services_id' =>$this->input->post('ref_services_update_services_id',TRUE),
			'services_update_title' =>$this->input->post('services_update_title',TRUE),
			'services_update_details' =>$this->input->post('services_update_details',TRUE),
			'services_update_link' =>$this->input->post('services_update_link',TRUE),
			'services_update_has_any_available_date' =>$this->input->post('services_update_has_any_available_date',TRUE),
			'services_update_available_date' =>$this->input->post('services_update_available_date',TRUE),
			'services_update_is_push_message' =>$this->input->post('services_update_is_push_message',TRUE),
			'services_update_created_by_admin_panel_login_id' =>$this->input->post('services_update_created_by_admin_panel_login_id',TRUE),
			'services_update_created_date_time' =>$this->input->post('services_update_created_date_time',TRUE),
			'services_update_edited_by_admin_panel_login_id' =>$this->input->post('services_update_edited_by_admin_panel_login_id',TRUE),
			'services_update_edited_date_time' =>$this->input->post('services_update_edited_date_time',TRUE),
			'services_update_send_now' =>$this->input->post('services_update_send_now',TRUE),
			'services_update_send_later_date_time' =>$this->input->post('services_update_send_later_date_time',TRUE),
			'services_update_is_already_sent' =>$this->input->post('services_update_is_already_sent',TRUE),
			'services_update_sending_date_time' =>$this->input->post('services_update_sending_date_time',TRUE),
			'services_update_active' =>$this->input->post('services_update_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->services_update_model->services_update_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_services_update/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_services_update($limit=null)
	{
		$data['content'] = 'services_update/all_services_update_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->services_update_model->get_all_services_update_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->services_update_model->no_of_rows_services_update_list();	/* get the total rows from the query */
		$url=base_url()."services_update/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_services_update($id)
	{
	
		$data['content'] = 'services_update/edit_services_update_form';
		$data['title'] = $this->lang->line('update_services_update');
		
		$this->form_validation->set_rules('ref_services_update_services_id', $this->lang->line('services_update_ref_services_update_services_id'), 'trim|required');
		$this->form_validation->set_rules('services_update_title', $this->lang->line('services_update_services_update_title'), 'trim');
		$this->form_validation->set_rules('services_update_details', $this->lang->line('services_update_services_update_details'), 'trim');
		$this->form_validation->set_rules('services_update_link', $this->lang->line('services_update_services_update_link'), 'trim|required');
		$this->form_validation->set_rules('services_update_has_any_available_date', $this->lang->line('services_update_services_update_has_any_available_date'), 'trim');
		$this->form_validation->set_rules('services_update_available_date', $this->lang->line('services_update_services_update_available_date'), 'trim');
		$this->form_validation->set_rules('services_update_is_push_message', $this->lang->line('services_update_services_update_is_push_message'), 'trim');
		$this->form_validation->set_rules('services_update_created_by_admin_panel_login_id', $this->lang->line('services_update_services_update_created_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('services_update_created_date_time', $this->lang->line('services_update_services_update_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('services_update_edited_by_admin_panel_login_id', $this->lang->line('services_update_services_update_edited_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('services_update_edited_date_time', $this->lang->line('services_update_services_update_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('services_update_send_now', $this->lang->line('services_update_services_update_send_now'), 'trim');
		$this->form_validation->set_rules('services_update_send_later_date_time', $this->lang->line('services_update_services_update_send_later_date_time'), 'trim');
		$this->form_validation->set_rules('services_update_is_already_sent', $this->lang->line('services_update_services_update_is_already_sent'), 'trim');
		$this->form_validation->set_rules('services_update_sending_date_time', $this->lang->line('services_update_services_update_sending_date_time'), 'trim');
		$this->form_validation->set_rules('services_update_active', $this->lang->line('services_update_services_update_active'), 'trim');
		
		
			$edit_query_result=$this->services_update_model->get_services_update_by_id($id);
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
			'ref_services_update_services_id' =>$this->input->post('ref_services_update_services_id',TRUE),
			'services_update_title' =>$this->input->post('services_update_title',TRUE),
			'services_update_details' =>$this->input->post('services_update_details',TRUE),
			'services_update_link' =>$this->input->post('services_update_link',TRUE),
			'services_update_has_any_available_date' =>$this->input->post('services_update_has_any_available_date',TRUE),
			'services_update_available_date' =>$this->input->post('services_update_available_date',TRUE),
			'services_update_is_push_message' =>$this->input->post('services_update_is_push_message',TRUE),
			'services_update_created_by_admin_panel_login_id' =>$this->input->post('services_update_created_by_admin_panel_login_id',TRUE),
			'services_update_created_date_time' =>$this->input->post('services_update_created_date_time',TRUE),
			'services_update_edited_by_admin_panel_login_id' =>$this->input->post('services_update_edited_by_admin_panel_login_id',TRUE),
			'services_update_edited_date_time' =>$this->input->post('services_update_edited_date_time',TRUE),
			'services_update_send_now' =>$this->input->post('services_update_send_now',TRUE),
			'services_update_send_later_date_time' =>$this->input->post('services_update_send_later_date_time',TRUE),
			'services_update_is_already_sent' =>$this->input->post('services_update_is_already_sent',TRUE),
			'services_update_sending_date_time' =>$this->input->post('services_update_sending_date_time',TRUE),
			'services_update_active' =>$this->input->post('services_update_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->services_update_model->services_update_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_services_update/".$id);
		}
		
	}
	
	public function view_services_update($id)
	{
	
		$data['content'] = 'services_update/single_services_update_view';
		$data['title'] =  $this->lang->line('view_services_update');
		$query_result=$this->services_update_model->get_services_update_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_services_update($id,$url)
	{
		$result=$this->services_update_model->delete_services_update_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_services_update'):$this->lang->line('not_deleted_services_update');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('services_update'));
			
	}
	
	
 

	
}
	
	

	
	
	