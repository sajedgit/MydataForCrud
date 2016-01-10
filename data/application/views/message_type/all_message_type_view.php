	


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
   								<th><?php echo $this->lang->line('message_type_message_type_name') ?></th>
   								<th><?php echo $this->lang->line('message_type_message_type_description') ?></th>
   								<th><?php echo $this->lang->line('message_type_message_type_active') ?></th>

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
									<td class='col-md-3 col-lg-3'>  <?php echo $row->message_type_name;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->message_type_description;  ?></td>
									<td class='col-md-3 col-lg-3'>  <?php echo $row->message_type_active;  ?></td>

    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>edit_message_type/<?php echo $row->message_type_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>delete_message_type/<?php echo $row->message_type_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>view_message_type/<?php echo $row->message_type_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
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





