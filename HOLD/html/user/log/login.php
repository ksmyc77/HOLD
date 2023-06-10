<?php
	require_once('../../include/DBConnect.php');
?>

<!-- 로그인 페이지 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">

	<title>H.O.L.D</title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="login.css">
  <!-- <link rel="stylesheet" type="text/css" href="loginV2.css"> -->
	<link rel="stylesheet" type="text/css" href="../../include/dropdown.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../../include/dropdown_user.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
</head>
<body>
    <!-- <div id="headers"></div> -->
	<main>
    <a href="../../main/home.php">
      <img src="../../image/hold.png" alt="hold"/>
    </a>  
		<div class="container">
          <div>
      		<form action="loginProcess.php" method="post">
        		<label for="username"></label>
        		<input type="text" placeholder="Enter Username" name="userid" required>
        		<label for="password"></label>
        		<input type="password" placeholder="Enter Password" name="password" required>
        		<button id="loginbtn" type="submit" >로그인</button>
      		</form>
          </div>
    	</div>
        <div class="btns">
                <a href="">id</a><!--아이디 찾기 제작시 수정-->
                <span>&nbsp;</span>
                <a href="">password</a><!--비밀번호 찾기 제작시 수정-->
                <a id="signup" href="../signup/signup.php">회원가입</a>
        </div>
    </main>
	<footer>
		<p>헌혈 플랫폼 &copy; 2023</p>
	</footer>
</body>
</body>
</html>
