<section id="main-body">
      <div class="main-content">
        <div class="row">
          <div class="col-24 de-breadcrumbs">
            <a href="<?php echo base_url(); ?>">Trang chủ </a>>><a href=""> <?php echo $detail['pro_name']; ?></a>
          </div>
          <div class="col-24">
            <div class="de-product-l">
              <div class="de-left-img">
              <?php
              @$images = unserialize($detail['pro_images']);
              ?>
                <img src="<?php echo base_url()."uploads/products/".$detail['pro_folderimg']."/".$images[0].""; ?>" alt="">
              </div>
              <div class="de-left-info">
                <div class="col-24 de-info-title">
                  <p><?php echo $detail['pro_name']; ?></p>
                </div>
                <div class="col-24 de-info-guarantee">  
                  <div class="col-8 ">                  
                    <p>Mã sản phẩm:</p>
                  </div>
                  <div class="col-16">                  
                    <p><?php echo $detail['pro_code'] ?></p>
                  </div>                  
                </div>
                <div class="col-24 de-info-guarantee">  
                  <div class="col-8 ">                  
                    <p>Bảo hành:</p>
                  </div>
                  <div class="col-16">                  
                    <p><?php echo $detail['pro_war'] ?></p>
                  </div>                  
                </div>
                <div class="col-24 de-info-guarantee">  
                  <div class="col-8 ">                  
                    <p>Tình trạng:</p>
                  </div>
                  <div class="col-16">                  
                    <?php if($detail['pro_qty'] > 0){ ?>
                    <p class="status-color">Còn hàng</p>
                    <?php }else{ ?>
                     <p class="status-color">Hết hàng</p>
                    <?php } ?>
                  </div>                  
                </div>
                <div class="col-24 de-info-guarantee">  
                  <div class="col-8 ">                  
                    <p>Giá:</p>
                  </div>
                  <div class="col-16 de-info-price">                  
                    <p><?php echo number_format($detail["pro_price"]); ?> đ</p>
                  </div>                  
                </div>              
                <div class="col-24 de-info-producer">
                  <div class="col-8">                 
                    <p></p>
                  </div>
                  <div class="col-16">                  
                    <p></p>
                  </div>                  
                </div>
                <div class="col-24 de-info-contact">    
                  <div class="col-8">                 
                    <p>Liên hệ ngay:</p>
                  </div>
                  <div class="col-16">                  
                    <span>Hotline: </span><span>9090 291 092</span>
                  </div>                
                </div>
                <div class="col-24 de-info-email">    
                  <div class="col-8">                 
                    <p>Email:</p>
                  </div>
                  <div class="col-16 de-email-color">                 
                    <p>djajh@gmail.com</p>
                  </div>                
                </div>
                <div class="col-24 de-info-cart">
                  <!--div class="col-12 de-buy">                 
                    <a href="<?php echo base_url(); ?>gio-hang.html?step=2">Mua hàng</a>
                  </div-->
                  <!--div class="col-12 de-cart">                  
                    <a href="">Giỏ hàng</a>
                  </div--> 
                  <form action="<?php echo base_url()."home/cart/addcart/".$detail['pro_id'].""; ?>" method="post" id="form_add_cart">
                    <div class="cssOrder" style="float:left;"> 
                    <a class="detail_add" href="">Mua hàng</a>
                    <input  type="hidden" id="detail_add_form" name="detail_add_form" value="">
                    <input style="position:relative; width: 196px;
                      height: 56px;
                      left: 17px;
                      top: 0px;;border: none;cursor:pointer;color:#fff;" type="submit" value="Giỏ hàng"  class="btn_datmua_to bg" />
                    </div>
                    </form>                     
                </div>
              </div>
              <div class="col-24 " id="tab_detail_product">
                <div class="title_tab">
                  <a href="#dacdiem" class="nobdr_l current">Mô tả sản phẩm</a>
                  <a href="#thongsokythuat" class="">Thông số kỹ thuật</a> 
                  <a href="#binhluan" class="">Bình luận</a>
                </div>
                <div class="content_tab">
                <div id="dacdiem" class="cf current">
                  <div class="dacdiem-content">
                  <?php if($detail['pro_description'] == NULL){echo "Thông tin chưa cập nhật";}else{echo $detail['pro_description'].""; } ?>
                  </div>
                </div>
                
                <div id="thongsokythuat" class="cf">
                  <?php if($detail['pro_full'] == NULL){echo "Thông tin chưa cập nhật";}else{echo $detail['pro_full'].""; } ?>
                </div>
                
                <div id="binhluan" class="cf">
                  <div id="comment_fb" style="margin-top:10px;">
                      <div id="cmt_face" class="fb-comments" data-href="<?php echo base_url().uri_string().".html";?>" data-width="651" data-num-posts="100"></div>
                  </div>
                </div>
          
        </div>
          </div>
            </div>
            <div class="de-product-r">
              <div class="left-content-commitment">
                <div class="left-commitment-t de-left-commitent">
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
              <div class="left-content-video okok1">
                  <div class="title-new-left">
                  <p>Danh mục</p>
                </div>
                <ul class="category-detail-page">
                <?php
                    if(isset($listall['cate']) && $listall['cate'] != NULL){
                      foreach($listall['cate'] as $k => $v){
                  ?>
                      <li><a href="<?php echo base_url()."".$v['cate_rewrite']."/c".$v['cate_id'].".html"; ?>"><?php echo $v['cate_name']; ?> </a></li>                
                    <?php
                    }
                  }
                  ?>  
                  </ul>
              </div>

            </div>
          </div>
          <div class="col-24 cate-news">
              <div class="cate-r-title-news">
                <p class="cate-title-info" style="padding-left: 15px;">Sản phẩm cùng loại</p>
                <a href="#">Xem tất cả &nbsp >></a>
              </div>
               <?php
              if(isset($get_related_products) && $get_related_products != NULL){
                foreach($get_related_products as $value){
                  @$images = unserialize($value['pro_images']);
                  //var_dump($images);die();
            ?>
              <div class="cate-iteam-pro">
              <div class="cate-iteam-main">
                <div class="cate-iteam-img">
                  <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><img src="<?php echo base_url()."uploads/products/thumb/".$images[0]."" ?>" alt=""></a>
                </div>
                <div class="cate-iteam-info">
                  <a href="<?php echo base_url()."".$value['pro_name_rewrite']."/p".$value['pro_id'].".html"; ?>"><?php echo $value['pro_name']; ?></a>
                  <p>Mã sản phẩm: <?php echo $value['pro_code'] ?></p>
                  <span><?php echo @number_format($value['pro_price'])?>đ</span>
                </div>
                <?php if($value['pro_saleoff'] == 1){ ?>
                <div class="sale">
                  <p>Giảm</p>
                  <span class="sale-number">-<?php echo round(( $value["pro_market"] - $value["pro_price"] ) / $value["pro_market"] * 100) ?></span><span>%</span>
                </div>
                <?php } ?>              
              </div>
            </div>
            <?php 
              }
            } 
            ?>
          </div>
          <div class="col-24 cate-detail-doitac">
            <div class="col-5 cate-detail-doitacimg"><img src="<?php echo base_url();?>public/images/doitac-01.png" alt=""></div>
             <div class="col-5 cate-detail-doitacimg">  <img src="<?php echo base_url();?>public/images/doitac-02.png" alt=""></div>
              <div class="col-5 cate-detail-doitacimg"><img src="<?php echo base_url();?>public/images/doitac-03.png" alt=""></div>
               <div class="col-5 cate-detail-doitacimg"> <img src="<?php echo base_url();?>public/images/doitac-04.png" alt=""></div>
                <div class="col-4 cate-detail-doitacimg"><img src="<?php echo base_url();?>public/images/doitac-05.png" alt=""></div> 
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
      </div>
    </section>
    <script>
      $(document).ready(function(e) {
      $("#tab_detail_product .title_tab a").click(function(){
        $("#tab_detail_product .title_tab a").removeClass("current");
        $(this).addClass("current");
        $("#tab_detail_product .content_tab .cf").hide();
        $($(this).attr("href")).show();
        
        return false;
      });
        //$(".show_lightbox_img a").lightBox(); 
      });
    </script>
    <script type="text/javascript">
       /* $(document).ready(function(e) {
            $(".detail_add").click(function(d){
              d.preventDefault();
              $("#detail_add_form").val("yes");
              $("#form_add_cart").submit();
            })
          });
      </script>
      <script type="text/javascript">
              $(document).ready(function(e) {
                $(".radio_").click(function(){
                  $(".active").removeClass("active");
                  $(this).parent().parent().addClass("active");
                })
                $(".detail_buyer").click(function(e){
                  e.preventDefault();
                  $("#form_add_cart").submit();
                })
                $(".detail_add").click(function(d){
                  d.preventDefault();
                  $("#detail_add_form").val("yes");
                  $("#form_add_cart").submit();
                })
                
                //format gia tien
                function format_price(str_price){
                  var arr_price = str_price.split('');
                  var format_price="";
                  var price="";
                  var arr_temp;
                  var dem=0;
                  for(i=arr_price.length-1; i>=0; i--){
                    if(dem==3 || dem==6 || dem == 9 || dem==12 || dem==15 || dem==18 || dem==21) arr_price[i]="."+arr_price[i];
                      dem++;
                    format_price += arr_price[i];
                  }
                  
                  arr_temp = format_price.split('');
                  for(i=arr_temp.length-1; i>=0; i--){
                    price+= arr_temp[i];
                  }
                  return price;
                };
                                  price_tmp = $(".price_js:checked").attr("title");
                                $("#total_pay").text(format_price(price_tmp.toString()));
                //Payment
                $("#form_add_cart").change(function(){
                  num = $("#detail_qty").val();
                                      price = $(".price_js:checked").attr("title");
                                    total = num * price;
                  //$("#total_pay").html(total);
                  $("#total_pay").text(format_price(total.toString()));
                })
                            });
            </script>