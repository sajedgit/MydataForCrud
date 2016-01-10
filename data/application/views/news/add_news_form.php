	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo $title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				$attributes = array('method' => 'POST', 'id' => 'form_news');
				echo form_open("News/create_news", $attributes);
				?>
					<?php if (isset($message)) : ?>
						<h1 class="text-center text-success"><?php echo $this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_title') ?></label>
						<input type='text' class='form-control'   name='news_title' placeholder='<?php echo $this->lang->line('news_news_title') ?>' >
						<span class='text-danger'><?php  echo form_error('news_title'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_description') ?></label>
						<input type='text' class='form-control'   name='news_description' placeholder='<?php echo $this->lang->line('news_news_description') ?>' >
						<span class='text-danger'><?php  echo form_error('news_description'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_created_admin_panel_login_id') ?></label>
						<input type='text' class='form-control'   name='news_created_admin_panel_login_id' placeholder='<?php echo $this->lang->line('news_news_created_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('news_created_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_created_date_time') ?></label>
						<input type='text' class='form-control'   name='news_created_date_time' placeholder='<?php echo $this->lang->line('news_news_created_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('news_created_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_edited_admin_panel_login_id') ?></label>
						<input type='text' class='form-control'   name='news_edited_admin_panel_login_id' placeholder='<?php echo $this->lang->line('news_news_edited_admin_panel_login_id') ?>' >
						<span class='text-danger'><?php  echo form_error('news_edited_admin_panel_login_id'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_edited_date_time') ?></label>
						<input type='text' class='form-control'   name='news_edited_date_time' placeholder='<?php echo $this->lang->line('news_news_edited_date_time') ?>' >
						<span class='text-danger'><?php  echo form_error('news_edited_date_time'); ?></span>
					</div>
<div class='form-group'>
						<label><?php echo $this->lang->line('news_news_active') ?></label>
						<input type='text' class='form-control'   name='news_active' placeholder='<?php echo $this->lang->line('news_news_active') ?>' >
						<span class='text-danger'><?php  echo form_error('news_active'); ?></span>
					</div>

				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
