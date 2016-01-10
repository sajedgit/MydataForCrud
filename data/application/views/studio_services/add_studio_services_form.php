	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_studio_services');
				echo form_open("StudioServices/create_studio_services", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('studio_services_ref_studio_services_studio_details_id') ?></label>
						<input type='text' class='form-control'   name='ref_studio_services_studio_details_id' placeholder='<?php echo $this->lang->line('studio_services_ref_studio_services_studio_details_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_studio_services_studio_details_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_services_ref_studio_services_services_id') ?></label>
						<input type='text' class='form-control'   name='ref_studio_services_services_id' placeholder='<?php echo $this->lang->line('studio_services_ref_studio_services_services_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_studio_services_services_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_services_services_active') ?></label>
						<input type='text' class='form-control'   name='services_active' placeholder='<?php echo $this->lang->line('studio_services_services_active') ?>' >
						<span class='text-danger'><?php  echo form_error('services_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
