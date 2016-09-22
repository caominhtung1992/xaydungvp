<div class="paddings">
<style type="text/css">
a:active{outline:0}:focus{-moz-outline-style:none}ul.css-tabs{margin:0!important;padding:0;height:24px;border-bottom:1px solid #DDD}ul.css-tabs li{float:left;padding:0;margin:0;list-style-type:none}ul.css-tabs a{float:left;font-size:12px;display:block;padding:2px 10px;text-decoration:none;border:1px solid #CCC;border-bottom:0;height:18px;background-color:#CFC;color:#333;margin-right:2px;position:relative;top:1px;outline:0;-moz-border-radius:4px 4px 0 0}ul.css-tabs a:hover{background-color:#f7f7f7;color:#333}ul.css-tabs a.current{background-color:#C00;border-bottom:1px solid #ddd;color:#FFF;cursor:default}.css-panes div{display:none;border:1px solid #DDD;border-width:0 1px 1px 1px;min-height:150px;padding:15px 20px;background-color:#FFF}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		var c=$("ul.css-tabs li a");
		var a=$(".css-panes");
		a.hide();
		a.eq(0).show();
		c.click(function(){
			$val=$(this).attr("name");
			a.hide();
			$(".current").removeClass("current");
			$(this).addClass("current");
			a.eq($val).fadeIn();
			return false
		})
	});

</script> 

<!-- tabs -->
<ul class="css-tabs">
  <li><a href="javascript:void(0);" class="current" name="0">Cài đặt chung</a></li>
  <li><a href="javascript:void(0);" class="" name="1">Trang chủ</a></li>
  <!--li><a href="javascript:void(0);" class="">Cột trái</a></li>
    <li><a href="javascript:void(0);" class="">Cột phải</a></li>
    <li><a href="javascript:void(0);" class="">Danh mục sản phẩm</a></li>
    <li><a href="javascript:void(0);" class="">Chi tiết sản phẩm</a></li--> 
  <!--<li><a href="javascript:void(0);">Danh sách tin</a></li>-->
</ul>

<!-- single pane. it is always visible -->
<div class="css-panes">
  <div style="display:block">
    <form action="<?php echo base_url()."admin/setup/index/".$get['set_id']."";?>" method="post">
      <table id="tb_padding" border="1" bordercolor="#CCCCCC">
        <tbody>
          <tr style="background: none !important;color: inherit;">
            <td width="240px">Tạm đóng website<br />
              (Nếu bạn chưa muốn người dùng xem website, hãy tạm đóng lại)</td>
            <td> Mật khẩu để xem:
              <input type="text" size="10" name="set_pass" value="<?php echo $get['set_pass']; ?>" />
              (<span style="color:red">Xóa bỏ mật khẩu để mở lại website</span>)<br />
              Nội dung thông báo khách hàng: <br />
              <textarea cols="60" rows="8" name="set_info"><?php echo $get['set_info']; ?></textarea></td>
          </tr>
          <tr> </tr>
          <tr>
            <td>Số lượng sản phẩm / 1 trang danh mục</td>
            <td><input type="text" size="20" name="set_count_pro" value="<?php echo $get['set_count_pro']; ?>" /></td>
          </tr>
          <tr>
            <td>Số lượng tin tức hiển thị / 1 trang </td>
            <td><input type="text" size="20" name="set_count_news" value="<?php echo $get['set_count_news']; ?>" /></td>
          </tr>
        </tbody>
      </table>
      <br />
      <span id="status_general">
      <input type="submit" class="btn" name="update_home" value="Cập nhật &gt;&gt;" />
      </span>
    </form>
  </div>
</div>
<div class="css-panes">
  <div style="display:block">
    <!-- <p>Hướng dẫn :<br />
      - ID danh mục: nhập danh sách các ID danh mục cách nhau dấu , hoặc khoảng trắng. Để <b style="color:red">percat</b> nếu muốn hệ thống tự động lấy theo danh mục sản phẩm đang xem <br />
      - Số lượng hiển thị : Nhập 0 nếu không muốn dùng nội dung, điền số &gt; 0 để có số lượng cần lấy <br />
      Để website chạy nhanh nhất, chỉ kích hoạt các nội dung mà giao diện hiển thị cần đến. </p> -->
    <br />
    <form action="<?php echo base_url()."admin/setup/homepage/".$get['set_id']."";?>" method="post">
    <table id="tb_padding" border="1" bordercolor="#CCCCCC">
      <tbody>
        <tr style="background: none !important;color: inherit;">
          <td>Sản phẩm nổi bật (HOT)</td>
          <!-- <td>ID danh mục
            <input type="text" size="30" id="product_hot_category" value=""></td> -->
          <td>Số lượng hiển thị :
            <input name="set_pro_hot" type="text" size="10" value="<?php echo $get['set_pro_hot']; ?>"></td>
        </tr>
        <tr>
          <td>Sản phẩm bán chạy nhất (BEST SALE)</td>
          <!-- <td>ID danh mục
            <input type="text" size="30" id="product_bestsale_category" value=""></td> -->
          <td>Số lượng hiển thị :
            <input name="set_pro_bestsale" type="text" size="10" value="<?php echo $get['set_pro_bestsale']; ?>"></td>
        </tr>
        <tr>
          <td>Sản phẩm mới nhất (NEW)</td>
          <!-- <td>ID danh mục
            <input type="text" size="30" id="product_new_category" value=""></td> -->
          <td>Số lượng hiển thị :
            <input name="set_pro_new" type="text" size="10" value="<?php echo $get['set_pro_new']; ?>"></td>
        </tr>
        <tr>
          <td>Sản phẩm xả hàng (SALE OFF)</td>
          <!-- <td>ID danh mục
            <input type="text" size="30" id="product_saleoff_category" value=""></td> -->
          <td>Số lượng hiển thị :
            <input name="set_pro_saleoff" type="text" size="10" value="<?php echo $get['set_pro_saleoff']; ?>"></td>
        </tr>
        <!-- <tr>
          <td>Tin tức</td>
          <td>ID danh mục
            <input type="text" size="30" id="news_category" value=""></td>
          <td>Số lượng hiển thị
            <input type="text" size="10" id="news_num" value="0"></td>
        </tr> -->
        <tr>
          <td></td>
          <td colspan="2"><span id="status_homepage">
            <input type="submit" name="update_homepage" class="btn" value="Cập nhật &gt;&gt;">
            </span></td>
        </tr>
      </tbody>
    </table>
    </form>
  </div>
</div>

<!-- activate tabs with JavaScript --> 