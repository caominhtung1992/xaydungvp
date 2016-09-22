<div class="bgg_top">
    <div class="left"> <a title="Xem trang chủ" href="<?php echo base_url(); ?>" target="_blank">
      <div class="icon_logo"></div>
      </a> </div>
    <div class="right user_login">
      <div class="left bachnx_repon_left">Bạn là: <u style="font-weight:bold;"><?php echo $this->session->userdata['ses_user']; ?></u> ( <a href="<?php echo base_url()."admin/user/update/".$this->session->userdata['ses_userid']; ?>" style="color:#f00">Đổi mật khẩu</a> )</div>
      <div class="bachnx_group_icons">
          <div class="pic icon_clock left"></div>
          <div class="left" style="margin-top: 2px;"><?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('d/m/Y'); ;?></div>
          <div class="pic icon_exit left"></div>
          <div class="left" style="margin-top: 2px;"><a class="bachnx_logout" href="<?php echo base_url()."admin/verify/logout" ?>">Thoát quản trị</a> &nbsp;</div>
      </div>
      <div class="clear"></div>
      
      <div class="right bachnx_repon_left" style="margin-top:5px;margin-right:5px;">Server time : 
      <?php echo date('H:i:s - d/m/Y');?>
      </div>
      <div class="right clear bachnx_repon_left" style="margin-top:5px;margin-right:5px;">Last login ip :
    <?php
      //Gets the IP address
      $ip = getenv("REMOTE_ADDR"); 
      echo $ip; 
    ;?> 
    </div>
    </div>
    <div class="clear"></div>
  
  </div>
  <!--Start menu-->
  <div id="tabMenuDm">
    <div class="bgg navbar">
        <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar bachnx_navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
      <div style="padding-left: 10px;">
        <script type="text/javascript">
      $(document).ready(function(){
        $("#tabMenuDm .h_menu_content li").eq(<?php if(isset($act)){ echo $act;}else{ echo "0";} ?>).addClass("menu_active");
      });
    </script>
        <ul class="h_menu_content">
          <li class="h_menu_item left">
            <a href="<?php echo base_url()."admin/index" ;?>" class="first_"><span><i class="icon-home"></i>Home</span></a>
          </li>
          <li id="s1" class="h_menu_item left">
            <a class="first_" href="<?php echo base_url()."admin/order" ;?>" title="Bán hàng"><span><i class="icon-shopping-cart"></i>Bán hàng</span></a>
            <div class="h_menu_sub_full1 h_menu_sub_public" id="h_menu_sub_s1" style="display: none;">
              <p class="a_root"><a href="<?php echo base_url()."admin/order" ;?>">Danh sách đơn hàng</a></p>
            </div>
          </li>
          <li id="s2" class="h_menu_item left">
            <a class="first_" href="<?php echo base_url()."admin/product" ;?>" title="Bán hàng"><span><i class="icon-tags"></i>Sản phẩm</span></a>
            <div class="h_menu_sub_full2 h_menu_sub_public" id="h_menu_sub_s2" style="display: none;">
              <p class="a_root"><a href="<?php echo base_url()."admin/product" ;?>">Danh sách sản phẩm</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/product_category" ;?>">Danh mục sản phẩm</a></p>
              <!-- <p class="a_root"><a href="<?php echo base_url()."admin/user_review" ;?>">Ý kiến về sản phẩm</a></p> -->
            </div>
          </li>
          <li id="s3" class="h_menu_item left ">
            <a class="first_" href="<?php echo base_url()."admin/customer" ;?>" title="Bán hàng"><span><i class="icon-user"></i>Khách hàng</span></a>
            <div class="h_menu_sub_full3 h_menu_sub_public" id="h_menu_sub_s3" style="display: none;">
              <p class="a_root"><a href="<?php echo base_url()."admin/customer" ;?>">Danh sách khách hàng</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/customer_contact" ;?>">Khách hàng liên hệ</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/customer_newsletter" ;?>">Khách hàng nhận bản tin</a></p>
            </div>
          </li>
          <li id="s4" class="h_menu_item left">
            <a class="first_" href="<?php echo base_url()."admin/banner" ;?>" title="Bán hàng"><span><i class="icon-globe"></i>Marketing</span></a>
            <div class="h_menu_sub_full4 h_menu_sub_public" id="h_menu_sub_s4" style="display: none;">
              <p class="a_root"><a href="<?php echo base_url()."admin/banner" ;?>">Danh sách banner</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/popup" ;?>">Banner pop-up</a></p>
              <!-- <p class="a_root"><a href="javascript:void(0);">Hình nền website</a></p> -->
            </div>
          </li>
          <li id="s5" class="h_menu_item left ">
            <a class="first_" href="<?php echo base_url()."admin/articles" ; ?>" title="Bán hàng"><span><i class="icon-th-large"></i>Nội dung</span></a>
            <div class="h_menu_sub_full5 h_menu_sub_public" id="h_menu_sub_s5">
              <p class="a_root"><a href="<?php echo base_url()."admin/articles" ; ?>">Danh sách tin tức</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/news_category" ; ?>">Danh mục tin tức</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/page" ; ?>">Nội dung cố định</a></p>
            </div>
          </li>
          <li id="s16" class="h_menu_item left">
            <a class="first_" href="javascript:void(0);" title="Bán hàng"><span><i class="icon-bar-chart"></i>Thống kê</span></a>
            <div class="h_menu_sub_full16 h_menu_sub_public" id="h_menu_sub_s16" style="display: none;">
              <!--p class="a_root"><a href="javascript:void(0);">Thống kê truy cập</a></p-->
              <p class="a_root"><a href="<?php echo base_url()."admin/report"; ?>">Thống kê khách hàng</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/report/order"; ?>">Thống kê đơn hàng</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/report/product_buy"; ?>">Sản phẩm mua nhiều</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/report/product_view"; ?>">Sản phẩm xem nhiều</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/report/referer"; ?>">Web giới thiệu</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/report/search"; ?>">Từ khóa tìm kiếm</a></p>
            </div>
          </li>
          <li id="s17" class="h_menu_item left">
            <a class="first_" href="<?php echo base_url()."admin/setup" ; ?>" title="Bán hàng"><span><i class="icon-cogs"></i>Hệ thống</span></a>
            <div class="h_menu_sub_full17 h_menu_sub_public" id="h_menu_sub_s17" style="display: none;">
              <!--p class="a_root"><a href="<?php echo base_url()."admin/template" ; ?>">Sửa file template</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/theme" ; ?>">Chọn giao diện</a></p-->
              <p class="a_root"><a href="<?php echo base_url()."admin/setup" ; ?>">Cài đặt hiển thị</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/user" ; ?>">Danh sách quản trị</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/support" ; ?>">Danh sách hỗ trợ</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/video" ; ?>">Quản trị Videos</a></p>
               <p class="a_root"><a href="<?php echo base_url()."admin/commit" ; ?>">Quản trị Cam kết</a></p>
              <p class="a_root"><a href="<?php echo base_url()."admin/config" ; ?>">Thông tin website</a></p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <!--End menu--> 
  
  <!--Start  noi dung-->
  <div class="bgg_under_menu">
    <div class="padd">
      <div class="pic icon_tomtat left"></div>
      <div class="text"><?php echo $title; ?></div>
      <div class="clear"></div>
    </div>
  </div>