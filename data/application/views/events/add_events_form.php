	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_events');
				echo form_open("Events/create_events", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_name') ?></label>
						<input type='text' class='form-control'   name='events_name' placeholder='<?php echo $this->lang->line('events_events_name') ?>' >
						<span class='text-danger'><?php  echo form_error('events_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_description') ?></label>
						<input type='text' class='form-control'   name='events_description' placeholder='<?php echo $this->lang->line('events_events_description') ?>' >
						<span class='text-danger'><?php  echo form_error('events_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_event_any_web_link') ?></label>
						<input type='text' class='form-control'   name='event_any_web_link' placeholder='<?php echo $this->lang->line('events_event_any_web_link') ?>' >
						<span class='text-danger'><?php  echo form_error('event_any_web_link'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_event_web_link_details') ?></label>
						<input type='text' class='form-control'   name='event_web_link_details' placeholder='<?php echo $this->lang->line('events_event_web_link_details') ?>' >
						<span class='text-danger'><?php  echo form_error('event_web_link_details'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_start_date') ?></label>
						<input type='text' class='form-control'   name='events_start_date' placeholder='<?php echo $this->lang->line('events_events_start_date') ?>' >
						<span class='text-danger'><?php  echo form_error('events_start_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_start_time') ?></label>
						<input type='text' class='form-control'   name='events_start_time' placeholder='<?php echo $this->lang->line('events_events_start_time') ?>' >
						<span class='text-danger'><?php  echo form_error('events_start_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_any_ending_date') ?></label>
						<input type='text' class='form-control'   name='events_any_ending_date' placeholder='<?php echo $this->lang->line('events_events_any_ending_date') ?>' >
						<span class='text-danger'><?php  echo form_error('events_any_ending_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_end_date') ?></label>
						<input type='text' class='form-control'   name='events_end_date' placeholder='<?php echo $this->lang->line('events_events_end_date') ?>' >
						<span class='text-danger'><?php  echo form_error('events_end_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_end_time') ?></label>
						<input type='text' class='form-control'   name='events_end_time' placeholder='<?php echo $this->lang->line('events_events_end_time') ?>' >
						<span class='text-danger'><?php  echo form_error('events_end_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_created_admin_panel_login_id') ?></label>
						<input type='text' class='form-control'   name='events_created_admin_panel_login_id' placeholder='<?php echo $this->lang->line('events_events_created_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('events_created_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_edited_admin_panel_login_id') ?></label>
						<input type='text' class='form-control'   name='events_edited_admin_panel_login_id' placeholder='<?php echo $this->lang->line('events_events_edited_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('events_edited_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_created_date_time') ?></label>
						<input type='text' class='form-control'   name='events_created_date_time' placeholder='<?php echo $this->lang->line('events_events_created_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('events_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_edited_date_time') ?></label>
						<input type='text' class='form-control'   name='events_edited_date_time' placeholder='<?php echo $this->lang->line('events_events_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('events_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('events_events_active') ?></label>
						<input type='text' class='form-control'   name='events_active' placeholder='<?php echo $this->lang->line('events_events_active') ?>' >
						<span class='text-danger'><?php  echo form_error('events_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
