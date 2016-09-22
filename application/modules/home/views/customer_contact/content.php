</header>
<section id="main-body">
  <div class="main-content">
  <div class="row">
    <div class="col-24 lh-breadcrumbs">
      <a href="<?php echo base_url();?>">Trang chủ </a>>><a href=""> <?php echo $title; ?></a>
    </div>
    <div class="col-24">
  <div class="box_column_right">
    <div class="title_box_right">
      <h1>Liên hệ</h1>
    </div>
    <!--title_box_right-->
    <div class="clear"></div>
    <div style="padding:10px;" class="h-content">
      <h3 class="contact_title">Mọi thắc mắc hoặc góp ý, quý khách vui lòng liên hệ trực tiếp với bộ phận chăm sóc khách hàng của chúng tôi bằng cách điền đầy đủ thông tin vào form bên dưới</h3>
      <div class="contact_info">
        <div class="contact_view"> </div>
        	<script type="text/javascript">
				$(document).ready(function(){
					$("#contact_send").click(function(){
						n = $("#contact_name").val();
						e = $("#contact_email").val();
						p = $("#contact_tel").val();
						noi = $("#contact_message").val();
						$.ajax({
							"url" : "<?php echo base_url(); ?>home/customer_contact/ajax",
							"type" : "post",
							"data" : "name="+n+"&email="+e+"&phone="+p+"&noi="+noi,
							beforeSend: function() {
								$(".contact_view").show();
						        $(".contact_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/ajax-loader.gif' /> Đang load dữ liệu ...");
						    },
							success : function(kq){
								if(kq == 1){
									$(".contact_view").show();
									//$(".contact_view").css("color","#f00").html("Vui lòng nhập đầy đủ thông tin");
									$(".contact_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/images/check_error.png' />Vui lòng nhập đầy đủ thông tin");
									
								}else{
									$(".contact_view").show();
									$(".contact_view").html(kq);
									$("#contact_name").val("");
									$("#contact_email").val("");
									$("#contact_tel").val("");
									$("#contact_message").val("");
								}
							},
						});
					return false;
				});
			});
			</script>

        <form action="javascript:void(0)" method="post">
          <div class="form_items">
            <div class="form_items_left">Họ &amp; tên <span class="red">*</span></div>
            <div class="form_items_right">
              <input class="inputtxt" type="text" size="50" placeholder="Họ và tên" name="contact_name" id="contact_name">
            </div>
          </div>
          <div class="cls"></div>
          <div class="form_items">
            <div class="form_items_left">Email <span class="red">*</span></div>
            <div class="form_items_right">
              <input class="inputtxt" type="text" size="50" placeholder="Email" name="contact_email" id="contact_email">
            </div>
          </div>
          <div class="cls"></div>
          <div class="form_items">
            <div class="form_items_left">Điện thoại <span class="red">*</span></div>
            <div class="form_items_right">
              <input class="inputtxt" type="text" size="50" placeholder="Số điện thoại" name="contact_tel" id="contact_tel">
            </div>
          </div>
          <div class="cls"></div>
          <div class="form_items">
            <div class="form_items_left">Nội dung <span class="red">*</span></div>
            <div class="form_items_right">
              <textarea rows="8" name="contact_message" id="contact_message" placeholder="Nội dung liên hệ" style="width:329px;"></textarea>
            </div>
          </div>
          <div class="cls"></div>
          <div class="form_items">
            <div class="form_items_left">&nbsp;</div>
            <div class="form_items_right">
              <input class="contact_sub" type="submit" value="Gửi liên hệ" name="ok" id="contact_send">
            </div>
          </div>
          <div class="cls"></div>
        </form>
      </div>
    </div>
  </div>
  <!--box_column_right--> 
</div>
</div>
</div>
</section>
