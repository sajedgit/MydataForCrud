	


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
   								<th><?php echo $this->lang->line('services_update_ref_services_update_services_id') ?></th>
   								<th><?php echo $this->lang->line('services_update_services_update_title') ?></th>
   								<th><?php echo $this->lang->line('services_update_services_update_details') ?></th>
   								<th><?php echo $this->lang->line('services_update_services_update_link') ?></th>
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_has_any_available_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_available_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_is_push_message') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_created_by_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_created_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_edited_by_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_edited_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_send_now') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_send_later_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_is_already_sent') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_sending_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('services_update_services_update_active') ?></th>	-->

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
									<td class='col-md-3 col-lg-3'>  <?php echo $row->ref_services_update_services_id;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_title;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_details;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_link;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_has_any_available_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_available_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_is_push_message;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_created_by_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_created_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_edited_by_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_edited_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_send_now;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_send_later_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_is_already_sent;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_sending_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->services_update_active;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_services_update/<?php echo $row->services_update_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_services_update/<?php echo $row->services_update_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_services_update/<?php echo $row->services_update_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





