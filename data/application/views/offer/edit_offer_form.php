	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_offer');
				echo form_open("edit_offer/$edit_query_result->offer_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_title') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_title; ?>'  name='offer_title' placeholder='<?php echo $this->lang->line('offer_offer_title') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_details') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_details; ?>'  name='offer_details' placeholder='<?php echo $this->lang->line('offer_offer_details') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_details'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_any_ending_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_any_ending_date; ?>'  name='offer_any_ending_date' placeholder='<?php echo $this->lang->line('offer_offer_any_ending_date') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_any_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_starting_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_starting_date; ?>'  name='offer_starting_date' placeholder='<?php echo $this->lang->line('offer_offer_starting_date') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_starting_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_starting_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_starting_time; ?>'  name='offer_starting_time' placeholder='<?php echo $this->lang->line('offer_offer_starting_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_starting_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_ending_date') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_ending_date; ?>'  name='offer_ending_date' placeholder='<?php echo $this->lang->line('offer_offer_ending_date') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_ending_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_ending_time; ?>'  name='offer_ending_time' placeholder='<?php echo $this->lang->line('offer_offer_ending_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_ending_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_is_push_message') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_is_push_message; ?>'  name='offer_is_push_message' placeholder='<?php echo $this->lang->line('offer_offer_is_push_message') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_is_push_message'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_created_admin_panel_login_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_created_admin_panel_login_id; ?>'  name='offer_created_admin_panel_login_id' placeholder='<?php echo $this->lang->line('offer_offer_created_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_created_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_created_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_created_date_time; ?>'  name='offer_created_date_time' placeholder='<?php echo $this->lang->line('offer_offer_created_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_edited_admin_panel_login_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_edited_admin_panel_login_id; ?>'  name='offer_edited_admin_panel_login_id' placeholder='<?php echo $this->lang->line('offer_offer_edited_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_edited_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_edited_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_edited_date_time; ?>'  name='offer_edited_date_time' placeholder='<?php echo $this->lang->line('offer_offer_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_send_now') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_send_now; ?>'  name='offer_send_now' placeholder='<?php echo $this->lang->line('offer_offer_send_now') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_send_now'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_send_later') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_send_later; ?>'  name='offer_send_later' placeholder='<?php echo $this->lang->line('offer_offer_send_later') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_send_later'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_send_later_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_send_later_date_time; ?>'  name='offer_send_later_date_time' placeholder='<?php echo $this->lang->line('offer_offer_send_later_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_send_later_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_is_already_sent') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_is_already_sent; ?>'  name='offer_is_already_sent' placeholder='<?php echo $this->lang->line('offer_offer_is_already_sent') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_is_already_sent'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_sending_date_time') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_sending_date_time; ?>'  name='offer_sending_date_time' placeholder='<?php echo $this->lang->line('offer_offer_sending_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_sending_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_offer_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_active; ?>'  name='offer_active' placeholder='<?php echo $this->lang->line('offer_offer_active') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
