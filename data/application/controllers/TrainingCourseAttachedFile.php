<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrainingCourseAttachedFile extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('training_course_attached_file_model');
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
				$this->lang->load('training_course_attached_file_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_attached_file_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_attached_file_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('training_course_attached_file_it','italian');
		}
 
		
		
	}
	

	public function create_training_course_attached_file()
	{
		$data['content'] = 'training_course_attached_file/add_training_course_attached_file_form';
		$data['title'] =$this->lang->line('create_training_course_attached_file');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_training_course_attached_file_training_course_id', $this->lang->line('training_course_attached_file_ref_training_course_attached_file_training_course_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_storage_base_path_android', $this->lang->line('training_course_attached_file_training_course_attached_file_storage_base_path_android'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_storage_base_path_ios', $this->lang->line('training_course_attached_file_training_course_attached_file_storage_base_path_ios'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_name_as_saved', $this->lang->line('training_course_attached_file_training_course_attached_file_name_as_saved'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_active', $this->lang->line('training_course_attached_file_training_course_attached_file_active'), 'trim');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_training_course_attached_file_training_course_id' =>$this->input->post('ref_training_course_attached_file_training_course_id',TRUE),
			'training_course_attached_file_storage_base_path_android' =>$this->input->post('training_course_attached_file_storage_base_path_android',TRUE),
			'training_course_attached_file_storage_base_path_ios' =>$this->input->post('training_course_attached_file_storage_base_path_ios',TRUE),
			'training_course_attached_file_name_as_saved' =>$this->input->post('training_course_attached_file_name_as_saved',TRUE),
			'training_course_attached_file_active' =>$this->input->post('training_course_attached_file_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->training_course_attached_file_model->training_course_attached_file_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_training_course_attached_file/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_training_course_attached_file($limit=null)
	{
		$data['content'] = 'training_course_attached_file/all_training_course_attached_file_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->training_course_attached_file_model->get_all_training_course_attached_file_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->training_course_attached_file_model->no_of_rows_training_course_attached_file_list();	/* get the total rows from the query */
		$url=base_url()."training_course_attached_file/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_training_course_attached_file($id)
	{
	
		$data['content'] = 'training_course_attached_file/edit_training_course_attached_file_form';
		$data['title'] = $this->lang->line('update_training_course_attached_file');
		
		$this->form_validation->set_rules('ref_training_course_attached_file_training_course_id', $this->lang->line('training_course_attached_file_ref_training_course_attached_file_training_course_id'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_storage_base_path_android', $this->lang->line('training_course_attached_file_training_course_attached_file_storage_base_path_android'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_storage_base_path_ios', $this->lang->line('training_course_attached_file_training_course_attached_file_storage_base_path_ios'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_name_as_saved', $this->lang->line('training_course_attached_file_training_course_attached_file_name_as_saved'), 'trim|required');
		$this->form_validation->set_rules('training_course_attached_file_active', $this->lang->line('training_course_attached_file_training_course_attached_file_active'), 'trim');
		
		
			$edit_query_result=$this->training_course_attached_file_model->get_training_course_attached_file_by_id($id);
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
			'ref_training_course_attached_file_training_course_id' =>$this->input->post('ref_training_course_attached_file_training_course_id',TRUE),
			'training_course_attached_file_storage_base_path_android' =>$this->input->post('training_course_attached_file_storage_base_path_android',TRUE),
			'training_course_attached_file_storage_base_path_ios' =>$this->input->post('training_course_attached_file_storage_base_path_ios',TRUE),
			'training_course_attached_file_name_as_saved' =>$this->input->post('training_course_attached_file_name_as_saved',TRUE),
			'training_course_attached_file_active' =>$this->input->post('training_course_attached_file_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->training_course_attached_file_model->training_course_attached_file_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_training_course_attached_file/".$id);
		}
		
	}
	
	public function view_training_course_attached_file($id)
	{
	
		$data['content'] = 'training_course_attached_file/single_training_course_attached_file_view';
		$data['title'] =  $this->lang->line('view_training_course_attached_file');
		$query_result=$this->training_course_attached_file_model->get_training_course_attached_file_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_training_course_attached_file($id,$url)
	{
		$result=$this->training_course_attached_file_model->delete_training_course_attached_file_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_training_course_attached_file'):$this->lang->line('not_deleted_training_course_attached_file');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('training_course_attached_file'));
			
	}
	
	
 

	
}
	
	

	
	
	