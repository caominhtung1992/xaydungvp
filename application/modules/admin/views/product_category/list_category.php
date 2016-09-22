<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/product_category/add"; ?>">Thêm danh mục mới</a></li>
    </ul>
  </div>
  <style type="text/css">
	.tb-cat-row { width:100%;}
	.tb-cat-row td { padding:1px}
  </style>
  <div style="padding-bottom:5px"><a href="javascript:open_all_row();"><span id="open_sign">[+]</span> Xem hết danh mục</a></div>
  <table id="tb_padding" cellpadding="2" cellspacing="0" width="100%" border="1" bordercolor="#CCCCCC">
    <tbody>
      <tr style="background-color:#EEE; font-weight:bold;">
        <td>Danh mục</td>
        <td width="100">Link web</td>
        <td width="90px">Xem</td>
        <td width="80px">Sắp xếp</td>
        <td width="70px">Trạng thái</td>
        <td width="60px">Sửa lại</td>
        <td width="50px">Xóa</td>
      </tr>
      	<?php
			if(isset($list_cate['cate']) && $list_cate['cate'] != NULL){
				$stt = 0;
				foreach($list_cate['cate'] as $key => $value){
					$stt++;
		?>
      <tr id="row_<?php echo $value['cate_id']; ?>" class="parent_<?php echo $stt; ?>" onmouseover="this.className='row-hover'" onmouseout="this.className='parent_0'">
        <td><a name="cat_<?php echo $stt; ?>"></a> <?php echo $stt; ?>. 
        	<?php 
				if($list_cate['sub'][$key] != NULL){
			?>
            	<a href="javascript:open_child_row('parent_<?php echo $stt; ?>')"><?php echo $value['cate_name']; ?></a>
                <?php if($value['cate_images'] != NULL){?><img style="position: absolute;margin-left: 5px;" src="<?php echo base_url()."public/admin/images/image.gif"; ?>" alt="icons" /> <?php } ?>
            <?php
				}else{
					echo $value['cate_name'];
				}
			?>
        </td>
        <td><a href="<?php echo base_url()."".$value['cate_rewrite']."/c".$value['cate_id'].".html"; ?>" target="_blank">Xem trang</a></td>
        <td><?php echo $value['cate_view']; ?></td>
        <td>
        	<span id="change_<?php echo $value['cate_id']; ?>">
        		<input class="change_order" type="text" rel="<?php echo $value['cate_id']; ?>" value="<?php echo $value['cate_order']; ?>" size="2" />
            </span>
        </td>
        <td>
        	<?php
				if($value['cate_status'] == 1){
					echo "<a rel='".$value['cate_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
				}else{
					echo "<a style='background:#FFB800;' rel='".$value['cate_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
				}
			?>
        </td>
        <td><a href="<?php echo base_url()."admin/product_category/update/".$value['cate_id'].""; ?>">Sửa lại</a></td>
        <!-- <td><span id="del_1"><a href="javascript:delete_seller_category(1,'Điện Thoại')">Xóa</a></span></td> -->
        <?php echo "<td><a href='javascript:del_cago(".$value['cate_id'].")'>Xóa</a></td>"; ?>
      </tr>
      <?php
		  if(isset($list_cate['sub']) && $list_cate['sub'] != NULL){
			  $stts = 0;
				foreach($list_cate['sub'][$key] as $k => $v){
					$stts++;
		?>
      <tr id="row_<?php echo $v['cate_id']; ?>" class="parent_<?php echo $stt; ?> expand_all" style="display: none;" onmouseover="this.className='row-hover parent_<?php echo $stt; ?>'" onmouseout="this.className='parent_<?php echo $stt; ?>'">
        <td><a name="cat_<?php echo $stt; ?>"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stt." .".$stts; ?> <?php echo $v['cate_name']; ?></td>
        <td><a href="<?php echo base_url()."".$v['cate_rewrite']."/c".$v['cate_id'].".html"; ?>" target="_blank">Xem trang</a></td>
        <td><?php echo $v['cate_view']; ?></td>
        <td>
        	<span id="change_<?php echo $v['cate_id']; ?>">
        		<input class="change_order" type="text" rel="<?php echo $v['cate_id']; ?>" value="<?php echo $v['cate_order']; ?>" size="2" />
            </span>
        </td>
        <td>
       		 <?php
				if($v['cate_status'] == 1){
					echo "<a rel='".$v['cate_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
				}else{
					echo "<a style='background:#FFB800;' rel='".$v['cate_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
				}
			?>
        </td>
        <td><a href="<?php echo base_url()."admin/product_category/update/".$v['cate_id'].""; ?>">Sửa lại</a></td>
        <?php echo "<td><a href='javascript:del_cago(".$v['cate_id'].")'>Xóa</a></td>"; ?>
      </tr>
      <?php
			} 
		}
	  ?>
      
      <?php
		}; }else{
			echo "<tr><td colspan='7'>Không có danh mục nào.</td></tr>";
		}
	  ?>
    </tbody>
  </table>
	<input type="hidden" id="save_open_row" value="," />
	<input type="hidden" id="track_open_row" value="0" />

  <div class="status_cago_active"></div>
  <br />
  <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  <input type="hidden" id="track_open_row" value="0">
  <script type="text/javascript">
	function open_child_row(cls){
		var current_open = $('#save_open_row').val();
		if(current_open.indexOf(','+cls+',') == -1) {
			$("."+cls).css('display', 'table-row');
			$('#save_open_row').val(current_open + cls + ',');
		}else{
			$("."+cls).css('display', 'none');
			$('#save_open_row').val(current_open.replace(','+ cls + ',', ','));
		}
	}
	
	function open_all_row(){
		var current_status = $("#track_open_row").val();
		if(current_status == '0') {
			$(".expand_all").css('display', 'table-row');
			$("#open_sign").html("[-]");
			$("#track_open_row").val('1');
		}else{
			window.location = '<?php echo base_url();?>admin/product_category';
			/*$(".expand_all").css('display', 'none');	
			$("#open_sign").html("[+]");
			$("#track_open_row").val('0');*/
		}
	}


</script> 
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
				"url"	: "<?php echo base_url()."admin/product_category/update_status"; ?>",
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
				"url" 	: "<?php echo base_url()."admin/product_category/update_order"; ?>",
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
			$.post("<?php echo base_url()."admin/product_category/del"; ?>", {action: "del_cate", id : id}, function(data) { $("#row_"+id).fadeOut();
			} );
		}
	}
</script>
</div>
