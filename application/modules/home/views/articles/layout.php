<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="ACX-yCidhQdR6LFQpQnEbXqEUOSEYG_p9gA14zHifhI" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title ; ?></title>
<link rel="canonical" href="<?php echo base_url().uri_string().".html"; ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>logo.ico" />
<meta name="keywords" content="<?php if(isset($detail_news)){echo $detail_news['news_key'];}else{echo "Tin tức";}?>" />
<meta name="description" content="<?php if(isset($detail_news)){echo $detail_news['news_des'];}else{echo "Tin tức";} ?>" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php if(isset($detail_news)){echo $detail_news['news_des'];}else{echo "Tin tức";} ?>" />
<meta property="og:url" content="<?php echo base_url().uri_string().".html"; ?>" />
<meta property="og:site_name" content="<?php echo $title; ?>" />
<meta property="fb:admins" content="100003809560252"/>
<meta name="twitter:card" content="summary" />
<?php $this->load->view("scripts");?>
</head>

<body>
<div id="wrapper">
	<?php $this->load->view("header");?>
    <?php $this->load->view("articles/".$template.""); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>