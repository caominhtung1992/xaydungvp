<div class="paddings" id="bachnx_paddings">
	<!--div id="password-protected">
		<span class="lock-icon">Website của bạn đang được tạm dừng. Mật khẩu để xem website là : <strong>123456</strong>.
		Bạn có thể <a href="<?php echo base_url()."admin/setup"; ?>">mở website hoặc đổi mật khẩu</a>.
		</span>
	</div-->
	
	<style type="text/css">
		.div-box table { width:100%;}
	</style>
    <table width="100%" class="bachnx_admin">
      <tbody>
        <tr> 
          <!--start cot trai-->
          <td valign="top" width="55%"><!--Start don hang-->
            
            <div class="bachnx_bg_arrow">
                <div class="pic icon_arrow left"></div>
                <div class="text_arrow left">
                    Đơn hàng mới nhất: (<a style="color: #f00;" href="<?php echo base_url(); ?>admin/order">Xem toàn bộ danh sách</a>)
                </div>
            </div>
            <div class="clear"></div>
            <div class="bachnx_border">
              <table width="100%" class="table_public" border="1" bordercolor="#e0e0e0">
                <tbody>
                  <tr class="table_public_tr">
                    <td width="40" style="text-align:center;">STT</td>
                    <td width="190">Khách hàng</td>
                    <td width="130">Thời gian đặt hàng</td>
                    <td>Giá trị đơn hàng</td>
                    <td width="120">Xem chi tiết</td>
                  </tr>
                  <?php
				  	if(isset($list_order) && $list_order != NULL){
						$stt = 0;
						foreach($list_order as $value){
							$stt++;
				  ?>
	                  <tr onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
	                    <td class="stt"><?php echo $stt; ?></td>
	                    <td class="email"><a href="<?php echo base_url()."admin/order/detail/".$value['id'].""; ?>"><?php echo $value['name']; ?></a></td>
	                    <td class="date"><?php echo $value['date']; ?></td>
	                    <td class="price">
							<?php
								if($value['price'] > 0){
									echo @number_format($value['price'])." VNĐ"; 
								}else{
									echo "Chưa cập nhật";
								}
								
							?>
							 
                        </td>
	                    <td><a href="<?php echo base_url()."admin/order/detail/".$value['id']."" ?>" title="Xem chi tiết">
	                      <div class="pic icon_xem"></div>
	                      </a></td>
	                  </tr>
                  <?php
					} }else{
						echo "<tr><td colspan='5'>Không có đơn hàng mới nào .</td></tr>";
					}
				  ?>
                </tbody>
              </table>
            </div>
            
            <!--End don hang--> 
            
            <!--Start khach hang-->
            
            <div>&nbsp;</div>
            <div class="bachnx_bg_arrow">
                <div class="pic icon_arrow left"></div>
                <div class="text_arrow left">Khách hàng liên hệ qua website</div>
            </div>
            <div class="clear"></div>
            <div class="bachnx_border">
                <table width="100%" class="table_public" border="1" bordercolor="#e0e0e0">
                    <tbody>
                        <tr class="table_public_tr">
                            <td width="40">STT</td>
                            <td width="190">Khách hàng</td>
                            <td width="130">Thời gian</td>
                            <td>Nội dung</td>
                            <td width="120">Xem chi tiết</td>
                        </tr>
                        <?php
						  $stt = 0;
						  if(isset($list_contact) && $list_contact != NULL){
							  foreach($list_contact as $key => $value){
								  $stt++;
						?>
							<tr onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
								<td style="text-align:center;"><?php echo $stt; ?></td>
								<td><?php echo $value['con_date']; ?></td>
								<td><?php echo $value['con_name']; ?><br />
									<?php echo $value['con_phone']; ?>
                                </td>
								<td><?php echo $this->string->cut($value['con_full'],130); ?></td>
								<td>
                                	<a href="<?php echo base_url()."admin/customer_contact/detail/".$value['con_id']."" ?>" title="Xem chi tiết">
								    <div class="pic icon_xem"></div>
								</a>
	                            </td>
							</tr>
						<?php
							  } }else{
							 echo "<tr><td colspan='5'>Không có liên hệ mới nào.</td></tr>";
						 }
						 ?>
                    </tbody>
                </table>
            </div>
            
            <!--End khach hang--> 
            
            <!--Start khach hang đánh giá-->
            
            <div>&nbsp;</div>
            <div class="bachnx_bg_arrow">
                <div class="pic icon_arrow left"></div>
                <div class="text_arrow left">Đánh giá sản phẩm chưa duyệt</div>
            </div>
            <div class="clear"></div>
            <div class="bachnx_border">
              <table width="100%" class="table_public" border="1" bordercolor="#e0e0e0">
                <tbody>
                  <tr class="table_public_tr">
                    <td width="40">STT</td>
                    <td width="120">Khách hàng</td>
                    <td width="110">Thời gian</td>
                    <td>Nội dung</td>
                    <td width="120">Sản phẩm</td>
                    <td width="110">Xem chi tiết</td>
                  </tr>
                  <!-- <tr onmouseover="this.className='row-hover'" onmouseout="this.className=''" class="">
                    <td class="stt">1</td>
                    <td class="email">bachnx@hurama.com</td>
                    <td class="date">17-11-2013, 9:03 am</td>
                    <td class="content">test</td>
                    <td class="content">HTC One</td>
                    <td><a href="javascript:void(0)"><div class="pic icon_xem"></div></a></td>
                  </tr> -->
                  <tr><td colspan="6">Không có đánh giá mới nào.</td></tr>
                  
                </tbody>
              </table>
            </div>
            
            <!--End khach hang đánh giá--></td>
          <!--end cot trai--> 
          <!--start cot phai-->
          <td width="20">&nbsp;</td>
          <td valign="top"><!--Start thống kê-->
            
            <div class="div-box">
              <div id="tabMenuDmPro">
                <div class="bgg a_tab_bachnx">
                  <ul>
                    <li class="curent"><a style="cursor:pointer" name="0"><span>Sản phẩm xem nhiều</span></a></li>
                    <li class=""><a style="cursor:pointer" name="1"><span>Truy cập web</span></a></li>
                    <li class=""><a style="cursor:pointer" name="2"><span>Sản phẩm mua nhiều</span></a></li>
                    <li class=""><a style="cursor:pointer" name="3"><span>Web giới thiệu</span></a></li>
                    <li class=""><a style="cursor:pointer" name="4"><span>Từ khóa</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="space bachnx_bg_while"></div>
              <div class="tab_bachnx" style="" id="content_1">
                <div style="margin: 0px 0px 10px 10px;">Xem nhiều nhất trong 30 ngày qua - <a href="<?php echo base_url(); ?>admin/report/product_view">Xem danh sách</a></div>
                <div id="top_pro_visit">
                  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
                    <tbody>
                      <tr class="bachnx_tab_td">
                        <td style="text-align:center;">STT</td>
                        <td>Sản phẩm</td>
                        <td>Lượt xem</td>
                      </tr>
                      <?php
					  	if(isset($list_proview) && $list_proview != NULL){
							$stt = 0;
							foreach($list_proview as $value){
								$stt++;
					  ?>
	                      <tr onmouseover="this.className='row-hover'" onmouseout="this.className=''">
	                        <td style="text-align:center;"><?php echo $stt; ?></td>
	                        <td><a style="color: #012998;" href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>" target="_blank"><?php echo $value['pro_name']; ?></a></td>
	                        <td><?php echo $value['pro_view']; ?></td>
	                      </tr>
                      <?php
					  		}
						}
					  ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab_bachnx" style="display: none;" id="content_2">
                <div style="margin: 0px 0px 10px 10px;">Số lượt truy cập website theo ngày - <a href="javascript:void(0);">Xem danh sách</a></div>
                <div id="home_report_visitor">
                  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
                    <tbody>
                      <tr class="bachnx_tab_td">
                        <td width="40px">STT</td>
                        <td>Ngày</td>
                        <td width="140px">Số truy cập</td>
                      </tr>
                      <tr onmouseover="this.className='row-hover'" onmouseout="this.className=''">
                        <td>1</td>
                        <td>02-03-2014</td>
                        <td>3.139</td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab_bachnx" style="display: none;" id="content_3">
                <div style="margin: 0px 0px 10px 10px;">Sản phẩm mua nhiều nhất trong 30 ngày qua - <a href="<?php echo base_url(); ?>admin/report/product_buy">Xem danh sách</a></div>
                <div id="home_report_product_buy">
                  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
                    <tbody>
                      <tr class="bachnx_tab_td">
                        <td style="text-align:center;">STT</td>
                        <td>Sản phẩm</td>
                        <td>Số đơn hàng</td>
                      </tr>
                      <?php
					  	if(isset($list_buy) && $list_buy!= NULL){
							$stt = 0;
							foreach($list_buy as $value){
								$stt++;
					  ?>
	                      <tr onmouseover="this.className='row-hover'" onmouseout="this.className=''">
	                        <td style="text-align:center;"><?php echo $stt; ?></td>
	                        <td><a style="color: #012998;" href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>" target="_blank"><?php echo $value['pro_name']; ?></a></td>
	                        <td><?php echo $value['pro_buy']; ?></td>
	                      </tr>
                      <?php
					  		}
						}
					  ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab_bachnx" style="display: none;" id="">
                <div style="margin: 0px 0px 10px 10px;">Website giới thiệu <a href="<?php echo base_url(); ?>admin/report/referer">Xem danh sách</a></div>
                <div id="home_report_search">
                  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
                    <tbody>
                      <tr class="bachnx_tab_td">
                        <td>STT</td>
                        <td>Nguồn</td>
                        <td>Lượt truy cập</td>
                      </tr>
                      <?php
					  	if(isset($list_referer) && $list_referer!= NULL){
							$stt = 0;
							foreach($list_referer as $value){
								$stt++;
					  ?>
                          <tr onmouseover="this.className='row-hover'" onmouseout="this.className=''">
                            <td><?php echo $stt; ?></td>
                            <td>http://<?php echo $value['re_domain']; ?></td>
                            <td><?php echo $value['re_count']; ?></td>
                          </tr>
                      <?php
					  		}
						}else{
							echo "<tr onmouseover='this.className='row-hover'' onmouseout='this.className='''><td colspan='3'>Không có dữ liệu...</td></tr>";
						}
					  ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab_bachnx" style="display: none;" id="content_5">
                <div style="margin: 0px 0px 10px 10px;">Tìm kiếm tại website nhiều nhất trong 30 ngày qua - <a href="<?php echo base_url(); ?>admin/report/search">Xem danh sách</a></div>
                <div id="home_report_search">
                  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
                    <tbody>
                      <tr class="bachnx_tab_td">
                        <td style="text-align:center;">STT</td>
                        <td>Từ khóa</td>
                        <td>Lượt tìm kiếm</td>
                      </tr>
                      <?php
					  	if(isset($list_search) && $list_search!= NULL){
							$stt = 0;
							foreach($list_search as $value){
								$stt++;
					  ?>
	                      <tr onmouseover="this.className='row-hover'" onmouseout="this.className=''">
	                        <td style="text-align:center;"><?php echo $stt; ?></td>
	                        <td><a href="javascript:void(0);" target="_blank"><?php echo $value['count_name']; ?></a></td>
	                        <td><?php echo $value['count_total']; ?></td>
	                      </tr>
                      <?php
					  		}
						}
					  ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!--End thống kê--> 
            <!--Start hỗ trợ từ Northstar-->
            
            <div>&nbsp;</div>
            <div class="bachnx_bg_arrow" style="background:#1799a3">
                <div class="pic icon_arrow left"></div>
                <div class="text_arrow left" style="color:#fff">Hỗ trợ từ Northstar</div>
            </div>
            <div class="clear"></div>
            <div style="padding:3px" class="bachnx_border"> 
              <p style="padding:3px">Quý khách cần hỗ trợ về website, vui lòng <a style="color: #012998;" href="" class="thickbox cboxElement">gửi yêu cầu hỗ trợ tại đây</a></p>
              <div style="font-weight:bold; padding-top:10px; padding-bottom:5px">Yêu cầu đã gửi</div>
              1, <a style="color: #012998;" href="" class="thickbox cboxElement">Cần hỗ trợ về đơn hàng</a> <b style="color:#0000FF">[Xong]</b> - Phản hồi: <b>3</b><br />
            </div>
            
            <!--End hỗ trợ từ Northstar--> 
            
            <!--Start thong bao tu Northstar-->
            
            <div>&nbsp;</div>
            <div class="bachnx_bg_arrow" style="background:#1799a3">
                <div class="pic icon_arrow left"></div>
                <div class="text_arrow left" style="color:#fff">Thông báo từ Northstar</div>
            </div>
            <div class="clear"></div>
            <div style="padding:3px " class="bachnx_border"> 
              <p style="padding:3px">Khi có thông tin về chức năng mới hay phiên bản phần mềm mới, Northstar sẽ thông báo ở đây để quý khách nắm được</p>
            </div>
            
            <!--End thong bao tu Northstar--></td>
          <!--End cot phai--> 
        </tr>
      </tbody>
    </table>
	<script type="text/javascript">
		$(document).ready(function(){
			var c=$(".a_tab_bachnx li a");
			var a=$(".tab_bachnx");
			a.hide();
			a.eq(0).show();
			c.click(function(){
				$val=$(this).attr("name");
				a.hide();
				$(".curent").removeClass("curent");
				$(this).parent().addClass("curent");
				a.eq($val).fadeIn("slow");
				return false
			})
		});
	</script>
      
  </div>
  
  <!--End  noi dung-->