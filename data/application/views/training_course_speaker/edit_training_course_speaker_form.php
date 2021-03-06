	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_training_course_speaker');
				echo form_open("edit_training_course_speaker/$edit_query_result->training_course_speaker_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_ref_training_course_speaker_training_course_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_training_course_speaker_training_course_id; ?>'  name='ref_training_course_speaker_training_course_id' placeholder='<?php echo $this->lang->line('training_course_speaker_ref_training_course_speaker_training_course_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_training_course_speaker_training_course_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_training_course_speaker_full_name') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->training_course_speaker_full_name; ?>'  name='training_course_speaker_full_name' placeholder='<?php echo $this->lang->line('training_course_speaker_training_course_speaker_full_name') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_speaker_full_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_training_course_speaker_has_any_image') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->training_course_speaker_has_any_image; ?>'  name='training_course_speaker_has_any_image' placeholder='<?php echo $this->lang->line('training_course_speaker_training_course_speaker_has_any_image') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_speaker_has_any_image'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_android') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->training_course_speaker_image_storage_base_path_android; ?>'  name='training_course_speaker_image_storage_base_path_android' placeholder='<?php echo $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_android') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_speaker_image_storage_base_path_android'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_ios') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->training_course_speaker_image_storage_base_path_ios; ?>'  name='training_course_speaker_image_storage_base_path_ios' placeholder='<?php echo $this->lang->line('training_course_speaker_training_course_speaker_image_storage_base_path_ios') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_speaker_image_storage_base_path_ios'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_training_course_speaker_image_name_as_saved') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->training_course_speaker_image_name_as_saved; ?>'  name='training_course_speaker_image_name_as_saved' placeholder='<?php echo $this->lang->line('training_course_speaker_training_course_speaker_image_name_as_saved') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_speaker_image_name_as_saved'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_speaker_training_course_speaker_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->training_course_speaker_active; ?>'  name='training_course_speaker_active' placeholder='<?php echo $this->lang->line('training_course_speaker_training_course_speaker_active') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_speaker_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
