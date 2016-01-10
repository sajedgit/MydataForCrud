	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_studio_details');
				echo form_open("StudioDetails/create_studio_details", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_client_code') ?></label>
						<input type='text' class='form-control'   name='studio_details_client_code' placeholder='<?php echo $this->lang->line('studio_details_studio_details_client_code') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_client_code'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_name') ?></label>
						<input type='text' class='form-control'   name='studio_details_name' placeholder='<?php echo $this->lang->line('studio_details_studio_details_name') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_license_piva') ?></label>
						<input type='text' class='form-control'   name='studio_details_license_piva' placeholder='<?php echo $this->lang->line('studio_details_studio_details_license_piva') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_license_piva'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_password') ?></label>
						<input type='text' class='form-control'   name='studio_details_password' placeholder='<?php echo $this->lang->line('studio_details_studio_details_password') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_password'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_flag_block') ?></label>
						<input type='text' class='form-control'   name='studio_details_flag_block' placeholder='<?php echo $this->lang->line('studio_details_studio_details_flag_block') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_flag_block'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_operating_systems') ?></label>
						<input type='text' class='form-control'   name='studio_details_operating_systems' placeholder='<?php echo $this->lang->line('studio_details_studio_details_operating_systems') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_operating_systems'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_branch_location_id') ?></label>
						<input type='text' class='form-control'   name='studio_details_branch_location_id' placeholder='<?php echo $this->lang->line('studio_details_studio_details_branch_location_id') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_branch_location_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_all_email_address') ?></label>
						<input type='text' class='form-control'   name='studio_details_all_email_address' placeholder='<?php echo $this->lang->line('studio_details_studio_details_all_email_address') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_all_email_address'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_blance') ?></label>
						<input type='text' class='form-control'   name='studio_details_blance' placeholder='<?php echo $this->lang->line('studio_details_studio_details_blance') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_blance'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_all_services_list') ?></label>
						<input type='text' class='form-control'   name='studio_details_all_services_list' placeholder='<?php echo $this->lang->line('studio_details_studio_details_all_services_list') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_all_services_list'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_active') ?></label>
						<input type='text' class='form-control'   name='studio_details_active' placeholder='<?php echo $this->lang->line('studio_details_studio_details_active') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_active'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_details_studio_details_last_updated_date_time') ?></label>
						<input type='text' class='form-control'   name='studio_details_last_updated_date_time' placeholder='<?php echo $this->lang->line('studio_details_studio_details_last_updated_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('studio_details_last_updated_date_time'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
