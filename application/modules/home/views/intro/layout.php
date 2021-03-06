<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="ACX-yCidhQdR6LFQpQnEbXqEUOSEYG_p9gA14zHifhI" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title ; ?></title>
<link rel="author" href="https://plus.google.com/102870804259820301805" />
<link rel="canonical" href="<?php echo base_url()."gioi-thieu.html"; ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>logo.ico" />
<meta name="keywords" content="<?php echo $title; ?>" />
<meta name="description" content="<?php echo $title; ?>" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $title; ?>" />
<meta property="og:url" content="<?php echo base_url()."gioi-thieu.html"; ?>" />
<meta property="og:site_name" content="<?php echo $title; ?>" />
<meta property="fb:admins" content="100003809560252"/>
<meta name="twitter:card" content="summary" />
<?php $this->load->view("scripts");?>
</head>

<body>
<div id="wrapper">
	<?php $this->load->view("header");?>
    <?php $this->load->view("intro/content"); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>