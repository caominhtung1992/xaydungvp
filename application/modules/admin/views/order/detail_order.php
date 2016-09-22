<div class="paddings">
  <h2 id="title">Đơn hàng #<?php echo $detail['id']; ?></h2>
  <div id="action-links">
    <ul>
      <!--<li id="note"><a href="#">Thêm ghi chú</a></li>-->
      <li id="print"><a href="javascript:window.print()" target="_blank">In đơn hàng</a></li>
      <!--<li id="lock"><a href="#">Đóng đơn hàng này</a></li>-->
    </ul>
  </div>
  <div id="order-update-status-box">
    <h3>Cập nhật trạng thái đơn hàng</h3>
    <table>
      <tbody>
        <tr>
          <td>Trạng thái</td>
          <td><select id="status_id">
              <option value="0">--Chọn --</option>
              <option value="1">Chưa xử lý</option>
              <option value="2">Đang chuyển hàng</option>
              <option value="3">Thành công</option>
              <option value="4">Hủy bỏ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Ghi chú thêm</td>
          <td><textarea cols="40" rows="5" id="status_comment"></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td><span id="update_status">
            <input type="button" value="Cập nhật" onClick="update_order_status(<?php echo $detail['id']; ?>)">
            </span></td>
        </tr>
      </tbody>
    </table>
  </div>
  <script>
	function update_order_status(order_id){
		var status = $("#status_id").val();
		if(status == '0') {
			alert("Bạn cần chọn 1 trạng thái");
			return false;	
		}
		if(confirm("Bạn đã chắc chắn chưa ?")) {
			$.post("<?php echo base_url(); ?>admin/order/ajax",{action : 'update-status', order_id: order_id, status_id: status, comment : $("#status_comment").val() }, function(data) {$("#update_status").html("Cập nhật xong"); } );
		}
	}
</script> 
  <br />
  <div style="font-weight:bold; margin-bottom:10px">1. Thời gian: <?php echo $detail['date']; ?></div>
  <br />
  <div style="font-weight:bold; margin-bottom:10px">2. Thông tin người mua</div>
  <div id="user_info_1">
    <table>
      <tbody>
        <tr>
          <td>Họ tên</td>
          <td> : <?php echo $detail['name']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td> : <?php echo $detail['email']; ?></td>
        </tr>
        <tr>
          <td>Địa chỉ</td>
          <td> : <?php echo $detail['local']; ?></td>
        </tr>
        <tr>
          <td>Điện thoại</td>
          <td> : <?php echo $detail['phone']; ?> </td>
        </tr>
        <tr>
          <td>Hình thức vận chuyển</td>
          <td> : <?php 
		  			if($detail['ship_method'] == 1){
						echo "Giao hàng tận nhà";
					}else if($detail['ship_method'] == 2){
						echo "Chuyển phát nhanh";
					}
				?>
          </td>
        </tr>
        <tr>
          <td>Hình thức thanh toán</td>
          <td> : 
          		<?php 
		  			if($detail['pay_method'] == 1){
						echo "Thanh toán ATM nội địa";
					}else if($detail['pay_method'] == 2){
						echo "Chuyển khoản ngân hàng";
					}else{
						echo "Thanh toán trực tiếp";
					}
				?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br />
  <div style="font-weight:bold; margin-bottom:10px">3. Thông tin đơn hàng</div>
  <table id="tb_padding" width="100%" cellpadding="5" border="1" bordercolor="#CCCCCC">
    <tbody>
      <tr bgcolor="#EEEEEE">
        <td width="9%">STT</td>
        <td width="17%">Ảnh</td>
        <!-- <td>Mã kho hàng</td> -->
        <td width="32%">Tên sản phẩm</td>
        <td width="11%">Giá bán</td>
        <td width="7%">Số lượng</td>
        <td width="10%">Tổng</td>
        <td width="14%">Ghi chú</td>
      </tr>
      <?php
	  	$unserial = $detail['serial'];
		$serial = json_decode($unserial,true);
		$stt = 0;
		foreach($serial as $value){
			$stt++;
			$imgs = $value['serial']['images'];
			$images = unserialize($imgs);
			/*echo "<pre>";
			print_r($images);
			echo "</pre>";
			die();*/
	  ?>
      <tr>
        <td><?php echo $stt; ?></td>
        <td><img src="<?php echo base_url()."uploads/products/thumb/".$images[0].""; ?>" style="width:80px;" /></td>
        <!-- <td></td> -->
        <td> [SP] <a href="<?php echo base_url()."".$value['rewrite']."/p".$value['id'].".html"; ?>" target="_blank"><b><?php echo $value['name']; ?></b></a><br />
          <br /></td>
        <td><?php echo @number_format($value['price'])." VNĐ"; ?></td>
        <td><?php echo $value['qty']; ?></td>
        <td><?php echo @number_format($value['subtotal'])." VNĐ"; ?></td>
        <td></td>
      </tr>
      <?php
	  	}
	  ?>
      <tr>
        <td colspan="4" align="right">Tổng giá trị</td>
        <td colspan="4"><b><?php echo @number_format($detail['price']); ?></b> VND <br />
          (Chưa gồm phí vận chuyển)</td>
      </tr>
    </tbody>
  </table>
  <br />
  <!-- <div style="font-weight:bold; margin-bottom:10px">3. Lịch sử trạng thái</div> -->
  <!-- <table id="tb_padding" cellpadding="5" border="1" bordercolor="#CCC" style="border-collapse:collapse;">
    <tbody>
      <tr style="background:#eee; font-weight:bold">
        <td>STT</td>
        <td>Trạng thái</td>
        <td>Ghi chú</td>
        <td>Người cập nhật</td>
      </tr>
      <tr>
        <td>1.</td>
        <td>Đơn hàng hủy bỏ</td>
        <td></td>
        <td>bachnx@gmail.com lúc 28-02-2014, 2:08 pm</td>
      </tr>
    </tbody>
  </table> -->
  <br />
</div>
