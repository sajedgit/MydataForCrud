	


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
   								<th><?php echo $this->lang->line('events_events_name') ?></th>
   								<th><?php echo $this->lang->line('events_events_description') ?></th>
   								<th><?php echo $this->lang->line('events_event_any_web_link') ?></th>
   								<th><?php echo $this->lang->line('events_event_web_link_details') ?></th>
    							<!--	<th><?php echo $this->lang->line('events_events_start_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_start_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_any_ending_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_end_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_end_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_created_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_edited_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_created_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_edited_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('events_events_active') ?></th>	-->

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
									<td class='col-md-3 col-lg-3'>  <?php echo $row->events_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->events_description;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->event_any_web_link;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->event_web_link_details;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_start_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_start_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_any_ending_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_end_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_end_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_created_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_edited_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_created_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_edited_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->events_active;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_events/<?php echo $row->events_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_events/<?php echo $row->events_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_events/<?php echo $row->events_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





