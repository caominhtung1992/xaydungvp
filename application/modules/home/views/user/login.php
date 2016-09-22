<div class="content_full">
  <?php $this->load->view("column_left"); ?>
  <div class="column_right">
    <div id="location"><!--i class="bg icon_home"></i--><a href="/" title="Trang chủ">Trang chủ</a> » <a href="javascript:void(0)" title="Đăng nhập">Đăng nhập</a></div>
    <div class="clear"></div>
    <div class="box_column_right">
      <div class="title_box_right">
        <h2>Đăng nhập</h2>
      </div>
      <!--title_box_right-->
      <div class="clear"></div>
      <div style="padding:10px;">
      	<script type="text/javascript">
			$(document).ready(function(e) {
				$("#btn_login_form").live("click",function(){
				  $user = $("#username").val();$error = $("#ferorrs");
				  $pass = $("#userpass").val();//$captcha = $("#captcha").val();
				  //$error.html("<img src='http://hoiaz.net/public/images/ajax-loader.gif' />");
				  if($user == "" || $pass == ""){
					  $error.show().html("Vui lòng nhập đầy đủ thông tin").stop().fadeIn().delay(3000).fadeOut('slow');
					  return false;
				  }else{
					  jQuery.post("<?php echo base_url(); ?>home/users/verify",{name:$user,pass:$pass},function(result){
						 if(result == "bachnx"){ 
							 $("#username").val("");$("#userpass").val("");
							 $error.show().html("<img src='<?php echo base_url(); ?>public/images/ajax-loader.gif' /> Đang load dữ liệu...");
							 setTimeout(function(){
								 $error.show().html("<span style='color:green;font-weight:bold'><img style='float: left;margin:9px 5px 0px 0px;' src='<?php echo base_url(); ?>public/images/4-0.gif' /> Redirect to home...</span>");
									window.location = "<?php echo base_url(); ?>";
								},2000);
						 }else{
							 $error.show().html(result);
						 }
					  });
				  }
				  return false;
				});
			});
		</script>
        <div id="ferorrs" style=""></div>
        <form action="javascript:void(0)" method="post">
            <table class="tbl_login" cellspacing="0" cellpadding="6">
              <tbody>
                <tr>
                  <td style="width: 50%;" valign="top" id="login_col"><div id="login_title"><b>Đăng nhập</b><img src="<?php echo base_url(); ?>public/images/img_clock_login.png"></div>
                    <table cellpadding="5" cellspacing="0">
                      <tbody>
                        <tr>
                          <td>Email đăng nhập</td>
                          <td><input type="text" size="25" name="username" id="username"></td>
                        </tr>
                        <tr>
                          <td>Mật khẩu</td>
                          <td><input type="password" size="25" name="userpass" id="userpass"></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><div style="position: relative;">
                              <input type="submit" value="Đăng nhập" id="btn_login_form">
                              <span style="position: absolute;right: 0;top:7px;"><a href="/quen-mat-khau">Quên mật khẩu</a></span> </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                  <td width="10px">&nbsp;</td>
                  <td valign="top" style="line-height: 18px;"><div id="regis_new_title"><b>Khách hàng mới</b></div>
                    <p>Dành cho những khách hàng mới chưa có tài khoản tại <?php echo $_SERVER['HTTP_HOST']; ?></p>
                    <ul>
                      <li><img src="<?php echo base_url(); ?>public/images/icon_list_regist.png" alt=""><span>Mua và quản lý đơn hàng dễ dàng với tài khoản</span></li>
                      <li><img src="<?php echo base_url(); ?>public/images/icon_list_regist.png" alt=""><span>Tích điểm khi mua hàng để nhận được nhiều quà tặng</span></li>
                      <li><img src="<?php echo base_url(); ?>public/images/icon_list_regist.png" alt=""><span>Bấm vào nút bên dưới để đăng ký</span></li>
                    </ul>
                    <img src="<?php echo base_url(); ?>public/images/bg_regist_new.png"> <a href="<?php echo base_url(); ?>dang-ky.html" class="btn_regist_new"><img src="<?php echo base_url(); ?>public/images/btn_regist_new.png"></a></td>
                </tr>
              </tbody>
            </table>
        </form>
        <div class="clear"></div>
      </div>
      <!--padding--> 
    </div>
    <!--box_column_right--> 
  </div>
</div>
