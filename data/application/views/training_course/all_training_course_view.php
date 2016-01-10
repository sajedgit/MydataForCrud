	


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
   								<th><?php echo $this->lang->line('training_course_ref_training_course_training_course_type_id') ?></th>
   								<th><?php echo $this->lang->line('training_course_training_course_only_attached_file_details') ?></th>
   								<th><?php echo $this->lang->line('training_course_training_course_only_attached_file_location') ?></th>
   								<th><?php echo $this->lang->line('training_course_training_course_any_web_link') ?></th>
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_web_link') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_title') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_overview') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_outline') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_has_already_date_time_duration') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_orientation_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_starting_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_ending_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_location') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_last_registration_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_total_class_no') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_days_name_in_week') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_per_class_duration') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_days_start_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_days_end_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_ref_training_course_created_by_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_created_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_ref_training_course_edited_by_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_edited_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('training_course_training_course_active') ?></th>	-->

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
									<td class='col-md-3 col-lg-3'>  <?php echo $row->ref_training_course_training_course_type_id;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_only_attached_file_details;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_only_attached_file_location;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_any_web_link;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_web_link;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_title;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_overview;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_outline;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_has_already_date_time_duration;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_orientation_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_starting_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_ending_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_location;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_last_registration_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_total_class_no;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_days_name_in_week;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_per_class_duration;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_days_start_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_days_end_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->ref_training_course_created_by_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_created_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->ref_training_course_edited_by_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_edited_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->training_course_active;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_training_course/<?php echo $row->training_course_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_training_course/<?php echo $row->training_course_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_training_course/<?php echo $row->training_course_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





