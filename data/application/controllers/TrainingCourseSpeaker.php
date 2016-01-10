<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrainingCourseSpeaker extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('training_course_speaker_model');
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
				$this->lang->load('training_course_speaker_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_speaker_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_speaker_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('training_course_speaker_it','italian');
		}
 
		
		
	}
	

	public function create_training_course_speaker()
	{
		$data['content'] = 'training_course_speaker/add_training_course_speaker_form';
		$data['title'] =$this->lang->line('create_training_course_speaker');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_training_course_speaker_training_course_id', $this->lang->line('training_course_speaker_ref_training_course_speaker_training_course_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_speaker_full_name', $this->lang->line('training_course_speaker_training_course_speaker_full_name'), 'trim|required');
		$this->form_validation->set_rules('training_course_speaker_has_any_image', $this->lang->line('training_course_speaker_training_course_speaker_has_any_image'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_image_storage_base_path_android', $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_android'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_image_storage_base_path_ios', $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_ios'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_image_name_as_saved', $this->lang->line('training_course_speaker_training_course_speaker_image_name_as_saved'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_active', $this->lang->line('training_course_speaker_training_course_speaker_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_training_course_speaker_training_course_id' =>$this->input->post('ref_training_course_speaker_training_course_id',TRUE),
			'training_course_speaker_full_name' =>$this->input->post('training_course_speaker_full_name',TRUE),
			'training_course_speaker_has_any_image' =>$this->input->post('training_course_speaker_has_any_image',TRUE),
			'training_course_speaker_image_storage_base_path_android' =>$this->input->post('training_course_speaker_image_storage_base_path_android',TRUE),
			'training_course_speaker_image_storage_base_path_ios' =>$this->input->post('training_course_speaker_image_storage_base_path_ios',TRUE),
			'training_course_speaker_image_name_as_saved' =>$this->input->post('training_course_speaker_image_name_as_saved',TRUE),
			'training_course_speaker_active' =>$this->input->post('training_course_speaker_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->training_course_speaker_model->training_course_speaker_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_training_course_speaker/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_training_course_speaker($limit=null)
	{
		$data['content'] = 'training_course_speaker/all_training_course_speaker_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->training_course_speaker_model->get_all_training_course_speaker_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->training_course_speaker_model->no_of_rows_training_course_speaker_list();	/* get the total rows from the query */
		$url=base_url()."training_course_speaker/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_training_course_speaker($id)
	{
	
		$data['content'] = 'training_course_speaker/edit_training_course_speaker_form';
		$data['title'] = $this->lang->line('update_training_course_speaker');
		
		$this->form_validation->set_rules('ref_training_course_speaker_training_course_id', $this->lang->line('training_course_speaker_ref_training_course_speaker_training_course_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_speaker_full_name', $this->lang->line('training_course_speaker_training_course_speaker_full_name'), 'trim|required');
		$this->form_validation->set_rules('training_course_speaker_has_any_image', $this->lang->line('training_course_speaker_training_course_speaker_has_any_image'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_image_storage_base_path_android', $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_android'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_image_storage_base_path_ios', $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_ios'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_image_name_as_saved', $this->lang->line('training_course_speaker_training_course_speaker_image_name_as_saved'), 'trim');
		$this->form_validation->set_rules('training_course_speaker_active', $this->lang->line('training_course_speaker_training_course_speaker_active'), 'trim');
		
		
			$edit_query_result=$this->training_course_speaker_model->get_training_course_speaker_by_id($id);
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
			'ref_training_course_speaker_training_course_id' =>$this->input->post('ref_training_course_speaker_training_course_id',TRUE),
			'training_course_speaker_full_name' =>$this->input->post('training_course_speaker_full_name',TRUE),
			'training_course_speaker_has_any_image' =>$this->input->post('training_course_speaker_has_any_image',TRUE),
			'training_course_speaker_image_storage_base_path_android' =>$this->input->post('training_course_speaker_image_storage_base_path_android',TRUE),
			'training_course_speaker_image_storage_base_path_ios' =>$this->input->post('training_course_speaker_image_storage_base_path_ios',TRUE),
			'training_course_speaker_image_name_as_saved' =>$this->input->post('training_course_speaker_image_name_as_saved',TRUE),
			'training_course_speaker_active' =>$this->input->post('training_course_speaker_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->training_course_speaker_model->training_course_speaker_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_training_course_speaker/".$id);
		}
		
	}
	
	public function view_training_course_speaker($id)
	{
	
		$data['content'] = 'training_course_speaker/single_training_course_speaker_view';
		$data['title'] =  $this->lang->line('view_training_course_speaker');
		$query_result=$this->training_course_speaker_model->get_training_course_speaker_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_training_course_speaker($id,$url)
	{
		$result=$this->training_course_speaker_model->delete_training_course_speaker_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_training_course_speaker'):$this->lang->line('not_deleted_training_course_speaker');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('training_course_speaker'));
			
	}
	
	
 

	
}
	
	

	
	
	