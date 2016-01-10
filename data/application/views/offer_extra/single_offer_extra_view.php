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
					<td class='col-lg-3'><?php echo $this->lang->line('offer_extra_ref_offer_extra_offer_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_offer_extra_offer_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_extra_offer_extra_attribute_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_extra_attribute_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_extra_offer_extra_attribute_value') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_extra_attribute_value;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_extra_offer_extra_created_edited_date_time') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_extra_created_edited_date_time;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_extra_offer_extra_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_extra_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	