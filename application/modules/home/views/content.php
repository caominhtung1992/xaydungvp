  <!--div class="bt-head">
    <ul class="bxslider">
    <?php
            if(isset($slide_home) && $slide_home != NULL){
              foreach($slide_home as $value){
              //var_dump($value);die();
            ?>
             <li><img src="<?php echo base_url()."uploads/banner/".$value['slide_image']."";?>" /></li>
          <?php 
              }
            } 
            ?>  
    </ul>
  </div-->
</header>
<div class="clear" ></div>
<section id="main-body">
      <!--div class="new-product">
        <div class="new-pro-main">
          <div class="row">
            <div class="col-24" style="padding: 0px;">
              <div class="new-pro-title">
                <p>Sản phẩm mới</p>
                <a href="<?php echo base_url(); ?>san-pham-moi/">Xem tất cả >></a>
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="slider-product">
            <ul class="owl-carousel jcarousel-skin-tango1" id="mycarousel1">
            <?php 
              if(isset($pro_new) && $pro_new != NULL){
                $stt = 0;
                foreach($pro_new as $value){
                  @$images = unserialize($value['pro_images']);
                  //var_dump($value);die();
                  $stt++;
              ?>
                  <li class="iteam_slider">
                    <div class="iteam_slider_top"><a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" /></a></div>
                    <div class="iteam_slider_bot">
                        <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value['pro_name']; ?></a>
                        <p>Mã sản phẩm:<?php echo $value['pro_code']; ?></p>
                        <span>Giá: <?php echo number_format($value['pro_price']); ?> đ</span>
                      </div>
                  </li>
                <?php 
                  }
                } 
                ?>
            </ul>
          </div>
        </div>
      </div-->
      <div class="main-content">
        <div class="row">
          <div class="col-5" style="padding: 0px;">
            <div class="title-pro-content">
              <h2>
                SẢN Phẩm
              </h2>
            </div>
            <div class="left-pro-content">
            <?php
              if(isset($listall['cate']) && $listall['cate'] != NULL){
                foreach($listall['cate'] as $k => $v){
            ?>
              <div class="left-pro-iteam">
                <p><a href="<?php echo base_url()."".$v['cate_rewrite']."/c".$v['cate_id'].".html"; ?>"><?php echo $v['cate_name']; ?> </a></p>                
              </div>
              <?php
              }
            }
            ?>         
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
              <div class="left-commitment-t">
                <p class="abc">Cam kết</p>
                <ul class="home-danhgia">
                <?php
                if(isset($list_commit) && $list_commit != NULL){
                  foreach($list_commit as $value){
                  //var_dump($value);die();
                ?>
                  <li><a href="#"><?php echo $value['commit_name'] ?></a></li>            
                  <?php }} ?>
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
                  <img src="<?php echo base_url();?>public/images/doitac-01.png" width="170">
              </div>
              <div class="left-img-partner">
                  <img src="<?php echo base_url();?>public/images/doitac-02.png" width="170">
              </div>
              <div class="left-img-partner">
                  <img src="<?php echo base_url();?>public/images/doitac-03.png" width="150" alt="">
              </div>
              <div class="left-img-partner">
                  <img src="<?php echo base_url();?>public/images/doitac-04.png" width="170" alt="">
              </div>
              <div class="left-img-partner">
                  <img src="<?php echo base_url();?>public/images/doitac-05.png" width="170" alt="">
              </div>
              <div class="left-img-partner">
                  <img src="<?php echo base_url();?>public/images/destail-04.jpg" alt="">
              </div>
              <div class="left-img-partner">
                  <img src="<?php echo base_url();?>public/images/partner-06.png" width="150">
              </div>
            </div>
          </div>
          <div class="col-19" style="padding: 0px;">
          <div class="bt-head">
              <ul class="bxslider">
              <?php
                  if(isset($slide_home) && $slide_home != NULL){
                    foreach($slide_home as $value){
                    //var_dump(count($value));die();
                  ?>
                 <li><img src="<?php echo base_url()."uploads/banner/".$value['slide_image']."";?>" /></li>
                <?php 
                    }
                  } 
                  ?>  
              </ul>
            </div>
            <div class="new-product">
          <div class="new-pro-main">
              <div class="row">
                <div class="col-24" style="padding: 0px;">
                  <div class="new-pro-title">
                    <p>Sản phẩm mới</p>
                    <a href="<?php echo base_url(); ?>san-pham-moi/">Xem tất cả >></a>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
              <div class="slider-product">
                <ul class="owl-carousel jcarousel-skin-tango1" id="mycarousel1">
                <?php 
                  if(isset($pro_new) && $pro_new != NULL){
                    $stt = 0;
                    foreach($pro_new as $value){
                      @$images = unserialize($value['pro_images']);
                      //var_dump($value);die();
                      $stt++;
                  ?>
                      <li class="iteam_slider">
                        <div class="iteam_slider_top"><a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" /></a></div>
                        <div class="iteam_slider_bot">
                            <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value['pro_name']; ?></a>
                            <p>Mã sản phẩm:<?php echo $value['pro_code']; ?></p>
                            <span>Giá: <?php echo number_format($value['pro_price']); ?> đ</span>
                          </div>
                      </li>
                    <?php 
                      }
                    } 
                    ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-14 main-content-mid">
            
            <div class="main-product">
              <div class="title-main-product">
                <p>Đá cắt kim loại</p>
              </div>
              <div class="grouptop-main-pro">
               <?php
                if(isset($list_pro_cutting) && $list_pro_cutting != NULL){
                  foreach($list_pro_cutting as $value){
                  //echo '</pre>'.var_dump($value);die();
                  @$images = unserialize($value['pro_images']);
              ?>
                <div class="iteam-main-pro">
                  <div class="iteam-pro-img">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>">
                      <img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" alt="">
                      <?php if($value['pro_saleoff'] == 1){ ?>
                      <div class="sale">
                        <p>Giảm</p>
                        <span class="sale-number">-<?php echo round(( $value["pro_market"] - $value["pro_price"] ) / $value["pro_market"] * 100) ?></span><span>%</span>
                      </div>
                      <?php } ?>
                    </a>
                  </div>
                  <div class="iteam-pro-info">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value["pro_name"]; ?></a>
                    <p>Mã sản phẩm: <?php echo $value["pro_code"] ?></p>
                    <span>Giá: <?php echo number_format($value["pro_price"]); ?> đ</span>
                  </div>                  
                </div>
                <?php 
                  }
                }
                ?>
              </div>   
            </div>
            <div class="main-product">
              <div class="title-main-product">
                <p>Lưỡi cắt gỗ</p>
              </div>
              <?php
                if(isset($list_pro_hate) && $list_pro_hate != NULL){
                  foreach($list_pro_hate as $value){
                   @$images = unserialize($value['pro_images']);
              ?>
                <div class="iteam-main-pro">
                  <div class="iteam-pro-img">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>">
                      <img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" alt="">
                    </a>
                    <?php if($value['pro_saleoff'] == 1){ ?>
                      <div class="sale">
                        <p>Giảm</p>
                        <span class="sale-number">-<?php echo round(( $value["pro_market"] - $value["pro_price"] ) / $value["pro_market"] * 100) ?></span><span>%</span>
                      </div>
                      <?php } ?>
                  </div>
                  <div class="iteam-pro-info">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value["pro_name"] ?></a>
                     <p>Mã sản phẩm: <?php echo $value["pro_code"] ?></p>
                    <span>Giá: <?php echo number_format($value["pro_price"]); ?> đ</span>
                  </div>                  
                </div>
              <?php 
                } 
              }
             ?>
            </div>
            <div class="main-product">
              <div class="title-main-product">
                <p>Lưỡi cắt bê tông</p>
              </div>
                <?php
                if(isset($list_pro_curling) && $list_pro_curling != NULL){
                  foreach($list_pro_curling as $value){
                   @$images = unserialize($value['pro_images']);
              ?>
                <div class="iteam-main-pro">
                  <div class="iteam-pro-img">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>">
                      <img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" alt="">
                    </a>
                    <?php if($value['pro_saleoff'] == 1){ ?>
                      <div class="sale">
                        <p>Giảm</p>
                        <span class="sale-number">-<?php echo round(( $value["pro_market"] - $value["pro_price"] ) / $value["pro_market"] * 100) ?></span><span>%</span>
                      </div>
                      <?php } ?>
                  </div>
                  <div class="iteam-pro-info">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value["pro_name"] ?></a>
                     <p>Mã sản phẩm: <?php echo $value["pro_code"] ?></p>
                    <span>Giá: <?php echo number_format($value["pro_price"]); ?> đ</span>
                  </div>
                </div>
              <?php 
                } 
              }
             ?>
            </div>
            <div class="main-product">
              <div class="title-main-product">
                <p>Máy hàn</p>
              </div>
                <?php
                if(isset($list_pro_pkhan) && $list_pro_pkhan != NULL){
                  foreach($list_pro_pkhan as $value){
                   @$images = unserialize($value['pro_images']);
              ?>
                <div class="iteam-main-pro">
                  <div class="iteam-pro-img">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>">
                      <img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" alt="">
                    </a>
                    <?php if($value['pro_saleoff'] == 1){ ?>
                      <div class="sale">
                        <p>Giảm</p>
                        <span class="sale-number">-<?php echo round(( $value["pro_market"] - $value["pro_price"] ) / $value["pro_market"] * 100) ?></span><span>%</span>
                      </div>
                      <?php } ?>
                  </div>
                  <div class="iteam-pro-info">
                    <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value["pro_name"] ?></a>
                     <p>Mã sản phẩm: <?php echo $value["pro_code"] ?></p>
                    <span>Giá: <?php echo number_format($value["pro_price"]); ?> đ</span>
                  </div>
                </div>
              <?php 
                } 
              }
             ?>
            </div>
          </div>
          <div class="col-5 right-merit" style="padding: 0px;">
            <div class="right-content-merit">
              <p>BẰNG KHEN  </p>
              <SPAN>& CHỨNG NHẬN </SPAN>
              <div class="right-main-merit">
                <?php
                if(isset($slide) && $slide != NULL){
                  foreach($slide as $value){
                  //var_dump($value);die();
                ?>
                  <div class="iteam-right-merit">
                    <img src="<?php echo base_url()."uploads/banner/".$value['slide_image']."";?>" alt="">
                </div>
              <?php 
                  }
                } 
                ?>                
              </div>
            </div>
            <div class="right-main-support">
              <h4>Hỗ trợ online</h4>
               <?php if(isset($list_support) && $list_support != NULL){
                  foreach($list_support as $value){
                  //var_dump($value);die();
                  ?>
                  <div class="right-support-iteam">
                  <img src="<?php echo base_url();?>public/images/Support_Services.png">
                  <p class="main-sp-name"><?php echo $value['sup_name'] ?></p>
                  <p class=""><?php echo $value['sup_email'] ?></p>
                  <p><?php echo $value['sup_phone'] ?></p>
                  <div class="right-sp-link">
                    <a href="ymsgr:sendIM?<?php echo $value['sup_phone'] ?>" title="<?php echo $value['sup_name'] ?>"><img src="http://opi.yahoo.com/online?u=<?php echo $value['sup_phone'] ?>&amp;m=g&amp;t=1" alt="<?php echo $value['sup_name'] ?>" data-pin-nopin="true"></a>
                    <a href="skype:<?php echo $value['sup_phone'] ?>" title="<?php echo $value['sup_name'] ?>"><img src="<?php echo base_url(); ?>public/images/icon_skype.png" alt="<?php echo $value['sup_name'] ?>" title="<?php echo $value['sup_name'] ?>" data-pin-nopin="true"></a>
                  </div>
                </div>
                  <?php
                  }
                }
                ?>
              
              <!--div class="right-support-iteam">
                <img src="<?php echo base_url();?>public/images/Support_Services.png">
                <p>Hot line</p>
                <p>0948 856 889 </p>
                <div class="right-sp-link">
                  <a href="ymsgr:sendIM?anhvotinh02" title="Tư vấn"><img src="http://opi.yahoo.com/online?u=anhvotinh02&amp;m=g&amp;t=1" alt="Tư vấn" data-pin-nopin="true"></a>
                  <a href="skype:caominhtung1992" title="Tư vấn"><img src="http://tranhgaoviet.com/public/images/icon_skype.png" alt="Tư vấn tranh gạo" title="Tư vấn" data-pin-nopin="true"></a>
                </div>
              </div-->
            </div>
            <div class="right-main-new">
              <div class="title-main-new-right">
                <p>Tin tức sự kiện</p>
              </div>
              <?php
              if(isset($list_news) && $list_news != NULL){
                foreach($list_news as $value){
            ?>
              <div class="iteam-main-new-right">
                <a href="<?php echo base_url()."tin-tuc/".$value['news_rewrite']."/".$value['news_id'].".html"; ?>" alt="<?php echo $value['news_title']; ?>" /><img src="<?php echo base_url()."uploads/news/thumb/".$value['news_images']."";?>" alt=""></a>
                <a class="link-new-right" href="<?php echo base_url()."tin-tuc/".$value['news_rewrite']."/".$value['news_id'].".html"; ?>"><?php echo $value['news_title']; ?></a>
              </div>
            <?php
              }
            } 
            ?>
            </div>
          </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </section>
    <div class="clear"></div>