<!-- 2중 하위 폴더용 헤더 인클루드 -->

<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link type = "text/css" href="dropdown.css">
</head>
<body>
	<header>
    <div class="box">
      <div class="inline">
        <button class="logBtn"  onclick="location.href='../user/log/login.php'">로그인</button>
        <button class="logBtn" onclick="location.href='../user/signup/signup.php'" >회원가입</button>
      </div>
      <div class="headerMain">
        <a href="../main/home.php">
          <img src="../image/hold.png" alt="hold"/>
        </a>
        <div class="drop">
          <nav>
            <ul>
            <li><a href="../main/notice.php">공지사항</a></li>
                <li><a href="../main/noticeDe.php">공지사항세부(확인용)</a></li>
                <li><a href="../main/noticeWrite.php">공지사항작성(확인용)</a></li>
                <li><a href="../directed/detailed.php">수혈자 카드(확인용)</a></li>
                <li class="dropdown">
                  <a href="#">지정헌혈</a>
                  <div class="dropdown-content">
                    <a href="../directed/directed.php">목록보기</a>
                    <a href="../directed/writing directed.php">요청서 작성</a>
                  </div>
                </li>
                <li><a href="../directed/bloodList.php">헌혈내역</a></li>
                <li class="dropdown">
                  <a href ='../main/hope.php'>한 줄의 희망</a>
                </li>
                <li class="dropdown">
                  <a href="#">주의사항</a>
                  <div class="dropdown-content">
                    <a href="../precaution/self_check.php">자가 진단</a>
                    <a href="../precaution/precaution.php">헌혈 시 주의사항</a>
                  </div>
                </li>  
                <?php
              if($_SESSION['islogin']==false):?>
                <li><a href="../log/login.php">로그인</a></li>
              <?php else: ?> 
                  <li class="dropdown">
                <a href="#">계정 관리</a>
                <div class="dropdown-content">
                    <a href="../mypage/mypage.php">마이 페이지</a>
                    <a href="../log/logout.php">로그아웃</a>
                </div>
                  </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>
      <div class="title">헌혈을, 보다 쉽게</div>
    </div>
	</header>
</body>
</html>
