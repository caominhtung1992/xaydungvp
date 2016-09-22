<div class="paddings">
  <form method="post" action="" method="post" enctype="multipart/form-data" name="account_form">
    <input type="hidden" name="create_new_record" value="no">
    <table id="tb-list" border="1" bordercolor="#CCCCCC">
      <tbody>
        <tr style="background:none !important;color:inherit">
          <td>Email bán hàng</td>
          <td><input type="text" value="<?php echo $get['config_email'] ;?>" size="60" name="config_email">
            * dùng nhận đơn hàng mới và gửi thông báo khách hàng về đơn hàng (<span style="color:#FF0000">Nếu nhiều email thì để cách nhau dấu phẩy ,</span>)</td>
        </tr>
        <tr>
          <td>Thẻ Meta Title</td>
          <td><input type="text" size="60" name="config_title" value="<?php echo $get['config_title'] ;?>">
            <span class="note"></span></td>
        </tr>
        <tr>
          <td>Thẻ Meta Keywords</td>
          <td><input type="text" size="60" name="config_key" value="<?php echo $get['config_key'] ;?>"></td>
        </tr>
        <tr>
          <td>Thẻ Meta Description</td>
          <td><textarea cols="60" rows="6" name="config_des"><?php echo $get['config_des'] ;?></textarea></td>
        </tr>
      </tbody>
    </table>
    <br />
    <table width="100%">
      <tbody>
        <tr>
          <!-- <td valign="top" width="220"><div style="font-size:16px; font-weight:bold">Thư viện ảnh</div>
            <br />
            <div>
              <a href="javascript:void(0);">Upload ảnh</a> | 
              <a href="javascript:void(0);" title="Quản lý file ảnh giao diện" class="pop-up">Quản lý</a>
            </div>
            <br />
            <div id="image_holder"></div></td> -->
          <td><a name="about_us"></a> <b>Thông tin giới thiệu chi tiết</b> <br />
            <!-- <textarea name="introduction" id="rich_text" aria-hidden="true" style="display: none;"></textarea> -->
			<?php 
				$fck = new FCKeditor('config_intro');
				$fck->BasePath = sBASEPATH;
				$fck->Value  = $get['config_intro'];
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?>
			                                       
            <br />
            <br />
            <br />
            <a name="contact_us"></a> <b>Thông tin liên hệ</b> <br />
            <!-- <textarea name="storeAddress" id="rich_text_1" aria-hidden="true" style="display: none;"></textarea> -->
            <?php 
				$fck = new FCKeditor('config_contact');
				$fck->BasePath = sBASEPATH;
				$fck->Value  = $get['config_contact'];
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?>
            
            <br /></td>
        </tr>
      </tbody>
    </table>
    <br />
    <div align="center">
      <input type="hidden" name="update" value="yes">
      <input type="hidden" name="lang" value="">
      <input name="ok" type="submit" value="Cập nhật thông tin" class="btn_submit_bachnx">
    </div>
    <br />
  </form>
</div>
