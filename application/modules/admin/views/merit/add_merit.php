<div class="paddings">
	<script type="text/javascript">
		$(document).ready(function(e) {
			$("#ok").click(function(){
	            name = $("#pro_name").val();
				
				if(name == ''){
					alert("Vui lòng nhập tên danh mục !");
					$("#pro_name").focus();
					return false;
				}
			})
        });
    </script>
<div class="paddings">
  <div class="spacer"></div>
  <style type="text/css">
	#post_product_box {width:960px; margin:auto}
</style>
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/product/add" ; ?>">Thêm sản phẩm mới form chuẩn</a><!--  (<a href="">form rút gọn</a>) --></li>
      <li class="csv"><a href="<?php echo base_url()."admin/product/" ; ?>" onClick="parent.location=this.href">Danh sách sản phẩm</a></li>
    </ul>
  </div>
  <form method="post" action="<?php echo base_url()."admin/product/add" ; ?>" name="account_form" enctype="multipart/form-data"> 
    <ul id="tabnav">
      <li class="tab-select"><a href="">Cơ bản</a></li>
    </ul>
    <div class="group">
    <div style="text-align:center;color:#f00;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
    
      <div class="group-fields">
      <div style="margin: 14px 0px;">
      	<div class="label">Chọn danh mục</div>
	    <select id="bachnx_change" name="cate_id" onChange="">
	      <!--option value="0">Chọn danh mục</option-->
	      <?php 
			if(isset($list_cate['cate']) && $list_cate['cate'] != NULL){
				foreach($list_cate['cate'] as $key => $cate){
					echo "<option value='".$cate['cate_id']."'>".$cate['cate_name']."</option>";
					if(isset($list_cate['sub']) && $list_cate['sub'] != NULL){
						foreach($list_cate['sub'][$key] as $k => $v){
							echo "<option value='".$cate['cate_id'].",".$v['cate_id']."'> &nbsp; - ".$v['cate_name']."</option>";
						}
					}
				}
			}
			?>
	    </select>
        
	    </div>
        
        <div class="label">Đặt tên sản phẩm</div>
        <div>
          <input type="text" value="" size="70" name="pro_name" id="pro_name">
          <a class="short_tooltip" href="#"><img src="<?php echo base_url() ?>public/admin/images/about.png" width="16" height="16" alt=""><span class="tooltip_classic">Bạn muốn Google tìm ra sản phẩm này hoặc người xem hiểu ngay về sản phẩm ? Hãy viết tên sản phẩm một cách cụ thể, đầy đủ nhất. Thay vì viết <b>Vaio ABC</b>, hãy viết : <b>Máy tính xách tay Sony Vaio ABC, 500GB, 4GB RAM, 2.4GHz, USA, mới 100%</b> Hoặc thay vì viết <b>Áo 123</b>, hãy viết : <b>Áo khoác nam Made In VietNam, màu đen, đủ size, mã 123</b></span></a></div>
        <br />
 		<div class="label">Mã kho hàng - SKU (nếu có)</div>
        <div>
          <input type="text" value="" size="40" name="pro_code" id="storeSKU">
          <a class="short_tooltip" href="#"><img src="<?php echo base_url() ?>public/admin/images/about.png" width="16" height="16" alt=""><span class="tooltip_classic">Nếu bạn có phần mềm quản lý kho hàng chuyên nghiệp và bạn muốn theo dõi các đơn hàng nhận từ website của sản phẩm trong phần mềm này. Khi đó hãy nhập mã kho hàng của sản phẩm được cung cấp bởi phần mềm kho hàng vào đây.</span></a></div>
        <br />
        
        <div class="label">Thông tin bán sản phẩm</div>
        <table id="tb_padding" border="1" bordercolor="#CCC" style="background-color:#FFF">
          <tbody>
            <tr>
              <td>Giá bán</td>
              <td><input type="text" value="" size="20" name="pro_price"> VND (Giá hiển thị trên website)</td>
            </tr>
	        <tr>
              <td>Giá thị trường</td>
              <td><input type="text" value="" size="20" name="pro_market"> VND (để tham khảo nếu cần)</td>
            </tr>
            <tr>
              <td>Số lượng kho hàng</td>
              <td><input type="text" value="" size="10" name="pro_qty">
                <input type="hidden" value="1" name="old_quantity"></td>
            </tr>
            <tr>
              <td>Khuyến mại kèm theo <br />
                (mỗi KM một dòng)</td>
              <td><textarea name="pro_promotion" id="specialOffer" rows="4" cols="50"></textarea></td>
            </tr>
            <tr>
              <td>Thông tin bảo hành</td>
              <td><textarea name="pro_war" id="warranty" rows="4" cols="50"></textarea></td>
            </tr>
          </tbody>
        </table>
        <br />
        <div class="label">Tóm tắt đặc tính chính</div>
        <div>
          <textarea name="pro_info" id="summary" style="width:600px" rows="6" cols="30"></textarea>
        </div>
        <br />
        
        <div class="label">Chi tiết</div>
        <?php 
			$fck = new FCKeditor('pro_full');
			$fck->BasePath = sBASEPATH;
			//$fck->Value  = $get['pro_full'];
			$fck->Width  = '100%';
			$fck->Height = 500;
			$fck->Create();
		?>
        <dt>
            <label>Dùng cho SEO</label>
          </dt>
            <table>
              <tbody>
                <tr>
                  <td style="padding-bottom:5px;">Meta Keyword</td>
                  <td style="padding-bottom:5px;"><input type="text" size="57" name="pro_key" value="" id="pro_key"></td>
                </tr>
                
                <tr>
                  <td>Meta Description</td>
                  <td><textarea cols="45" rows="6" name="pro_des" id="pro_des"></textarea>
                    <br />
                  </td>
                </tr>
              </tbody>
            </table>
          <br />
        
        <br />
        <div class="instruct" style="font-size: 14px;font-weight: bold;margin: 10px 0px;">Hình ảnh sản phẩm</div><br />
        <p style="font-size:14px; color:#F00"><b>Chú ý:</b> Bạn có thể chọn nhiều ảnh cùng 1 lúc. Chấp nhận các file ảnh: gif, jpg, png</p><br />
        <input type="file" name="image[]" id="filesToUpload" multiple >
      </div>
      <div class="group-actions">
        <input class="btn btn_submit_bachnx" name="ok" id="ok" type="submit" value="Cập nhật &gt;&gt;">
      </div>
    </div>
    <br />
    
  </form>
</div>
