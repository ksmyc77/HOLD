<?php
	include_once('../include/DBConnect.php')
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>H.O.L.D</title>	
	<!-- CSS 파일 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./map.css">
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
	
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
    
</head>
<body>
    <div class="maps">
    <div id="headers"></div>
      <!--<div id="btntab">
          <div class="btns">
              <button type="button" class="navyBtn" onClick="">
          </div>
      </div>-->
      <div class="map_wrap">
        <div id="menu_wrap" class="bg_white">
              <div class="option">
                  <div>
                      <form onsubmit="searchPlaces(); return false;">
                          키워드 : <input type="text" value="헌혈의집" id="keyword" size="15" readonly> 
                          <button type="submit">검색하기</button> 
                      </form>
                  </div>
              </div>
              <hr>
              <ul id="placesList"></ul>
              <div id="pagination"></div>
          </div>
          <div id="map" style="width:83%;height:530px;;position:relative;overflow:hidden;"></div>


      </div>
  </div>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ff9ab9e2f0a7b97b6fbe6838e226253e&libraries=services"></script>
<script type="text/javascript" src="./map.js"></script>

</body>
</html>