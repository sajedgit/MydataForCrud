<?php

function get_main_layout_data($arr,$table_name)
{
$page_data = <<<EOF
<html>
<head>

<style>
.maindiv
{
width:950px;
margin:0 auto;
border:1px solid #000;
}
.header
{
float:left;
width:950px;
border:1px solid #000;
height:150px;
}
.section
{
float:left;
width:950px;
border:1px solid #000;
height:auto;
}
.content
{
float:left;
width:750px;
border:1px solid #000;
height:auto;
}
.sidebar
{
float:left;
width:190px;
border:1px solid #000;
height:auto;
}
.footer
{
float:left;
width:950px;
border:1px solid #000;
height:80px;
}

</style>

</head>

<body>


<div class="maindiv">

	<div class="header">	<h3 align="center">header</h3></div>
	<div class="section">
	
		<div class="content"><?php  \$this->load->view(\$content);?>	</div>
		<div class="sidebar">
		
		<ul><li>Menu 1</li><li>Menu 2</li><li>Menu 3</li><li>Menu 4</li><li>Menu 5</li><li>Menu 6</li></ul>
		
		</div>
	
	</div>
	<div class="footer"><h3 align="center">footer</h3></div>
	
	
</div>


</body>
</html>
	
EOF;
	return	$page_data;

}



function get_single_view_data($arr,$table_name,$table_name_to_class)
{
	
	$viewData="";
	for($i=1;$i<count($arr);$i++)
	{
	$column=$arr[$i][0];
	$lang_column=$table_name."_".$column;
	$columnLabel="\$this->lang->line('$lang_column')";
		
	$viewData.="<tr>
					<td class='col-lg-3'><?php echo $columnLabel ?></td>
					<td class='col-lg-9'><?php echo \$query_result->$column;  ?></td>
				 </tr>";
	
	}
$page_data = <<<EOF
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo \$title;  ?>
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
					<th><?php echo \$this->lang->line('column') ?></th>
					<th><?php echo \$this->lang->line('value') ?></th>
				 </tr>
			  </thead>
			  <tbody>
				 $viewData
				
		
			  </tbody>
		   </table>
		</div>  	
	</div>
</div>

	
EOF;
	return	$page_data;
}



function get_edit_view_data($arr,$table_name,$table_name_to_class)
{
	$primary_id=$arr[0][0];
	
	$viewData="";
	for($i=1;$i<count($arr);$i++)
	{

	$column=$arr[$i][0];
	$lang_column=$table_name."_".$column;
	$columnLabel="\$this->lang->line('$lang_column')";
	
	$viewData.="<div class='form-group'>
						<label><?php echo $columnLabel ?></label>
						<input type='text' class='form-control' value='<?php echo \$edit_query_result->$column; ?>'  name='$column' placeholder='<?php echo $columnLabel ?>' >
						<span class='text-danger'><?php  echo form_error('$column'); ?></span>
					</div>\n";
	
	}
	
$page_data = <<<EOF
	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo \$title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				\$attributes = array('method' => 'POST', 'id' => 'form_$table_name');
				echo form_open("edit_$table_name/\$edit_query_result->$primary_id", \$attributes);
				?>
					
					<h1 class="text-center text-success"><?php echo \$this->session->flashdata('msg'); ?></h1>

					$viewData
				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo \$this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>

EOF;
	return	$page_data;
}





function get_all_view_data($arr,$table_name,$table_name_to_class)
{
	$edit_table="edit_".$table_name;
	$delete_table="delete_".$table_name;
	$view_table="view_".$table_name;
	$primary_id=$arr[0][0];
	
	$tablheader="";
	$td_data="";
	for($i=1;$i<count($arr);$i++)
	{
	$column=$arr[$i][0];
	$lang_column=$table_name."_".$column;
	$columnLabel="\$this->lang->line('$lang_column')";	
	if($i>4)
	{
		$tablheader.="    							<!--	<th><?php echo $columnLabel ?></th>	-->\n";
		$td_data.="							<!--	<td class='col-md-3 col-lg-3'>  <?php echo \$row->$column;  ?></td>	-->\n";
	}
	else
	{
		$tablheader.="   								<th><?php echo $columnLabel ?></th>\n";
		$td_data.="									<td class='col-md-3 col-lg-3'>  <?php echo \$row->$column;  ?></td>\n";
	}

	
	
	
	}
	
	$td_data.="
    							
    								<td class='col-md-2 col-lg-2'>
    									<a href='<?php echo base_url() ?>$edit_table/<?php echo \$row->$primary_id;  ?>' title='edit'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;
    									<a href='<?php echo base_url() ?>$delete_table/<?php echo \$row->$primary_id;  ?>' title='delete' ><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
										<a href='<?php echo base_url() ?>$view_table/<?php echo \$row->$primary_id;  ?>' title='View'><span class='glyphicon glyphicon-eye-open'></span></a>
									
									</td>";
$page_data = <<<EOF
	


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo \$title;  ?>
			</div>
				<h1 class="text-center text-success"><?php echo \$this->session->flashdata('msg'); ?></h1>	
			<div class="panel-body">
				<div class="table-responsive">
  					<table class="table table-hover">
    						<thead>
    							<tr>
$tablheader
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
								<?php foreach (\$query_result as \$row): ?>
    							<tr>
$td_data
    							</tr>
		
								<?php endforeach;	?>
								
							
								
    						</tbody>
  					</table>
				</div>
			</div>
			
			<div class="panel-footer"><?php echo \$paging->create_links(); ?>	</div>
		</div>
		
		
		
	</div>
</div>		






EOF;
	return	$page_data;
}





function get_add_data($arr,$table_name,$table_name_to_class)
{

	$viewData="";
	for($i=1;$i<count($arr);$i++)
	{
	$column=$arr[$i][0];
	$lang_column=$table_name."_".$column;
	$columnLabel="\$this->lang->line('$lang_column')";	
	$viewData.="<div class='form-group'>
						<label><?php echo $columnLabel ?></label>
						<input type='text' class='form-control'   name='$column' placeholder='<?php echo $columnLabel ?>' >
						<span class='text-danger'><?php  echo form_error('$column'); ?></span>
					</div>\n";
	
	}
	
$page_data = <<<EOF
	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  echo \$title; ?>
			</div>
			<div class="panel-body">
			
				<?php 
			
				\$attributes = array('method' => 'POST', 'id' => 'form_$table_name');
				echo form_open("$table_name_to_class/create_$table_name", \$attributes);
				?>
					<?php if (isset(\$message)) : ?>
						<h1 class="text-center text-success"><?php echo \$this->lang->line('done_status') ?></h1>	<br/>
					<?php endif; ?>

					$viewData
				
				
				
					<button type="submit" class="btn btn-primary btn-block"><?php echo \$this->lang->line('save') ?></button>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</div>
</div>

EOF;
	return	$page_data;
}





?>