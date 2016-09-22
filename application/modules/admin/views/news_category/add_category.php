<div class="paddings">
	<script type="text/javascript">
		$(document).ready(function(e) {
			$("#ok").click(function(){
	            name = $("#name").val();
				
				if(name == ''){
					alert("Vui lòng nhập tên danh mục !");
					$("#name").focus();
					return false;
				}
			})
        });
    </script>
  <form action="<?php echo base_url(); ?>admin/news_category/add" method="post" enctype="multipart/form-data">
    <h2 id="title">Tạo danh mục</h2>
    <div id="action-links">
      <ul>
        <li id="add-prod"><a href="<?php echo base_url()."admin/news_category/add" ; ?>">Thêm danh mục mới</a></li>
        <li class="csv"><a href="<?php echo base_url()."admin/news_category" ; ?>">Danh sách danh mục</a></li>
      </ul>
    </div>
    <div class="group">
      <div class="group-fields">
        <dl>
          <dd>
            <input type="hidden" name="type" value="article">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Tên danh mục</label>
          </dt>
          <dd>
            <input type="text" size="80" name="cago_name" id="name" value="">
          </dd>
          <dt>
            <label for="custom_collection_body_html">Tóm tắt</label>
            <span class="note">(nếu có)</span></dt>
          <dd style="margin-bottom: 0"> 
            <!-- editor -->
            <textarea name="cago_info" cols="60" rows="8" id="cago_info"></textarea>
            <!-- editor --> 
          </dd>
          <dt>
            <label for="custom_collection_body_html">Mô tả chi tiết</label>
            <span class="note">(nếu có)</span></dt>
          <dd style="margin-bottom: 0"> 
            <!-- editor -->
            <!-- <textarea name="description" cols="60" rows="8" id="rich_text" aria-hidden="true" style="display: none;"></textarea> -->
            <?php 
				$fck = new FCKeditor('cago_full');
				$fck->BasePath = sBASEPATH;
				//$fck->Value  = $this->config->item('config_contact');
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?> 
            <!-- editor --> 
          </dd>
          <!-- <dt>
            <label>Ảnh đại diện</label>
          </dt>
          <dd>
            <input type="file" size="30" name="catThumnail">
          </dd> -->
          <!-- <dt>
            <label>Là danh mục con của</label>
          </dt>
          <dd>
            <select name="parentId" id="parentId">
              <option value="0">Danh mục gốc</option>
              <option value="1"> - Tin công ty</option>
              <option value="2"> - Tin công nghệ</option>
              <option value="3"> - Tin khuyến mại</option>
              <option value="4"> - Tuyển dụng</option>
            </select>
            <input type="hidden" name="old_parent_id" value="">
          </dd> -->
          <!-- <dt>
            <label>Loại nội dung hiển thị</label>
          </dt>
          <dd>
            <select name="display_option" id="display_option">
              <option value="child_only">Chỉ hiện thị danh mục con</option>
              <option value="article" selected="selected">Chỉ hiển thị bài</option>
              <option value="child_article">Hiển thị bài + Danh mục con</option>
            </select>
          </dd> -->
          <dt>
            <label>Thứ tự xuất hiện</label>
          </dt>
          <dd>
            <input type="text" size="10" name="cago_order" id="cago_order" value="">
            (cao xếp trước)</dd>
          <dt>
            <label>Dùng cho SEO</label>
          </dt>
          <dd>
            <table>
              <tbody>
                <!-- <tr>
                  <td>Meta Title</td>
                  <td><input type="text" size="60" name="meta_title" value="">
                    <span class="note"> * nếu để trống sẽ dùng tên danh mục</span></td>
                </tr> -->
                <tr>
                  <td style="padding-bottom:5px;">Meta Keyword</td>
                  <td style="padding-bottom:5px;"><input type="text" size="50" name="cago_key" value="" id="cago_key"></td>
                </tr>
                
                <tr>
                  <td>Meta Description</td>
                  <td><textarea cols="45" rows="6" name="cago_des" id="cago_des"></textarea>
                    <br />
                  <span class="note"> * nếu để trống sẽ dùng tóm tắt danh mục</span></td>
                </tr>
              </tbody>
            </table>
          </dd>
        </dl>
      </div>
      <!-- .group-fields -->
      <div class="group-actions">
        <input class="btn" id="ok" name="ok" type="submit" value="Thêm mới">
        hoặc <a href="">Hủy bỏ</a> </div>
      <!-- .group-actions --> 
    </div>
  </form>
</div>
