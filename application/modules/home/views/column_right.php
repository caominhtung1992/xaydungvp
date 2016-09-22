<div class="column_right_right2">
      <div class="border_pro_right">
        <div class="title_box_filter bg"><span>SẢN PHẨM BÁN CHẠY</span></div>
        <ul class="right_pro_pro">
        	<?php
				if(isset($list_pro_best) && $list_pro_best != NULL){
					foreach($list_pro_best as $pro){
						@$images = unserialize($pro['pro_images']);
			?>
                <li> 
                    <a href="<?php echo base_url()."".$pro['pro_name_rewrite']."/p".$pro['pro_id'].".html"; ?>" title="">
                    	<img class="right_img" src="<?php if($pro['pro_images'] == NULL){echo base_url()."public/images/no-images.jpg";}else{echo base_url()."uploads/products/thumb/".$images[0]."";}?>" alt="<?php echo $pro['pro_name']; ?>" />
                    </a>
                    <h4 class="right_title"><a href="<?php echo base_url()."".$pro['pro_name_rewrite']."/p".$pro['pro_id'].".html"; ?>"><?php echo $pro['pro_name']; ?></a></h4>
                    <p class="right_pro_pro_code">Mã:  <?php if($pro['pro_code'] == NULL){echo $pro['pro_id'];}else{echo $pro['pro_code'].""; }?> </p>
                    <p class="right_pro_pro_price">Giá: <span style="color:#f00"><?php if($pro['pro_price'] == 0){echo "Liên hệ";}else{echo @number_format($pro['pro_price'])." đ"; }?></span></p>
                    <a style="clear:left;margin-left:0px;" href="<?php echo base_url()."home/cart/addcart/".$pro['pro_id'].""; ?>" class="btn_datmua"></a> 
                </li>
            <?php		
				}
				}else{
					echo "Chưa cập nhật !";
				}
			
			?>
	
        </ul>
        
      </div>
      <div class="border_pro_right">
        <div class="title_box_filter bg"><span>TIN MỚI NHẤT</span></div>
        <ul class="right_pro_pro">
        	<?php
				if(isset($list_news) && $list_news != NULL){
					foreach($list_news as $news){
						echo "<li> »<a href='".base_url()."/tin-tuc/".$news['news_rewrite']."/".$news['news_id'].".html' title='".$news['news_title']."'>".$news['news_title']."</a></li>";
					}
				}else{
					echo "Không có tin mới nào !";
				}
			?>	
        </ul>
      </div>
    </div>