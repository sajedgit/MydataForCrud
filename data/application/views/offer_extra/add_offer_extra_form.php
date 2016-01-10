	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_offer_extra');
				echo form_open("OfferExtra/create_offer_extra", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('offer_extra_ref_offer_extra_offer_id') ?></label>
						<input type='text' class='form-control'   name='ref_offer_extra_offer_id' placeholder='<?php echo $this->lang->line('offer_extra_ref_offer_extra_offer_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_offer_extra_offer_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_extra_offer_extra_attribute_name') ?></label>
						<input type='text' class='form-control'   name='offer_extra_attribute_name' placeholder='<?php echo $this->lang->line('offer_extra_offer_extra_attribute_name') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_extra_attribute_name'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_extra_offer_extra_attribute_value') ?></label>
						<input type='text' class='form-control'   name='offer_extra_attribute_value' placeholder='<?php echo $this->lang->line('offer_extra_offer_extra_attribute_value') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_extra_attribute_value'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_extra_offer_extra_created_edited_date_time') ?></label>
						<input type='text' class='form-control'   name='offer_extra_created_edited_date_time' placeholder='<?php echo $this->lang->line('offer_extra_offer_extra_created_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_extra_created_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('offer_extra_offer_extra_active') ?></label>
						<input type='text' class='form-control'   name='offer_extra_active' placeholder='<?php echo $this->lang->line('offer_extra_offer_extra_active') ?>' >
						<span class='text-danger'><?php  echo form_error('offer_extra_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
