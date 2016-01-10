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
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_ref_user_details_user_type_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_user_details_user_type_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_ref_user_details_studio_details_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_user_details_studio_details_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_first_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_first_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_last_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_last_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_user_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_user_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_password_hash_value') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_password_hash_value;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_sex') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_sex;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_birth_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_birth_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_city') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_city;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_post_code') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_post_code;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_country') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_country;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_email_address') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_email_address;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_cell_phone') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_cell_phone;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_created_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_created_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('user_details_user_details_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->user_details_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	