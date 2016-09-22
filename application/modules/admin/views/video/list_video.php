<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/video/add"; ?>">Thêm hỗ trợ</a></li>
    </ul>
  </div>
<style type="text/css">
.tb-cat-row { width:100%;}
.tb-cat-row td { padding:1px}
</style>
  <table id="tb_padding" cellpadding="2" cellspacing="0" width="100%" border="1" bordercolor="#CCCCCC">
    <tbody>
      <tr style="background-color:#EEE; font-weight:bold;">
      	<td width="90px" style="text-align:center;">STT</td>
        <td width="222">link</td>
        <td width="60px">Sửa lại</td>
        <td width="40px">Xóa</td>
      </tr>
      <?php
	  	if(isset($list_sup) && $list_sup!= NULL){
			$stt = 0;
			foreach($list_sup as $value){
				$stt++;
	  ?>
      <tr id="row_<?php echo $value['video_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
        <td width="50px" style="text-align:center;"><?php echo $stt; ?></td>
        <td width="222"><?php echo $value['video_link']; ?></td>
        <td width="60px"><a href="<?php echo base_url()."admin/video/update/".$value['video_id'].""; ?>">Sửa lại</a></td>
        <?php echo "<td width='40px'><a href='javascript:del_cago(".$value['video_id'].")'>Xóa</a></td>"; ?>
      </tr>
      <?php
		}; }else{
			echo "<tr><td colspan='7'>Không có danh mục nào.</td></tr>";
		}
	  ?>
    </tbody>
  </table>
  <div class="status_cago_active"></div>
  <br />
  <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
</div>
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
				"url"	: "<?php echo base_url()."admin/video/update_status"; ?>",
				"type"	: "post",
				"data"	: "val="+val+"&rel="+rel+"&type="+type,
				"async"	: "false",
				success : function(result_active){
					//$(".status_cago_active").html(result_active);
				}
			});
		});
		//Change
		$(".change_order").change(function(){
			val = $(this).val();
			id = $(this).attr("rel");
			type = "bachnx";
			$.ajax({
				"url" 	: "<?php echo base_url()."admin/video/update_order"; ?>",
				"type"	: "post",
				"data"	: "val="+val+"&id="+id+"&type="+type,
				"async"	: "false",
				success : function(result_val){
					$("#change_"+id).html("xong");
					//$(".status_cago_active").html(result_val);
				}
			});
		})
    });
	function del_cago(id) {
		if(confirm("Bạn chắc chắn muốn xóa bỏ danh mục này ?")){
			$.post("<?php echo base_url()."admin/video/del"; ?>", {action: "del_cate", id : id}, function(data) { $("#row_"+id).fadeOut();
			} );
		}
	}
</script>