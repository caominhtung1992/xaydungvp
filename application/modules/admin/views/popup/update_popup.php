<div class="paddings">
  
  <style type="text/css">
ul#tabnav {	text-align:left; margin:1em 0 1em 0;border-bottom:1px solid #999;list-style-type: none; padding: 4px 10px 5px 10px;	}
ul#tabnav li {display:inline; margin:0}
ul#tabnav li a {padding: 5px 6px; border:1px solid #999;background-color:#DDD;color:#000;margin-right:0px;text-decoration: none; border-bottom:none}
ul#tabnav a:hover {background: #fff; color:#333}
ul#tabnav li.tab-select {border-bottom: 1px solid #fff;	background-color:#fff;}
ul#tabnav li.tab-select a {	background-color:#CF9;	color: #000;position:relative;top:1px; padding-top:6px;}
.sub-section-header { font-weight:bold; margin-bottom:10px; padding:3px; background-color:#CFC}
.tb-setup td{ padding:4px}
</style>
  
  <!-- tabs -->
  <ul id="tabnav">
  	<li id="tab_2" class="tab-select"><a href="">Banner Pop-Up</a></li>
    <!-- <li id="tab_1"><a href="">Phần header</a></li>
    <li id="tab_3"><a href="">Hình nền website</a></li>
    <li id="tab_4"><a href="">Thông tin khác</a></li> -->
  </ul>
  <form method="post" enctype="multipart/form-data">
  	<div style="text-align:center;color:#f00;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
    <table class="tb-setup">
      <tbody>
        <tr>
          <td>Link nhảy đến</td>
          <td><input type="text" size="50" name="pop_link" value="<?php echo $popup['pop_link']; ?>"></td>
        </tr>
        <tr>
          <td>File ảnh</td>
          <td><div style="max-height:600px; overflow:auto"><img border="0" src="<?php echo base_url()."uploads/popup/".$popup['pop_images']; ?>"></div>
            <br>
            <input type="file" name="pop_images" size="50">
          </td>
        </tr>
        <tr>
          <td>Cho hiển thị</td>
          <td><input type="checkbox" name="pop_status" value="1" <?php if( $popup['pop_status'] == 1){echo "checked='checked'";}; ?>>
            Tích chọn để hiển thị hoặc dừng hiển thị </td>
        </tr>
      </tbody>
    </table>
    <p class="group-actions"> <span id="status_menu">
      <input class="btn" id="submit-collection-btn" name="ok" type="submit" value="Cập nhật &gt;&gt;">
      </span> </p>
  </form>
  </div>
