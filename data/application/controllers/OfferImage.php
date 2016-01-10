<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OfferImage extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->model('common_model');
		$this->load->model('offer_image_model');
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
				$this->lang->load('offer_image_en','english');
			}
			else if($this->session->userdata('language')==LANG_IT)
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_image_it','italian');
			}
			else
			{
				$this->lang->load('menu_it','italian');
				$this->lang->load('offer_image_it','italian');
			}
		}
		else
		{
			$this->lang->load('menu_it','italian');
			$this->lang->load('offer_image_it','italian');
		}
 
		
		
	}
	

	public function create_offer_image()
	{
		$data['content'] = 'offer_image/add_offer_image_form';
		$data['title'] =$this->lang->line('create_offer_image');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('ref_offer_image_offer_id', $this->lang->line('offer_image_ref_offer_image_offer_id'), 'trim|required');
		$this->form_validation->set_rules('offer_image_product_name', $this->lang->line('offer_image_offer_image_product_name'), 'trim');
		$this->form_validation->set_rules('offer_image_product_description', $this->lang->line('offer_image_offer_image_product_description'), 'trim');
		$this->form_validation->set_rules('offer_image_extension', $this->lang->line('offer_image_offer_image_extension'), 'trim');
		$this->form_validation->set_rules('offer_image_storage_base_path_android', $this->lang->line('offer_image_offer_image_storage_base_path_android'), 'trim|required');
		$this->form_validation->set_rules('offer_image_storage_base_path_ios', $this->lang->line('offer_image_offer_image_storage_base_path_ios'), 'trim|required');
		$this->form_validation->set_rules('offer_image_name_as_saved', $this->lang->line('offer_image_offer_image_name_as_saved'), 'trim|required');
		$this->form_validation->set_rules('offer_image_is_display_image', $this->lang->line('offer_image_offer_image_is_display_image'), 'trim');
		$this->form_validation->set_rules('offer_image_active', $this->lang->line('offer_image_offer_image_active'), 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->vars($data);
			$this->load->view('layout/main_layout');
		} 
		else 
		{
			
		$query_data=array(
			'ref_offer_image_offer_id' =>$this->input->post('ref_offer_image_offer_id',TRUE),
			'offer_image_product_name' =>$this->input->post('offer_image_product_name',TRUE),
			'offer_image_product_description' =>$this->input->post('offer_image_product_description',TRUE),
			'offer_image_extension' =>$this->input->post('offer_image_extension',TRUE),
			'offer_image_storage_base_path_android' =>$this->input->post('offer_image_storage_base_path_android',TRUE),
			'offer_image_storage_base_path_ios' =>$this->input->post('offer_image_storage_base_path_ios',TRUE),
			'offer_image_name_as_saved' =>$this->input->post('offer_image_name_as_saved',TRUE),
			'offer_image_is_display_image' =>$this->input->post('offer_image_is_display_image',TRUE),
			'offer_image_active' =>$this->input->post('offer_image_active',TRUE),
				);
			
			//Transfering data to Model
			
			$return_id=$this->offer_image_model->offer_image_insert($query_data);
			if($return_id>0)
			{
				$data['message'] = $this->lang->line('done_status');
				redirect('view_offer_image/'.$return_id);
			}
			else
			{
				$data['message'] =  $this->lang->line('not_done_status');
				
				$this->load->vars($data);
				$this->load->view('layout/main_layout');
			}
			
		}
		
		
	}
		
	public function admin_offer_image($limit=null)
	{
		$data['content'] = 'offer_image/all_offer_image_view';
		$data['title'] =$this->lang->line('title');

		$per_page=5;
		$limit=$this->uri->segment(3, 1);
		$data['query_result']=$this->offer_image_model->get_all_offer_image_list($limit,$per_page);	/* for view all data to admin */
		$total_rows=$this->offer_image_model->no_of_rows_offer_image_list();	/* get the total rows from the query */
		$url=base_url()."offer_image/page/";
		$data['paging']=$this->common_model->custom_pager($url,$per_page,$total_rows);

		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
			
	public function edit_offer_image($id)
	{
	
		$data['content'] = 'offer_image/edit_offer_image_form';
		$data['title'] = $this->lang->line('update_offer_image');
		
		$this->form_validation->set_rules('ref_offer_image_offer_id', $this->lang->line('offer_image_ref_offer_image_offer_id'), 'trim|required');
		$this->form_validation->set_rules('offer_image_product_name', $this->lang->line('offer_image_offer_image_product_name'), 'trim');
		$this->form_validation->set_rules('offer_image_product_description', $this->lang->line('offer_image_offer_image_product_description'), 'trim');
		$this->form_validation->set_rules('offer_image_extension', $this->lang->line('offer_image_offer_image_extension'), 'trim');
		$this->form_validation->set_rules('offer_image_storage_base_path_android', $this->lang->line('offer_image_offer_image_storage_base_path_android'), 'trim|required');
		$this->form_validation->set_rules('offer_image_storage_base_path_ios', $this->lang->line('offer_image_offer_image_storage_base_path_ios'), 'trim|required');
		$this->form_validation->set_rules('offer_image_name_as_saved', $this->lang->line('offer_image_offer_image_name_as_saved'), 'trim|required');
		$this->form_validation->set_rules('offer_image_is_display_image', $this->lang->line('offer_image_offer_image_is_display_image'), 'trim');
		$this->form_validation->set_rules('offer_image_active', $this->lang->line('offer_image_offer_image_active'), 'trim|required');
		
		
			$edit_query_result=$this->offer_image_model->get_offer_image_by_id($id);
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
			'ref_offer_image_offer_id' =>$this->input->post('ref_offer_image_offer_id',TRUE),
			'offer_image_product_name' =>$this->input->post('offer_image_product_name',TRUE),
			'offer_image_product_description' =>$this->input->post('offer_image_product_description',TRUE),
			'offer_image_extension' =>$this->input->post('offer_image_extension',TRUE),
			'offer_image_storage_base_path_android' =>$this->input->post('offer_image_storage_base_path_android',TRUE),
			'offer_image_storage_base_path_ios' =>$this->input->post('offer_image_storage_base_path_ios',TRUE),
			'offer_image_name_as_saved' =>$this->input->post('offer_image_name_as_saved',TRUE),
			'offer_image_is_display_image' =>$this->input->post('offer_image_is_display_image',TRUE),
			'offer_image_active' =>$this->input->post('offer_image_active',TRUE),
				);
			
		
			//Transfering data to Model
			$this->offer_image_model->offer_image_update($query_data,$id);
		
			$msg = $this->lang->line('modify_info');
			$this->session->set_flashdata('msg', $msg);
			redirect("edit_offer_image/".$id);
		}
		
	}
	
	public function view_offer_image($id)
	{
	
		$data['content'] = 'offer_image/single_offer_image_view';
		$data['title'] =  $this->lang->line('view_offer_image');
		$query_result=$this->offer_image_model->get_offer_image_by_id($id);
		$query_result= $query_result->result();
		$data['query_result'] = $query_result[0];
		$this->load->vars($data);
		$this->load->view('layout/main_layout');
	}
	
	public function delete_offer_image($id,$url)
	{
		$result=$this->offer_image_model->delete_offer_image_by_id($id);
		$msg=$result>0?$this->lang->line('deleted_offer_image'):$this->lang->line('not_deleted_offer_image');
		$this->session->set_flashdata('msg', $msg);
		redirect(site_url('offer_image'));
			
	}
	
	
 

	
}
	
	

	
	
	