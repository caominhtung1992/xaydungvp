<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin/styles/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin/styles/style.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin/styles/menu.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin/styles/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/admin/styles/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/admin/styles/theme-responsive.css" />
<script type="text/javascript" src="http://www.avx.vn/includes/tpl_script/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>public/admin/scripts/menu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/admin/scripts/jquery.cookie.js"></script>
<!--script type="text/javascript" src="<?php echo base_url();?>public/admin/scripts/tree_jquery.js"></script-->
<script type="text/javascript">
	var links = "<?php echo base_url();?>";
</script>
<script type="text/javascript">
//<![CDATA[ 
$(window).load(function(){
	var active = $.cookie('active'),
		$h3 = $("#scroll_menu h3"),
		$activeH3 = $h3.filter('#' + active);
	
	$h3.click(function(e, speed) {
		$("#scroll_menu ul ul").slideUp(speed);
		$(".active").removeClass("active");
		if (!$(this).next().is(":visible")) {
			$(this).addClass("active");
			$(this).next().slideDown(speed);
			$.cookie('active', this.id);
		}
	});
	//delete cookie nav
	function delete_cookie(name) {
	  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
	};
	$(".bachnx_logout").click(function(){
		delete_cookie(active);
	});
	//end
	if ($activeH3.next().is(':hidden')) {
		$activeH3.trigger('click', [0]);
	}
	});//]]>  
</script>
          
<script type="text/javascript">
	(function($) {
	$.fn.PavOffCavasmenu = function(opts) {
		// default configuration
		var config = $.extend({}, {
			opt1: null,
			text_warning_select:'Please select One to remove?',
			text_confirm_remove:'Are you sure to remove footer row?',
			JSON:null
		}, opts);
		// main function
		function DoSomething(e) {
			
		}

	 
		// initialize every element
		this.each(function() {  
			var $btn = $('.navbar .btn-navbar');
			var	$nav = null;
			 

 			$('html').addClass ('off-canvas');
			$("#off-canvas-button").click( function(){
				$btn.click();	
			} ); 
			$btn.toggle( function(){
				$("body").addClass('off-canvas-active').removeClass("off-canvas-inactive");
			}, function(){
				$("body").removeClass('off-canvas-active').addClass("off-canvas-inactive");
			} );

		});
		return this;
	};
	
})(jQuery);


$(window).ready( function(){
	/*  Fix First Click Menu */
	$(document.body).on('click', '.navbar [data-toggle="dropdown"]' ,function(){
		if(!$(this).parent().hasClass('open') && this.href && this.href != '#'){
			window.location.href = this.href;
		}

	});

	$(".navbar").PavOffCavasmenu();

	$(".quantity-adder .add-action").click( function(){
		if( $(this).hasClass('add-up') ) {  
			$("[name=quantity]",'.quantity-adder').val( parseInt($("[name=quantity]",'.quantity-adder').val()) + 1 );
		}else {
			if( parseInt($("[name=quantity]",'.quantity-adder').val())  > 1 ) {
				$("input",'.quantity-adder').val( parseInt($("[name=quantity]",'.quantity-adder').val()) - 1 );
			}
		}
	} );

} );
</script>