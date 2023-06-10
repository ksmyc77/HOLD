<?php
	include_once('../include/DBConnect.php')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>H.O.L.D</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
	<!-- CSS 파일 -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="precaution.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..."></script>
<script>
    function openNewWindow() {
      var url = 'https://www.law.go.kr/%EB%B2%95%EB%A0%B9/%ED%98%88%EC%95%A1%EA%B4%80%EB%A6%AC%EB%B2%95%20%EC%8B%9C%ED%96%89%EA%B7%9C%EC%B9%99';
      window.open(url, '_blank');
    }
</script>
</head>


<body>
  <div class="precaution">
    <div id="headers"></div>	
    <main>
      <div class="main1">
        <h1>헌혈 시 주의사항</h1>
        <h4>해당 내용을 어길 시에 발생하는 문제들에 대해 H.O.L.D. 운영팀은 책임지지 않습니다.</h4>
      </div>
      <div class="line"></div>
      <div class="main2">
        <h2>다음과 같은 행위는 법적으로 금지되어있습니다.</h2>
        <div class="box">
          <div class="list"><i class="fas fa-period"></i>혈액을 금전적 댓가를 받고 매매하는 행위.</div>
          <div class="list"><i class="fas fa-period"></i>본인의 신상 혹은 병력, 해외여행 여부 등을 사실대로 말하지 않는 행위.</div>
          <div class="list"><i class="fas fa-period"></i>헌혈자의 자유 의지에 반해서 헌혈을 하는 행위.</div>
          <div class="list"><i class="fas fa-period"></i>공식 발행된 헌혈 증서를 매매, 위조 혹은 양도하는 행위.</div>
          <div class="list"><i class="fas fa-period"></i>의료기관, 대한적십자사 외의 무허가 공간에서 혈액을 관리하는 행위.</div>
        </div>
        <h3>만약 위 사항을 위반할 경우, H.O.L.D. 서비스 사용권이 영구 박탈되며, 법적 책임을 지게 될 수 있습니다.</h3>
        <button type="button" onclick="openNewWindow()">혈액관리법 확인 바로가기</button>
      </div>
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
  </div>

</body>
</html>
