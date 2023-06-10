<?php
	include_once('../include/DBConnect.php')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>헌혈 플랫폼</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
	<!-- CSS 파일 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="noticeWrite.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..."></script>
</head>


<body>
  <div class="noticeWrite">
    <div id="headers"></div>	
    <main>
      <div class="standard">
        <input placeholder="제목"/>
        <select name="cate">
          <option value="" selected disabled hidden>카테고리</option>
          <option>일반</option>
          <option>규칙</option>
        </select>
      </div>
      <textarea type="text"></textarea>
      <div class="btn">
        <button>업로드</button>
      </div>
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
  </div>
</body>
</html>
