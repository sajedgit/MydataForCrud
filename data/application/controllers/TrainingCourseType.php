<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrainingCourseType extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('training_course_type_model');
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
				$this->lang->load('training_course_type_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_type_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('training_course_type_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('training_course_type_it','italian');
		}
 
		
		
	}
	

	public function create_training_course_type()
	{
		$data['content'] = 'training_course_type/add_training_course_type_form';
		$data['title'] =$this->lang->line('create_training_course_type');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('training_course_type_name', $this->lang->line('training_course_type_training_course_type_name'), 'trim|required');
		$this->form_validation->set_rules('training_course_type_description', $this->lang->line('training_course_type_training_course_type_description'), 'trim');
		$this->form_validation->set_rules('training_course_type_active', $this->lang->line('training_course_type_training_course_type_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'training_course_type_name' =>$this->input->post('training_course_type_name',TRUE),
			'training_course_type_description' =>$this->input->post('training_course_type_description',TRUE),
			'training_course_type_active' =>$this->input->post('training_course_type_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->training_course_type_model->training_course_type_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_training_course_type/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_training_course_type($limit=null)
	{
		$data['content'] = 'training_course_type/all_training_course_type_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->training_course_type_model->get_all_training_course_type_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->training_course_type_model->no_of_rows_training_course_type_list();	/* get the total rows from the query */
		$url=base_url()."training_course_type/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_training_course_type($id)
	{
	
		$data['content'] = 'training_course_type/edit_training_course_type_form';
		$data['title'] = $this->lang->line('update_training_course_type');
		
		$this->form_validation->set_rules('training_course_type_name', $this->lang->line('training_course_type_training_course_type_name'), 'trim|required');
		$this->form_validation->set_rules('training_course_type_description', $this->lang->line('training_course_type_training_course_type_description'), 'trim');
		$this->form_validation->set_rules('training_course_type_active', $this->lang->line('training_course_type_training_course_type_active'), 'trim|required');
		
		
			$edit_query_result=$this->training_course_type_model->get_training_course_type_by_id($id);
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
			'training_course_type_name' =>$this->input->post('training_course_type_name',TRUE),
			'training_course_type_description' =>$this->input->post('training_course_type_description',TRUE),
			'training_course_type_active' =>$this->input->post('training_course_type_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->training_course_type_model->training_course_type_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_training_course_type/".$id);
		}
		
	}
	
	public function view_training_course_type($id)
	{
	
		$data['content'] = 'training_course_type/single_training_course_type_view';
		$data['title'] =  $this->lang->line('view_training_course_type');
		$query_result=$this->training_course_type_model->get_training_course_type_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_training_course_type($id,$url)
	{
		$result=$this->training_course_type_model->delete_training_course_type_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_training_course_type'):$this->lang->line('not_deleted_training_course_type');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('training_course_type'));
			
	}
	
	
 

	
}
	
	

	
	
	