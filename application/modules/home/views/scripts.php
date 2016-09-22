<link href="<?php echo base_url();?>public/styles/skin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/styles/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/styles/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/styles/main.css" rel="stylesheet" type="text/css" />
<!--link href="<?php echo base_url();?>public/styles/jslider.css" rel="stylesheet" type="text/css" /-->

<script type="text/javascript" src="<?php echo base_url();?>public/scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/scripts/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/scripts/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/scripts/jcarousel.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/scripts/common.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    $('.bxslider').bxSlider({
       auto: true,
    });
  });
</script>
<script type="text/javascript">
  /*jQuery(".iteam-main-pro").hover(
     function() {
        jQuery(this).find(".product-info").css("display","block");
     },
     function() {
        jQuery(this).find(".product-info").css("display","none");
     }
  );*/
</script>
<script type="text/javascript">
  /*jQuery(".cate-iteam-main").hover(
     function() {
        jQuery(this).find(".pro-product-info").css("display","block");
     },
     function() {
        jQuery(this).find(".pro-product-info").css("display","none");
     }
  );*/
</script>
<script type="text/javascript">
  var links = "<?php echo base_url();?>";
</script>

<script type="text/javascript">
  document.write('<div id="fb-root"></div>');
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=199828456846777";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
