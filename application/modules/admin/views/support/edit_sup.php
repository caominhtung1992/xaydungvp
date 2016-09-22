<div class="paddings">
  <form action="<?php echo base_url()."admin/support/update/".$get['sup_id'].""; ?>" method="post" enctype="multipart/form-data">
    <h2 id="title">Cập nhật hỗ trợ trực tuyến</h2>
    <div id="action-links">
      <ul>
        <li id="add-prod"><a href="<?php echo base_url()."admin/support/add" ; ?>">Thêm hỗ trợ mới</a></li>
        <li class="csv"><a href="<?php echo base_url()."admin/support" ; ?>">Danh sách hỗ trợ</a></li>
      </ul>
    </div>
    <div class="group">
      <div class="group-fields">
        <dl>
          <dd>
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Tên hiển thị</label>
          </dt>
          <dd>
            <input type="text" size="80" name="sup_name" id="name" value="<?php echo $get['sup_name']; ?>">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Nick yahoo</label>
          </dt>
          <dd>
            <input type="text" size="80" name="sup_yahoo" id="name" value="<?php echo $get['sup_yahoo']; ?>">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Số điện thoại</label>
          </dt>
          <dd>
            <input type="text" size="80" name="sup_phone" id="name" value="<?php echo $get['sup_phone']; ?>">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Nick skype</label>
          </dt>
          <dd>
            <input type="text" size="80" name="sup_sky" id="name" value="<?php echo $get['sup_sky']; ?>">
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Email</label>
          </dt>
          <dd>
            <input type="text" size="80" name="sup_email" id="name" value="<?php echo $get['sup_email']; ?>">
          </dd>
          
          </dd>
          
        </dl>
      </div>
      <!-- .group-fields -->
      <div class="group-actions">
        <input type="hidden" name="create" value="yes">
        <input type="hidden" name="l" value="">
        <input class="btn" id="ok" name="ok" type="submit" value="Cập nhật">
        hoặc <a href="">Hủy bỏ</a> </div>
      <!-- .group-actions --> 
    </div>
  </form>
</div>
