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
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_title') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_title;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_description') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_description;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_created_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_created_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_created_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_created_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_edited_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_edited_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('news_news_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->news_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	