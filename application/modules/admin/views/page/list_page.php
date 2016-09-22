<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/page/add" ; ?>">Thêm nội dung mới</a></li>
    </ul>
  </div>
  <ul id="tabnav">
    <li class="tab-select"><a href="">Bài viết</a></li>
  </ul>
  <!--form method="get" action="">
    <input type="hidden" name="opt" value="article">
    <div id="table-filters" class="box2 sst"> Tìm kiếm :
      <input type="text" name="keyword" size="40" value="">
      <input type="submit" value="Tìm kiếm">
    </div>
  </form-->
  
  <br />
  <div class="code_bachnx">
	  <table id="tb_padding" border="1" bordercolor="#CCC" style="border-collapse:collapse;" width="100%">
	    <tbody>
	      <tr style="background-color:#EEE; font-weight:bold;">
	        <td width="40px" style="text-align:center;">STT</td>
	        <td>Danh sách tin</td>
	        <td width="60px" style="text-align:center;">Lần xem</td>
	        <td width="150px">Thời gian cập nhật</td>
	        <td width="100px">Lựa chọn</td>
	      </tr>
          <?php
		  	if(isset($list_page) && $list_page != NULL){
				$stt  = 0;
				foreach($list_page as $value){
					$stt++;
		  ?>
          <tr id="row_<?php echo $value['page_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" class="">
		        <td style="text-align:center;"><?php echo $stt ?></td>
		        <td><a href="<?php echo base_url()."page/".$value['page_rewrite']."/".$value['page_id'].".html"; ?>" target="_blank"><b><?php echo $value['page_title']; ?></b></a>
		          <br />
	              </td>
		        <td style="text-align:center;"><?php echo $value['page_view']; ?></td>
		        <td> <?php echo $value['page_date']; ?> </td>
		        <td><a href="<?php echo base_url()."admin/page/update/".$value['page_id']."" ; ?>">Sửa lại</a><br />
	              <?php
						if($value['page_status'] == 1){
							echo "<a rel='".$value['page_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
						}else{
							echo "<a style='background:#FFB800;' rel='".$value['page_id']."' name='0' class='status_active' href='javascript:void(0);'>Cho hiển thị</a>";
						}
					?>
	            <br />
		          <?php echo "<a href='javascript:del_page(".$value['page_id'].")'>Xóa bài</a>"; ?>
	             </td>

		      </tr>
          <?php
		  	} }else{
				echo "<tr><td colspan='7'>Không có tin tức nào.</td></tr>";
			}
		  ?>
          </tbody>
	  </table>
  </div>
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
				"url"	: "<?php echo base_url()."admin/page/update_status"; ?>",
				"type"	: "post",
				"data"	: "val="+val+"&rel="+rel+"&type="+type,
				"async"	: "false",
				success : function(result_active){
					$(".status_cago_active").html(result_active);
				}
			});
		});
	});

	function del_page(id) {
		if(confirm("Bạn chắc chắn muốn xóa bỏ tin này ?")){
			$.post("<?php echo base_url()."admin/page/del"; ?>", {action: "del_page", id : id}, function(data) { $("#row_"+id).fadeOut();
			} );
		}
	}
</script>
