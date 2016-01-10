<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('news_model');
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
				$this->lang->load('news_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('news_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('news_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('news_it','italian');
		}
 
		
		
	}
	

	public function create_news()
	{
		$data['content'] = 'news/add_news_form';
		$data['title'] =$this->lang->line('create_news');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('news_title', $this->lang->line('news_news_title'), 'trim|required');
		$this->form_validation->set_rules('news_description', $this->lang->line('news_news_description'), 'trim|required');
		$this->form_validation->set_rules('news_created_admin_panel_login_id', $this->lang->line('news_news_created_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('news_created_date_time', $this->lang->line('news_news_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('news_edited_admin_panel_login_id', $this->lang->line('news_news_edited_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('news_edited_date_time', $this->lang->line('news_news_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('news_active', $this->lang->line('news_news_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'news_title' =>$this->input->post('news_title',TRUE),
			'news_description' =>$this->input->post('news_description',TRUE),
			'news_created_admin_panel_login_id' =>$this->input->post('news_created_admin_panel_login_id',TRUE),
			'news_created_date_time' =>$this->input->post('news_created_date_time',TRUE),
			'news_edited_admin_panel_login_id' =>$this->input->post('news_edited_admin_panel_login_id',TRUE),
			'news_edited_date_time' =>$this->input->post('news_edited_date_time',TRUE),
			'news_active' =>$this->input->post('news_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->news_model->news_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_news/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_news($limit=null)
	{
		$data['content'] = 'news/all_news_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->news_model->get_all_news_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->news_model->no_of_rows_news_list();	/* get the total rows from the query */
		$url=base_url()."news/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_news($id)
	{
	
		$data['content'] = 'news/edit_news_form';
		$data['title'] = $this->lang->line('update_news');
		
		$this->form_validation->set_rules('news_title', $this->lang->line('news_news_title'), 'trim|required');
		$this->form_validation->set_rules('news_description', $this->lang->line('news_news_description'), 'trim|required');
		$this->form_validation->set_rules('news_created_admin_panel_login_id', $this->lang->line('news_news_created_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('news_created_date_time', $this->lang->line('news_news_created_date_time'), 'trim|required');
		$this->form_validation->set_rules('news_edited_admin_panel_login_id', $this->lang->line('news_news_edited_admin_panel_login_id'), 'trim');
		$this->form_validation->set_rules('news_edited_date_time', $this->lang->line('news_news_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('news_active', $this->lang->line('news_news_active'), 'trim|required');
		
		
			$edit_query_result=$this->news_model->get_news_by_id($id);
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
			'news_title' =>$this->input->post('news_title',TRUE),
			'news_description' =>$this->input->post('news_description',TRUE),
			'news_created_admin_panel_login_id' =>$this->input->post('news_created_admin_panel_login_id',TRUE),
			'news_created_date_time' =>$this->input->post('news_created_date_time',TRUE),
			'news_edited_admin_panel_login_id' =>$this->input->post('news_edited_admin_panel_login_id',TRUE),
			'news_edited_date_time' =>$this->input->post('news_edited_date_time',TRUE),
			'news_active' =>$this->input->post('news_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->news_model->news_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_news/".$id);
		}
		
	}
	
	public function view_news($id)
	{
	
		$data['content'] = 'news/single_news_view';
		$data['title'] =  $this->lang->line('view_news');
		$query_result=$this->news_model->get_news_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_news($id,$url)
	{
		$result=$this->news_model->delete_news_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_news'):$this->lang->line('not_deleted_news');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('news'));
			
	}
	
	
 

	
}
	
	

	
	
	