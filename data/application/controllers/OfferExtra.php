<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OfferExtra extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('offer_extra_model');
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
				$this->lang->load('offer_extra_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_extra_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_extra_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('offer_extra_it','italian');
		}
 
		
		
	}
	

	public function create_offer_extra()
	{
		$data['content'] = 'offer_extra/add_offer_extra_form';
		$data['title'] =$this->lang->line('create_offer_extra');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_offer_extra_offer_id', $this->lang->line('offer_extra_ref_offer_extra_offer_id'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_attribute_name', $this->lang->line('offer_extra_offer_extra_attribute_name'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_attribute_value', $this->lang->line('offer_extra_offer_extra_attribute_value'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_created_edited_date_time', $this->lang->line('offer_extra_offer_extra_created_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_active', $this->lang->line('offer_extra_offer_extra_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_offer_extra_offer_id' =>$this->input->post('ref_offer_extra_offer_id',TRUE),
			'offer_extra_attribute_name' =>$this->input->post('offer_extra_attribute_name',TRUE),
			'offer_extra_attribute_value' =>$this->input->post('offer_extra_attribute_value',TRUE),
			'offer_extra_created_edited_date_time' =>$this->input->post('offer_extra_created_edited_date_time',TRUE),
			'offer_extra_active' =>$this->input->post('offer_extra_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->offer_extra_model->offer_extra_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_offer_extra/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_offer_extra($limit=null)
	{
		$data['content'] = 'offer_extra/all_offer_extra_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->offer_extra_model->get_all_offer_extra_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->offer_extra_model->no_of_rows_offer_extra_list();	/* get the total rows from the query */
		$url=base_url()."offer_extra/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_offer_extra($id)
	{
	
		$data['content'] = 'offer_extra/edit_offer_extra_form';
		$data['title'] = $this->lang->line('update_offer_extra');
		
		$this->form_validation->set_rules('ref_offer_extra_offer_id', $this->lang->line('offer_extra_ref_offer_extra_offer_id'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_attribute_name', $this->lang->line('offer_extra_offer_extra_attribute_name'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_attribute_value', $this->lang->line('offer_extra_offer_extra_attribute_value'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_created_edited_date_time', $this->lang->line('offer_extra_offer_extra_created_edited_date_time'), 'trim|required');
		$this->form_validation->set_rules('offer_extra_active', $this->lang->line('offer_extra_offer_extra_active'), 'trim|required');
		
		
			$edit_query_result=$this->offer_extra_model->get_offer_extra_by_id($id);
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
			'ref_offer_extra_offer_id' =>$this->input->post('ref_offer_extra_offer_id',TRUE),
			'offer_extra_attribute_name' =>$this->input->post('offer_extra_attribute_name',TRUE),
			'offer_extra_attribute_value' =>$this->input->post('offer_extra_attribute_value',TRUE),
			'offer_extra_created_edited_date_time' =>$this->input->post('offer_extra_created_edited_date_time',TRUE),
			'offer_extra_active' =>$this->input->post('offer_extra_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->offer_extra_model->offer_extra_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_offer_extra/".$id);
		}
		
	}
	
	public function view_offer_extra($id)
	{
	
		$data['content'] = 'offer_extra/single_offer_extra_view';
		$data['title'] =  $this->lang->line('view_offer_extra');
		$query_result=$this->offer_extra_model->get_offer_extra_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_offer_extra($id,$url)
	{
		$result=$this->offer_extra_model->delete_offer_extra_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_offer_extra'):$this->lang->line('not_deleted_offer_extra');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('offer_extra'));
			
	}
	
	
 

	
}
	
	

	
	
	