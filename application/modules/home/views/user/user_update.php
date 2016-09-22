<div class="content_full">
  <?php $this->load->view("column_left"); ?>
  <div class="column_right">
  <div id="location"><a href="/" title="Trang chủ">Trang chủ</a> » <a href="javascript:void(0)" title="Tài khoản của bạn">Cập nhật thông tin</a></div>
  <div class="clear"></div>
  <div class="box_column_right">
    <div class="title_box_right">
      <h2>Tài khoản của bạn</h2>
    </div>
    <!--title_box_right-->
    <div class="clear"></div>
    <div style="padding:10px;">
      <style type="text/css">
		  #tb-account {width:100%; border-collapse:collapse}
		  h2 { margin:0; padding:0; margin-bottom:15px; font-size:18px; font-weight:normal}
		  h3 { margin:0; padding:0; margin-bottom:10px; font-size:14px;}
		  #account-left {vertical-align:top; margin-top:4px; float:left;}
		  #account-left dt { font-weight:bold; color:#333;}
		  #account-left dd, dt, dl{ margin:0; padding:0}
		  #account-left dl { margin-bottom:10px}
		  #account-left a { color:#333; line-height:21px;}
		  #account-left a:hover{text-decoration:underline;}
		  #account_page td{padding:3px 5px; line-height:160%;}
		  .shopping_info_cus {height: 25px;line-height: 25px;border: 1px solid #ccc;padding-left: 10px;}
	  </style>
      <table id="tb-account">
        <tbody>
          <tr>
            <td id="account-left"><dl>
                <dt>Đơn hàng đặt mua</dt>
                <dd><a href="<?php echo base_url(); ?>don-hang.html">Danh sách đơn hàng</a></dd>
              </dl>
              <dl>
                <dt>Hoạt động cá nhân</dt>
                <dd><a href="<?php echo base_url(); ?>san-pham-yeu-thich.html">Sản phẩm đang lưu</a></dd>
              </dl>
              <dl>
                <dt>Thông tin tài khoản</dt>
                <dd><a href="<?php echo base_url(); ?>tai-khoan.html">Thông tin cá nhân</a></dd>
                <dd><a href="<?php echo base_url(); ?>sua-thong-tin.html">Sửa thông tin cá nhân</a></dd>
                <dd><a href="<?php echo base_url(); ?>thoat.html">Thoát</a></dd>
              </dl>
            </td>
            <td valign="top" width="75%" style="float:right; margin-top:10px;"><h3>Cập nhật thông tin</h3>
            <div class="bgg_in_spm" style="color:#f00;padding: 10px;font-weight: bold;">
				<?php if(isset($error)) { echo "<p>".$error."</p>"; } ?>
            </div>
              <form action="<?php echo base_url(); ?>sua-thong-tin.html" method="post">
              <table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%">
                <tr>
                  <td width="120px">Tên đăng nhập</td>
                  <td ><input class="shopping_info_cus" type="text" name="username" id="username" size="30" value="<?php echo $info['cus_name']; ?>" disabled /></td>
                </tr>
                <tr>
                  <td width="120px">Mật khẩu mới</td>
                  <td ><input class="shopping_info_cus" type="password" name="password" id="password" size="30" value="" /></td>
                </tr>
                <tr>
                  <td width="120px">Nhập lại mật khẩu</td>
                  <td ><input class="shopping_info_cus" type="password" name="repass" id="repass" size="30" value="" /></td>
                </tr>
                <tr>
                  <td width="120px">Họ tên</td>
                  <td ><input class="shopping_info_cus" type="text" name="fullname" id="fullname" size="40" value="<?php echo $info['cus_fullname']; ?>" /></td>
                </tr>
                <tr>
                  <td>Giới tính</td>
                  <td>
                    <input type="radio" name="gender" value="1" <?php if($info['cus_gender'] == 1){ echo "checked"; }?> /> Nam
                    <input type="radio" name="gender" value="0" <?php if($info['cus_gender'] == 0){ echo "checked"; }?> /> Nữ 
                  </td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input class="shopping_info_cus" type="text" name="email" id="email" size="40" value="<?php echo $info['cus_email']; ?>" ></td>
                </tr>
                <tr>
                  <td>Điện thoại</td>
                  <td><input class="shopping_info_cus" type="text" name="phone" id="phone" size="40" value="<?php echo $info['cus_phone']; ?>" /></td>
                </tr>
                <tr>
                  <td>Địa chỉ nhận hàng</td>
                  <td><input class="shopping_info_cus" type="text" name="address" id="address" size="40" value="<?php echo $info['cus_address']; ?>" /></td>
                </tr>
              </table>
              <div style="padding-top:10px; font-weight:bold;">
                <input class="contact_sub" type="submit" value="Cập nhật" name="ok">
              </div>
            </form>

              <br />
            </td>

          </tr>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <!--padding--> 
  </div>
  <!--box_column_right--> 
</div>

</div>
