<div class="content_full">
  <?php $this->load->view("column_left"); ?>
  <div class="column_right">
  <div id="location"><a href="/" title="Trang chủ">Trang chủ</a> » <a href="javascript:void(0)" title="Tài khoản của bạn">Tài khoản của bạn</a></div>
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
            <td valign="top" width="75%" style="float:right; margin-top:10px;"><h3>Thông tin cá nhân</h3>
                <div class="bgg_in_spm" style="color:#f00;padding: 10px;font-weight: bold;">
                <?php if(isset($error)) { echo "<p>".$error."</p>"; } ?>
                </div>
              <table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%">
                <tr>
                  <td width="120px">Tên đăng nhập</td>
                  <td ><?php echo $info['cus_name']; ?></td>
                </tr>
                <tr>
                  <td width="120px">Họ tên</td>
                  <td ><?php echo $info['cus_fullname']; ?></td>
                </tr>
                <tr>
                  <td>Giới tính</td>
                  <td>
                    <?php if($info['cus_gender'] == 1){ echo "Nam"; }?>
                    <?php if($info['cus_gender'] == 0){ echo "Nữ"; }?>
                  </td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php echo $info['cus_email']; ?></td>
                </tr>
                <tr>
                  <td>Điện thoại</td>
                  <td><?php echo $info['cus_phone']; ?></td>
                </tr>
                <tr>
                  <td>Địa chỉ nhận hàng</td>
                  <td><?php echo $info['cus_address']; ?></td>
                </tr>
              </table>
              <div style="padding-top:10px; font-weight:bold;"> Để sửa thông tin, vui lòng <a href="<?php echo base_url(); ?>sua-thong-tin.html" style="color:#d00; text-decoration:underline;">click vào đây</a></div></td>
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
