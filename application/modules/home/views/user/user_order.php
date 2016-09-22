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
            <td valign="top" width="75%" style="float:right; margin-top:10px;"><h3>Danh sách đơn hàng</h3>
              <table width="100%" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;" cellpadding="4" cellspacing="0">
                <tbody>
                    <tr bgcolor="#FFCC00" style="font-weight:bold;">
                      <td>STT</td>
                      <td>Số đơn hàng</td>
                      <td>Giá trị</td>
                      <td>Thời gian</td>
                      <td>Trạng thái</td>
                    </tr>
                    <?php
                        if(isset($list) && $list != NULL){
                            $stt = 0;
                            foreach($list as $value){
                                $stt++;
                                
                    ?>
                    <tr>
                      <td><?php echo $stt; ?></td>
                      <td>#<?php echo $value['id']; ?> <a style="color:#06C" href="<?php echo base_url()."home/users/detail/".$value['id']; ?>">Xem chi tiết</a></td>
                      <td><?php if($value['price'] != ""){echo @number_format($value['price'])." đ";}else{echo "Liên hệ";}?></td>
                      <td><?php echo $value['date']; ?></td>
                      <td> <?php
							if($value['status'] == 1){
								echo "Chưa xử lý";
							}else if($value['status'] == 2){
								echo "Đang chuyển hàng";
							}else if($value['status'] == 3){
								echo "Thành công";
							}else if($value['status'] == 4){
								echo "Hủy bỏ";
							}
                          ?> 
                       </td>
                    </tr>
                    <?php
                        } }else{
                            echo "<tr>";
                                echo "<td colspan='5'>Không có đơn hàng nào</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
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
