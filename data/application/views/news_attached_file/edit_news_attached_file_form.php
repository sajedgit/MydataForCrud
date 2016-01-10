	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_news_attached_file');
				echo form_open("edit_news_attached_file/$edit_query_result->news_attached_file_id", $attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>

					<div class='form-group'>
						<label><?php echo $this->lang->line('news_attached_file_ref_news_attached_file_news_id') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->ref_news_attached_file_news_id; ?>'  name='ref_news_attached_file_news_id' placeholder='<?php echo $this->lang->line('news_attached_file_ref_news_attached_file_news_id') ?>' >
						<span class='text-danger'><?php  echo form_error('ref_news_attached_file_news_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_attached_file_news_attached_file_extension') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->news_attached_file_extension; ?>'  name='news_attached_file_extension' placeholder='<?php echo $this->lang->line('news_attached_file_news_attached_file_extension') ?>' >
						<span class='text-danger'><?php  echo form_error('news_attached_file_extension'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_attached_file_news_attached_file_storage_base_path_android') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->news_attached_file_storage_base_path_android; ?>'  name='news_attached_file_storage_base_path_android' placeholder='<?php echo $this->lang->line('news_attached_file_news_attached_file_storage_base_path_android') ?>' >
						<span class='text-danger'><?php  echo form_error('news_attached_file_storage_base_path_android'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_attached_file_news_attached_file_storage_base_path_ios') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->news_attached_file_storage_base_path_ios; ?>'  name='news_attached_file_storage_base_path_ios' placeholder='<?php echo $this->lang->line('news_attached_file_news_attached_file_storage_base_path_ios') ?>' >
						<span class='text-danger'><?php  echo form_error('news_attached_file_storage_base_path_ios'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_attached_file_news_attached_file_name_as_saved') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->news_attached_file_name_as_saved; ?>'  name='news_attached_file_name_as_saved' placeholder='<?php echo $this->lang->line('news_attached_file_news_attached_file_name_as_saved') ?>' >
						<span class='text-danger'><?php  echo form_error('news_attached_file_name_as_saved'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_attached_file_news_attached_file_active') ?></label>
						<input type='text' class='form-control' value='<?php echo $edit_query_result->news_attached_file_active; ?>'  name='news_attached_file_active' placeholder='<?php echo $this->lang->line('news_attached_file_news_attached_file_active') ?>' >
						<span class='text-danger'><?php  echo form_error('news_attached_file_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
