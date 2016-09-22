<div class="paddings">
  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
    <tbody>
      <tr bgcolor="#EEEEEE" style="font-weight:bold;">
      	<td>STT</td>
        <td width="120px">Ngày</td>
        <td width="160px">Số đơn hàng mới</td>
      </tr>
      <?php
	  	if(isset($list_cus) && $list_cus!= NULL){
			$stt = 0;
			foreach($list_cus as $value){
				$stt++;
	  ?>
          <tr onMouseOver="this.className='row-hover'" onMouseOut="this.className=''">
            <td style="text-align:center"><?php echo $stt; ?></td>
            <td><?php echo $value['date_count']; ?></td>
            <td><?php echo $value['soluong']; ?></td>
          </tr>
      <?php
		}; }else{
			echo "<tr><td colspan='3'>Không có danh mục nào.</td></tr>";
		}
	  ?>
    </tbody>
  </table>
  <br />
  <div id="btm-nav" class="act-screen">
    <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  </div>
</div>
