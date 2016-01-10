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
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_title') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_title;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_details') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_details;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_any_ending_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_any_ending_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_starting_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_starting_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_starting_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_starting_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_ending_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_ending_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_ending_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_ending_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_is_push_message') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_is_push_message;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_created_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_created_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_created_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_created_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_edited_admin_panel_login_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_edited_admin_panel_login_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_send_now') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_send_now;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_send_later') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_send_later;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_send_later_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_send_later_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_is_already_sent') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_is_already_sent;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_sending_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_sending_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_offer_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	