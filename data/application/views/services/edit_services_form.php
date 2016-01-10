	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_services');
				echo form_open("edit_services/$edit_query_result->services_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('services_services_code') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_code; ?>'  name='services_code' placeholder='<?php echo $this->lang->line('services_services_code') ?>' >
						<span class='text-danger'><?php  echo form_error('services_code'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_services_name') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_name; ?>'  name='services_name' placeholder='<?php echo $this->lang->line('services_services_name') ?>' >
						<span class='text-danger'><?php  echo form_error('services_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_services_details') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_details; ?>'  name='services_details' placeholder='<?php echo $this->lang->line('services_services_details') ?>' >
						<span class='text-danger'><?php  echo form_error('services_details'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('services_services_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->services_active; ?>'  name='services_active' placeholder='<?php echo $this->lang->line('services_services_active') ?>' >
						<span class='text-danger'><?php  echo form_error('services_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
