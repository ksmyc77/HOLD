<!-- 기본 헤더 인클루드 -->
<?php
  include_once('../include/DBConnect.php');
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link type = "text/css" href="./dropdown.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<header>
    <div class="box">
      <div class="inline">
        <?php if($_SESSION['islogin']==false): ?>
          <button class="logBtn"  onclick="location.href='../user/log/login.php'">로그인</button>
          <button class="logBtn" onclick="location.href='../user/signup/signup.php'" >회원가입</button>
        <?php else: ?>
          <button class="logBtn"  onclick="location.href='../user/mypage/mypage.php'">마이페이지</button>
          <button class="logBtn" onclick="location.href='../user/log/logout.php'" >로그아웃</button>
        <?php endif; ?>
      </div>
      <div class="headerMain">
        <a href="../main/home.php">
          <img src="../image/hold.png" alt="hold"/>
        </a>
        <div class="drop">
          <nav>
            <ul>
                <li><a href="../main/notice.php">공지사항</a></li>
                <!-- <li><a href="../main/noticeDe.php">공지사항세부(확인용)</a></li>
                <li><a href="../main/noticeWrite.php">공지사항작성(확인용)</a></li>
                <li><a href="../directed/detailed.php">수혈자 카드(확인용)</a></li> -->
                <li class="dropdown">
                  <a href="#">지정헌혈</a>
                  <div class="dropdown-content">
                    <a href="../directed/directed.php">목록보기</a>
                    <a href="../directed/helpWrite.php">요청서 작성</a>
                  </div>
                </li>
                <li><a href="../directed/bloodList.php">헌혈내역</a></li>
                <li class="dropdown">
                  <a href ='../main/oneHope.php'>한 줄의 희망</a>
                </li>
                <li class="dropdown">
                  <a href="#">주의사항</a>
                  <div class="dropdown-content">
                    <a href="../precaution/self_check.php">자가 진단</a>
                    <a href="../precaution/precaution.php">헌혈 시 주의사항</a>
                  </div>
                </li>  
            </ul>
          </nav>
          </div>
        </div>
        <div class="title">헌혈을, 보다 쉽게</div>
      </div>
	</header>
</body>
</html>
