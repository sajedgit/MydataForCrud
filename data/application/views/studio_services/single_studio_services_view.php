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
					<td class='col-lg-3'><?php echo $this->lang->line('studio_services_ref_studio_services_studio_details_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_studio_services_studio_details_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_services_ref_studio_services_services_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_studio_services_services_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('studio_services_services_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->services_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	