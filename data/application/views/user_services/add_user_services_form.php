	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_user_services');
				echo form_open("UserServices/create_user_services", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('user_services_ref_user_services_user_details_id') ?></label>
						<input type='text' class='form-control'   name='ref_user_services_user_details_id' placeholder='<?php echo $this->lang->line('user_services_ref_user_services_user_details_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_user_services_user_details_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_services_ref_user_services_services_id') ?></label>
						<input type='text' class='form-control'   name='ref_user_services_services_id' placeholder='<?php echo $this->lang->line('user_services_ref_user_services_services_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_user_services_services_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_services_user_services_added_by') ?></label>
						<input type='text' class='form-control'   name='user_services_added_by' placeholder='<?php echo $this->lang->line('user_services_user_services_added_by') ?>' >
						<span class='text-danger'><?php  echo form_error('user_services_added_by'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_services_user_services_active') ?></label>
						<input type='text' class='form-control'   name='user_services_active' placeholder='<?php echo $this->lang->line('user_services_user_services_active') ?>' >
						<span class='text-danger'><?php  echo form_error('user_services_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
