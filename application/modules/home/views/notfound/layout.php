
<!DOCTYPE html>
<html lang="en">
<head>
<title>Nội dung không tồn tại</title>
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/library.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
        setTimeout(function(){
			window.history.go(-1)
		},3000);
    });
</script>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
a{text-decoration:none;color:#444;}
</style>
</head>
<body>
	<div id="wapper">
		<h1>Nội dung không tìm thấy !</h1>
		<p>Nội dung bạn cần xem không có hoặc đã bị xóa bỏ. Quý khách vui lòng xem nội dung khác.</p>	
        <p><a href="<?php echo base_url(); ?>" title="Trở lại trang chủ">Quay lại trang chủ</a></p>
	</div>
</body>
</html>