	


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $title;  ?>
			</div>
				<h1 class="text-center text-success"><?php echo $this->session->flashdata('msg'); ?></h1>	
			<div class="panel-body">
				<div class="table-responsive">
  					<table class="table table-hover">
    						<thead>
    							<tr>
   								<th><?php echo $this->lang->line('user_details_ref_user_details_user_type_id') ?></th>
   								<th><?php echo $this->lang->line('user_details_ref_user_details_studio_details_id') ?></th>
   								<th><?php echo $this->lang->line('user_details_user_details_first_name') ?></th>
   								<th><?php echo $this->lang->line('user_details_user_details_last_name') ?></th>
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_user_name') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_password_hash_value') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_sex') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_birth_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_city') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_post_code') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_country') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_email_address') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_cell_phone') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_created_edited_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('user_details_user_details_active') ?></th>	-->

								<th></th>
    							</tr>
    						</thead>
    						<tbody>
								<tr>
    								<td><input type="text" class="form-control" placeholder=""/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td><input type="hidden" class="form-control"/></td>
    								<td>
    								</td>
    							</tr>
								<?php foreach ($query_result as $row): ?>
    							<tr>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->ref_user_details_user_type_id;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->ref_user_details_studio_details_id;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_first_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_last_name;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_user_name;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_password_hash_value;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_sex;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_birth_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_city;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_post_code;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_country;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_email_address;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_cell_phone;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_created_edited_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->user_details_active;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_user_details/<?php echo $row->user_details_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_user_details/<?php echo $row->user_details_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_user_details/<?php echo $row->user_details_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
									</td>
    							</tr>
		
								<?php endforeach;	?>
								
							
								
    						</tbody>
  					</table>
				</div>
			</div>
			
			<div class="panel-footer"><?php echo $paging->create_links(); ?>	</div>
		</div>
		
		
		
	</div>
</div>		





