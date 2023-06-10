<?php
	include_once('../../include/DBConnect.php');
    session_start();
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="mypage.css">
	<link rel="stylesheet" type="text/css" href="../../include/dropdown.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../../include/dropdown_user.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
</head>
<body>
  <div class="mypage">
    <header></header>
    <form action="UpdateProcess.php" method="post">
    <main>
      <a href="../../main/home.php">
        <img src="../../image/hold.png" alt="hold"/>
      </a>
      <div class="container" >
        <div class="box">
            <div class="row">
              <div>              
                <span class="label">이름:</span>
                <span class="value"><?= $_SESSION['name'] ?></span>
              </div>
              <div>
                <span class="label">혈액형:</span>
                <span class="value"><?= $_SESSION['blood_type'] ?></span>
              </div>
            </div>
            <div>
                <input type="text" id="userid" name="userid" placeholder="<?php echo $_SESSION['ID']; ?>" required  readonly>
            </div>
            <div>
              <input type="password" id="password" name="password" placeholder="변경할 비밀번호를 입력하세요" required>
            </div>
            <div>
              <input type="password" id="confirm-password" name="confirm-password" placeholder="비밀번호를 다시 입력하세요" required>
            </div>
            <div class="row">
              <input type="email" id="email" name="email" placeholder="이메일" required>
            </div>
            <div class="row">
              <div>
                <span class="label">전화번호:</span>
                <span class="value"><?= $_SESSION['phone_number'] ?></span>
              </div>
              <div>
                <span class="label">비상연락처:</span>
                <span class="value"><?= $_SESSION['guardian_phone_number'] ?></span>
              </div>
            </div>
            <button type="submit" id="submtbutton">수정완료</button>
          </div>
        </div>
    </main>
    <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer>
    </form>
  </div>
</body>
</html>
