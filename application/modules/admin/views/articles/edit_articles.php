<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/articles/add" ; ?>">Thêm nội dung mới</a></li>
      <li class="csv"><a href="<?php echo base_url()."admin/articles" ; ?>">Danh sách nội dung</a></li>
      <li class="csv"><a href="<?php echo base_url()."admin/news_category" ; ?>">Quản lý danh mục</a></li>
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
          <td style="width:200px; padding-right:8px; vertical-align:top"><dt>
              <label>Ảnh</label>
            </dt>
            <dd>
	            <?php 
					if($get['news_images'] == NULL){
						echo "<div style='width:120px; height:70px; border:1px solid #CCC; padding-top:40px; text-align:center;color:#CCC'>Chưa có ảnh</div>";
					}else{
				?>
              	<img style="max-width: 170px;" src="<?php echo base_url()."uploads/news/thumb/".$get['news_images']; ?>" alt="<?php echo $get['news_title']; ?>" /><?php } ?>
                <br />
              Cập nhật ảnh<br />
              <input type="file" name="news_images" id="thum_file" size="15">
            </dd>
            </td>
          <td><dt class="top">
              <label for="custom_collection_title">Danh mục</label>
              <span style="font-weight:normal; color:#CC0000"></span></dt>
            <dd>
              <select name="cago_id" id="">
              	<?php 
					if(isset($list_cago) && $list_cago != NULL){
						foreach($list_cago as $cago){
							echo "<option value='".$cago['cago_id']."' ";
							if($get['cago_id'] == $cago['cago_id']){
								echo "selected='selected'";
							}
							echo ">".$cago['cago_name']."</option>";
						}
					}
				?>
              </select>
            </dd>
            <dt>
              <label>Tiêu đề</label>
            </dt>
            <dd>
              <input type="text" name="news_title" value="<?php echo $get['news_title']; ?>" size="70">
            </dd>
            
            <!--<dt><label>Link Index</label></dt>
                   <dd><input  type="text" name="url_index" value="" size="70"></dd>   -->
            
            <dt>
              <label>Link tham khảo (link web ngoài nếu có)</label>
            </dt>
            <dd>
              <input type="text" name="news_external" value="<?php echo $get['news_external']; ?>" size="70" id="news_external">
            </dd>
            <dt>
              <label>Tóm tắt chính</label>
            </dt>
            <dd>
              <textarea name="news_info" id="news_info" style="width:500px" cols="50" rows="8" onkeydown="show_length(this.value)"><?php echo $get['news_info']; ?></textarea>
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
          <!-- <textarea name="content" id="rich_text" cols="60" rows="18" aria-hidden="true" style="display: none;"> </textarea> -->
          
          <?php 
				$fck = new FCKeditor('news_full');
				$fck->BasePath = sBASEPATH;
				$fck->Value  = $get['news_full'];
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?>
            
            </td>
        </tr>
        <!-- <tr>
          <td align="right">Thứ tự :</td>
          <td><input type="text" size="10" name="ordering" value="0">
            (* số cao xếp trước) </td>
        </tr> -->
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="row-header">
          <td colspan="2">Dùng cho SEO</td>
        </tr>
        <tr>
          <td style="padding-bottom: 5px;" align="right">Meta Keywords : &nbsp;</td>
          <td style="padding-bottom: 5px;"><input type="text" size="60" name="news_key" value="<?php echo $get['news_key']; ?>" id="news_key"></td>
        </tr>
        <tr>
          <td align="right">Meta Description : &nbsp;</td>
          <td><textarea cols="60" rows="6" name="news_des" id="news_des"><?php echo $get['news_des']; ?></textarea></td>
        </tr>
        <!--<tr>
    	<td align="right">Url Follow : &nbsp;</td>
        <td><input type="checkbox" name="allow_se_index" value="1" checked /> Do-follow <span class="note"> (* bỏ chọn sẽ gắn thên rel='nofollow' vào link bài )</span></td>
    </tr>-->
        <tr>
          <td colspan="2"><div class="group-actions">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="l" value="">
              <input class="btn" id="submit-collection-btn" name="ok" type="submit" value="Cập nhật lại &gt;&gt;">
              hoặc <a href="">Hủy bỏ</a> </div></td>
        </tr>
      </tbody>
    </table>
    
  </form>
</div>
