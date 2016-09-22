<div class="column_left">
      <div id="cat_left">
        <ul>
        	<li class=""><a href="<?php echo base_url()."sua-chua-laptop/ac220.html";?>" class="root">Sửa chữa laptop</a></li>
	        <?php
				if(isset($listall['cate']) && $listall['cate'] != NULL){
					foreach($listall['cate'] as $k => $v){
			?>
	          <li><a href="<?php echo base_url()."".$v['cate_rewrite']."/c".$v['cate_id'].".html"; ?>" class="root"><?php echo $v['cate_name']; ?></a>
              <?php 
			  	if($listall['sub'][$k] != NULL){
			  ?>
	          	<div class="sub_nav" style="min-height: 300px;background: #FFF url(<?php echo base_url()."uploads/product_category/".$v['cate_images'].""; ?>) no-repeat bottom right;background-size: 40%;width: 469px;padding-right: 181px;">
	              <table>
	                <tbody>
	                  <tr>
						<td valign="top">
		                  <?php
						  if(isset($listall['sub']) && $listall['sub'] != NULL){
								foreach($listall['sub'][$k] as $key => $value){
									echo "<a class='sub_1' href='".base_url()."".$v['cate_rewrite']."/c".$value['cate_id'].".html'>".$value['cate_name']."</a>";
		                    	}
							}
							?>
						</td>
	                  </tr>
	                </tbody>
	              </table>
	            </div>
				<?php
				}
				?>
	          </li>
	          <?php
			  		}
				}
			  ?>
        </ul>
        <div class="qc_nav"> <a target="_blank" href="https://www.facebook.com/benhvienlaptopcapsule"><img src="<?php echo base_url();?>public/images/connect.png" alt="" style="width:189px;"/></a> </div>
      </div>
      <div class="clear"></div>
      
      	<div class="space2"></div>
		<div class="box_column_left">
		  <h2 class="bg"><span>Danh mục tin</span></h2>
		  <div class="content_box_left">
		    <div class="cat_news_left">
		      <ul>
				  <?php
                    if(isset($listnews['cago']) && $listnews['cago'] != NULL){
                        foreach($listnews['cago'] as $k => $v){
                            echo "<li><a href='".base_url().$v['cago_rewrite']."/ac".$v['cago_id'].".html'>".$v['cago_name']."</a></li>";
                        }
                    }else{
                        echo "Không có dữ liệu";
                    }
                  ?>
		      </ul>
		    </div>
		  </div>
		  <div class="bottom_box_left bg"></div>
		</div>
    </div>