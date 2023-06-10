<?php
	require_once('../include/DBConnect.php');
?>

<!-- 로그인 페이지 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
	<title>로그인</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src="../include/include.js" defer></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
</head>
<body>
	<header data-include="../include/dropdown.php"></header>
	<main>
		<div class="container">
      		<form action="loginProcess.php" method="post">
        		<h1>Login</h1>
        		<label for="username"><b>아이디</b></label>
        		<input type="text" placeholder="Enter Username" name="userid" required>
        		<label for="password"><b>비밀번호</b></label>
        		<input type="password" placeholder="Enter Password" name="password" required>
        		<button type="submit" >로그인</button>
				<button onclick="location.href='signup.php'">회원가입</button >
      		</form>
    	</div>
	</main>
	<footer>
		<p>헌혈 플랫폼 &copy; 2023</p>
	</footer>
	<!-- JavaScript 파일 -->
	<script src="script.js"></script>
</body>
</body>
</html>
