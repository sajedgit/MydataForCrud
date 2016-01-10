<?php

function get_route_data($arr,$table_name,$table_name_to_class)
{

	$page_data = <<<EOF

/********************	for $table_name	**********************************/
    
\$route['$table_name']="$table_name_to_class/admin_$table_name";
\$route['$table_name/page/(:any)']="$table_name_to_class/admin_$table_name/$1";
\$route['add_new_$table_name']="$table_name_to_class/create_$table_name";
\$route['delete_$table_name/(:any)']="$table_name_to_class/delete_$table_name/$1";
\$route['edit_$table_name/(:any)']="$table_name_to_class/edit_$table_name/$1";
\$route['view_$table_name/(:any)']="$table_name_to_class/view_$table_name/$1";
\$route['change_status/(:any)']="$table_name_to_class/change_status/$1";

/********************	end $table_name	**********************************/
	
EOF;



	return	$page_data;

}


?>