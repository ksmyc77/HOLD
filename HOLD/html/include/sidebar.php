<!-- 기본 헤더 인클루드 -->
<?php
  include_once('../include/DBConnect.php');
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" href="sidebar.css">

  <script type="text/javascript">
    $(document).ready(function() {
      // JavaScript 코드 작성
      var sidebar = document.querySelector('.sidebar');
      var sidebarToggle = document.querySelector('.sidebar-toggle');
      var menuIcon = sidebarToggle.querySelector('.menu-icon');
      var closeIcon = sidebarToggle.querySelector('.close-icon');

      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-open');
        sidebarToggle.classList.toggle('sidebar-open');
        menuIcon.classList.toggle('hide');
        closeIcon.classList.toggle('hide');
      });
    });
  </script>
</head>
<body>
  <header>
    <div class="box">
      <div class="inline">
        <?php if ($_SESSION['islogin'] == false): ?>
          <button class="logBtn" onclick="location.href='../user/log/login.php'">로그인</button>
          <button class="logBtn" onclick="location.href='../user/signup/signup.php'">회원가입</button>
        <?php else: ?>
          <button class="logBtn" onclick="location.href='../user/mypage/mypage.php'">마이페이지</button>
          <button class="logBtn" onclick="location.href='../user/log/logout.php'">로그아웃</button>
        <?php endif; ?>
      </div>
      <div class="headerMain">
          <a href="../main/home.php">
            <img src="../image/hold.png" alt="hold" />
          </a>
        <div class="sidebar-toggle" onclick="sidebarToggle()">
          <span class="menu-icon"></span>
          <!--<span class="close-icon"></span>-->
        </div>
      </div>
    </div>
  </header>

  <div class="sidebar">
    <nav>
      <ul>
        <li><a href="../main/notice.php">공지사항</a></li>
        <li class="dropdown">
          <p>지정헌혈</p>
          <div class="dropdown-content">
            <a href="../directed/directed.php">목록보기</a>
            <a href="../directed/helpWrite.php">요청서 작성</a>
          </div>
        </li>
        <li><a href="../directed/bloodList.php">헌혈내역</a><p></p></li>
        <li><a href='../main/oneHope.php'>한 줄의 희망</a></li>
        <li class="dropdown">
          <p>주의사항</p>
          <div class="dropdown-content">
            <a href="../precaution/self_check.php">자가 진단</a>
            <a href="../precaution/precaution.php">헌혈 시 주의사항</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>

  <!--<script src="sidebar.js"></script>-->
</body>
</html>
