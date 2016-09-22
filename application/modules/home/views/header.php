<header id="header">
      <div class="top-head">
        <div class="row">
          <img src="<?php echo base_url();?>public/images/banner.jpg" width="1024" height="250" />
          <!--div class="col-9">
            <a href="<?php echo base_url();?>">
              <img src="<?php echo base_url();?>public/images/logo-top.png" />
            </a>              
          </div>
          <div class="col-15 banner-top">
            <a href="#">
              <img src="<?php echo base_url();?>public/images/banner-top.png" />
            </a>
          </div-->
        </div>
      </div>
      <div class="mid-head">
        <div class="row">
          <div class="col-19 menu-top">
            <ul>
              <li class="icon-menu-home"><a href="<?php echo base_url();?>">Trang chủ</a></li>
              <li><a href="<?php echo base_url();?>page/gioi-thieu-ve-catdainox/111.html">Giới thiệu</a></li>
              <li class="cap1"><a href="<?php echo base_url();?>">Sản phẩm</a>
                  <ul class="cap2">
                    <?php
                      if(isset($listall['cate']) && $listall['cate'] != NULL){
                        foreach($listall['cate'] as $k => $v){
                    ?>
                    <li><a class="color-cap2" href="<?php echo base_url()."".$v['cate_rewrite']."/c".$v['cate_id'].".html"; ?>" ><?php echo $v['cate_name']; ?></a></li>
                    <?php }} ?>
                  </ul>
              </li>
              <li><a href="<?php echo base_url(); ?>tin-tuc/">Tin tức</a></li>
              <li style="border-right: none;"><a href="<?php echo base_url();?>lien-he/">Liên hệ</a></li>
            </ul>               
          </div>
          <div class="col-5 hotline-top">
           <div class="background-menu-hotline">
            <p>0985.716.666 / 0363.606.789</p><span class="icon-hotline"></span>     
            </div>   
          </div>
        </div>
      </div>