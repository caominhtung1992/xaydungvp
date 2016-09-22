<footer id="footer">
      <div class="top-footer">
        <div class="row">
          <div class="col-8 top-foote-l">
            <img src="<?php echo base_url();?>public/images/logo-top.png" alt="" />
            <div class="top-foote-l-conten">
              <ul>
                <li><a href="<?php echo base_url(); ?>page/gioi-thieu-ve-catdainox/111.html">Giới thiệu về DACATINOX</a></li>
                <li><a href="<?php echo base_url(); ?>page/quy-che-hoat-dong/109.html">Quy chế hoạt động</a></li>
                <li><a href="<?php echo base_url(); ?>page/dieu-khoan-va-dieu-kien-giao-dich/107.html">Điều khoản và điều kiện giao dịch</a></li>
                <li><a href="<?php echo base_url(); ?>page/thong-bao-tu-catdainox/106.html">Thông báo từ DACATINOX</a></li>
                <li><a href="<?php echo base_url(); ?>page/lien-he-voi-catdainox/105.html">Liên hệ với DACATINOX</a></li>
              </ul>
            </div>
          </div>
          <div class="col-6 top-foote-m">
            <p style="text-align: center; margin-bottom: 30px;">Chăm sóc khách hàng</p>
            <ul>
              <li><a href="<?php echo base_url(); ?>page/trung-tam-ho-tro-khach-hang/104.html">Trung tâm hỗ trợ khách hàng</a></li>
              <li><a href="<?php echo base_url(); ?>page/kiem-tra-don-hang/114.html">Kiểm tra đơn hàng</a></li>
              <li><a href="<?php echo base_url(); ?>page/chinh-sach-bao-mat-thanh-toan/115.html">Chính sách bảo mật thanh toán</a></li>
              <li><a href="<?php echo base_url(); ?>page/chinh-sach-dinh-danh-khach-hang/116.html">Chính sách định danh khách hàng</a></li>
              <li><a href="<?php echo base_url(); ?>page/chinh-sach-thanh-toan/117.html">Chính sách thanh toán</a></li>
              <li><a href="<?php echo base_url(); ?>page/chinh-sach-giao-hang/118.html">Chính sách giao hàng</a></li>
              <li><a href="<?php echo base_url(); ?>page/chinh-sach-doi-tra/119.html">Chính sách đổi trả</a></li>
              <li><a href="<?php echo base_url(); ?>page/chinh-sach-bao-hanh/120.html">Chính sách bảo hành</a></li>
              <li><a href="<?php echo base_url(); ?>page/cau-hoi-thuong-gap/121.html">Câu hỏi thường gặp</a></li>
            </ul>
          </div>
          <div class="col-10 top-foote-r">
            <p class="top-foote-r-title">Sản phẩm</p>
            <div class="top-foote-r-main">
            <?php
            $count = 0;
              if(isset($listall['cate']) && $listall['cate'] != NULL){
                foreach($listall['cate'] as $k => $v){
            ?>
            <div class="top-foote-r-iteam">
                <p> <?php echo $v['cate_name']; ?></p>
                <ul>
                  <?php
                  if(isset($listall['sub']) && $listall['sub'] != NULL){
                    foreach($listall['sub'][$k] as $key => $value){
                      echo "<li><a class='sub_1' href='".base_url()."".$value['cate_rewrite']."/c".$value['cate_id'].".html'>".$value['cate_name']."</a></li>";
                              }
                  }
                  ?>
                </ul>
              </div>
              <?php
              $count++;
              if ($count == 4) 
                break;
              }
            }
            ?>  
              <!--div class="top-foote-r-iteam">
                <p>Máy Cắt</p>
                <ul>
                  <li><a href="#">Máy Cắt Thép</a></li>
                  <li><a href="#">Máy Cắt Bê Tông</a></li>
                  <li><a href="#">Máy Cắt Gạch</a></li>
                </ul>
              </div>
              <div class="top-foote-r-iteam">
                <p>Máy Cắt</p>
                <ul>
                  <li><a href="#">Máy Cắt Thép</a></li>
                  <li><a href="#">Máy Cắt Bê Tông</a></li>
                  <li><a href="#">Máy Cắt Gạch</a></li>
                </ul>
              </div>
              <div class="top-foote-r-iteam">
                <p>Phụ Kiện Máy Hàn</p>
                <ul>
                  <li><a href="#">Máy Cắt Thép</a></li>
                  <li><a href="#">Máy Cắt Bê Tông</a></li>
                  <li><a href="#">Máy Cắt Gạch</a></li>
                </ul>
              </div>
              <div class="top-foote-r-iteam">
                <p>Máy Cắt Uốn</p>
                <ul>
                  <li><a href="#">Máy Cắt Thép</a></li>
                  <li><a href="#">Máy Cắt Bê Tông</a></li>
                  <li><a href="#">Máy Cắt Gạch</a></li>
                </ul>
              </div-->
            </div>
          </div>
        </div>
      </div>
      <div class="bot-footer">
        <div class="row">
          <div class="col-16 footer-left">
            <p class="footer-bot-company">CÔNG TY CỔ PHẦN DỊCH VỤ THƯƠNG MẠI THIÊN AN </p>
            <p>Trụ sở chính: SN 688 - Đường Long Hưng - Tổ 3 - Phường Hoàng Diệu</p>
            <p>Showroom: Số 10 - Chợ Bo - Lê Quý Đôn & Số 237 - Lê Quý Đôn</p>
            <p>Điện Thoại: 0363.606.789/ Pax: 0363.604.883 / Email: cskh@dacatinox</p>
          </div>
          <div class="col-4">
            <img src="<?php echo base_url();?>public/images/ft-icon01.png">
          </div>
          <div class="col-4">
            <ul>
              <li class="social-face"><a href="#"></a></li>
              <li class="social-gg"><a href="#"></a></li>
              <li class="social-pi"><a href="#"></a></li>
              <li class="social-you"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <div class="clear"></div>
    
