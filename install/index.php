<?php
error_reporting(0);
$path = dirname(dirname(__FILE__)).'/';
$this_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$this_url = dirname(dirname($this_url)).'/';
define('ROOTPATH', str_replace("\\", "/", $path));

if(isset($_REQUEST['start_install'])){
	$url = $_REQUEST['config'];
	$db = $_REQUEST['db'];
    
	//die($url);
	if($url == "" || $db['dbhost'] == "" || $db['dbuname'] == ""){
		$messenger='Please enter full info !';
		$alert = '<div class="form-group"><strong style="color:red;">'.$messenger.'</strong></div>';
	}else{
	    if(mysqli_connect($db['dbhost'], $db['dbuname'], $db['dbpword'])){
			//Config URL website
			$data = file_get_contents(ROOTPATH.'application/config/config.php');
			$data = preg_replace('/\$config\[\'base_url\'\] = ".*?"\;/',"\$config['base_url'] = \"".$url."\";",$data);
			$fp   = fopen(ROOTPATH.'application/config/config.php','w');
			fwrite($fp,$data);
			fclose($fp);
			
			//Config database
			$db_data = file_get_contents(ROOTPATH.'application/config/database.php');
	        $source = array('/\$db\[\'default\'\]\[\'hostname\'\] = \'.*?\'/i','/\$db\[\'default\'\]\[\'username\'\] = \'.*?\'/i','/\$db\[\'default\'\]\[\'password\'\] = \'.*?\'/i','/\$db\[\'default\'\]\[\'database\'\] = \'.*?\'/i');
	        $desc = array('$db[\'default\'][\'hostname\'] = \''.$db['dbhost'].'\'','$db[\'default\'][\'username\'] = \''.$db['dbuname'].'\'','$db[\'default\'][\'password\'] = \''.$db['dbpword'].'\'','$db[\'default\'][\'database\'] = \''.$db['dbname'].'\'');

	        $db_data = preg_replace($source,$desc,$db_data);
			$save = fopen(ROOTPATH.'application/config/database.php','w');
	        fwrite($save,$db_data);
	        fclose($save);
	        //$messenger='Install completed. You must remove install folder for security !';
			echo '<script>alert("Cấu hình thành công !");window.location.href = "'.$this_url.'";</script>';
	    }else{
	        $messenger='Can not connect to database. Please check again !';
	    }
	}
    $alert = '<div class="form-group"><strong style="color:red;">'.$messenger.'</strong></div>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Install - Power by bachnx92@gmail.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container" style="margin-top: 10px;">
  <div class="row">
    <form role="form" action="" method="post">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">System config</div>
          <div class="panel-body">
            <?php echo $alert;?>
            <!-- <div class="form-group">
              <label for="exampleInputEmail1">Site path</label>
              <input type="text" class="form-control" name="config[path]" id="exampleInputEmail1" placeholder="Enter path" value="<?=$path;?>" />
            </div> -->
            <div class="form-group">
              <label for="exampleInputEmail1">Site url</label>
              <input type="text" class="form-control" name="config" id="exampleInputEmail1" placeholder="Enter url" value="<?php echo $this_url;?>" />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Database host</label>
              <input type="text" class="form-control" name="db[dbhost]" id="exampleInputEmail1" placeholder="Enter host" value="" />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Database name</label>
              <input type="text" class="form-control" name="db[dbname]" id="exampleInputEmail1" placeholder="Enter database name" value="" />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Database username</label>
              <input type="text" class="form-control" name="db[dbuname]" id="exampleInputEmail1" placeholder="Enter database username" value="" />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Database password</label>
              <input type="text" class="form-control" name="db[dbpword]" id="exampleInputEmail1" placeholder="Enter database password" value="" />
            </div>
            <button type="submit" name="start_install" class="btn btn-default">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>