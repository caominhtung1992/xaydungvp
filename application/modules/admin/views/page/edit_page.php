<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/page/add" ; ?>">Thêm nội dung mới</a></li>
      <li class="csv"><a href="<?php echo base_url()."admin/page" ; ?>">Danh sách nội dung</a></li>
    </ul>
  </div>
  <form method="post" enctype="multipart/form-data" name="account_form">
	<style type="text/css">
		#tb-article-form {}
		#tb-article-form .row-header { font-weight:bold; font-size:18px; color:#06C;}

	</style>
    <!--[if IE]><div id='scwIE'></div><![endif]--> 
    <!--[if lt IE 7]><div id='scwIElt7'></div><![endif]-->
    
    <br />
    <table width="100%" id="tb-article-form" cellpadding="3" cellspacing="3">
      <tbody>
        <tr class="row-header">
        	<div style="text-align:center;color:#f00;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
          <td colspan="2">Thông tin cơ bản</td>
        </tr>
        <tr>
          <td style="width:200px; padding-right:8px; vertical-align:top">
            </td>
          <td>
            
            <dt>
              <label>Tiêu đề</label>
            </dt>
            <dd>
              <input type="text" name="page_title" value="<?php echo $get['page_title']; ?>" size="70">
            </dd>
            <dt>
              <label>Tóm tắt chính</label>
            </dt>
            <dd>
              <textarea name="page_info" id="page_info" style="width:500px" cols="50" rows="8" onkeydown="show_length(this.value)"><?php echo $get['page_info']; ?></textarea>
              <span id="show_length"></span></dd>

          </td>
        </tr>
        <tr class="row-header">
          <td colspan="2"> Mô tả chi tiết (nếu có) </td>
        </tr>
        <tr>
          <td valign="top">
            <br />
            <div id="article_media_holder">
			<style type="text/css">
				a.preview_media{
				position:relative; /*this is the key*/
				z-index:24;}
				a.preview_media:hover{z-index:25; cursor:pointer}
				a.preview_media span{display: none}
				a.preview_media:hover span{
				display:block;
				position:absolute;
				top:-120px; left:50px; width:auto;
				text-align: center}
			</style>
            </div></td>
          <td>
          <?php 
				$fck = new FCKeditor('page_full');
				$fck->BasePath = sBASEPATH;
				$fck->Value  = $get['page_full'];
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?>
            
            </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="row-header">
          <td colspan="2">Dùng cho SEO</td>
        </tr>
        <tr>
          <td style="padding-bottom: 5px;" align="right">Meta Keywords : &nbsp;</td>
          <td style="padding-bottom: 5px;"><input type="text" size="60" name="page_key" value="<?php echo $get['page_key']; ?>" id="page_key"></td>
        </tr>
        <tr>
          <td align="right">Meta Description : &nbsp;</td>
          <td><textarea cols="60" rows="6" name="page_des" id="page_des"><?php echo $get['page_des']; ?></textarea></td>
        </tr>
        <!--<tr>
    	<td align="right">Url Follow : &nbsp;</td>
        <td><input type="checkbox" name="allow_se_index" value="1" checked /> Do-follow <span class="note"> (* bỏ chọn sẽ gắn thên rel='nofollow' vào link bài )</span></td>
    </tr>-->
        <tr>
          <td colspan="2"><div class="group-actions">
              <input class="btn" id="submit-collection-btn" name="ok" type="submit" value="Cập nhật lại &gt;&gt;">
              hoặc <a href="">Hủy bỏ</a> </div></td>
        </tr>
      </tbody>
    </table>
    
  </form>
</div>
