<?php
	$control = "dfgfdgf";
	$data = file_get_contents(ROOTPATH.'application/config/routes.php');
	$data = preg_replace('/\$route\[\'test\'\] = ".*?"\;/',"\$route['test'] = \"".$control."\";",$data);
	
	$fp   = fopen(ROOTPATH.'application/config/routes.php','w');
	fwrite($fp,$data);
	fclose($fp);
	echo $data;
	die();
?>