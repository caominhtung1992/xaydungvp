<div class="paddings">
  <table cellpadding="5" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
    <tbody>
      <tr bgcolor="#EEEEEE" style="font-weight:bold;">
      	<td>STT</td>
        <td>Tên sản phẩm</td>
        <td>Số lượt xem</td>
      </tr>
      <?php
	  	if(isset($list_pro) && $list_pro!= NULL){
			$stt = 0;
			foreach($list_pro as $value){
				$stt++;
	  ?>
          <tr onMouseOver="this.className='row-hover'" onMouseOut="this.className=''">
            <td style="text-align:center"><?php echo $stt; ?></td>
            <td><a target="_blank" style="color: #012998;" href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value['pro_name']; ?></a></td>
            <td><?php echo $value['pro_view']; ?></td>
          </tr>
      <?php
		}; }else{
			echo "<tr><td colspan='3'>Không có sản phẩm nào.</td></tr>";
		}
	  ?>
    </tbody>
  </table>
  <br />
  <div id="btm-nav" class="act-screen">
    <div id="pagination"><?php  echo $this->pagination->create_links();?></div>
  </div>
</div>
