<!--Start footer-->
	<script type="text/javascript">
		$(document).ready(function(e) {
			var ms;
			Today = new Date();
			ms = Today.getMilliseconds();
			$("#timer").html(ms)
        });
	</script>
  <div class="bgg_footer">
    <div> Northstar v1.0 ( <a target="_blank" style="color:#f00" href="javascript:void(0)">kiểm tra phiên bản mới hơn</a> ) - Thời gian xử lý: 0.<span id="timer"></span> giây<br />
      © <a target="_blank" href="http://northstar.vn" style="text-decoration:none; color:gray">Northstar.vn</a> </div>
  </div>
  <!--end footer-->
  
  
  <script type="text/javascript">
	$(function() {
	$(window).scroll(function() {
	if($(this).scrollTop() != 0) {
		$('#bttop').fadeIn();
		} else {
		$('#bttop').fadeOut();
		}
	});
	
	$('#bttop').click(function() {
		$('body,html').animate({scrollTop:0},300);
	});
	});
	</script>

  <div id="bttop" title="Lên đầu trang" style=""><img src="<?php echo base_url()."public/admin/images/scoll_top.png"; ?>" alt="Scroll"></div>
  
  <!--menu-->