<div class="content_full">
  <style type="text/css">
.box_column_right{width: 97.6%;}
</style>
  <?php $this->load->view("articles/column_left"); ?>
  <div class="column_right">
    <div id="location"><a href="<?php echo base_url(); ?>" title="Trang chủ">Trang chủ</a> » <a href="/tin-tuc.html">Tin tức</a> » <a href=""><?php echo $getcago['cago_name']; ?></a></div>
    <div class="clear"></div>
    <div class="box_column_right" style="padding:10px;">
      <div class="title_box_news"><i class="bg icon_box_news"></i>
        <h2><?php echo $getcago['cago_name']; ?></h2>
      </div>
      <div id="list_news">
        <ul>
			<?php
				if(isset($list_new) && $list_new != NULL){
					foreach($list_new as $value){	
            ?>
                <li class="nobdr" style="padding-top:0;"> 
                	<a href="<?php echo base_url()."tin-tuc/".$value['news_rewrite']."/".$value['news_id'].".html"; ?>" class="name" title="<?php echo $value['news_title']; ?>"><?php echo $value['news_title']; ?></a> 
                    	<img class="img_news" src="<?php echo base_url()."uploads/news/thumb/".$value['news_images'].""; ?>" alt="<?php echo $value['news_title']; ?>">
                	<div class="time grey">(<?php echo $value['news_date']; ?>)</div>
                	<div class="summary"><?php echo $value['news_info']; ?></div>
                	<a href="<?php echo base_url()."tin-tuc/".$value['news_rewrite']."/".$value['news_id'].".html"; ?>" class="more" title="<?php echo $value['news_title']; ?>">» xem tiếp</a> 
                </li>
            <?php
					}
				}else{
					echo "không có dữ liệu";
				}

			?>
        </ul>
        <div class="clear"></div>
      </div>
      <!--listnews-->
      
      <div class="clear"></div>
    </div>
    <!--box_column_right--> 
  </div>
</div>
