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
					<td class='col-lg-3'><?php echo $this->lang->line('message_ref_message_message_type_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_message_message_type_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_title') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_title;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_details') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_details;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_any_ending_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_any_ending_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_ending_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_ending_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_is_push_message') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_is_push_message;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_created_by_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_created_by_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_created_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_created_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_edited_by_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_edited_by_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_send_now') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_send_now;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_send_later_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_send_later_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_is_already_sent') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_is_already_sent;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_sending_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_sending_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('message_message_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->message_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	