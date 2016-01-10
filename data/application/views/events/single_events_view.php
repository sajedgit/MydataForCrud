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
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_description') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_description;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_event_any_web_link') ?></td>
					<td class='col-lg-9'><?php echo $query_result->event_any_web_link;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_event_web_link_details') ?></td>
					<td class='col-lg-9'><?php echo $query_result->event_web_link_details;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_start_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_start_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_start_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_start_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_any_ending_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_any_ending_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_end_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_end_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_end_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_end_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_created_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_created_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_edited_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_edited_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_created_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_created_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('events_events_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->events_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	