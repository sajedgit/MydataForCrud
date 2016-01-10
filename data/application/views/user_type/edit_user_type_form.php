	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_user_type');
				echo form_open("edit_user_type/$edit_query_result->user_type_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('user_type_user_type_name') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_type_name; ?>'  name='user_type_name' placeholder='<?php echo $this->lang->line('user_type_user_type_name') ?>' >
						<span class='text-danger'><?php  echo form_error('user_type_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_type_user_type_description') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_type_description; ?>'  name='user_type_description' placeholder='<?php echo $this->lang->line('user_type_user_type_description') ?>' >
						<span class='text-danger'><?php  echo form_error('user_type_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_type_user_type_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->user_type_active; ?>'  name='user_type_active' placeholder='<?php echo $this->lang->line('user_type_user_type_active') ?>' >
						<span class='text-danger'><?php  echo form_error('user_type_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
