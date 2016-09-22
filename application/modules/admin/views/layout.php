<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Mobile viewport optimized: h5bp.com/viewport -->
<meta name="viewport" content="width=device-width">
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị website</title>
<meta http-equiv="content-language" content="vi"/>
<meta http-equiv="refresh" content="600" />
<link rel="shortcut icon" href="<?php echo base_url()."public/images/logo.ico" ;?>" />

<?php $this->load->view("admin/scripts"); ?>
</head>
<body>
    <div class="main">
		<?php $this->load->view("admin/header"); ?>
        <?php $this->load->view("admin/content"); ?>
        <?php $this->load->view("admin/footer"); ?>
    </div>
    <?php $this->load->view("admin/navbar"); ?>
</body>
</html>