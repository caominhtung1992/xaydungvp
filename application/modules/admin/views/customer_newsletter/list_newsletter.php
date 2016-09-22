<div class="paddings">
  <div id="action-links">
    <ul>
      <li id="add-prod"><a href="<?php echo base_url()."admin/customer/add" ?>">Thêm khách hàng mới</a></li>
      <li id="user"><a href="/admin/?opt=customer&amp;view=customer-group">Các nhóm khách hàng</a></li>
      <li id="email"><a href="/admin/?opt=customer&amp;view=customer-newsletter">Khách hàng nhận bản tin</a></li>
      <li id="email"><a href="javascript:;" onClick="download_excel()">Tải excel danh sách KH</a><span id="show_select"></span></li>
    </ul>
  </div>
  <script type="text/javascript">
	function download_excel(){
		window.location = "ajax/excel_download.php" + "?action=download-customer-newsletter";
	}
</script>
  <table width="100%" id="tb_padding" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;">
    <tbody>
      <tr style="background-color:#EEE; font-weight:bold">
        <td width="50px">STT</td>
        <td width="200px">Họ tên</td>
        <td width="200px">Email</td>
        <td>Ngày tham gia</td>
        <td>Chỉnh sửa</td>
      </tr>
      <tr id="row_32">
        <td>1</td>
        <td><span id="name_32">-</span></td>
        <td><span id="email_32">vanchinhnguyen394@gmail.com</span></td>
        <td>03-03-2014, 7:19 pm</td>
        <td><span id="form_32"><a href="javascript:change_form(32, '-', 'vanchinhnguyen394@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(32, 'vanchinhnguyen394@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_31">
        <td>2</td>
        <td><span id="name_31">-</span></td>
        <td><span id="email_31">poypuppy@gmail.com</span></td>
        <td>24-02-2014, 2:10 pm</td>
        <td><span id="form_31"><a href="javascript:change_form(31, '-', 'poypuppy@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(31, 'poypuppy@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_30">
        <td>3</td>
        <td><span id="name_30">-</span></td>
        <td><span id="email_30">nguyenducphi.81@gmail.com</span></td>
        <td>21-02-2014, 5:14 pm</td>
        <td><span id="form_30"><a href="javascript:change_form(30, '-', 'nguyenducphi.81@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(30, 'nguyenducphi.81@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_29">
        <td>4</td>
        <td><span id="name_29">-</span></td>
        <td><span id="email_29">icc.tpg@gmail.com</span></td>
        <td>21-02-2014, 11:33 am</td>
        <td><span id="form_29"><a href="javascript:change_form(29, '-', 'icc.tpg@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(29, 'icc.tpg@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_28">
        <td>5</td>
        <td><span id="name_28">-</span></td>
        <td><span id="email_28">wifi1201@gmail.com</span></td>
        <td>21-02-2014, 12:56 am</td>
        <td><span id="form_28"><a href="javascript:change_form(28, '-', 'wifi1201@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(28, 'wifi1201@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_27">
        <td>6</td>
        <td><span id="name_27">-</span></td>
        <td><span id="email_27">lananh.kt4c@gmail.com</span></td>
        <td>20-02-2014, 8:38 pm</td>
        <td><span id="form_27"><a href="javascript:change_form(27, '-', 'lananh.kt4c@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(27, 'lananh.kt4c@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_26">
        <td>7</td>
        <td><span id="name_26">-</span></td>
        <td><span id="email_26">vminhloan@gmail.com</span></td>
        <td>20-02-2014, 12:38 pm</td>
        <td><span id="form_26"><a href="javascript:change_form(26, '-', 'vminhloan@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(26, 'vminhloan@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_25">
        <td>8</td>
        <td><span id="name_25">-</span></td>
        <td><span id="email_25">tuyenmatseo@gmail.com</span></td>
        <td>20-02-2014, 10:23 am</td>
        <td><span id="form_25"><a href="javascript:change_form(25, '-', 'tuyenmatseo@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(25, 'tuyenmatseo@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_24">
        <td>9</td>
        <td><span id="name_24">-</span></td>
        <td><span id="email_24">philongca38@yahoo.com.vn</span></td>
        <td>20-02-2014, 9:05 am</td>
        <td><span id="form_24"><a href="javascript:change_form(24, '-', 'philongca38@yahoo.com.vn')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(24, 'philongca38@yahoo.com.vn')">Xóa</a></span></td>
      </tr>
      <tr id="row_23">
        <td>10</td>
        <td><span id="name_23">-</span></td>
        <td><span id="email_23">ngoisaoloveyou@facebook.com</span></td>
        <td>19-02-2014, 11:38 am</td>
        <td><span id="form_23"><a href="javascript:change_form(23, '-', 'ngoisaoloveyou@facebook.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(23, 'ngoisaoloveyou@facebook.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_22">
        <td>11</td>
        <td><span id="name_22">-</span></td>
        <td><span id="email_22">dacquangdr@gmal.com</span></td>
        <td>19-02-2014, 10:32 am</td>
        <td><span id="form_22"><a href="javascript:change_form(22, '-', 'dacquangdr@gmal.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(22, 'dacquangdr@gmal.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_21">
        <td>12</td>
        <td><span id="name_21">-</span></td>
        <td><span id="email_21">dinhquangtran090@yahoo.com.vn</span></td>
        <td>19-02-2014, 9:34 am</td>
        <td><span id="form_21"><a href="javascript:change_form(21, '-', 'dinhquangtran090@yahoo.com.vn')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(21, 'dinhquangtran090@yahoo.com.vn')">Xóa</a></span></td>
      </tr>
      <tr id="row_20">
        <td>13</td>
        <td><span id="name_20">-</span></td>
        <td><span id="email_20">lykhadoan@gmail.com</span></td>
        <td>19-02-2014, 12:43 am</td>
        <td><span id="form_20"><a href="javascript:change_form(20, '-', 'lykhadoan@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(20, 'lykhadoan@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_19">
        <td>14</td>
        <td><span id="name_19">-</span></td>
        <td><span id="email_19">hs888898@yahoo.com.vnNhập Email nhận bản tin</span></td>
        <td>18-02-2014, 10:19 pm</td>
        <td><span id="form_19"><a href="javascript:change_form(19, '-', 'hs888898@yahoo.com.vnNhập Email nhận bản tin')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(19, 'hs888898@yahoo.com.vnNhập Email nhận bản tin')">Xóa</a></span></td>
      </tr>
      <tr id="row_18">
        <td>15</td>
        <td><span id="name_18">-</span></td>
        <td><span id="email_18">hs888898@yahoo.com.vn</span></td>
        <td>18-02-2014, 10:18 pm</td>
        <td><span id="form_18"><a href="javascript:change_form(18, '-', 'hs888898@yahoo.com.vn')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(18, 'hs888898@yahoo.com.vn')">Xóa</a></span></td>
      </tr>
      <tr id="row_17">
        <td>16</td>
        <td><span id="name_17">-</span></td>
        <td><span id="email_17">congtien272@gmail.com</span></td>
        <td>18-02-2014, 8:28 pm</td>
        <td><span id="form_17"><a href="javascript:change_form(17, '-', 'congtien272@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(17, 'congtien272@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_16">
        <td>17</td>
        <td><span id="name_16">-</span></td>
        <td><span id="email_16">anhhuyphamnguyen@yahoo.com.vn</span></td>
        <td>18-02-2014, 1:19 pm</td>
        <td><span id="form_16"><a href="javascript:change_form(16, '-', 'anhhuyphamnguyen@yahoo.com.vn')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(16, 'anhhuyphamnguyen@yahoo.com.vn')">Xóa</a></span></td>
      </tr>
      <tr id="row_15">
        <td>18</td>
        <td><span id="name_15">-</span></td>
        <td><span id="email_15">vuhiepvec@gmail.com</span></td>
        <td>17-02-2014, 10:41 pm</td>
        <td><span id="form_15"><a href="javascript:change_form(15, '-', 'vuhiepvec@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(15, 'vuhiepvec@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_14">
        <td>19</td>
        <td><span id="name_14">-</span></td>
        <td><span id="email_14">quocviet_yeutrongcaydang@yahoo.com</span></td>
        <td>17-02-2014, 10:18 pm</td>
        <td><span id="form_14"><a href="javascript:change_form(14, '-', 'quocviet_yeutrongcaydang@yahoo.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(14, 'quocviet_yeutrongcaydang@yahoo.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_13">
        <td>20</td>
        <td><span id="name_13">-</span></td>
        <td><span id="email_13">binhminhcuoicung79@yahoo.com.vn</span></td>
        <td>17-02-2014, 8:45 pm</td>
        <td><span id="form_13"><a href="javascript:change_form(13, '-', 'binhminhcuoicung79@yahoo.com.vn')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(13, 'binhminhcuoicung79@yahoo.com.vn')">Xóa</a></span></td>
      </tr>
      <tr id="row_12">
        <td>21</td>
        <td><span id="name_12">-</span></td>
        <td><span id="email_12">tatthanghh@gmaail.com</span></td>
        <td>14-02-2014, 8:26 am</td>
        <td><span id="form_12"><a href="javascript:change_form(12, '-', 'tatthanghh@gmaail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(12, 'tatthanghh@gmaail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_11">
        <td>22</td>
        <td><span id="name_11">-</span></td>
        <td><span id="email_11">thanhdu347@gmail.com</span></td>
        <td>13-02-2014, 8:46 pm</td>
        <td><span id="form_11"><a href="javascript:change_form(11, '-', 'thanhdu347@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(11, 'thanhdu347@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_10">
        <td>23</td>
        <td><span id="name_10">-</span></td>
        <td><span id="email_10">cuongvx1978@gmail.com</span></td>
        <td>09-02-2014, 12:37 pm</td>
        <td><span id="form_10"><a href="javascript:change_form(10, '-', 'cuongvx1978@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(10, 'cuongvx1978@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_9">
        <td>24</td>
        <td><span id="name_9">-</span></td>
        <td><span id="email_9">sales@khohangre.vn</span></td>
        <td>08-02-2014, 3:49 pm</td>
        <td><span id="form_9"><a href="javascript:change_form(9, '-', 'sales@khohangre.vn')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(9, 'sales@khohangre.vn')">Xóa</a></span></td>
      </tr>
      <tr id="row_8">
        <td>25</td>
        <td><span id="name_8">-</span></td>
        <td><span id="email_8">trannam.lucthuy@gmail.com</span></td>
        <td>06-02-2014, 10:43 pm</td>
        <td><span id="form_8"><a href="javascript:change_form(8, '-', 'trannam.lucthuy@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(8, 'trannam.lucthuy@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_7">
        <td>26</td>
        <td><span id="name_7">-</span></td>
        <td><span id="email_7">pvgiangcp@gmail.com</span></td>
        <td>02-02-2014, 9:04 pm</td>
        <td><span id="form_7"><a href="javascript:change_form(7, '-', 'pvgiangcp@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(7, 'pvgiangcp@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_6">
        <td>27</td>
        <td><span id="name_6">-</span></td>
        <td><span id="email_6">Hoanghuong040980@gmail.com</span></td>
        <td>27-01-2014, 9:04 pm</td>
        <td><span id="form_6"><a href="javascript:change_form(6, '-', 'Hoanghuong040980@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(6, 'Hoanghuong040980@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_5">
        <td>28</td>
        <td><span id="name_5">-</span></td>
        <td><span id="email_5">phamvanthanh@gmail.com</span></td>
        <td>27-01-2014, 6:43 pm</td>
        <td><span id="form_5"><a href="javascript:change_form(5, '-', 'phamvanthanh@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(5, 'phamvanthanh@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_4">
        <td>29</td>
        <td><span id="name_4">-</span></td>
        <td><span id="email_4">quanlh186@gmail.com</span></td>
        <td>27-01-2014, 12:52 am</td>
        <td><span id="form_4"><a href="javascript:change_form(4, '-', 'quanlh186@gmail.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(4, 'quanlh186@gmail.com')">Xóa</a></span></td>
      </tr>
      <tr id="row_3">
        <td>30</td>
        <td><span id="name_3">-</span></td>
        <td><span id="email_3">linh_k0j@yahoo.com</span></td>
        <td>26-01-2014, 10:00 pm</td>
        <td><span id="form_3"><a href="javascript:change_form(3, '-', 'linh_k0j@yahoo.com')">Chỉnh sửa</a> | <a href="javascript:delete_cus_newsletter(3, 'linh_k0j@yahoo.com')">Xóa</a></span></td>
      </tr>
    </tbody>
  </table>
  <br />
  <table cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td class="pagingIntact"><a>Xem trang</a></td>
        <td class="pagingSpace"></td>
        <td class="pagingViewed">1</td>
        <td class="pagingSpace"></td>
        <td class="pagingIntact"><a href="http://khohangre.vn/admin/?opt=customer&amp;view=customer-newsletter&amp;page=2">2</a></td>
        <td class="pagingSpace"></td>
        <td class="pagingIntact"><a href="http://khohangre.vn/admin/?opt=customer&amp;view=customer-newsletter&amp;page=2">Tiếp theo</a></td>
      </tr>
    </tbody>
  </table>
  <script>
	function change_form(id, name, email){
		$("#name_"+id).html("<input type='text' size=30 value='"+name+"' id='change_name_"+id+"' >");
		$("#email_"+id).html("<input type='text' size=30 value='"+email+"' id='change_email_"+id+"' >");
		$("#form_"+id).html("<input type='button' value='Cập nhật' onclick='update_cus_newsletter("+id+")' >");
	}
	
	function update_cus_newsletter(id){
		$("#form_"+id).html("...đang xử lý");
		var new_name = $("#change_name_"+id).val();
		var new_email = $("#change_email_"+id).val();
		$.post("action.php"
			   , {action : "update-customer-newsletter" , name : new_name, email : new_email, id : id}
			   , function(data){$("#name_"+id).html(new_name);$("#email_"+id).html(new_email);$("#form_"+id).html("Xong");});
	}
	
	function delete_cus_newsletter(id, email){
		if(confirm('Bạn chắc chắn muốn xóa ?')) {
			$.post("action.php"
				   , {action : "delete-customer-newsletter", id : id, email : email}
				   , function(data){ $("#row_"+id).fadeOut(); });
		}
	}
</script> 
</div>
