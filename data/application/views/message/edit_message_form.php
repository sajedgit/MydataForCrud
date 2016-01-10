	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_message');
				echo form_open("edit_message/$edit_query_result->message_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('message_ref_message_message_type_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_message_message_type_id; ?>'  name='ref_message_message_type_id' placeholder='<?php echo $this->lang->line('message_ref_message_message_type_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_message_message_type_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_title') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_title; ?>'  name='message_title' placeholder='<?php echo $this->lang->line('message_message_title') ?>' >
						<span class='text-danger'><?php  echo form_error('message_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_details') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_details; ?>'  name='message_details' placeholder='<?php echo $this->lang->line('message_message_details') ?>' >
						<span class='text-danger'><?php  echo form_error('message_details'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_any_ending_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_any_ending_date; ?>'  name='message_any_ending_date' placeholder='<?php echo $this->lang->line('message_message_any_ending_date') ?>' >
						<span class='text-danger'><?php  echo form_error('message_any_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_ending_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_ending_date; ?>'  name='message_ending_date' placeholder='<?php echo $this->lang->line('message_message_ending_date') ?>' >
						<span class='text-danger'><?php  echo form_error('message_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_is_push_message') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_is_push_message; ?>'  name='message_is_push_message' placeholder='<?php echo $this->lang->line('message_message_is_push_message') ?>' >
						<span class='text-danger'><?php  echo form_error('message_is_push_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_created_by_admin_panel_login_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_created_by_admin_panel_login_id; ?>'  name='message_created_by_admin_panel_login_id' placeholder='<?php echo $this->lang->line('message_message_created_by_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('message_created_by_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_created_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_created_date_time; ?>'  name='message_created_date_time' placeholder='<?php echo $this->lang->line('message_message_created_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('message_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_edited_by_admin_panel_login_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_edited_by_admin_panel_login_id; ?>'  name='message_edited_by_admin_panel_login_id' placeholder='<?php echo $this->lang->line('message_message_edited_by_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('message_edited_by_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_edited_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_edited_date_time; ?>'  name='message_edited_date_time' placeholder='<?php echo $this->lang->line('message_message_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('message_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_send_now') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_send_now; ?>'  name='message_send_now' placeholder='<?php echo $this->lang->line('message_message_send_now') ?>' >
						<span class='text-danger'><?php  echo form_error('message_send_now'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_send_later_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_send_later_date_time; ?>'  name='message_send_later_date_time' placeholder='<?php echo $this->lang->line('message_message_send_later_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('message_send_later_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_is_already_sent') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_is_already_sent; ?>'  name='message_is_already_sent' placeholder='<?php echo $this->lang->line('message_message_is_already_sent') ?>' >
						<span class='text-danger'><?php  echo form_error('message_is_already_sent'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_sending_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_sending_date_time; ?>'  name='message_sending_date_time' placeholder='<?php echo $this->lang->line('message_message_sending_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('message_sending_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_message_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_active; ?>'  name='message_active' placeholder='<?php echo $this->lang->line('message_message_active') ?>' >
						<span class='text-danger'><?php  echo form_error('message_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
