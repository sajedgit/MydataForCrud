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
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_ref_services_update_services_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_services_update_services_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_title') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_title;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_details') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_details;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_link') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_link;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_has_any_available_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_has_any_available_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_available_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_available_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_is_push_message') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_is_push_message;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_created_by_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_created_by_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_created_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_created_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_edited_by_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_edited_by_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_send_now') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_send_now;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_send_later_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_send_later_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_is_already_sent') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_is_already_sent;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_sending_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_sending_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('services_update_services_update_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_update_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	