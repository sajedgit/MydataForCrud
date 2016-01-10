<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrainingCourse extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('training_course_model');
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
				$this->lang->load('training_course_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('training_course_it','italian');
		}
 
		
		
	}
	

	public function create_training_course()
	{
		$data['content'] = 'training_course/add_training_course_form';
		$data['title'] =$this->lang->line('create_training_course');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_training_course_training_course_type_id', $this->lang->line('training_course_ref_training_course_training_course_type_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_only_attached_file_details', $this->lang->line('training_course_training_course_only_attached_file_details'), 'trim');
		$this->form_validation->set_rules('training_course_only_attached_file_location', $this->lang->line('training_course_training_course_only_attached_file_location'), 'trim');
		$this->form_validation->set_rules('training_course_any_web_link', $this->lang->line('training_course_training_course_any_web_link'), 'trim');
		$this->form_validation->set_rules('training_course_web_link', $this->lang->line('training_course_training_course_web_link'), 'trim');
		$this->form_validation->set_rules('training_course_title', $this->lang->line('training_course_training_course_title'), 'trim|required');
		$this->form_validation->set_rules('training_course_overview', $this->lang->line('training_course_training_course_overview'), 'trim');
		$this->form_validation->set_rules('training_course_outline', $this->lang->line('training_course_training_course_outline'), 'trim');
		$this->form_validation->set_rules('training_course_has_already_date_time_duration', $this->lang->line('training_course_training_course_has_already_date_time_duration'), 'trim');
		$this->form_validation->set_rules('training_course_orientation_date_time', $this->lang->line('training_course_training_course_orientation_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_starting_date_time', $this->lang->line('training_course_training_course_starting_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_ending_date_time', $this->lang->line('training_course_training_course_ending_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_location', $this->lang->line('training_course_training_course_location'), 'trim');
		$this->form_validation->set_rules('training_course_last_registration_date_time', $this->lang->line('training_course_training_course_last_registration_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_total_class_no', $this->lang->line('training_course_training_course_total_class_no'), 'trim');
		$this->form_validation->set_rules('training_course_days_name_in_week', $this->lang->line('training_course_training_course_days_name_in_week'), 'trim');
		$this->form_validation->set_rules('training_course_per_class_duration', $this->lang->line('training_course_training_course_per_class_duration'), 'trim');
		$this->form_validation->set_rules('training_course_days_start_time', $this->lang->line('training_course_training_course_days_start_time'), 'trim');
		$this->form_validation->set_rules('training_course_days_end_time', $this->lang->line('training_course_training_course_days_end_time'), 'trim');
		$this->form_validation->set_rules('ref_training_course_created_by_admin_panel_login_id', $this->lang->line('training_course_ref_training_course_created_by_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_created_date_time', $this->lang->line('training_course_training_course_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('ref_training_course_edited_by_admin_panel_login_id', $this->lang->line('training_course_ref_training_course_edited_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('training_course_edited_date_time', $this->lang->line('training_course_training_course_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('training_course_active', $this->lang->line('training_course_training_course_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_training_course_training_course_type_id' =>$this->input->post('ref_training_course_training_course_type_id',TRUE),
			'training_course_only_attached_file_details' =>$this->input->post('training_course_only_attached_file_details',TRUE),
			'training_course_only_attached_file_location' =>$this->input->post('training_course_only_attached_file_location',TRUE),
			'training_course_any_web_link' =>$this->input->post('training_course_any_web_link',TRUE),
			'training_course_web_link' =>$this->input->post('training_course_web_link',TRUE),
			'training_course_title' =>$this->input->post('training_course_title',TRUE),
			'training_course_overview' =>$this->input->post('training_course_overview',TRUE),
			'training_course_outline' =>$this->input->post('training_course_outline',TRUE),
			'training_course_has_already_date_time_duration' =>$this->input->post('training_course_has_already_date_time_duration',TRUE),
			'training_course_orientation_date_time' =>$this->input->post('training_course_orientation_date_time',TRUE),
			'training_course_starting_date_time' =>$this->input->post('training_course_starting_date_time',TRUE),
			'training_course_ending_date_time' =>$this->input->post('training_course_ending_date_time',TRUE),
			'training_course_location' =>$this->input->post('training_course_location',TRUE),
			'training_course_last_registration_date_time' =>$this->input->post('training_course_last_registration_date_time',TRUE),
			'training_course_total_class_no' =>$this->input->post('training_course_total_class_no',TRUE),
			'training_course_days_name_in_week' =>$this->input->post('training_course_days_name_in_week',TRUE),
			'training_course_per_class_duration' =>$this->input->post('training_course_per_class_duration',TRUE),
			'training_course_days_start_time' =>$this->input->post('training_course_days_start_time',TRUE),
			'training_course_days_end_time' =>$this->input->post('training_course_days_end_time',TRUE),
			'ref_training_course_created_by_admin_panel_login_id' =>$this->input->post('ref_training_course_created_by_admin_panel_login_id',TRUE),
			'training_course_created_date_time' =>$this->input->post('training_course_created_date_time',TRUE),
			'ref_training_course_edited_by_admin_panel_login_id' =>$this->input->post('ref_training_course_edited_by_admin_panel_login_id',TRUE),
			'training_course_edited_date_time' =>$this->input->post('training_course_edited_date_time',TRUE),
			'training_course_active' =>$this->input->post('training_course_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->training_course_model->training_course_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_training_course/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_training_course($limit=null)
	{
		$data['content'] = 'training_course/all_training_course_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->training_course_model->get_all_training_course_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->training_course_model->no_of_rows_training_course_list();	/* get the total rows from the query */
		$url=base_url()."training_course/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_training_course($id)
	{
	
		$data['content'] = 'training_course/edit_training_course_form';
		$data['title'] = $this->lang->line('update_training_course');
		
		$this->form_validation->set_rules('ref_training_course_training_course_type_id', $this->lang->line('training_course_ref_training_course_training_course_type_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_only_attached_file_details', $this->lang->line('training_course_training_course_only_attached_file_details'), 'trim');
		$this->form_validation->set_rules('training_course_only_attached_file_location', $this->lang->line('training_course_training_course_only_attached_file_location'), 'trim');
		$this->form_validation->set_rules('training_course_any_web_link', $this->lang->line('training_course_training_course_any_web_link'), 'trim');
		$this->form_validation->set_rules('training_course_web_link', $this->lang->line('training_course_training_course_web_link'), 'trim');
		$this->form_validation->set_rules('training_course_title', $this->lang->line('training_course_training_course_title'), 'trim|required');
		$this->form_validation->set_rules('training_course_overview', $this->lang->line('training_course_training_course_overview'), 'trim');
		$this->form_validation->set_rules('training_course_outline', $this->lang->line('training_course_training_course_outline'), 'trim');
		$this->form_validation->set_rules('training_course_has_already_date_time_duration', $this->lang->line('training_course_training_course_has_already_date_time_duration'), 'trim');
		$this->form_validation->set_rules('training_course_orientation_date_time', $this->lang->line('training_course_training_course_orientation_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_starting_date_time', $this->lang->line('training_course_training_course_starting_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_ending_date_time', $this->lang->line('training_course_training_course_ending_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_location', $this->lang->line('training_course_training_course_location'), 'trim');
		$this->form_validation->set_rules('training_course_last_registration_date_time', $this->lang->line('training_course_training_course_last_registration_date_time'), 'trim');
		$this->form_validation->set_rules('training_course_total_class_no', $this->lang->line('training_course_training_course_total_class_no'), 'trim');
		$this->form_validation->set_rules('training_course_days_name_in_week', $this->lang->line('training_course_training_course_days_name_in_week'), 'trim');
		$this->form_validation->set_rules('training_course_per_class_duration', $this->lang->line('training_course_training_course_per_class_duration'), 'trim');
		$this->form_validation->set_rules('training_course_days_start_time', $this->lang->line('training_course_training_course_days_start_time'), 'trim');
		$this->form_validation->set_rules('training_course_days_end_time', $this->lang->line('training_course_training_course_days_end_time'), 'trim');
		$this->form_validation->set_rules('ref_training_course_created_by_admin_panel_login_id', $this->lang->line('training_course_ref_training_course_created_by_admin_panel_login_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_created_date_time', $this->lang->line('training_course_training_course_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('ref_training_course_edited_by_admin_panel_login_id', $this->lang->line('training_course_ref_training_course_edited_by_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('training_course_edited_date_time', $this->lang->line('training_course_training_course_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('training_course_active', $this->lang->line('training_course_training_course_active'), 'trim');
		
		
			$edit_query_result=$this->training_course_model->get_training_course_by_id($id);
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
			'ref_training_course_training_course_type_id' =>$this->input->post('ref_training_course_training_course_type_id',TRUE),
			'training_course_only_attached_file_details' =>$this->input->post('training_course_only_attached_file_details',TRUE),
			'training_course_only_attached_file_location' =>$this->input->post('training_course_only_attached_file_location',TRUE),
			'training_course_any_web_link' =>$this->input->post('training_course_any_web_link',TRUE),
			'training_course_web_link' =>$this->input->post('training_course_web_link',TRUE),
			'training_course_title' =>$this->input->post('training_course_title',TRUE),
			'training_course_overview' =>$this->input->post('training_course_overview',TRUE),
			'training_course_outline' =>$this->input->post('training_course_outline',TRUE),
			'training_course_has_already_date_time_duration' =>$this->input->post('training_course_has_already_date_time_duration',TRUE),
			'training_course_orientation_date_time' =>$this->input->post('training_course_orientation_date_time',TRUE),
			'training_course_starting_date_time' =>$this->input->post('training_course_starting_date_time',TRUE),
			'training_course_ending_date_time' =>$this->input->post('training_course_ending_date_time',TRUE),
			'training_course_location' =>$this->input->post('training_course_location',TRUE),
			'training_course_last_registration_date_time' =>$this->input->post('training_course_last_registration_date_time',TRUE),
			'training_course_total_class_no' =>$this->input->post('training_course_total_class_no',TRUE),
			'training_course_days_name_in_week' =>$this->input->post('training_course_days_name_in_week',TRUE),
			'training_course_per_class_duration' =>$this->input->post('training_course_per_class_duration',TRUE),
			'training_course_days_start_time' =>$this->input->post('training_course_days_start_time',TRUE),
			'training_course_days_end_time' =>$this->input->post('training_course_days_end_time',TRUE),
			'ref_training_course_created_by_admin_panel_login_id' =>$this->input->post('ref_training_course_created_by_admin_panel_login_id',TRUE),
			'training_course_created_date_time' =>$this->input->post('training_course_created_date_time',TRUE),
			'ref_training_course_edited_by_admin_panel_login_id' =>$this->input->post('ref_training_course_edited_by_admin_panel_login_id',TRUE),
			'training_course_edited_date_time' =>$this->input->post('training_course_edited_date_time',TRUE),
			'training_course_active' =>$this->input->post('training_course_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->training_course_model->training_course_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_training_course/".$id);
		}
		
	}
	
	public function view_training_course($id)
	{
	
		$data['content'] = 'training_course/single_training_course_view';
		$data['title'] =  $this->lang->line('view_training_course');
		$query_result=$this->training_course_model->get_training_course_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_training_course($id,$url)
	{
		$result=$this->training_course_model->delete_training_course_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_training_course'):$this->lang->line('not_deleted_training_course');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('training_course'));
			
	}
	
	
 

	
}
	
	

	
	
	