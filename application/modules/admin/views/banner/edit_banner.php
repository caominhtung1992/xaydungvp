<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url(); ?>admin/banner/add">Thêm banner mới</a></li>
      <li id="add-prod"><a href="<?php echo base_url(); ?>admin/banner">Danh sách banner</a></li>
    </ul>
  </div>
  <div style="text-align:center;color:#f00;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
  <form method="post" enctype="multipart/form-data">
    <div style="max-width:850px; max-height:600px; overflow:auto;"> File:
      <input type="text" readonly="" size="80" value="<?php echo base_url()."uploads/banner/".$get['slide_image']; ?>">
      <br>
      <img border="0" src="<?php echo base_url()."uploads/banner/".$get['slide_image']; ?>" width="514" height="99"> </div>
    <br>
    <style type="text/css">
	.hide-section { display:none}
	.hide-row { display:none}
	</style>
    <table border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%" id="tb_padding">
      <tbody>
      
        <tr style="background:#fff !important;color:#6e6f70">
          <td>Vị trí quảng cáo</td>
          <td><select name="locationId">
              <option>--Chọn vị trí--</option>
              <?php 
					if(isset($list_location) && $list_location != NULL){
						foreach($list_location as $location){
							echo "<option value='".$location['location_id']."' ";
							if($get['slide_type'] == $location['location_id']){
								echo "selected='selected'";
							}
							echo ">".$location['location_name']."</option>";
						}
					}
				?>
            </select>
            (<a href="<?php echo base_url(); ?>admin/banner/location">Quản lý vị trí</a>) <a class="short_tooltip" href="#"><img src="<?php echo base_url(); ?>public/admin/images/about.png" width="16" height="16" alt=""><span class="tooltip_classic">Tùy vào cài đặt banner ở các vị trí khác nhau, bạn cần chọn vị trí mà banner này sẽ hiển thị.</span></a></td>
        </tr>
        
        <tr>
          <td>Đặt tên banner để theo dõi</td>
          <td><input type="text" name="slide_name" value="<?php echo $get['slide_title']; ?>" size="50">
            <a class="short_tooltip" href="#"><img src="<?php echo base_url(); ?>public/admin/images/about.png" width="16" height="16" alt=""><span class="tooltip_classic">Nếu bạn có nhiều banner và muốn thay đổi, theo dõi, bạn nên đặt tên cụ thể <br />
            v.d. Banner quảng cáo khuyến mại 8/3/2012.</span></a></td>
        </tr>
        <tr>
          <td>File banner</td>
          <td> Upload từ máy tính <br />
            <input type="file" name="media_file_1" size="40">
            <a class="short_tooltip" href="#"><img src="<?php echo base_url(); ?>public/admin/images/about.png" width="16" height="16" alt=""><span class="tooltip_classic">Tìm file trong máy tính của bạn và tải lên. Dung lượng file tối đa là 400KB. Loại file Ảnh (.jpg, .gif, .png) hoặc Flash (.swf)</span></a>
            <input type="hidden" name="current_file" value=""></td>
        </tr>
        <tr>
          <td style="font-weight:bold; color:#F00">Địa chỉ URL đích</td>
          <td><input type="text" name="desUrl" value="<?php echo $get['slide_link']; ?>" size="50">
            <a class="short_tooltip" href="#"><img src="<?php echo base_url(); ?>public/admin/images/about.png" width="16" height="16" alt=""><span class="tooltip_classic">Địa chỉ trang web sau khi người dùng click vào banner.</span></a></td>
        </tr>
        
      </tbody>
    </table>
    <br>
    <div class="group-actions">
      <input class="btn" id="submit-collection-btn" name="ok" type="submit" value="Cập nhật >>">
      hoặc <a href="<?php echo base_url(); ?>admin/banner">Hủy bỏ</a> </div>
    <!-- .group-actions -->
  </form>
	
  <script type="text/javascript">
	function select_cat(box_id, id){
		var checked = document.getElementById(box_id).checked;	
		var current_list = $("#selected_cat").val();
		if(checked){
			document.getElementById("selected_cat").value = current_list + id + ",";
		}else{
			document.getElementById("selected_cat").value = current_list.replace(","+id+",",",");
		}
	}
	function open_category_select(opt){
		switch(opt){
			case "product_list":
			case 'product_detail' :
				$(".hide-section").css("display", "block");
				$(".hide-row").css("display", "table-row");
				document.getElementById('selected_cat').value = ','; //reset
				document.getElementById('category_list').style.display = 'block';
				document.getElementById('collection_list').style.display = 'none';
			break;
			case "collection_list" :
				$(".hide-section").css("display", "block");
				$(".hide-row").css("display", "table-row");
				document.getElementById('selected_cat').value = ','; //reset
				document.getElementById('collection_list').style.display = 'block';
				document.getElementById('category_list').style.display = 'none';
			break;
			default:
				document.getElementById('selected_cat').value = ','; //reset
				document.getElementById('collection_list').style.display = 'block';
				document.getElementById('category_list').style.display = 'none';
				$(".hide-section").css("display", "none");
				$(".hide-row").css("display", "none");
			break;
		}
	}
</script> 
</div>
