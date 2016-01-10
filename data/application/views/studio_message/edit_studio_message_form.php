	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_studio_message');
				echo form_open("edit_studio_message/$edit_query_result->studio_message_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('studio_message_ref_studio_message_message_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_studio_message_message_id; ?>'  name='ref_studio_message_message_id' placeholder='<?php echo $this->lang->line('studio_message_ref_studio_message_message_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_studio_message_message_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('studio_message_ref_studio_message_studio_details_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_studio_message_studio_details_id; ?>'  name='ref_studio_message_studio_details_id' placeholder='<?php echo $this->lang->line('studio_message_ref_studio_message_studio_details_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_studio_message_studio_details_id'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
