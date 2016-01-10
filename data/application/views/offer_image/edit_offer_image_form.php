	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_offer_image');
				echo form_open("edit_offer_image/$edit_query_result->offer_image_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_ref_offer_image_offer_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_offer_image_offer_id; ?>'  name='ref_offer_image_offer_id' placeholder='<?php echo $this->lang->line('offer_image_ref_offer_image_offer_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_offer_image_offer_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_product_name') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_product_name; ?>'  name='offer_image_product_name' placeholder='<?php echo $this->lang->line('offer_image_offer_image_product_name') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_product_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_product_description') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_product_description; ?>'  name='offer_image_product_description' placeholder='<?php echo $this->lang->line('offer_image_offer_image_product_description') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_product_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_extension') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_extension; ?>'  name='offer_image_extension' placeholder='<?php echo $this->lang->line('offer_image_offer_image_extension') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_extension'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_storage_base_path_android') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_storage_base_path_android; ?>'  name='offer_image_storage_base_path_android' placeholder='<?php echo $this->lang->line('offer_image_offer_image_storage_base_path_android') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_storage_base_path_android'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_storage_base_path_ios') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_storage_base_path_ios; ?>'  name='offer_image_storage_base_path_ios' placeholder='<?php echo $this->lang->line('offer_image_offer_image_storage_base_path_ios') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_storage_base_path_ios'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_name_as_saved') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_name_as_saved; ?>'  name='offer_image_name_as_saved' placeholder='<?php echo $this->lang->line('offer_image_offer_image_name_as_saved') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_name_as_saved'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_is_display_image') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_is_display_image; ?>'  name='offer_image_is_display_image' placeholder='<?php echo $this->lang->line('offer_image_offer_image_is_display_image') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_is_display_image'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_image_offer_image_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->offer_image_active; ?>'  name='offer_image_active' placeholder='<?php echo $this->lang->line('offer_image_offer_image_active') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_image_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
