	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_user_details');
				echo form_open("UserDetails/create_user_details", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_ref_user_details_user_type_id') ?></label>
						<input type='text' class='form-control'   name='ref_user_details_user_type_id' placeholder='<?php echo $this->lang->line('user_details_ref_user_details_user_type_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_user_details_user_type_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_ref_user_details_studio_details_id') ?></label>
						<input type='text' class='form-control'   name='ref_user_details_studio_details_id' placeholder='<?php echo $this->lang->line('user_details_ref_user_details_studio_details_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_user_details_studio_details_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_first_name') ?></label>
						<input type='text' class='form-control'   name='user_details_first_name' placeholder='<?php echo $this->lang->line('user_details_user_details_first_name') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_first_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_last_name') ?></label>
						<input type='text' class='form-control'   name='user_details_last_name' placeholder='<?php echo $this->lang->line('user_details_user_details_last_name') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_last_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_user_name') ?></label>
						<input type='text' class='form-control'   name='user_details_user_name' placeholder='<?php echo $this->lang->line('user_details_user_details_user_name') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_user_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_password_hash_value') ?></label>
						<input type='text' class='form-control'   name='user_details_password_hash_value' placeholder='<?php echo $this->lang->line('user_details_user_details_password_hash_value') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_password_hash_value'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_sex') ?></label>
						<input type='text' class='form-control'   name='user_details_sex' placeholder='<?php echo $this->lang->line('user_details_user_details_sex') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_sex'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_birth_date') ?></label>
						<input type='text' class='form-control'   name='user_details_birth_date' placeholder='<?php echo $this->lang->line('user_details_user_details_birth_date') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_birth_date'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_city') ?></label>
						<input type='text' class='form-control'   name='user_details_city' placeholder='<?php echo $this->lang->line('user_details_user_details_city') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_city'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_post_code') ?></label>
						<input type='text' class='form-control'   name='user_details_post_code' placeholder='<?php echo $this->lang->line('user_details_user_details_post_code') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_post_code'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_country') ?></label>
						<input type='text' class='form-control'   name='user_details_country' placeholder='<?php echo $this->lang->line('user_details_user_details_country') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_country'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_email_address') ?></label>
						<input type='text' class='form-control'   name='user_details_email_address' placeholder='<?php echo $this->lang->line('user_details_user_details_email_address') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_email_address'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_cell_phone') ?></label>
						<input type='text' class='form-control'   name='user_details_cell_phone' placeholder='<?php echo $this->lang->line('user_details_user_details_cell_phone') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_cell_phone'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_created_edited_date_time') ?></label>
						<input type='text' class='form-control'   name='user_details_created_edited_date_time' placeholder='<?php echo $this->lang->line('user_details_user_details_created_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_created_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('user_details_user_details_active') ?></label>
						<input type='text' class='form-control'   name='user_details_active' placeholder='<?php echo $this->lang->line('user_details_user_details_active') ?>' >
						<span class='text-danger'><?php  echo form_error('user_details_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
