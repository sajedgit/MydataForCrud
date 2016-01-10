<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $title;  ?>
			</div>
			
			
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
		   <table class="table">
			 
			  <thead>
				 <tr>
					<th><?php echo $this->lang->line('column') ?></th>
					<th><?php echo $this->lang->line('value') ?></th>
				 </tr>
			  </thead>
			  <tbody>
				 <tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_attached_file_ref_news_attached_file_news_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_news_attached_file_news_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_attached_file_news_attached_file_extension') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_attached_file_extension;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_attached_file_news_attached_file_storage_base_path_android') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_attached_file_storage_base_path_android;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_attached_file_news_attached_file_storage_base_path_ios') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_attached_file_storage_base_path_ios;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_attached_file_news_attached_file_name_as_saved') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_attached_file_name_as_saved;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_attached_file_news_attached_file_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_attached_file_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	