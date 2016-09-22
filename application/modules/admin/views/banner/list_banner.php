<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url(); ?>admin/banner/add">Thêm banner mới</a></li>
      <li id="add-prod"><a href="<?php echo base_url(); ?>admin/banner/location">Quản trị vị trí banner</a></li>
    </ul>
  </div>
  <style type="text/css">
	a.preview_media{
		position:relative; /*this is the key*/
		z-index:24;}
	a.preview_media:hover{z-index:25; cursor:pointer}
	a.preview_media span{display: none}
	a.preview_media:hover span{
		display:block;
		position:absolute;
		top:25px; left:-100px; width:auto;
		text-align: center}
	.peek-view-banner { max-height:250px; max-width:600px; overflow:auto}
	#tb_padding table td { padding:0px}
	#tb_padding input { border:0}
</style>
  <div style="margin-bottom:10px">
    <select onChange="window.location='?location='+this.value">
      <option value="">Xem theo vị trí banner</option>
      <?php 
	  		$get_location = '';
	  		if(isset($_GET['location'])){
				$get_location = $_GET['location'];
			}
			if(isset($list_location) && $list_location != NULL){
				foreach($list_location as $location){
					echo "<option value='".$location['location_id']."' ";
					if($get_location == $location['location_id']){
						echo "selected='selected'";
					}
					echo ">".$location['location_name']."</option>";
				}
			}
		?>
    </select>
  </div>
  <table id="tb_padding" border="1" bordercolor="#CCCCCC" width="100%">
    <tbody>
      <tr style="background-color:#EEE; font-weight:bold;">
        <td style="width:40px">STT</td>
        <td>Thông tin</td>
        <td style="width:60px">Thứ tự</td>
        <td style="width:60px">Click</td>
        <td style="width:130px">Chỉnh sửa</td>
      </tr>
      <?php 
	  		if(isset($list_slide) && !empty($list_slide)){
				$stt = 0;
				foreach($list_slide as $slide){
					$stt++;
	   ?>
      <tr id="row_<?php echo $slide['slide_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
        <td><?php echo $stt; ?></td>
        <td>
        	<div class="peek-view-banner">
        		<img border="0" src="<?php echo base_url()."uploads/banner/".$slide['slide_image']; ?>" width="516" height="102">
            </div>
          <b style="color:#F00">Thông tin</b><br>
          <table cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td>Tên gọi</td>
                <td>: <b><?php echo $slide['slide_title']; ?></b></td>
              </tr>
              <tr>
                <td>Link tới</td>
                <td>:
                  <input type="text" readonly="" size="40" value="<?php echo $slide['slide_link']; ?>">
                  <a href="<?php echo $slide['slide_link']; ?>" target="_blank">xem</a></td>
              </tr>
            </tbody>
          </table></td>
        <td>
        	<!--span id="order_25"></span>
          	<input type="text" size="5" value="1" onChange="update_banner_order(25, this.value)"-->
            <span id="update_ordering_<?php echo $slide['slide_id']; ?>">STT :
            	<input class="change_order" type="text" rel="<?php echo $slide['slide_id']; ?>" value="<?php echo $slide['slide_order']; ?>" size="2" />
            </span>
        </td>
        <td>0</td>
        <td><a href="<?php echo base_url()."admin/banner/update/".$slide['slide_id']."" ; ?>">Sửa lại</a><br />
		  <?php
                if($slide['slide_status'] == 1){
                    echo "<a rel='".$slide['slide_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
                }else{
                    echo "<a style='background:#FFB800;' rel='".$slide['slide_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
                }
            ?>
        <br />
          <?php echo "<a href='javascript:del_slide(".$slide['slide_id'].")'>xóa</a>"; ?>
         </td>
          </tr>
          <?php } }else{echo "<tr><td colspan='5'>Không có dữ liệu...</td></tr>";} ?>
    </tbody>
  </table>
  <br />
  <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  <br />
  <script type="text/javascript">
	$(document).ready(function(e) {
        $(".status_active").live("click",function(){
			val = $(this).attr("name");
			rel = $(this).attr("rel");
			type = "bachnx";
			if(val == 1){
				$(this).css("background-color","#FFB800").html("Cho hiển thị");
				$(this).attr("name","0");
			}else{
				$(this).css("background","none").html("Hạ xuống");
				$(this).attr("name","1");
			}
			$.ajax({
				"url"	: "<?php echo base_url()."admin/banner/update_status"; ?>",
				"type"	: "post",
				"data"	: "val="+val+"&rel="+rel+"&type="+type,
				"async"	: "false",
				success : function(result_active){
					$(".status_cago_active").html(result_active);
				}
			});
		});
		
		//Change
		$(".change_order").change(function(){
			val = $(this).val();
			id = $(this).attr("rel");
			type = "bachnx";
			$.ajax({
				"url" 	: "<?php echo base_url()."admin/banner/update_order"; ?>",
				"type"	: "post",
				"data"	: "val="+val+"&id="+id+"&type="+type,
				"async"	: "false",
				success : function(result_val){
					$("#update_ordering_"+id).html("xong");
					//$(".status_cago_active").html(result_val);
				}
			});
		})
		
		
	});

	function del_slide(id) {
		if(confirm("Bạn chắc chắn muốn xóa bỏ banner này ?")){
			$.post("<?php echo base_url()."admin/banner/del"; ?>", {action: "del_page", id : id}, function(data) { $("#row_"+id).fadeOut();
			} );
		}
	}
</script>
</div>
