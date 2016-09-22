<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/product/add" ; ?>">Thêm sản phẩm mới form chuẩn</a></li>
      <li class="csv"><a href="<?php echo base_url()."admin/product_category" ; ?>">Quản lý danh mục</a></li>
    </ul>
  </div>
  <!--div id="table-filters" class="box2 sst">
    <form method="get" enctype="multipart/form-data">
      <table>
        <tbody>
          <tr>
            <td>Tìm sản phẩm</td>
            <td><input type="text" name="keyword" id="keyword" size="40">
            </td>
            <td><input type="submit" value="Tìm kiếm"></td>
            <td style="width:20px"></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div-->
  <div style="color:red;"></div>
  <table id="tb-list">
    <tbody>
      <tr>
        <td>
        <div>
	    <select id="bachnx_change" onChange="window.location=this.value">
	      <option value="0">Chọn danh mục</option>
	      <?php 
			if(isset($list_cate['cate']) && $list_cate['cate'] != NULL){
				foreach($list_cate['cate'] as $key => $cate){
					echo "<option value='".base_url()."admin/product?cate=".$cate['cate_id']."'>".$cate['cate_name']."</option>";
					if(isset($list_cate['sub']) && $list_cate['sub'] != NULL){
						foreach($list_cate['sub'][$key] as $k => $v){
							echo "<option value='".base_url()."admin/product?cate=".$v['cate_id']."'> &nbsp; - ".$v['cate_name']."</option>";
						}
					}
				}
			}
			?>
	    </select>
	    </div>
    
        </td>
        <td align="right">
        	<!--select onChange="window.location=this.value">
              <option>Xem sản phẩm</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=market_price">Có giá thị trường</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=promotion">Có khuyến mại</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=view=no-image">Chưa có ảnh</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=display">Chưa hiển thị</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=new">SP Mới về</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=hot">Sp HOT</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=saleoff">Sp XẢ HÀNG</option>
              <option value="<?php echo base_url(); ?>admin/product?sort=bestsale">Sp BÁN CHẠY</option>
            </select>

          <select onChange="window.location=this.value">
            <option>Sắp xếp sản phẩm</option>
            <option value="">Thứ tự cửa hàng</option>
            <option value="">Xem nhiều nhất</option>
            <option value="">Mới nhất</option>
            <option value="">Chưa cập nhật lâu nhất</option>
          </select-->
        </td>
      </tr>
    </tbody>
  </table>
  <br />
  <table cellspacing="0" id="tb-list" border="1" bordercolor="#CCCCCC">
    <tbody>
      <tr bgcolor="#EEEEEE" style="font-weight:bold;">
        <td style="width:30px;text-align:center;">STT</td>
        <td style="width:80px">Ảnh</td>
        <td>Sản phẩm (Tổng số: <?php echo $row; ?>)</td>
        <td style="width:150px">Người dùng</td>
        <td style="width:200px">Thông tin bán hàng</td>
        <td style="width:200px">Thông tin khác</td>
        <td style="width:150px">Cập nhật</td>
        <td style="width:110px">Công cụ</td>
      </tr>
      <?php
	  	if(isset($list_pro) && $list_pro != NULL){
			$stt= 0;
			foreach($list_pro as $value){
				$stt++;
      ?>
      <tr id="row_<?php echo $value['pro_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
        <td style="text-align:center;"><?php echo $stt; ?></td>
        <td align="center">
		<?php
		@$images = unserialize($value['pro_images']);
        if($value['pro_images'] == NULL){
        	echo "<img style='max-width: 70px;' src='".base_url()."public/admin/images/no-images.jpg' alt='No images' />";
        }else{
        	echo "<img style='max-width: 80px;' src='".base_url()."uploads/products/thumb/".$images[0]."'/>";
        }
        ?>
        <br />
          <!-- 1 ảnh<br /> -->
          <!-- <a href="">sửa lại ảnh</a> --></td>
        <td><b><a target="_blank" style="color: #012998;" href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>" class="pop-up cboxElement"><?php echo $value['pro_name']; ?></a></b> <br />
          Danh mục  : <span id="change_cat_1636"><b><?php echo $value['cate_name']; ?></b> (<a href="<?php echo base_url()."admin/product/update/".$value['pro_id']."" ; ?>" class="pop-up-small cboxElement">đổi</a>) </span><br />
          Mã kho  : <b><?php echo $value['pro_code']; ?></b><br />
          Cập nhật: <?php echo $value['pro_date']; ?><br /></td>
        <td> 
          - Xem : <b><?php echo $value['pro_view']; ?></b> <br />
          - Thích : <b><?php echo $value['pro_like']; ?></b> <br />
          - Mua : <b><?php echo $value['pro_buy']; ?></b>
          </td>
        <td> - Giá web : <b style="color:red;"><?php echo @number_format($value['pro_price']); ?></b> vnd 
          <br />
          - SL tổng : <span class="stock-level-critical"><?php echo $value['pro_qty']; ?></span><br /></td>
        <td id="">
          - Giá thị trường : <b><?php echo @number_format($value['pro_market']); ?> vnđ</b> <br />
          - Bảo hành : <?php echo $value['pro_war']; ?> <br />
          - Khuyến mại : <?php echo $value['pro_promotion']; ?><br />
          <div id="button_<?php echo $value['pro_id']; ?>"></div></td>
        <td><div id="hot_info_<?php echo $value['pro_id']; ?>">
            <input type="checkbox" id="pro_new_<?php echo $value['pro_id']; ?>" value="new"  <?php if($value['pro_new'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_new'] == 1){ echo "<span style='background:#FFB800;'> Mới</span>"; }else{echo "<span style='background:none;'> Mới</span>";} ?>
            
            <br />
            <input type="checkbox" id="pro_hot_<?php echo $value['pro_id']; ?>" value="hot" <?php if($value['pro_hot'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_hot'] == 1){ echo "<span style='background:#FFB800;'> HOT (hỏi nhiều)</span>"; }else{echo "<span style='background:none;'> HOT (hỏi nhiều)</span>";} ?>
            <br />
            <input type="checkbox" id="pro_bestsale_<?php echo $value['pro_id']; ?>" value="bestsale" <?php if($value['pro_bestsale'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_bestsale'] == 1){ echo "<span style='background:#FFB800;'> Bán chạy</span>"; }else{echo "<span style='background:none;'> Bán chạy</span>";} ?>
            <br />
            <input type="checkbox" id="pro_saleoff_<?php echo $value['pro_id']; ?>" value="saleoff" <?php if($value['pro_saleoff'] == 1){ echo "checked='checked'"; } ?> />
            <?php if($value['pro_saleoff'] == 1){ echo "<span style='background:#FFB800;'> Xả hàng (sale-off)</span>"; }else{echo "<span style='background:none;'> Xả hàng (sale-off)</span>";} ?>
            <br />
            <span id="hot_button_<?php echo $value['pro_id']; ?>">
            <input type="button" value="Cập nhật" class="update-bt-all" onClick="update_product_hot(<?php echo $value['pro_id']; ?>)" />
            </span></div></td>
        <td><div id="del_wait_<?php echo $value['pro_id']; ?>"> <a href="<?php echo base_url()."admin/product/update/".$value['pro_id']."" ; ?>" class="pop-up cboxElement">Sửa lại</a><br />
            <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>" target="_blank">Xem tại web</a><br />
            
            <span id="status_<?php echo $value['pro_id']; ?>"></span> 
            <?php
				if($value['pro_status'] == 1){
					echo "<a rel='".$value['pro_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
				}else{
					echo "<a style='background:#FFB800;' rel='".$value['pro_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
				}
			?>
                    
            <br />
            <a href="javascript:;" onClick="delete_product(<?php echo $value['pro_id']; ?>)">Xóa sản phẩm</a><br />
            <span id="update_ordering_<?php echo $value['pro_id']; ?>">STT :
            <input class="change_order" type="text" rel="<?php echo $value['pro_id']; ?>" value="<?php echo $value['pro_order']; ?>" size="2" />
            </span> </div></td>
      </tr>
      <?php
	  	}
		}else{
			echo "<tr><td colspan='8'>Không có sản phẩm nào .</td></tr>";
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
				"url"	: "<?php echo base_url()."admin/product/update_status"; ?>",
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
				"url" 	: "<?php echo base_url()."admin/product/update_order"; ?>",
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
	function update_product_hot(pro_id){
		var pro_new = "";
		if(document.getElementById('pro_new_'+pro_id).checked){
			pro_new = '1';
		}
		var pro_hot = "";
		if(document.getElementById('pro_hot_'+pro_id).checked){
			pro_hot = '1';
		}
		var pro_bestsale = "";
		if(document.getElementById('pro_bestsale_'+pro_id).checked){
			pro_bestsale = '1';
		}
		var pro_saleoff = "";
		if(document.getElementById('pro_saleoff_'+pro_id).checked){
			pro_saleoff = '1';
		}
		
		$("#hot_button_"+pro_id).html("... vui lòng đợi");
		$.post("<?php echo base_url()."admin/product/update_all"; ?>",{action:"update-pro-hot",pro_new:pro_new, pro_hot : pro_hot, pro_bestsale:pro_bestsale, pro_saleoff:pro_saleoff, pro_id:pro_id },function(data){ $("#hot_button_"+pro_id).html("xong");});
	}
	
	function delete_product(pro_id){
		$("#row_"+pro_id).attr('class', 'row-hover');
		if(confirm("Bạn chắc chắn muốn xóa sản phẩm")){
			$("#del_wait_"+pro_id).html("<img class='pro_refresh' src='"+links+"public/admin/images/refresh.gif' /> đang xóa...");
			$.post("<?php echo base_url()."admin/product/del"; ?>"
				   ,{action:"delete-product",pro_id:pro_id}
				   ,function(data){$("#row_"+pro_id).fadeOut();
				   //alert(data);
			});
		}else{
			$("#row_"+pro_id).attr('class', '');	
		}
	}
</script> 

</div>
