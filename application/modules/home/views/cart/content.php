<!--div class="content_full">
<?php $this->load->view("column_left"); ?>

<div class="column_right">
  <div id="location"> <a href="/" title="Trang chủ">Trang chủ</a> » <a href="javascript:void(0)" title="Trang chủ">Giỏ hàng</a> </div>
  <div class="clear"></div>
  <div class="box_column_right">
    <div class="title_box_right">
      <h2>Giỏ hàng</h2>
    </div>
    <div class="clear"></div>
    <?php
		if(!isset($_GET['step']) || $_GET['step'] == 1){
	?>
    <div style="padding:10px;">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url()."home/cart/updatecart"; ?>" onsubmit="return check_field()">
        
        <span style="display: none;"></span><span style="display: none;"> </span>
        <table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%; ">
          <tbody>
            <tr bgcolor="#eee" style="color:#333; font-weight:bold; font-size:12px;">
              <td width="6%" style="text-align:center;">STT</td>
              <td width="53%">Tên sản phẩm</td>
              <td width="13%">Giá sản phẩm</td>
              <td width="9%">Số lượng</td>
              <td width="12%">Tổng</td>
              <td width="7%" style="text-align:center;">Thao tác</td>
            </tr>
            <?php
				if($this->cart->total_items()){
					echo form_open(base_url().'home/cart/updatecart/'); 
					$i = 1;
					$stt = 0;
					foreach($cart as $item){
						$i++;
						$stt++;
						@$images = unserialize($item['serial']['images']);
						echo form_hidden($i.'[rowid]', $item['rowid']);
			?>
            <tr>
              <td style="text-align:center;"><?php echo $stt; ?></td>
              <td class="product_cart">
              	<img src="<?php echo base_url()."uploads/products/thumb/".$images[0].""; ?>" style="vertical-align: middle; margin-right: 10px; float:left;max-width:120px"> <a href="<?php echo base_url()."".$item['rewrite']."/p".$item['id'].".html"; ?>"><b><?php echo $item['name']; ?></b></a> <br />
              </td>
              <td class="product_cart"><span id="sell_price_pro_<?php echo $item['id']; ?>"><?php if($item['price'] == NULL){echo "Liên hệ";}else{echo @number_format($item['price'])." đ"; }?></span></td>
              <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $item['qty'], 'maxlength' => '3', 'size' => '3')); ?></td>
              <td class="product_cart"><b><span id="price_pro_<?php echo $item['id']; ?>"><?php echo $this->cart->format_number($item['subtotal'])." đ"; ?></span></b></td>
              <td style="text-align:center;">
              <input class="update_cart" type="submit" name="submit" value="" />
              <a title="Xóa sản phẩm" href="<?php echo base_url()."home/cart/del/".$item['id'] ?>"><img src="<?php echo base_url()."public/images/"; ?>cart_del.png"></a>
              </td>
            </tr>
            <?php
				} }else{
					echo "<tr><td colspan='6'>Không có sản phẩm nào trong giỏ hàng.</td></tr>";	
				}
			?>
            
            <tr>
              <td colspan="4"><div class="support_in_cart"> Bạn gặp khó khăn trong việc đặt hàng? Vui lòng nhấc máy để được trợ giúp: &nbsp;&nbsp;<b class="font18 red">0978.034.085</b> </div></td>
              <td colspan="2"><b>Tổng tiền:</b> <b style="color:red;"><span class="sub1" id="total_value" style="color: red; font-weight: bold;"><?php echo number_format($this->cart->total())." đ"; ?></span></b></td>
            </tr>
          </tbody>
        </table>
        <div class="clear space2"></div>
        <?php
			if($this->cart->total_items()){
		?>
        <div align="right"> 
       		<a class="cart_thanhtoan" href="<?php echo base_url()."gio-hang.html"; ?>?step=2"></a> <a class="cart_muatiep" href="<?php echo base_url(); ?>"></a> 
        </div>
        <div class="clear space2"></div>
        <?php
			}
		?>
      </form>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php
		}else{
	?>
    <div style="padding:10px;">
    <div class="contact_view cart_view" style="color: rgb(255, 0, 0);"> </div>
      <form id="cart_form" method="post" enctype="multipart/form-data" action="javascript:void(0);" >
        <script>
			function show(id) {
			  var current_open = document.getElementById('current_open_info').value;
			  
			  if(current_open != ''){
				document.getElementById(current_open).style.display = "none";
			  }
			
			  var current = document.getElementById(id).style.display;
			  if(current == "none"){
				  document.getElementById(id).style.display = "block";
				  document.getElementById('current_open_info').value = id; 
			  }else{
				  document.getElementById(id).style.display = "none";
			  }
			}
			
			function open_tax_form(check_box_id, tax_form_id){
			var chk = document.getElementById(check_box_id).checked;
			if(chk){
			  document.getElementById(tax_form_id).style.display = "block";
			}else{
				document.getElementById(tax_form_id).style.display = "none";
			}
			}
			
			function fill_ship_info(){
				document.getElementById('ship_to_name').value = document.getElementById('cart_name').value;
				document.getElementById('ship_to_tel').value = document.getElementById('cart_tel').value;
				document.getElementById('ship_to_address').value = document.getElementById('cart_address').value;
			}

		</script>
        
        <div class="c3_col_1">
          <div class="c3_box">
            <div class="title_box_cart"> Thông tin khách hàng</div>
            <div> Họ tên quý khách <span class="txt2">*</span> <br />
              <input class="inputtxt" type="text" size="40" name="cart_name" id="cart_name" />
            </div>
            <div> Địa chỉ Email <span class="txt2">*</span> <br />
              <input class="inputtxt" type="text" size="40" name="cart_email" id="cart_email" />
            </div>
            <div> Số điện thoại <span class="txt2">*</span> <br />
              <input class="inputtxt" type="text" size="40" name="cart_tel" id="cart_tel" />
            </div>
            <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span> <br />
              <textarea name="cart_address" id="cart_address" style="width: 264px; height: 50px;"></textarea>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="c3_col_1" style="margin: 0;">
          <div class="c3_box">
            <div class="title_box_cart">Hình thức thanh toán</div>
            <div>
              <div class="t_line1">
                <input type="radio" name="pay_method" class="pay_method" value="1" onchange="show('pay_1')" />
              </div>
              <div class="t_line2">
                <div class="txt0">Thanh toán ATM nội địa</div>
                <div class="txt_555" id="pay_1" style="display:none;">Thanh toán đơn hàng qua thẻ ATM từ các ngân hàng trong nước</div>
              </div>
            </div>
            <div class="clear"></div>
            <div>
              <div class="t_line1">
                <input type="radio" name="pay_method" class="pay_method" value="2" onchange="show('pay_2')" />
              </div>
              <div class="t_line2">
                <div class="txt0">Chuyển khoản ngân hàng</div>
                <div class="txt_555" id="pay_2" style="display:none;">Chuyển khoản qua tài khoản ngân hàng</div>
              </div>
            </div>
            <div class="clear"></div>
            <div>
              <div class="t_line1">
                <input type="radio" name="pay_method" class="pay_method" value="3" onchange="show('pay_3')" />
              </div>
              <div class="t_line2">
                <div class="txt0">Thanh toán trực tiếp</div>
                <div class="txt_555" id="pay_3" style="display:none;">Thanh toán khi nhận hàng hoặc khi đến cửa hàng</div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="c3_box">
            <div class="title_box_cart">Hình thức vận chuyển</div>
            <div>
              <table>
                <tbody>
                  <tr>
                    <td><input type="radio" name="ship_method" class="ship_method" value="1" onchange="show('ship_1')" /></td>
                    <td><div class="txt0">Giao hàng tận nhà</div>
                      <div class="txt_555" id="ship_1" style="display:none;">Nhận hàng tại nhà, vận chuyển bởi nhân viên của Matsons</div></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="ship_method" class="ship_method" value="2" onchange="show('ship_1')" /></td>
                    <td><div class="txt0">Chuyển phát nhanh</div>
                      <div class="txt_555" id="ship_2" style="display:none;">Chuyển phát nhanh</div></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="c3_col_1 c3_col_2">
          <div class="title_box_cart"> Xác nhận đơn hàng</div>
          <div class="c3_box">
            <div class="tbl_cart3">
              <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
                <tbody>
                	<?php
						if($this->cart->total_items()){
							echo form_open(base_url().'home/cart/updatecart/'); 
							$i = 1;
							$stt = 0;
							foreach($cart as $item){
								$i++;
								$stt++;
					?>
                      <tr>
                        <td><?php echo $stt; ?></td>
                        <td><a href=""><b><?php echo $item['name']; ?></b></a></td>
                        <td><strong class="red"><?php echo @number_format($item['price']); ?></strong></td>
                        <td><?php echo $item['qty']; ?></td>
                      </tr>
                  	<?php
							}
						}
				  	?>
                  <tr class="txt_16">
                    <td class="txt0" colspan="2" style="width: 80px;"> Tổng tiền </td>
                    <td class="txt2 txt_right" colspan="2"><strong class="red"><?php echo number_format($this->cart->total())." đ"; ?></strong></td>
                  </tr>
                </tbody>
              </table>
              <div class="tbl_finish" style="padding: 20px 0 0;">
                <table style="width: 100%;">
                  <tbody>
                    <tr class="">
                      <td class="txt0 txt_20"><b>Thanh toán</b></td>
                      <td class="txt2 txt_20"><strong class="red"><?php echo number_format($this->cart->total())." đ"; ?></strong></td>
                      <input type="hidden" name="cart_total" id="cart_total" value="<?php echo $this->cart->total().""; ?>" />
                    </tr>
                    <tr>
                      <td></td>
                      <td class="txt_555">Đã bao gồm VAT</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="clear"></div>
              <div style="text-align: right;padding-right: 22px;">
                <input type="submit" id="send_all" name="ok" class="cart_guidonhang" />
                <a href="<?php echo base_url()."gio-hang.html"; ?>?step=1" class="cart_quaylai"></a> </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </form>
      <script type="text/javascript">
	  	$(document).ready(function(){
			$("#send_all").click(function(){
				cart_name		= $("#cart_name").val();
				cart_email		= $("#cart_email").val();
				cart_tel		= $("#cart_tel").val();
				cart_address	= $("#cart_address").val();
				cart_total		= $("#cart_total").val();
				cart_pay		= $(".pay_method:checked").val();
				cart_ship		= $(".ship_method:checked").val();
				val = "abc";
				$.ajax({
					"url"	: "<?php echo base_url()."home/cart/ajax"; ?>",
					"type"	: "post",
					"data"	: "cart_name="+cart_name+"&cart_email="+cart_email+"&cart_tel="+cart_tel+"&cart_address="+cart_address+"&cart_total="+cart_total+"&cart_pay="+cart_pay+"&cart_ship="+cart_ship+"&type="+val,
					"async"	: "false",
					beforeSend : function(){
						$(".cart_view").html("<img class='check_suscess' src='"+links+"public/admin/images/ajax-loader.gif' /> Đang load dữ liệu ...");
					},
					success: function(results_cart){
						if(results_cart == 1){
							$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/check_error.png' />Vui lòng nhập đầy đủ thông tin");
						}else if(results_cart == 3){
							$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/check_error.png' />Số điện thoại không đúng, vui lòng kiểm tra lại");
						}else if(results_cart == 2){
							$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/check_error.png' />Email không đúng định dạng, vui lòng kiểm tra lại");
							return false;
						}else{
							//$(".cart_view").html(results_cart);
							//return false;
							$(".cart_view").css("color","#639537").html("<img class='check_suscess' src='"+links+"public/admin/images/check_suscess.png' />Đơn hàng của bạn đã được gửi, chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất !.");
							$("#cart_form").fadeOut("fast");
                            $("#count_shopping_cart_store").html("0");
							$("#cart_name").val("");
							$("#cart_email").val("");
							$("#cart_tel").val("");
							$("#cart_address").val("");
						}
					}
				})
				return false;
			});
		});
      </script>
      <div class="clear"></div>
    </div>
    <?php
		}
	?>
  </div>
 
