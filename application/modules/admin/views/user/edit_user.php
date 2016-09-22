<div class="paddings">
  <h2 id="title">Thêm quản trị</h2>
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/user/add" ?>">Thêm quản trị mới</a></li>
      <li id="add-prod"><a href="<?php echo base_url()."admin/user" ?>">Danh sách quản trị</a></li>
    </ul>
  </div>
  <form action="<?php echo base_url()."admin/user/update/".$get['user_id'].""; ?>" method="post" enctype="multipart/form-data">
    <style>
	.set_orange { background-color:#FF3}
  	</style>
    <div class="group">
      <div class="group-fields">
      	<div class="error_red" style="color:red;"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
        <dl>
          <dt class="top">
            <label for="custom_collection_title">Tên đăng nhập</label>
          </dt>
          <dd>
            <input type="text" class="user_size" name="user_name" value="<?php echo $get['user_name']; ?>" />
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Mật khẩu</label>
          </dt>
          <dd>
            <input type="password" class="user_size" name="user_pass" value="" />
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Cấp độ</label>
          </dt>
          <dd>
            <select name="user_level">
            	<option value="1" <?php if($get['user_level'] == 1){ echo "selected = 'selected'"; }?>>-- Admin --</option>
                <option value="2" <?php if($get['user_level'] == 2){ echo "selected = 'selected'"; }?>>-- Member --</option>
            </select>
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Họ và tên</label>
          </dt>
          <dd>
            <input type="text" class="user_size" name="user_fullname" value="<?php echo $get['user_fullname']; ?>" />
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Giới tính</label>
          </dt>
          <dd>
            <select name="user_gender">
            	<option value="1" <?php if($get['user_gender'] == 1){ echo "selected = 'selected'"; }?>>-- Nam --</option>
                <option value="2" <?php if($get['user_gender'] == 2){ echo "selected = 'selected'"; }?>>-- Nữ --</option>
            </select>
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Số điện thoại</label>
          </dt>
          <dd>
            <input type="text" class="user_size" name="user_phone" value="<?php echo $get['user_phone']; ?>" />
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Email</label>
          </dt>
          <dd>
            <input type="text" class="user_size" name="user_email" value="<?php echo $get['user_email']; ?>" />
          </dd>
          
          <dt class="top">
            <label for="custom_collection_title">Địa chỉ</label>
          </dt>
          <dd>
            <input type="text" class="user_size" name="user_address" value="<?php echo $get['user_address']; ?>" />
          </dd>
        </dl>
      </div>
      <!-- .group-fields -->
      <div class="group-actions">
        <input class="btn btn_submit_bachnx" id="submit-collection-btn" name="ok" type="submit" value="Cập nhật">
        hoặc <a href="<?php echo base_url()."admin"; ?>">Hủy bỏ</a> </div>
      <!-- .group-actions --> 
    </div>
  </form>
</div>
