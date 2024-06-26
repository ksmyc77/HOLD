<?php
	include_once('../include/DBConnect.php')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>헌혈 플랫폼</title>
	<!-- CSS 파일 -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.html');  // 원하는 파일 경로를 삽입하면 된다
		});
		</script>
</head>
<body>
	<div id="headers"></div>	
	<main>
		<section id="urgent-blood-request">
			<h2>긴급헌혈</h2>
			<p>현재 긴급헌혈이 필요한 환자가 있습니다. 당신의 헌혈이 누군가의 생명을 구할 수 있습니다. 지금 바로 헌혈하세요.</p>
			<!-- 긴급헌혈 공지글과 지도 API 추가 -->
		</section>
		<section id="blood-reservation">	
			<h2>헌혈 예약</h2>
			<!-- 헌혈 예약 가능 시간 및 날짜, 헌혈 예약하기 버튼 등 추가 -->
		</section>
		<section id="Map page">	
			<h2>지도 페이지<h2>
				<p><a href="map.html">이동하기</p>
			<!-- 헌혈 예약 가능 시간 및 날짜, 헌혈 예약하기 버튼 등 추가 -->
		</section>
	</main>
	<footer>
		<p>헌혈 플랫폼 &copy; 2023</p>
	</footer>
</body>
</html>
