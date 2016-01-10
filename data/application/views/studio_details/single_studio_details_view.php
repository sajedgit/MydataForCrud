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
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_client_code') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_client_code;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_license_piva') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_license_piva;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_password') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_password;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_flag_block') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_flag_block;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_operating_systems') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_operating_systems;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_branch_location_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_branch_location_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_all_email_address') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_all_email_address;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_blance') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_blance;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_all_services_list') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_all_services_list;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_active;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_details_studio_details_last_updated_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->studio_details_last_updated_date_time;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	