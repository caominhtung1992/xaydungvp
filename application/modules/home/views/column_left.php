<div class="column_left">
      <div id="cat_left">
        <ul>
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
									echo "<a class='sub_1' href='".base_url()."".$value['cate_rewrite']."/c".$value['cate_id'].".html'>".$value['cate_name']."</a>";
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
      </div>
      <div class="qc_nav"> <a target="_blank" href="https://www.facebook.com/pages/Trang-S%E1%BB%A9c-Sunny/1452784041628401"><img src="<?php echo base_url();?>public/images/connect.png" alt="" style="width:189px;"/></a> </div>
      <div class="clear"></div>
    </div>