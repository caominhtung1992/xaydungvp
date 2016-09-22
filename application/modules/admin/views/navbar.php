<section id="off-canvas-nav">
  <nav class="pavo-mainnav">
    <div id="off-canvas-button"><span class="icon-remove-sign"></span></div>
    <ul id="scroll_menu" class="nav navbar-navf megamenu">
        <ul>
        <li><h3 onClick="location.href='<?php echo base_url()."admin/" ;?>'" style="background:#f5f5f5" id="p11"><i class="icon-home"></i> Home</h3></li>
        <li>
          <h3 id="p10"><i class="icon-shopping-cart"></i> Bán hàng</h3>
          <ul style="display: none;">
            <li><a href="<?php echo base_url()."admin/order" ;?>">Danh sách đơn hàng</a></li>
          </ul>
        </li>
        <li>
          <h3 id="p9"><i class="icon-tags"></i> Sản phẩm</h3>
          <ul style="display: none;">
            <li><a href="<?php echo base_url()."admin/product" ;?>">Danh sách sản phẩm</a></li>
            <li><a href="<?php echo base_url()."admin/product_category" ;?>">Danh mục sản phẩm</a></li>
          </ul>
        </li>
        <li>
          <h3 id="p8"><i class="icon-user"></i> Khách hàng</h3>
          <ul style="display: none;">
            <li><a href="<?php echo base_url()."admin/customer_contact" ;?>">Khách hàng liên hệ</a></li>
          </ul>
        </li>
        <li>
          <h3 id="p7"><i class="icon-globe"></i> Marketing</h3>
          <ul style="display: none;">
            <li><a href="<?php echo base_url()."admin/popup" ;?>">Banner pop-up</a></li>
          </ul>
        </li>
        <li>
          <h3 id="p6"><i class="icon-th-large"></i> Nội dung</h3>
          <ul style="display:none">
            <li><a href="<?php echo base_url()."admin/articles" ; ?>">Danh sách tin tức</a></li>
            <li><a href="<?php echo base_url()."admin/news_category" ; ?>">Danh mục tin tức</a></li>
            <li><a href="<?php echo base_url()."admin/page" ; ?>">Nội dung cố định</a></li>
          </ul>
        </li>
        <li>
          <h3 id="p5"><i class="icon-bar-chart"></i> Thống kê</h3>
          <ul style="display:none">
            <!--li><a href="javascript:void(0);">Thống kê truy cập</a></li-->
            <li><a href="<?php echo base_url()."admin/report"; ?>">Thống kê khách hàng</a></li>
            <li><a href="<?php echo base_url()."admin/report/order"; ?>">Thống kê đơn hàng</a></li>
            <li><a href="<?php echo base_url()."admin/report/product_buy"; ?>">Sản phẩm mua nhiều</a></li>
            <li><a href="<?php echo base_url()."admin/report/product_view"; ?>">Sản phẩm xem nhiều</a></li>
            <li><a href="<?php echo base_url()."admin/report/referer"; ?>">Web giới thiệu</a></li>
            <li><a href="<?php echo base_url()."admin/report/search"; ?>">Từ khóa tìm kiếm</a></li>
          </ul>
        </li>
        <li>
          <h3 id="p4"><i class="icon-cogs"></i> Hệ thống</h3>
          <ul style="display:none">
            <li><a href="<?php echo base_url()."admin/setup" ; ?>">Cài đặt hiển thị</a></li>
            <li><a href="<?php echo base_url()."admin/user" ; ?>">Danh sách quản trị</a></li>
            <li><a href="<?php echo base_url()."admin/support" ; ?>">Danh sách hỗ trợ</a></li>
            <li><a href="<?php echo base_url()."admin/config" ; ?>">Thông tin website</a></li>
          </ul>
        </li>
        </ul>
    </ul>
  </nav>
</section>
