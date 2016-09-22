<div class="paddings">
  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
    <tbody>
      <tr bgcolor="#EEEEEE" style="font-weight:bold;">
      	<td>STT</td>
        <td>Nguồn</td>
        <td>Lượt giới thiệu</td>
      </tr>
      <?php
	  	if(isset($list_referer) && $list_referer != NULL){
			$stt = 0;
			foreach($list_referer as $value){
				$stt++;
	  ?>
          <tr onMouseOver="this.className='row-hover'" onMouseOut="this.className=''">
            <td style="text-align:center"><?php echo $stt; ?></td>
            <td><?php echo $value['re_domain']; ?></td>
            <td><?php echo $value['re_count']; ?></td>
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
