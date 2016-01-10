<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsAttachedFile extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('news_attached_file_model');
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
				$this->lang->load('news_attached_file_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('news_attached_file_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('news_attached_file_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('news_attached_file_it','italian');
		}
 
		
		
	}
	

	public function create_news_attached_file()
	{
		$data['content'] = 'news_attached_file/add_news_attached_file_form';
		$data['title'] =$this->lang->line('create_news_attached_file');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_news_attached_file_news_id', $this->lang->line('news_attached_file_ref_news_attached_file_news_id'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_extension', $this->lang->line('news_attached_file_news_attached_file_extension'), 'trim');
		$this->form_validation->set_rules('news_attached_file_storage_base_path_android', $this->lang->line('news_attached_file_news_attached_file_storage_base_path_android'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_storage_base_path_ios', $this->lang->line('news_attached_file_news_attached_file_storage_base_path_ios'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_name_as_saved', $this->lang->line('news_attached_file_news_attached_file_name_as_saved'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_active', $this->lang->line('news_attached_file_news_attached_file_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_news_attached_file_news_id' =>$this->input->post('ref_news_attached_file_news_id',TRUE),
			'news_attached_file_extension' =>$this->input->post('news_attached_file_extension',TRUE),
			'news_attached_file_storage_base_path_android' =>$this->input->post('news_attached_file_storage_base_path_android',TRUE),
			'news_attached_file_storage_base_path_ios' =>$this->input->post('news_attached_file_storage_base_path_ios',TRUE),
			'news_attached_file_name_as_saved' =>$this->input->post('news_attached_file_name_as_saved',TRUE),
			'news_attached_file_active' =>$this->input->post('news_attached_file_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->news_attached_file_model->news_attached_file_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_news_attached_file/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_news_attached_file($limit=null)
	{
		$data['content'] = 'news_attached_file/all_news_attached_file_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->news_attached_file_model->get_all_news_attached_file_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->news_attached_file_model->no_of_rows_news_attached_file_list();	/* get the total rows from the query */
		$url=base_url()."news_attached_file/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_news_attached_file($id)
	{
	
		$data['content'] = 'news_attached_file/edit_news_attached_file_form';
		$data['title'] = $this->lang->line('update_news_attached_file');
		
		$this->form_validation->set_rules('ref_news_attached_file_news_id', $this->lang->line('news_attached_file_ref_news_attached_file_news_id'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_extension', $this->lang->line('news_attached_file_news_attached_file_extension'), 'trim');
		$this->form_validation->set_rules('news_attached_file_storage_base_path_android', $this->lang->line('news_attached_file_news_attached_file_storage_base_path_android'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_storage_base_path_ios', $this->lang->line('news_attached_file_news_attached_file_storage_base_path_ios'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_name_as_saved', $this->lang->line('news_attached_file_news_attached_file_name_as_saved'), 'trim|required');
		$this->form_validation->set_rules('news_attached_file_active', $this->lang->line('news_attached_file_news_attached_file_active'), 'trim|required');
		
		
			$edit_query_result=$this->news_attached_file_model->get_news_attached_file_by_id($id);
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
			'ref_news_attached_file_news_id' =>$this->input->post('ref_news_attached_file_news_id',TRUE),
			'news_attached_file_extension' =>$this->input->post('news_attached_file_extension',TRUE),
			'news_attached_file_storage_base_path_android' =>$this->input->post('news_attached_file_storage_base_path_android',TRUE),
			'news_attached_file_storage_base_path_ios' =>$this->input->post('news_attached_file_storage_base_path_ios',TRUE),
			'news_attached_file_name_as_saved' =>$this->input->post('news_attached_file_name_as_saved',TRUE),
			'news_attached_file_active' =>$this->input->post('news_attached_file_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->news_attached_file_model->news_attached_file_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_news_attached_file/".$id);
		}
		
	}
	
	public function view_news_attached_file($id)
	{
	
		$data['content'] = 'news_attached_file/single_news_attached_file_view';
		$data['title'] =  $this->lang->line('view_news_attached_file');
		$query_result=$this->news_attached_file_model->get_news_attached_file_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_news_attached_file($id,$url)
	{
		$result=$this->news_attached_file_model->delete_news_attached_file_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_news_attached_file'):$this->lang->line('not_deleted_news_attached_file');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('news_attached_file'));
			
	}
	
	
 

	
}
	
	

	
	
	