<div class="paddings">
  <style>
	.header { font-weight:bold; font-size:14px; margin-bottom:10px; color:#F00}
</style>
  <div class="header">Thông tin khách hàng</div>
  <table>
    <tbody>
      <tr>
        <td>Họ tên</td>
        <td>: <b><?php echo $detail['con_name']; ?></b></td>
      </tr>
      <tr>
        <td>Địa chỉ email</td>
        <td>: <?php echo $detail['con_email']; ?></td>
      </tr>
      <tr>
        <td>Số điện thoại</td>
        <td>: <?php echo $detail['con_phone']; ?></td>
      </tr>
      <tr>
        <td>Thời gian liên hệ</td>
        <td>: <?php echo $detail['con_date']; ?></td>
      </tr>
    </tbody>
  </table>
  <br />
  <div class="header">Nội dung chi tiết</div>
  <p><?php echo $detail['con_full']; ?></p>
</div>