</div>
</div-->
</header>
<section id="main-body">
      <div class="main-content">
        <div class="row">
          <div class="col-24 de-breadcrumbs">
            <a href="<?php echo base_url(); ?>">Trang chủ </a>>><a href=""> Giỏ hàng</a>
          </div>
          <div class="col-24">
            <div class="de-product-l-cart">
  <div class="clear"></div>
  <div class="box_column_right">
    <div class="title_box_right">
      <h2>Giỏ hàng</h2>
    </div>
    <div class="clear"></div>
    <?php
    if(!isset($_GET['step']) || $_GET['step'] == 1){
  ?>
    <div style="padding:10px;">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url()."home/cart/updatecart"; ?>" onsubmit="return check_field()">
        
        <span style="display: none;"></span><span style="display: none;"> </span>
        <table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%; ">
          <tbody>
            <tr bgcolor="#eee" style="color:#333; font-weight:bold; font-size:12px;">
              <td width="6%" style="text-align:center;">STT</td>
              <td width="53%">Tên sản phẩm</td>
              <td width="13%">Giá sản phẩm</td>
              <td width="9%">Số lượng</td>
              <td width="12%">Tổng</td>
              <td width="7%" style="text-align:center;">Thao tác</td>
            </tr>
            <?php
        if($this->cart->total_items()){
          echo form_open(base_url().'home/cart/updatecart/'); 
          $i = 1;
          $stt = 0;
          foreach($cart as $item){
            $i++;
            $stt++;
            @$images = unserialize($item['serial']['images']);
            echo form_hidden($i.'[rowid]', $item['rowid']);
      ?>
            <tr>
              <td style="text-align:center;"><?php echo $stt; ?></td>
              <td class="product_cart">
                <img src="<?php echo base_url()."uploads/products/thumb/".$images[0].""; ?>" style="vertical-align: middle; margin-right: 10px; float:left;max-width:120px"> <a href="<?php echo base_url()."".$item['rewrite']."/p".$item['id'].".html"; ?>"><b><?php echo $item['name']; ?></b></a> <br />
              </td>
              <td class="product_cart"><span id="sell_price_pro_<?php echo $item['id']; ?>"><?php if($item['price'] == NULL){echo "Liên hệ";}else{echo @number_format($item['price'])." đ"; }?></span></td>
              <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $item['qty'], 'maxlength' => '3', 'size' => '3')); ?></td>
              <td class="product_cart"><b><span id="price_pro_<?php echo $item['id']; ?>"><?php echo $this->cart->format_number($item['subtotal'])." đ"; ?></span></b></td>
              <td style="text-align:center;">
              <input class="update_cart" type="submit" name="submit" value="" />
              <a title="Xóa sản phẩm" href="<?php echo base_url()."home/cart/del/".$item['id'] ?>"><img src="<?php echo base_url()."public/images/"; ?>cart_del.png"></a>
              </td>
            </tr>
            <?php
        } }else{
          echo "<tr><td colspan='6'>Không có sản phẩm nào trong giỏ hàng.</td></tr>"; 
        }
      ?>
            
            <tr>
              <td colspan="4"><div class="support_in_cart"> Bạn gặp khó khăn trong việc đặt hàng? Vui lòng nhấc máy để được trợ giúp: &nbsp;&nbsp;<b class="font18 red">0921 345 169</b> </div></td>
              <td colspan="2"><b>Tổng tiền:</b> <b style="color:red;"><span class="sub1" id="total_value" style="color: red; font-weight: bold;"><?php echo number_format($this->cart->total())." đ"; ?></span></b></td>
            </tr>
          </tbody>
        </table>
        <div class="clear space2"></div>
        <?php
      if($this->cart->total_items()){
    ?>
        <div align="right"> 
          <a class="cart_thanhtoan" href="<?php echo base_url()."gio-hang.html"; ?>?step=2"></a> <a class="cart_muatiep" href="<?php echo base_url(); ?>"></a> 
        </div>
        <div class="clear space2"></div>
        <?php
      }
    ?>
      </form>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php
    }else{
  ?>
    <div style="padding:10px;">
    <div class="contact_view cart_view" style="color: rgb(255, 0, 0);"> </div>
      <form id="cart_form" method="post" enctype="multipart/form-data" action="javascript:void(0);" >
        <script>
      function show(id) {
        var current_open = document.getElementById('current_open_info').value;
        
        if(current_open != ''){
        document.getElementById(current_open).style.display = "none";
        }
      
        var current = document.getElementById(id).style.display;
        if(current == "none"){
          document.getElementById(id).style.display = "block";
          document.getElementById('current_open_info').value = id; 
        }else{
          document.getElementById(id).style.display = "none";
        }
      }
      
      function open_tax_form(check_box_id, tax_form_id){
      var chk = document.getElementById(check_box_id).checked;
      if(chk){
        document.getElementById(tax_form_id).style.display = "block";
      }else{
        document.getElementById(tax_form_id).style.display = "none";
      }
      }
      
      function fill_ship_info(){
        document.getElementById('ship_to_name').value = document.getElementById('cart_name').value;
        document.getElementById('ship_to_tel').value = document.getElementById('cart_tel').value;
        document.getElementById('ship_to_address').value = document.getElementById('cart_address').value;
      }

    </script>
        
        <div class="c3_col_1">
          <div class="c3_box">
            <div class="title_box_cart"> Thông tin khách hàng</div>
            <div> Họ tên quý khách <span class="txt2">*</span> <br />
              <input class="inputtxt" type="text" size="40" name="cart_name" id="cart_name" />
            </div>
            <div> Địa chỉ Email <span class="txt2">*</span> <br />
              <input class="inputtxt" type="text" size="40" name="cart_email" id="cart_email" />
            </div>
            <div> Số điện thoại <span class="txt2">*</span> <br />
              <input class="inputtxt" type="text" size="40" name="cart_tel" id="cart_tel" />
            </div>
            <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span> <br />
              <textarea name="cart_address" id="cart_address" style="width: 264px; height: 50px;"></textarea>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="c3_col_1" style="margin: 0;">
          <div class="c3_box">
            <div class="title_box_cart">Hình thức thanh toán</div>
            <div>
              <div class="t_line1">
                <input type="radio" name="pay_method" class="pay_method" value="1" onchange="show('pay_1')" />
              </div>
              <div class="t_line2">
                <div class="txt0">Thanh toán ATM nội địa</div>
                <div class="txt_555" id="pay_1" style="display:none;">Thanh toán đơn hàng qua thẻ ATM từ các ngân hàng trong nước</div>
              </div>
            </div>
            <div class="clear"></div>
            <div>
              <div class="t_line1">
                <input type="radio" name="pay_method" class="pay_method" value="2" onchange="show('pay_2')" />
              </div>
              <div class="t_line2">
                <div class="txt0">Chuyển khoản ngân hàng</div>
                <div class="txt_555" id="pay_2" style="display:none;">Chuyển khoản qua tài khoản ngân hàng</div>
              </div>
            </div>
            <div class="clear"></div>
            <div>
              <div class="t_line1">
                <input type="radio" name="pay_method" class="pay_method" value="3" onchange="show('pay_3')" />
              </div>
              <div class="t_line2">
                <div class="txt0">Thanh toán trực tiếp</div>
                <div class="txt_555" id="pay_3" style="display:none;">Thanh toán khi nhận hàng hoặc khi đến cửa hàng</div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="c3_box">
            <div class="title_box_cart">Hình thức vận chuyển</div>
            <div>
              <table>
                <tbody>
                  <tr>
                    <td><input type="radio" name="ship_method" class="ship_method" value="1" onchange="show('ship_1')" /></td>
                    <td><div class="txt0">Giao hàng tận nhà</div>
                      <div class="txt_555" id="ship_1" style="display:none;">Nhận hàng tại nhà, vận chuyển bởi nhân viên của Matsons</div></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="ship_method" class="ship_method" value="2" onchange="show('ship_1')" /></td>
                    <td><div class="txt0">Chuyển phát nhanh</div>
                      <div class="txt_555" id="ship_2" style="display:none;">Chuyển phát nhanh</div></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="c3_col_1 c3_col_2">
          <div class="title_box_cart"> Xác nhận đơn hàng</div>
          <div class="c3_box">
            <div class="tbl_cart3">
              <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
                <tbody>
                  <?php
            if($this->cart->total_items()){
              echo form_open(base_url().'home/cart/updatecart/'); 
              $i = 1;
              $stt = 0;
              foreach($cart as $item){
                $i++;
                $stt++;
          ?>
                      <tr>
                        <td><?php echo $stt; ?></td>
                        <td><a href=""><b><?php echo $item['name']; ?></b></a></td>
                        <td><strong class="red"><?php echo @number_format($item['price']); ?></strong></td>
                        <td><?php echo $item['qty']; ?></td>
                      </tr>
                    <?php
              }
            }
            ?>
                  <tr class="txt_16">
                    <td class="txt0" colspan="2" style="width: 80px;"> Tổng tiền </td>
                    <td class="txt2 txt_right" colspan="2"><strong class="red"><?php echo number_format($this->cart->total())." đ"; ?></strong></td>
                  </tr>
                </tbody>
              </table>
              <div class="tbl_finish" style="padding: 20px 0 0;">
                <table style="width: 100%;">
                  <tbody>
                    <tr class="">
                      <td class="txt0 txt_20"><b>Thanh toán</b></td>
                      <td class="txt2 txt_20"><strong class="red"><?php echo number_format($this->cart->total())." đ"; ?></strong></td>
                      <input type="hidden" name="cart_total" id="cart_total" value="<?php echo $this->cart->total().""; ?>" />
                    </tr>
                    <tr>
                      <td></td>
                      <td class="txt_555">Đã bao gồm VAT</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="clear"></div>
              <div style="text-align: right;padding-right: 22px;">
                <input type="submit" id="send_all" name="ok" class="cart_guidonhang" />
                <a href="<?php echo base_url()."gio-hang.html"; ?>?step=1" class="cart_quaylai"></a> </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </form>
      <script type="text/javascript">
      $(document).ready(function(){
      $("#send_all").click(function(){
        cart_name   = $("#cart_name").val();
        cart_email    = $("#cart_email").val();
        cart_tel    = $("#cart_tel").val();
        cart_address  = $("#cart_address").val();
        cart_total    = $("#cart_total").val();
        cart_pay    = $(".pay_method:checked").val();
        cart_ship   = $(".ship_method:checked").val();
        val = "abc";
        $.ajax({
          "url" : "<?php echo base_url()."home/cart/ajax"; ?>",
          "type"  : "post",
          "data"  : "cart_name="+cart_name+"&cart_email="+cart_email+"&cart_tel="+cart_tel+"&cart_address="+cart_address+"&cart_total="+cart_total+"&cart_pay="+cart_pay+"&cart_ship="+cart_ship+"&type="+val,
          "async" : "false",
          beforeSend : function(){
            $(".cart_view").html("<img class='check_suscess' src='"+links+"public/admin/images/ajax-loader.gif' /> Đang load dữ liệu ...");
          },
          success: function(results_cart){
            if(results_cart == 1){
              $(".cart_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/check_error.png' />Vui lòng nhập đầy đủ thông tin");
            }else if(results_cart == 3){
              $(".cart_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/check_error.png' />Số điện thoại không đúng, vui lòng kiểm tra lại");
            }else if(results_cart == 2){
              $(".cart_view").css("color","#f00").html("<img class='check_suscess' src='"+links+"public/admin/images/check_error.png' />Email không đúng định dạng, vui lòng kiểm tra lại");
              return false;
            }else{
              //$(".cart_view").html(results_cart);
              //return false;
              $(".cart_view").css("color","#639537").html("<img class='check_suscess' src='"+links+"public/admin/images/check_suscess.png' />Đơn hàng của bạn đã được gửi, chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất !.");
              $("#cart_form").fadeOut("fast");
                            $("#count_shopping_cart_store").html("0");
              $("#cart_name").val("");
              $("#cart_email").val("");
              $("#cart_tel").val("");
              $("#cart_address").val("");
            }
          }
        })
        return false;
      });
    });
      </script>
      <div class="clear"></div>
    </div>
    <?php
    }
  ?>
  </div>
    </div>
  </div>
</div>
</div>
</section>
