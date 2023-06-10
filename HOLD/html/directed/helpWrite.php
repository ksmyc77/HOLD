<?php
	require_once('../include/DBConnect.php');
?>

<!-- 로그인 페이지 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>H.O.L.D</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
	<!-- CSS 파일 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../include/dropdown.css">
    <script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                // 현재 위치의 위도 가져오기
                var Lat = position.coords.latitude;
                var Lng = position.coords.longitude;
                // input 요소의 value에 위도 설정하기
                document.getElementById("Lat").value = Lat;
                document.getElementById("Lng").value = Lng;
            });
        }
	</script>
	 <link rel="stylesheet" type="text/css" href="./helpWrite.css">
</head>
<body>
  <div class="helpWrite">
    <div id="headers"></div>	
    <div id ='container'>
    <form action="writingProcess.php" method="post">
        <div class="write1">
            <label class="inputlabel">이름</label>
            <input class='underline' type="text" placeholder ="이름을 입력하세요" name="name" require>
            <div class="row">
                <div>
                  <label class="inputlabel" >혈액형</label>
                      <input type="radio" name="type" value="A" require> A
                      <input type="radio" name="type" value="B"require> B  
                      <input type="radio" name="type" value="O"require> O
                      <input type="radio" name="type" value="AB"require> AB 
                </div>
                <div>
                  <label class="inputlabel" require>RH</label>
                      <input type="radio" name="RH" value="-"require> -
                      <input type="radio" name="RH" value="+"require> + 
                </div>
                <div>		
                  <label class="inputlabel">성분</label>
                      <input type="radio" name="category" value="전혈"require> 전혈
                      <input type="radio" name="category" value="혈장"require> 혈장
                      <input type="radio" name="category" value="혈소판"require> 혈소판
                </div>	
            </div>
 
                <label class="inputlabel" >수혈자 연락처<br></label>
                    <input class='underline' type="text" placeholder ="수혈자 연락처를 입력하세요 (010-xxxx-xxxx)" name="inputPHR" require> 
                <label class="inputlabel" >보호자 연락처<br></label>
                    <input class='underline' type="text" placeholder ="보호자 연락처를 입력하세요 (010-xxxx-xxxx)" name="inputPHG">
                <label class="inputlabel" >E-mail</E-mail><br></label>
                    <input class='underline' type="email" placeholder ="E-mail을 입력하세요" name="inputEmail">
                <label class="inputlabel">수혈자 등록 번호<br></label>
                    <input class='underline' type="text" placeholder ="수혈자 등록 번호를 입력하세요" name="inputid" require>
                <label class="inputlabel" >요청 인원</E-mail><br></label>
                    <input class='underline' type="text" placeholder ="요청 인원을 작성해 주세요" name="accpetable">
        </div>
        <div class="write2">
          <div>
            <div class="row1">
            <label class="inputlabel" >사연</label>
            <div class="Btn">
             <button type="submit" >작성하기</button>
            </div>
            <input type= "hidden" id="Lat" name="Lat">
            <input type= "hidden" id="Lng" name="Lng">
            </div>
            <textarea id="story"  cols = "50" rows="6" wrap="hard" name="story" placeholder="사연을 알려주세요"></textarea>
          </div>

        </div>
    </form>
    </div>    
  </div>
</body>