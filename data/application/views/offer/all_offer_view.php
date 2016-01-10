	


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
   								<th><?php echo $this->lang->line('offer_offer_title') ?></th>
   								<th><?php echo $this->lang->line('offer_offer_details') ?></th>
   								<th><?php echo $this->lang->line('offer_offer_any_ending_date') ?></th>
   								<th><?php echo $this->lang->line('offer_offer_starting_date') ?></th>
    							<!--	<th><?php echo $this->lang->line('offer_offer_starting_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_ending_date') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_ending_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_is_push_message') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_created_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_created_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_edited_admin_panel_login_id') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_edited_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_send_now') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_send_later') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_send_later_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_is_already_sent') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_sending_date_time') ?></th>	-->
    							<!--	<th><?php echo $this->lang->line('offer_offer_active') ?></th>	-->

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
									<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_title;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_details;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_any_ending_date;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_starting_date;  ?></td>
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_starting_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_ending_date;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_ending_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_is_push_message;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_created_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_created_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_edited_admin_panel_login_id;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_edited_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_send_now;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_send_later;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_send_later_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_is_already_sent;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_sending_date_time;  ?></td>	-->
							<!--	<td class='col-md-3 col-lg-3'>  <?php echo $row->offer_active;  ?></td>	-->

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_offer/<?php echo $row->offer_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_offer/<?php echo $row->offer_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_offer/<?php echo $row->offer_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





