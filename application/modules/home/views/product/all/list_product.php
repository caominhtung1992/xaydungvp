<section id="main-body">
      <div class="main-content">
        <div class="row">
          <div class="col-24 cate-breadcrumbs">
            <a href="">Trang chủ </a>>><a href=""> <?php echo $title; ?></a>
          </div>
          <div class="col-5 cate-left">
            <div class="cate-left-menu">
              <p class="cate-left-menu-title"><span class="ctrl-link">►</span><?php echo $title; ?></p>
              <ul>
              <?php
                  if(isset($list_cate_menu) && $list_cate_menu != NULL){
                    foreach($list_cate_menu as $k => $v){
                      //var_dump($v);
                      //die();
                  ?>
                  <li><a href="<?php echo base_url()."".$v['cate_rewrite']."/c".$v['cate_id'].".html"; ?>""><?php echo $v['cate_name']; ?></a></li>
                  <?php
                    }
                  }
                ?>
              </ul>
            </div>
            <div class="left-content-video">
              <div class="title-new-left">
                <p>video</p>
              </div>
              <div class="left-main-video">
                <?php
                if(isset($link_videos) && $link_videos != NULL){
                  foreach($link_videos as $value){
               
                ?>
              <?php
                  $url = $value['video_link'];
                  parse_str(parse_url($url, PHP_URL_QUERY), $youtube);
                  
                ?>
                <iframe width="100%" height="150px" src="https://www.youtube.com/embed/<?php echo $youtube['v']; ?>" frameborder="0" allowfullscreen></iframe>
                <?php } } ?>
              </div>
            </div>
            <div class="left-content-commitment">
              <div class="left-commitment-t cate-left-commitent">
                <p class="abc">Cam kết</p>
                <ul>
                  <li><a href="#">100% hàng đúng giá</a></li>
                  <li><a href="#">Chất lượng cực chuẩn ,tốt</a></li>
                  <li><a href="#">Giá rẻ nhất thị trường</a></li>
                  <li><a href="#">Bảo hành uy tín, lâu dài</a></li>
                  <li><a href="#">Tư vấn chuyên nghiệp tận tình</a></li>
                  <li><a href="#">Giao hàng toàn quốc</a></li>
                </ul>
              </div>
              <?php
                if(isset($slide_adv) && $slide_adv != NULL){
                  foreach($slide_adv as $value){
                  //var_dump($value);die();
                ?>
                 <div class="left-commitment-b">
                <img src="<?php echo base_url()."uploads/banner/".$value['slide_image']."";?>" alt="">
              </div>
              <?php 
                  }
                } 
                ?>
            </div>
            <div class="left-content-partner">
              <p class="left-title-partner">
                Đối tác
              </p>
              <div class="left-img-partner">
                <a href="#">
                  <img src="<?php echo base_url();?>public/images/doitac-01.png" alt="">
                </a>
              </div>
              <div class="left-img-partner">
                <a href="#">
                  <img src="<?php echo base_url();?>public/images/doitac-02.png" alt="">
                </a>
              </div>
              <div class="left-img-partner">
                <a href="#">
                  <img src="<?php echo base_url();?>public/images/doitac-03.png" alt="">
                </a>
              </div>
              <div class="left-img-partner">
                <a href="#">
                  <img src="<?php echo base_url();?>public/images/doitac-04.png" alt="">
                </a>
              </div>
              <div class="left-img-partner">
                <a href="#">
                  <img src="<?php echo base_url();?>public/images/doitac-05.png" alt="">
                </a>
              </div>
              <div class="left-img-partner">
                <a href="#">
                  <img src="<?php echo base_url();?>public/images/partner-06.png" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="col-19 cate-right">
            <div class="cate-r-banner">
              <img src="<?php echo base_url();?>public/images/cateloger-banner.jpg" alt="">
            </div>
            <div class="cate-r-title">
              <p class="cate-title-info"><?php echo $title; ?></p>
            </div>
            <?php 
            if(isset($list_pro) && $list_pro != NULL){
              $stt = 0;
              foreach($list_pro as $value){
                @$images = unserialize($value['pro_images']);
                $stt++;
                //var_dump($value);die();
            ?>
            <div class="cate-iteam-pro">
              <div class="cate-iteam-main">
                <div class="cate-iteam-img">
                  <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" alt=""></a>
                </div>
                <div class="cate-iteam-info">
                  <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value['pro_name']; ?></a>
                  <p>Mã sản phẩm: <?php echo $value["pro_code"] ?></p>
                  <span><?php echo number_format($value['pro_price']); ?> đ</span>
                </div>
                <?php if($value['pro_saleoff'] == 1){ ?>
                <div class="sale">
                  <p>Giảm</p>
                  <span class="sale-number">-<?php echo round(( $value["pro_market"] - $value["pro_price"] ) / $value["pro_market"] * 100) ?> %</span>
                </div>
                <?php } ?>              
              </div>
              <div class="pro-product-info">
                    <div class="pro-product-info-top">
                      <p><?php echo $value["pro_info"] ?></p>
                    </div>
                    <div class="pro-product-info-bot">
                      <a class="pro-detail-pro" href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>">Chi Tiết</a>
                     </div>
                  </div>
            </div>
            <?php } }  ?>
            <div class="pagination page-top">
              <div id="pagination" class=""><?php  echo $this->pagination->create_links();?></div>
            </div>
          </div>
          <div class="col-24 cate-news">
            <div class="cate-r-title-news">
              <p class="cate-title-info">Tin tức sự kiện</p>
              <a href="<?php echo base_url(); ?>tin-tuc/">Xem tất cả &nbsp >></a>
            </div>
            <?php
                if(isset($list_news_invole) && $list_news_invole != NULL){
                  foreach($list_news_invole as $value){
                  //var_dump($value);die();
                  @$images = unserialize($value['news_images']);
              ?>
            <div class="cate-news-iteam">
              <img src="<?php echo base_url()."uploads/news/thumb/".$value['news_images']."" ?>" alt="">
              <a href="<?php echo base_url()."tin-tuc/".$value['news_rewrite']."/".$value['news_id'].".html"; ?>"><?php echo $value["news_title"]; ?></a>
            </div>
        <?php 
            }
          }
         ?>          
        </div>
      </div>
    </section>