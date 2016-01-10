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
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_user_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_user_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_password_hash_value') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_password_hash_value;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_sex') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_sex;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_birth_date') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_birth_date;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_city') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_city;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_post_code') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_post_code;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_country') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_country;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_email_address') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_email_address;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_cell_phone') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_cell_phone;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_created_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_created_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('admin_panel_login_admin_panel_login_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->admin_panel_login_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	