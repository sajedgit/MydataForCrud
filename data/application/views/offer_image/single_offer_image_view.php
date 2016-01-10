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
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_ref_offer_image_offer_id') ?></td>
					<td class='col-lg-9'><?php echo $query_result->ref_offer_image_offer_id;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_product_name') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_product_name;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_product_description') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_product_description;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_extension') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_extension;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_storage_base_path_android') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_storage_base_path_android;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_storage_base_path_ios') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_storage_base_path_ios;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_name_as_saved') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_name_as_saved;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_is_display_image') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_is_display_image;  ?></td>
				 </tr><tr>
					<td class='col-lg-3'><?php echo $this->lang->line('offer_image_offer_image_active') ?></td>
					<td class='col-lg-9'><?php echo $query_result->offer_image_active;  ?></td>
				 </tr>
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	