	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_services_update');
				echo form_open("edit_services_update/$edit_query_result->services_update_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_ref_services_update_services_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_services_update_services_id; ?>'  name='ref_services_update_services_id' placeholder='<?php echo $this->lang->line('services_update_ref_services_update_services_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_services_update_services_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_title') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_title; ?>'  name='services_update_title' placeholder='<?php echo $this->lang->line('services_update_services_update_title') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_details') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_details; ?>'  name='services_update_details' placeholder='<?php echo $this->lang->line('services_update_services_update_details') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_details'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_link') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_link; ?>'  name='services_update_link' placeholder='<?php echo $this->lang->line('services_update_services_update_link') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_link'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_has_any_available_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_has_any_available_date; ?>'  name='services_update_has_any_available_date' placeholder='<?php echo $this->lang->line('services_update_services_update_has_any_available_date') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_has_any_available_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_available_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_available_date; ?>'  name='services_update_available_date' placeholder='<?php echo $this->lang->line('services_update_services_update_available_date') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_available_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_is_push_message') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_is_push_message; ?>'  name='services_update_is_push_message' placeholder='<?php echo $this->lang->line('services_update_services_update_is_push_message') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_is_push_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_created_by_admin_panel_login_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_created_by_admin_panel_login_id; ?>'  name='services_update_created_by_admin_panel_login_id' placeholder='<?php echo $this->lang->line('services_update_services_update_created_by_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_created_by_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_created_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_created_date_time; ?>'  name='services_update_created_date_time' placeholder='<?php echo $this->lang->line('services_update_services_update_created_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_edited_by_admin_panel_login_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_edited_by_admin_panel_login_id; ?>'  name='services_update_edited_by_admin_panel_login_id' placeholder='<?php echo $this->lang->line('services_update_services_update_edited_by_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_edited_by_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_edited_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_edited_date_time; ?>'  name='services_update_edited_date_time' placeholder='<?php echo $this->lang->line('services_update_services_update_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_send_now') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_send_now; ?>'  name='services_update_send_now' placeholder='<?php echo $this->lang->line('services_update_services_update_send_now') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_send_now'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_send_later_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_send_later_date_time; ?>'  name='services_update_send_later_date_time' placeholder='<?php echo $this->lang->line('services_update_services_update_send_later_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_send_later_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_is_already_sent') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_is_already_sent; ?>'  name='services_update_is_already_sent' placeholder='<?php echo $this->lang->line('services_update_services_update_is_already_sent') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_is_already_sent'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_sending_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_sending_date_time; ?>'  name='services_update_sending_date_time' placeholder='<?php echo $this->lang->line('services_update_services_update_sending_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_sending_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_update_services_update_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_update_active; ?>'  name='services_update_active' placeholder='<?php echo $this->lang->line('services_update_services_update_active') ?>' >
						<span class='text-danger'><?php  echo form_error('services_update_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
