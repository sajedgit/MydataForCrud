	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_message_type');
				echo form_open("edit_message_type/$edit_query_result->message_type_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('message_type_message_type_name') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_type_name; ?>'  name='message_type_name' placeholder='<?php echo $this->lang->line('message_type_message_type_name') ?>' >
						<span class='text-danger'><?php  echo form_error('message_type_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_type_message_type_description') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_type_description; ?>'  name='message_type_description' placeholder='<?php echo $this->lang->line('message_type_message_type_description') ?>' >
						<span class='text-danger'><?php  echo form_error('message_type_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('message_type_message_type_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->message_type_active; ?>'  name='message_type_active' placeholder='<?php echo $this->lang->line('message_type_message_type_active') ?>' >
						<span class='text-danger'><?php  echo form_error('message_type_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
