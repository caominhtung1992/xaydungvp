<div class="paddings">
  <div id="action-links">
    <ul>
	  <li id="add-prod"><a href="<?php echo base_url()."admin/user/add" ?>">Thêm quản trị mới</a></li>
      <!-- <li id="add-prod"><a href="/admin/?opt=admin&amp;view=admin-log-product">Theo dõi tạo sản phẩm</a></li> -->
    </ul>
  </div>
  <table border="1" bordercolor="#CCCCCC" id="tb_padding" style="width:100%">
    <tbody>
      <tr style="background-color:#EEE; font-weight:bold;">
        <td width="5%" style="text-align:center;">STT</td>
        <td width="15%">Họ tên</td>
        <td width="20%">Email</td>
        <td width="10%">Quyền</td>
        <td width="11%">Thời gian tạo</td>
        <td width="13%">Đăng nhập lần cuối</td>
        <td width="10%">IP đăng nhập</td>
        <td width="9%">Trạng thái</td>
        <td width="7%">Lựa chọn</td>
      </tr>
      <?php
	  	if(isset($list_user) && $list_user != NULL){
			$stt = 0;
			foreach($list_user as $value){
				$stt++;
	  ?>
	      <tr id="row_<?php echo $value['user_id']; ?>" onMouseOver="this.className='row-hover'" onMouseOut="this.className=''" id="row_1" class="">
	        <td style="text-align:center;"><?php echo $stt; ?></td>
	        <td><?php echo $value['user_fullname']; ?></td>
	        <td><?php echo $value['user_email']; ?></td>
	        <td><?php if($value['user_level'] == 1){echo "<span style='color:red'>Admin</span>";}else{echo "Member";}?></td>
	        <td><?php echo $value['user_date']; ?></td>
	        <td><?php if($value['user_lastlogin'] == NULL){echo "Chưa bao giờ";}else{echo $value['user_lastlogin']; }?></td>
	        <td><?php echo $value['user_ip']; ?></td>
	        <td>
            	<?php
					if($value['user_status'] == 1){
						echo "<a rel='".$value['user_id']."' name='1' class='status_active' href='javascript:void(0);'>Hạ xuống</a>";
					}else{
						echo "<a style='background:#FFB800;' rel='".$value['user_id']."' name='0' class='status_active' href='javascript:void(0);'>Chưa kích hoạt</a>";
					}
				?>
	        </td>
	        <td>
            	<a href="<?php echo base_url()."admin/user/update/".$value['user_id'].""; ?>">Sửa lại</a> | 
            	<?php echo "<a href='javascript:del_user(".$value['user_id'].")'>Xóa</a>"; ?>
            </td>
	      </tr>
      <?php
			}
		}
	  ?>
    </tbody>
  </table>
  <br />
  <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  
<script type="text/javascript">
	$(document).ready(function(e) {
        $(".status_active").live("click",function(){
			val = $(this).attr("name");
			rel = $(this).attr("rel");
			type = "bachnx";
			if(val == 1){
				$(this).css("background-color","#FFB800").html("Chưa kích hoạt");
				$(this).attr("name","0");
			}else{
				$(this).css("background","none").html("Hạ xuống");
				$(this).attr("name","1");
			}
			$.ajax({
				"url"	: "<?php echo base_url()."admin/user/update_status"; ?>",
				"type"	: "post",
				"data"	: "val="+val+"&rel="+rel+"&type="+type,
				"async"	: "false",
				success : function(result_active){
					//$(".status_cago_active").html(result_active);
				}
			});
		});
    });
		
	
	function del_user(id) {
		if(confirm("Bạn chắc chắn muốn xóa bỏ người dùng này ?")){
			$.post("<?php echo base_url()."admin/user/del"; ?>", {action: "del_user", id : id}, function(data) { $("#row_"+id).fadeOut();
			} );
		}
	}
</script>
  
 </div>
