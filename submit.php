<?php

include("model.php");
include("controller.php");
include("view.php");
include("route.php");

$db_name="readytech";
$user="root";
$pass="";

// Make a MySQL Connection
mysql_connect("localhost", $user, $pass) or die(mysql_error());
mysql_select_db($db_name) or die(mysql_error());

/* $query=$_POST["query"];

// Create a MySQL table in the selected database
$result=mysql_query($query);
if($result<1)
{
	echo "<br/>Error in table structure ";
	die();
}
 */

$query_for_list_table="show tables from $db_name";		// find the table in the selected database
$result_for_list_table=mysql_query($query_for_list_table);

if (!$result_for_list_table) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    die();
}

while ($tables = mysql_fetch_row($result_for_list_table)) 
{
    //echo "Table: {$row[0]}\n";

	$arr=array();
	$table_name=$tables[0];
	$query_for_column="DESCRIBE  $table_name";		// find the column name from selected table
	$result_for_table_column=mysql_query($query_for_column);

	if (!$result_for_table_column) 
	{
	echo "DB Error, could not list columns\n";
	echo 'MySQL Error: ' . mysql_error();
	die();
	}

	while ($columns = mysql_fetch_row($result_for_table_column)) 
	{
	//print_r($columns);
	array_push($arr, $columns);
	
	}
	
	$table_name_to_class=create_table_to_class_name($table_name);

	create_model($arr,$table_name,$table_name_to_class);
	create_view($arr,$table_name,$table_name_to_class);
	create_controller($arr,$table_name,$table_name_to_class);
	create_route_file($arr,$table_name,$table_name_to_class);
	create_language_file($arr,$table_name,$table_name_to_class);
	

	
}

//print_r($arr[0]);die();



/* $sql = "DROP TABLE $table_name";
$retval = mysql_query( $sql );
if(! $retval )
{
  die('Could not delete table: ' . mysql_error());
}
else
	echo "Table deleted successfully\n"; */


function create_route_file($arr,$table_name,$table_name_to_class)
{
   $file = fopen("data/application/route_file.php","a");
    $file_data=get_route_data($arr,$table_name,$table_name_to_class);	//	get_route_data function are in include page
    fwrite($file,$file_data);
    fclose($file); 
    
}

function create_model($arr,$table_name,$table_name_to_class)
{
	
	if (!file_exists('data/application/models')) 
	{
    mkdir('data/application/models', 0755, true);
	}

	
	$file = fopen("data/application/models/".ucwords($table_name)."_model.php","w");
	$file_data=get_model_data($arr,$table_name);	//	get_model_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
	
	$file = fopen("data/application/models/Common_model.php","w");
	$file_data=get_common_model_data($arr,$table_name);	//	get_common_model_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
}



function create_view($arr,$table_name,$table_name_to_class)
{
	
	if (!file_exists("data/application/views/$table_name")) 
	{
    mkdir("data/application/views/$table_name", 0755, true);
	}

	$file = fopen("data/application/views/$table_name/single_".$table_name."_view.php","w");
	$file_data=get_single_view_data($arr,$table_name,$table_name_to_class);	//	get_single_view_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
	
	$file = fopen("data/application/views/$table_name/edit_".$table_name."_form.php","w");
	$file_data=get_edit_view_data($arr,$table_name,$table_name_to_class);	//	get_edit_view_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
	
	$file = fopen("data/application/views/$table_name/all_".$table_name."_view.php","w");
	$file_data=get_all_view_data($arr,$table_name,$table_name_to_class);	//	get_all_view_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
	
	$file = fopen("data/application/views/$table_name/add_".$table_name."_form.php","w");
	$file_data=get_add_data($arr,$table_name,$table_name_to_class);	//	get_add_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
	
	if (!file_exists("data/application/views/layout")) 
	{
    mkdir("data/application/views/layout", 0755, true);
	}
	
	$file = fopen("data/application/views/layout/main_layout.php","w");
	$file_data=get_main_layout_data($arr,$table_name);	//	get_main_layout_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
	
	
	
	
}




function create_controller($arr,$table_name,$table_name_to_class)
{
	
	if (!file_exists('data/application/controllers')) 
	{
    mkdir('data/application/controllers', 0755, true);
	}

	
	$file = fopen("data/application/controllers/".$table_name_to_class.".php","w");
	$file_data=get_controller_data($arr,$table_name,$table_name_to_class);	//	get_controller_data function are in include page
	fwrite($file,$file_data);
	fclose($file);
}


function create_language_file($arr,$table_name,$table_name_to_class)
{
	$table_name_captalize=ucwords($table_name);
	//for set language file
	$label_str="<?php \n";
	for($i=0;$i<count($arr);$i++)		 
	{
	$label=$table_name."_".$arr[$i][0];
	$change_label_value=create_column_to_readable($arr[$i][0]);
	$label_str.="\$lang['$label']='".$change_label_value."';\n";	
	}
	$table_name_details=$table_name.'_details';
	$table_name_push_title=$table_name.'_push_title';
	$label_str.=<<<EOF
	
	
\$lang['create_$table_name']="Create $table_name_captalize";
\$lang['title']="$table_name_captalize";
\$lang['update_$table_name']="Edit $table_name";
\$lang['view_$table_name']="View $table_name";
\$lang['deleted_$table_name']="$table_name deleted";
\$lang['not_deleted_$table_name']="$table_name not delete";

\$lang['save']="SAVE";
\$lang['column']="Column";
\$lang['value']="Value";

\$lang['required']="Required";
\$lang['done_status']="Information is stored successfully.";
\$lang['not_done_status']="Sorry,Please try again later....";
\$lang['all_$table_name']="All $table_name_captalize";
\$lang['duration']="Duration";
\$lang['status']="Status";
\$lang['action']="Action";
\$lang['want_to_delete_it']="Do you want to delete it?";
\$lang['delete']="Delete";
\$lang['$table_name_details']="$table_name_captalize Details";
\$lang['back']="Back";
\$lang['modify_info']="Modify $table_name_captalize Information";
\$lang['update']="Update";
\$lang['$table_name_push_title']="New $table_name_captalize!";
EOF;
	
	
	if (!file_exists('data/application/language/english/')) 
	{
    mkdir('data/application/language/english/', 0755, true);
	}
	if (!file_exists('data/application/language/italian/')) 
	{
    mkdir('data/application/language/italian/', 0755, true);
	}
	

	
	
	
	
	$file_en= fopen("data/application/language/english/".$table_name."_en_lang.php","w");
	fwrite($file_en,$label_str);
	fclose($file_en);
	$file_it = fopen("data/application/language/italian/".$table_name."_it_lang.php","w");
	fwrite($file_it,$label_str);
	fclose($file_it);
	
	//end of language file


}



function create_table_to_class_name($table_name)
{
$new_class_name="";
$table_name_captalize=ucwords($table_name);
$table_arr=preg_split("/[-,_,#,\s]+/", $table_name_captalize);
foreach($table_arr as $data):
$new_class_name.=ucwords($data);
endforeach;

return	$new_class_name;	

}






?>