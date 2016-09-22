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
  <form action="<?php echo base_url(); ?>admin/product_category/add" method="post" enctype="multipart/form-data">
    <h2 id="title">Tạo danh mục</h2>
    <div id="action-links">
      <ul>
        <li id="add-prod"><a href="<?php echo base_url()."admin/product_category/add" ; ?>">Thêm danh mục mới</a></li>
        <li class="csv"><a href="<?php echo base_url()."admin/product_category" ; ?>">Danh sách danh mục</a></li>
      </ul>
    </div>
    <div class="group">
      <div class="group-fields">
      	<div style="text-align:center;color:#f00;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
        <dl>
          <dd>
            <input type="hidden" name="type" value="article">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Tên danh mục</label>
          </dt>
          <dd>
            <input type="text" size="80" name="cate_name" id="name" value="">
          </dd>
          <dt>
            <label>Là danh mục con của</label>
          </dt>
          <dd>
            <select name="cate_parent" id="parentId">
              <option value="1">Danh mục gốc</option>
              <?php 
					if(isset($list_cate) && $list_cate != NULL){
						foreach($list_cate as $cago){
							echo "<option value='".$cago['cate_id']."'>".$cago['cate_name']."</option>";
						}
					}
				?>
            </select>
          </dd>
          <!-- <label for="custom_collection_title">Danh mục</label>
              <span style="font-weight:normal; color:#CC0000"></span></dt>
            <dd>
              <select name="cago_id" id="">
                <option value="0">--Chọn danh mục--</option>
              	<?php 
					if(isset($list_cate) && $list_cate != NULL){
						foreach($list_cate as $cago){
							echo "<option value='".$cago['cate_id']."'>".$cago['cate_name']."</option>";
						}
					}
				?>
              </select>
            </dd> -->
            
          <dt>
            <label for="custom_collection_body_html">Tóm tắt</label>
            <span class="note">(nếu có)</span></dt>
          <dd style="margin-bottom: 0"> 
            <!-- editor -->
            <textarea name="cate_info" cols="60" rows="8" id="cate_info"></textarea>
            <!-- editor --> 
          </dd>
          <dt>
            <label for="custom_collection_body_html">Mô tả chi tiết</label>
            <span class="note">(nếu có)</span></dt>
          <dd style="margin-bottom: 0"> 
            <!-- editor -->
            <!-- <textarea name="description" cols="60" rows="8" id="rich_text" aria-hidden="true" style="display: none;"></textarea> -->
            <?php 
				$fck = new FCKeditor('cate_full');
				$fck->BasePath = sBASEPATH;
				//$fck->Value  = $this->config->item('config_contact');
				$fck->Width  = '100%';
				$fck->Height = 500;
				$fck->Create();
			?> 
            <!-- editor --> 
          </dd>
          <dt>
            <label>Ảnh đại diện</label>
          </dt>
          <dd>
            <input type="file" size="30" name="cate_images">
          </dd>
          <dt>
            <label>Loại nội dung hiển thị</label>
          </dt>
          <dd>
			<select name="cate_display" id="display_option" >
                <option value="product">Chỉ hiển thị sản phẩm</option>
                <option value="static_html">Hiển thị nội dung cố định</option>            
            </select>
          </dd>
          <dt>
            <label>Thứ tự xuất hiện</label>
          </dt>
          <dd>
            <input type="text" size="10" name="cate_order" id="cate_order" value="">
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
                  <td style="padding-bottom:5px;"><input type="text" size="50" name="cate_key" value="" id="cate_key"></td>
                </tr>
                
                <tr>
                  <td>Meta Description</td>
                  <td><textarea cols="45" rows="6" name="cate_des" id="cate_des"></textarea>
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
