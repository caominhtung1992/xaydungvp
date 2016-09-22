<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/merit/add" ; ?>">Thêm ảnh chứng chỉ mới</a></li>
    </ul>
  </div>
  <div style="color:red;"></div>
  <br />
  <table cellspacing="0" id="tb-list" border="1" bordercolor="#CCCCCC">
    <tbody>
      <tr bgcolor="#EEEEEE" style="font-weight:bold;">
        <td style="width:30px;text-align:center;">STT</td>
        <td style="width:80px">Ảnh</td>
        <td>Tên ảnh chứng chỉ</td>
        <!--td style="width:150px">Người dùng</td>
        <td style="width:200px">Thông tin bán hàng</td>
        <td style="width:200px">Thông tin khác</td-->
        <td style="width:150px">Cập nhật</td>
        <td style="width:110px">Công cụ</td>
      </tr>
      <?php
	  	if(isset($list_merit) && $list_merit != NULL){
			$stt= 0;
			foreach($list_merit as $value){
				$stt++;
        //var_dump($value); die();
      ?>
      <tr id="row_<?php echo $value['merit_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
        <td style="text-align:center;"><?php echo $stt; ?></td>
        <td align="center">
		<?php
		@$images = unserialize($value['merit_images']);
        if($value['merit_images'] == NULL){
        	echo "<img style='max-width: 70px;' src='".base_url()."public/admin/images/no-images.jpg' alt='No images' />";
        }else{
        	echo "<img style='max-width: 80px;' src='".base_url()."uploads/products/thumb/".$images[0]."'/>";
        }
        ?>
        <br />
          <!-- 1 ảnh<br /> -->
          <!-- <a href="">sửa lại ảnh</a> --></td>
        <td>
          <?php echo $value['merit_name']; ?>
        </td>
        <td><!--div id="hot_info_<?php echo $value['merit_id']; ?>">
            <input type="checkbox" id="pro_new_<?php echo $value['merit_id']; ?>" value="new"  <?php if($value['pro_new'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_new'] == 1){ echo "<span style='background:#FFB800;'> Mới</span>"; }else{echo "<span style='background:none;'> Mới</span>";} ?>
            
            <br />
            <input type="checkbox" id="pro_hot_<?php echo $value['merit_id']; ?>" value="hot" <?php if($value['pro_hot'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_hot'] == 1){ echo "<span style='background:#FFB800;'> HOT (hỏi nhiều)</span>"; }else{echo "<span style='background:none;'> HOT (hỏi nhiều)</span>";} ?>
            <br />
            <input type="checkbox" id="pro_bestsale_<?php echo $value['merit_id']; ?>" value="bestsale" <?php if($value['pro_bestsale'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_bestsale'] == 1){ echo "<span style='background:#FFB800;'> Bán chạy</span>"; }else{echo "<span style='background:none;'> Bán chạy</span>";} ?>
            <br />
            <input type="checkbox" id="pro_saleoff_<?php echo $value['merit_id']; ?>" value="saleoff" <?php if($value['pro_saleoff'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_saleoff'] == 1){ echo "<span style='background:#FFB800;'> Xả hàng (sale-off)</span>"; }else{echo "<span style='background:none;'> Xả hàng (sale-off)</span>";} ?>
            <br />
            <span id="hot_button_<?php echo $value['merit_id']; ?>">
            <input type="button" value="Cập nhật" class="update-bt-all" onClick="update_product_hot(<?php echo $value['merit_id']; ?>)" />
            </span></div--></td>
        <td><div id="del_wait_<?php echo $value['merit_id']; ?>"> <a href="<?php echo base_url()."admin/merit/update/".$value['merit_id']."" ; ?>" class="pop-up cboxElement">Sửa lại</a><br />
            <a href="<?php echo base_url()."".$value['merit_name']."/p".$value['merit_id'].".html"; ?>" target="_blank">Xem tại web</a><br />
            
            <span id="status_<?php echo $value['merit_id']; ?>"></span> 
            <?php
				if($value['status'] == 1){
					echo "<a rel='".$value['merit_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
				}else{
					echo "<a style='background:#FFB800;' rel='".$value['merit_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
				}
			?>
                    
            <br />
            <a href="javascript:;" onClick="delete_product(<?php echo $value['merit_id']; ?>)">Xóa sản phẩm</a><br />
            <span id="update_ordering_<?php echo $value['merit_id']; ?>">STT :
            </span> </div></td>
      </tr>
      <?php
	  	}
		}else{
			echo "<tr><td colspan='8'>Không có ảnh chứng chỉ nào .</td></tr>";
		}
	  ?>
    </tbody>
  </table>
  
  <br />
  <div id="btm-nav" class="act-screen">
    <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  </div>

  <script type="text/javascript">
  	$(document).ready(function(e){
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
				"url"	: "<?php echo base_url()."admin/merit/update_status"; ?>",
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
				"url" 	: "<?php echo base_url()."admin/merit/update_order"; ?>",
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
	
	/*update*/
	function update_product_hot(merit_id){
		var pro_new = "";
		if(document.getElementById('pro_new_'+merit_id).checked){
			pro_new = '1';
		}
		var pro_hot = "";
		if(document.getElementById('pro_hot_'+merit_id).checked){
			pro_hot = '1';
		}
		var pro_bestsale = "";
		if(document.getElementById('pro_bestsale_'+merit_id).checked){
			pro_bestsale = '1';
		}
		var pro_saleoff = "";
		if(document.getElementById('pro_saleoff_'+merit_id).checked){
			pro_saleoff = '1';
		}
		
		$("#hot_button_"+merit_id).html("... vui lòng đợi");
		$.post("<?php echo base_url()."admin/product/update_all"; ?>",{action:"update-pro-hot",pro_new:pro_new, pro_hot : pro_hot, pro_bestsale:pro_bestsale, pro_saleoff:pro_saleoff, merit_id:merit_id },function(data){ $("#hot_button_"+merit_id).html("xong");});
	}
	
	function delete_product(merit_id){
		$("#row_"+merit_id).attr('class', 'row-hover');
		if(confirm("Bạn chắc chắn muốn xóa sản phẩm")){
			$("#del_wait_"+merit_id).html("<img class='pro_refresh' src='"+links+"public/admin/images/refresh.gif' /> đang xóa...");
			$.post("<?php echo base_url()."admin/product/del"; ?>"
				   ,{action:"delete-product",merit_id:merit_id}
				   ,function(data){$("#row_"+merit_id).fadeOut();
				   //alert(data);
			});
		}else{
			$("#row_"+merit_id).attr('class', '');	
		}
	}
</script> 

</div>
