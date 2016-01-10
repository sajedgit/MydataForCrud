	


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
   								<th><?php echo $this->lang->line('studio_details_studio_details_client_code') ?></th>
   								<th><?php echo $this->lang->line('studio_details_studio_details_name') ?></th>
   								<th><?php echo $this->lang->line('studio_details_studio_details_license_piva') ?></th>
   								<th><?php echo $this->lang->line('studio_details_studio_details_password') ?></th>
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_flag_block') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_operating_systems') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_branch_location_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_all_email_address') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_blance') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_all_services_list') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_active') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('studio_details_studio_details_last_updated_date_time') ?></th>	-->

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
									<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_client_code;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_license_piva;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_password;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_flag_block;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_operating_systems;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_branch_location_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_all_email_address;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_blance;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_all_services_list;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_active;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->studio_details_last_updated_date_time;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_studio_details/<?php echo $row->studio_details_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_studio_details/<?php echo $row->studio_details_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_studio_details/<?php echo $row->studio_details_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





