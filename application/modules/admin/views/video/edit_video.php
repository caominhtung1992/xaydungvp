<div class="paddings">
  <form action="<?php echo base_url()."admin/video/update/".$get['video_id'].""; ?>" method="post" enctype="multipart/form-data">
    <h2 id="title">Cập nhật Video</h2>
    <div id="action-links">
      <ul>
        <li id="add-prod"><a href="<?php echo base_url()."admin/video/add" ; ?>">Thêm hỗ trợ mới</a></li>
        <li class="csv"><a href="<?php echo base_url()."admin/video" ; ?>">Danh sách hỗ trợ</a></li>
      </ul>
    </div>
    <div class="group">
      <div class="group-fields">
        <dl>
          <dd>
          </dd>
          <dt class="top">
            <label for="custom_collection_title">Videos link</label>
          </dt>
          <dd>
            <input type="text" size="80" name="video_link" id="name" value="<?php echo $get['video_link']; ?>">
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
