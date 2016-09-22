<div class="paddings">
	<style type="text/css">
		div#add_form table tr td {padding: 4px;}
    </style>
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="javascript:addForm();">Thêm vị trí mới</a></li>
      <li id="add-prod"><a href="<?php echo base_url(); ?>admin/banner/add">Thêm banner mới</a></li>
      <li id="add-prod"><a href="<?php echo base_url(); ?>admin/banner/location">Quản trị vị trí banner</a></li>
    </ul>
  </div>
  <div style="text-align:center;color:#f00;text-align: left;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
  <form method="post" name="bachnxlocal">
    <div id="add_form"></div>
    <script type="text/javascript">
		function addForm(){
			document.getElementById('addNew').value = 'yes';
			var text_form = "<br /><table cellpadding=4><tr><td>Đặt tên vị trí</td> <td><input type=text name=txt_name id=txt_name size=40></td></tr>";
			text_form += "<tr><td>Mô tả tóm tắt (nếu cần)</td><td><textarea cols=50 rows=6 name=description id=description></textarea></td></tr>";
			text_form += "<tr><td></td><td><input type=button value='Thêm vị trí' onclick=\"addAction();\"></td></tr></table>";
			document.getElementById('add_form').innerHTML = text_form;
		}
		function addAction(){
			document.bachnxlocal.submit();
		}
		function remove_this(id){
			if(confirm('Chắc chắn xóa vị trí này ?')){
				document.getElementById('deleteId').value = id;
				document.bachnxlocal.submit();
			}
		}
		function update_this(id, name, description){
			document.getElementById('changeId').value = id;
			var text_form = "<table><tr style='background:#fff !important;color:#6e6f70;'><td>Đặt tên vị trí</td> <td><input type=text name=txt_name_"+id+" size=40 value='"+name+"'></td></tr>";
			text_form += "<tr><td>Mô tả tóm tắt (nếu cần)</td><td><textarea cols=50 rows=6 name=description_"+id+">"+description+"</textarea></td></tr>";
			text_form += "<tr><td></td><td><input type=button value='Cập nhật' onclick=\"addAction();\"></td></tr></table>";
			document.getElementById('edit_'+id).innerHTML = text_form;
		}
	</script>
    <input type="hidden" name="changeId" id="changeId" value="">
    <input type="hidden" name="deleteId" id="deleteId" value="">
    <input type="hidden" name="addNew" id="addNew" value="">
    <br>
    <table border="1" bordercolor="#CCCCCC" id="tb_padding" style="border-collapse:collapse;">
      <tbody>
        <tr style="background-color:#fff !important; font-weight:bold;color:#6e6f70">
          <td>STT</td>
          <td>Vị trí</td>
          <td>Ngày tạo</td>
          <td>Xóa</td>
        </tr>
        <?php 
			if(isset($list_location) && !empty($list_location)){
				$stt = 0;
				foreach($list_location as $location){
					$stt++;
		?>
        <tr>
          <td style="text-align:center"><?php echo $stt; ?></td>
          <td><span id="edit_<?php echo $location['location_id'];?>"><b><?php echo $location['location_name']; ?></b><br>
            </span>
          </td>
          <td><?php echo $location['location_date']; ?>	</td>
          <td><a href="javascript:update_this('<?php echo $location['location_id']; ?>', '<?php echo $location['location_name']; ?>', '<?php echo $location['location_description']; ?>')">Sửa lại</a> | <a href="javascript:remove_this(<?php echo $location['location_id']; ?>)">Xóa bỏ</a></td>
        </tr>
        <?php } }else{echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";}?>
      </tbody>
    </table>
  </form>
</div>
