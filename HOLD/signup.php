<!-- 회원가입 페이지 -->
<?php
	include_once('../include/DBConnect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="signup.css">
	<script src="../include/include.js" defer></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
</head>
<body>
	<header data-include="../include/dropdown.html"></header >
	<form action ="signupProcess.php" method ="post" id = "singup-form">
		<h2>회원가입</h2>
		<input type="text" id="name" name="name" placeholder="이름을 입력하세요" required>
		<input type="text" id="userid" name="userid" placeholder="ID를 입력하세요" required>
		<input type="password" id="password" name="password" placeholder="비밀번호를 입력하세요" required>
		<input type="password" id="confirm-password" name="confirm-password", placeholder="비밀번호를 다시 입력하세요" required>
		<input type="text" id="phone-number" name="phone-number" placeholder="사용자의 연락처를 입력하세요(- 제외)" required>
		<input type="text" id="guardian-number" name="guardian-number" placeholder="보호자의 연락처를 입력하세요(- 제외)" required>
		<label for="blood-type">혈액형</label>
		<select id="blood-type" name="blood-type">
			<option value="RH+A">RH+A</option>
			<option value="RH+B">RH+B</option>
			<option value="RH+O">RH+O</option>
			<option value="RH+AB">RH+AB</option>
			<option value="RH-A">RH-A</option>
			<option value="RH-B">RH-B</option>
			<option value="RH-O">RH-O</option>
			<option value="RH-AB">RH-AB</option>
		</select>
		<button type="submit">회원가입</button>
	</form>
</body>
</html>