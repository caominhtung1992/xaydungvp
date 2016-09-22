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
              <td valign="top" width="75%" style="float:right; margin-top:10px;">
              	<h2>Chi tiết đơn hàng</h2>
                <table id="tb-account" width="100%">
                    <tbody>
                      <tr>
                        <td valign="top"><h3>Đơn hàng số #<?php echo $info['id']; ?></h2>
                          <div> <b>Thời gian đặt mua</b> : <?php echo $info['date']; ?><br />
                            <b>Tình trạng</b> : 
                            <?php
								if($info['status'] == 1){
									echo "Chưa xử lý";
								}else if($info['status'] == 2){
									echo "Đang chuyển hàng";
								}else if($info['status'] == 3){
									echo "Thành công";
								}else if($info['status'] == 4){
									echo "Hủy bỏ";
								}
                              ?> 
                                  
                            </div>
                          <br />
                          <div style="color:#f60; font-weight:bold;">Thông tin người mua</div>
                          <br />
                          <div> 
                            - Tên khách hàng: <?php echo $info['name']; ?><br />
                            - Số điện thoại: <?php echo $info['phone']; ?><br />
                            - Email: <?php echo $info['email']; ?> <br />
                            - Địa chỉ: <?php echo $info['local']; ?><br />
                          </div>
                          <br />
                          <div style="color:#f60; font-weight:bold;">Thông tin đơn hàng</div>
                          <br />
                          <table width="100%" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;" cellpadding="4" cellspacing="0">
                            <tbody>
                              <tr bgcolor="#FFCC00">
                                <td>STT</td>
                                <td>Ảnh</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá bán</td>
                                <td>Số lượng</td>
                                <td>Tổng</td>
                              </tr>
                              <?php
                                $unserial = $info['serial'];				
                                $serial = json_decode($unserial,true);
                                $stt = 0;
                                foreach($serial as $value){
								$imgs = $value['serial']['images'];
								$images = unserialize($imgs);
                                $stt++;
                                $total = ($value['price']*$value['qty']);
                              ?>
                              <tr>
                                <td><?php echo $stt; ?></td>
                                <td><img style="max-width: 60px;max-height: 80px;padding: 5px 7px;" src="<?php echo base_url()."uploads/products/thumb/".$images[0].""; ?>" alt="<?php echo $value['name']; ?>" /></td>
                                <td> [SP] <a href="<?php echo base_url().$value['rewrite']."/p".$value['id'].".html"; ?>" target="_blank" title="<?php echo $value['name']; ?>"><b><?php echo $value['name']; ?></b></a> (#<?php echo $value['id']; ?>) </td>
                                <td><?php echo @number_format($value['price']); ?> đ</td>
                                <td><?php echo $value['qty']; ?></td>
                                <td><?php echo @number_format($total); ?> đ</td>
                              </tr>
                              <?php
                                }
                              ?>
                              <tr>
                                <td colspan="4" align="right">Giá trị</td>
                                <td colspan="2"><b><?php echo @number_format($info['price']); ?></b> VND</td>
                              </tr>
                              <!--tr>
                                <td colspan="4" align="right">Phí vận chuyển</td>
                                <td colspan="2"> Chưa được cập nhật hoặc miễn phí </td>
                              </tr-->
                              <tr>
                                <td colspan="4" align="right">Tổng giá trị đơn hàng</td>
                                <td colspan="2"><b><?php echo @number_format($info['price']); ?></b> VND</td>
                              </tr>
                            </tbody>
                          </table>
                          <p>&nbsp;</p></td>
                      </tr>
                    </tbody>
                  </table>
                <p align="center"><a href="javascript:window.print()">In đơn hàng</a></p>
                <p>&nbsp;</p></td>
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
