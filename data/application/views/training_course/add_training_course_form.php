	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_training_course');
				echo form_open("TrainingCourse/create_training_course", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_ref_training_course_training_course_type_id') ?></label>
						<input type='text' class='form-control'   name='ref_training_course_training_course_type_id' placeholder='<?php echo $this->lang->line('training_course_ref_training_course_training_course_type_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_training_course_training_course_type_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_only_attached_file_details') ?></label>
						<input type='text' class='form-control'   name='training_course_only_attached_file_details' placeholder='<?php echo $this->lang->line('training_course_training_course_only_attached_file_details') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_only_attached_file_details'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_only_attached_file_location') ?></label>
						<input type='text' class='form-control'   name='training_course_only_attached_file_location' placeholder='<?php echo $this->lang->line('training_course_training_course_only_attached_file_location') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_only_attached_file_location'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_any_web_link') ?></label>
						<input type='text' class='form-control'   name='training_course_any_web_link' placeholder='<?php echo $this->lang->line('training_course_training_course_any_web_link') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_any_web_link'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_web_link') ?></label>
						<input type='text' class='form-control'   name='training_course_web_link' placeholder='<?php echo $this->lang->line('training_course_training_course_web_link') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_web_link'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_title') ?></label>
						<input type='text' class='form-control'   name='training_course_title' placeholder='<?php echo $this->lang->line('training_course_training_course_title') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_overview') ?></label>
						<input type='text' class='form-control'   name='training_course_overview' placeholder='<?php echo $this->lang->line('training_course_training_course_overview') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_overview'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_outline') ?></label>
						<input type='text' class='form-control'   name='training_course_outline' placeholder='<?php echo $this->lang->line('training_course_training_course_outline') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_outline'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_has_already_date_time_duration') ?></label>
						<input type='text' class='form-control'   name='training_course_has_already_date_time_duration' placeholder='<?php echo $this->lang->line('training_course_training_course_has_already_date_time_duration') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_has_already_date_time_duration'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_orientation_date_time') ?></label>
						<input type='text' class='form-control'   name='training_course_orientation_date_time' placeholder='<?php echo $this->lang->line('training_course_training_course_orientation_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_orientation_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_starting_date_time') ?></label>
						<input type='text' class='form-control'   name='training_course_starting_date_time' placeholder='<?php echo $this->lang->line('training_course_training_course_starting_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_starting_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_ending_date_time') ?></label>
						<input type='text' class='form-control'   name='training_course_ending_date_time' placeholder='<?php echo $this->lang->line('training_course_training_course_ending_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_ending_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_location') ?></label>
						<input type='text' class='form-control'   name='training_course_location' placeholder='<?php echo $this->lang->line('training_course_training_course_location') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_location'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_last_registration_date_time') ?></label>
						<input type='text' class='form-control'   name='training_course_last_registration_date_time' placeholder='<?php echo $this->lang->line('training_course_training_course_last_registration_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_last_registration_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_total_class_no') ?></label>
						<input type='text' class='form-control'   name='training_course_total_class_no' placeholder='<?php echo $this->lang->line('training_course_training_course_total_class_no') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_total_class_no'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_days_name_in_week') ?></label>
						<input type='text' class='form-control'   name='training_course_days_name_in_week' placeholder='<?php echo $this->lang->line('training_course_training_course_days_name_in_week') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_days_name_in_week'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_per_class_duration') ?></label>
						<input type='text' class='form-control'   name='training_course_per_class_duration' placeholder='<?php echo $this->lang->line('training_course_training_course_per_class_duration') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_per_class_duration'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_days_start_time') ?></label>
						<input type='text' class='form-control'   name='training_course_days_start_time' placeholder='<?php echo $this->lang->line('training_course_training_course_days_start_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_days_start_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_days_end_time') ?></label>
						<input type='text' class='form-control'   name='training_course_days_end_time' placeholder='<?php echo $this->lang->line('training_course_training_course_days_end_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_days_end_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_ref_training_course_created_by_admin_panel_login_id') ?></label>
						<input type='text' class='form-control'   name='ref_training_course_created_by_admin_panel_login_id' placeholder='<?php echo $this->lang->line('training_course_ref_training_course_created_by_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_training_course_created_by_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_created_date_time') ?></label>
						<input type='text' class='form-control'   name='training_course_created_date_time' placeholder='<?php echo $this->lang->line('training_course_training_course_created_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_ref_training_course_edited_by_admin_panel_login_id') ?></label>
						<input type='text' class='form-control'   name='ref_training_course_edited_by_admin_panel_login_id' placeholder='<?php echo $this->lang->line('training_course_ref_training_course_edited_by_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_training_course_edited_by_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_edited_date_time') ?></label>
						<input type='text' class='form-control'   name='training_course_edited_date_time' placeholder='<?php echo $this->lang->line('training_course_training_course_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_training_course_active') ?></label>
						<input type='text' class='form-control'   name='training_course_active' placeholder='<?php echo $this->lang->line('training_course_training_course_active') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
