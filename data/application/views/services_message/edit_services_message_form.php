	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_services_message');
				echo form_open("edit_services_message/$edit_query_result->services_message_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('services_message_ref_services_message_message_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_services_message_message_id; ?>'  name='ref_services_message_message_id' placeholder='<?php echo $this->lang->line('services_message_ref_services_message_message_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_services_message_message_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_message_ref_services_message_services_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_services_message_services_id; ?>'  name='ref_services_message_services_id' placeholder='<?php echo $this->lang->line('services_message_ref_services_message_services_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_services_message_services_id'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
