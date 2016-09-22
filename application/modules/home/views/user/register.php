<div class="content_full">
  <?php $this->load->view("column_left"); ?>
  <div class="column_right">
    <div id="location"><!--i class="bg icon_home"></i--><a href="/" title="Trang chủ">Trang chủ</a> » <a href="javascript:void(0)" title="Đăng ký">Đăng ký</a></div>
    <div class="clear"></div>
    <div class="box_column_right">
      <div class="title_box_right">
        <h2>Đăng ký</h2>
      </div>
      <!--title_box_right-->
      <div class="clear"></div>
      <div style="padding:10px;">
      	<div id="ferorrs" style="display: none;width:680px;margin:5px auto"></div>
        <script type="text/javascript">
		  $(document).ready(function(e) {
			  $("#okie").live("click",function(){
				  $user = $("#username").val();$repass = $("#repass").val();
				  $pass = $("#userpass").val();$fullname = $("#fullname").val();
				  $phone = $("#userphone").val();$email = $("#useremail").val();
				  $address = $("#address").val();$error = $("#ferorrs");
				  $gender = $("#gender").val(); $captcha = $("#captcha").val();
				  if($user == "" || $pass == "" || $fullname == "" || $email == "" || $captcha == ""){
					  $error.show().html("Vui lòng nhập đầy đủ thông tin, trường <span style='color:#f00;font-weight:bold'>(*)</span> là bắt buộc").stop().fadeIn().delay(3000).fadeOut('slow');
					  return false;
				  }else{
					  if($user.length < 3){$error.show().html("Tên tài khoản nhiều hơn 3 ký tự");$("#username").focus(); return false;}
					  if($pass != $repass){$error.show().html("Nhập lại mật khẩu chưa đúng!");$("#userpass").focus();return false;}
					  jQuery.post("<?php echo base_url(); ?>home/users/ajax",{name:$user,pass:$pass,fullname:$fullname,email:$email,phone:$phone,address:$address,gender:$gender,captcha:$captcha},function(result){
						 if(result == "bachnx"){ 
							//alert(result); return false;
							 $error.show().html("<img src='<?php echo base_url(); ?>public/images/ajax-loader.gif' /> Đang load dữ liệu...");
							 setTimeout(function(){
								 $error.show().html("<span style='color:green;font-weight:bold'>Đăng ký thành công, một email đã gửi đến mail của bạn vui lòng kích hoạt tài khoản để đăng nhập</span>");
								 $("#username").val("");$("#userpass").val("");$("#repass").val("");$("#fullname").val("");$("#userphone").val("");$("#useremail").val("");$("#captcha").val("");
							 },7000);
						 }else{
							 $error.show().html(result);
						 }
					  });
				  }
				  return false;
			  });
			  $('.button_register').click(function() {
					$('body,html').animate({scrollTop:120},300);
				});
		  });
		</script>
        <form action="javascript:void(0)" method="post">
          <table cellpadding="4" cellspacing="0" class="tbl_regist">
            <tbody>
              <tr class="title_table">
                <td colspan="2" class="fieldheader"><img src="<?php echo base_url(); ?>public/images/icon_people_regist.png">Thông tin đăng nhập</td>
              </tr>
              <tr>
                <td width="200px">Tên tài khoản</td>
                <td><input type="text" id="username" class="boxInput" size="20" value="">
                  <b style="color: #ff0000;">*</b> <span id="check_user"></span></td>
              </tr>
              <tr>
                <td>Mật khẩu</td>
                <td><input type="password" id="userpass" class="boxInput" size="20">
                  <b style="color: #ff0000;">*</b> <span class="explain"></span></td>
              </tr>
              <tr>
                <td>Nhập lại mật khẩu</td>
                <td><input type="password" id="repass" class="boxInput" size="20">
                  <b style="color: #ff0000;">*</b> <span class="explain"></span></td>
              </tr>
            </tbody>
          </table>
          <table class="tbl_regist" cellpadding="4" cellspacing="0">
            <tbody>
              <tr class="title_table">
                <td colspan="2" class="fieldheader"><img src="<?php echo base_url(); ?>public/images/icon_info_regist.png">Thông tin cá nhân</td>
              </tr>
              <tr>
                <td>Họ và tên</td>
                <td><input type="text" id="fullname" class="boxInput" size="40" value="">
                  <b style="color: #ff0000;">*</b></td>
              </tr>
              <tr>
                <td width="200px">Ảnh đại diện <b style="color: #ff0000;">(nếu có)</b></td>
                <td><input type="file" name="avatar" id="avatar" class="boxInput" size="40" value="">
                  (dung lượng file tối đa 100KB, ảnh PJG hoặc GIF) </td>
              </tr>
              <tr>
                <td>Giới tính</td>
                <td><select name="gender" id="gender">
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                  </select></td>
              </tr>
              <!-- <tr>
            <td>Tỉnh/Tp</td>
            <td>
            	<select name="province">
				  <option value="1">Hà nội</option>
				  <option value="2">TP HCM</option>
				  <option value="5">Hải Phòng</option>
				  <option value="4">Đà Nẵng</option>
				  <option value="6">An Giang</option>
				  <option value="7">Bà Rịa-Vũng Tàu</option>
				</select>
            </td>
          </tr> -->
              <tr>
                <td>Điện thoại di động</td>
                <td><input type="text" id="userphone" class="boxInput" size="40" value="">
                  <b style="color: #ff0000;">*</b></td>
              </tr>
              <tr>
                <td>Địa chỉ email</td>
                <td><input type="text" id="useremail" class="boxInput" size="50" value="">
                  <b style="color: #ff0000;">*</b></td>
              </tr>
              <tr>
                <td>Mã bảo mật</td>
                <td><img src="<?php echo base_url(); ?>home/ran_image/create_image" /></td>
              </tr>
              <tr>
                <td>Nhập mã bảo mật</td>
                <td><input type="text" size="10" id="captcha"></td>
              </tr>
              <tr>
                <td></td>
                <td><b style="color: #ff0000;">(*)</b> Thông tin bắc buộc </td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" id="okie" value="Đăng ký" class="button_register"></td>
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
