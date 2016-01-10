	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_training_course_type');
				echo form_open("TrainingCourseType/create_training_course_type", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_type_training_course_type_name') ?></label>
						<input type='text' class='form-control'   name='training_course_type_name' placeholder='<?php echo $this->lang->line('training_course_type_training_course_type_name') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_type_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_type_training_course_type_description') ?></label>
						<input type='text' class='form-control'   name='training_course_type_description' placeholder='<?php echo $this->lang->line('training_course_type_training_course_type_description') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_type_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('training_course_type_training_course_type_active') ?></label>
						<input type='text' class='form-control'   name='training_course_type_active' placeholder='<?php echo $this->lang->line('training_course_type_training_course_type_active') ?>' >
						<span class='text-danger'><?php  echo form_error('training_course_type_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
