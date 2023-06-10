<?php
	include_once('../include/DBConnect.php')
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>HOLD</title>
	<!-- CSS 파일 -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./map.css">
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
	
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
</head>
<body>
	<div id="headers"></div>
	<button >회원가입</button >
	<!--	<div id="map" style ="width: 50%; height: 400px; float:right;"></div> 
			<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ff9ab9e2f0a7b97b6fbe6838e226253e"></script>
			<script type="text/javascript" src = "./map.js" defer></script>-->
	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGD9TaX7DdjTjnG86Lc9Vprfr9mbPqRKI&callback=initMap&v=weekly" defer>
	</script>
</body>
</html>