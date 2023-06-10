<?php
	include_once('../include/DBConnect.php');
  session_start();
  $now = new DateTime();
  if(isset($_SESSION))
  {
    $userid = $_SESSION['ID'];
  }
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
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="home.css">
	<script type="text/javascript">   
		$(document).ready(function() {
      function checkViewport() {
        if ($(window).width() <= 768) {
          $("#headers").load('../include/sidebar.php');
        } else {
          $("#headers").load('../include/dropdown.php');
        }
      }

      checkViewport();

      $(window).on("resize", function() {
        checkViewport();
      });
    });

	</script>
</head>
<body>
  <div class="home">
    <div id="headers"></div>	
    <main>
      <div class="main1">
        <div class="noti">
          <h2>공지사항</h2>
          <!-- 중요공지 제외한 최신 5개-->
          <div class="box">
          <?php 
            $sql = "SELECT * FROM `notice` ORDER BY `notice`.`notice_number` DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result)) 
                {?>
                    <div class="con" onclick="tonotice(<?php echo $row['notice_number'] ?>)">
                        <h2> <?php echo $row['notice_title']?> </h2>
                    </div>
                <?php }
            }?>
          </div>
        </div>
        <div class="btns">
          <button type="button" class="navyBtn" onClick="location.href='./map.php'">
            <img src="../image/find.png"/>
            헌혈의 집 찾기
          </button>
          <button type="button" class="navyBtn" onClick="location.href='../directed/helpWrite.php'">
            <img src="../image/write.png"/>
            헌혈 지원서 작성
          </button>
          <button type="button" class="navyBtn" onclick="openNewWindow()">
            <img src="../image/connect.png"/>
            헌혈 예약 연결
          </button>
        </div>
      </div>
        <div class="main2">
          <div class="noti">
            <h2>긴급수혈 필요 대상자</h2>
              <div class="thing">
                <div class="category">
                  <div class="name">
                    <h3>이름</h3>
                    <div class="list_de">
                      <?php
                          $sql = "SELECT * FROM request_registration WHERE NOW() <= DATE_ADD(upload_at, INTERVAL 7 DAY) ORDER BY ABS(DATEDIFF(upload_at, NOW())) DESC LIMIT 5;";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class=con_de onclick="Getdetail('.$row['tr_per_reg_num'].')">'.$row['name']."</div>";
                              }
                            }
                          ?>
                    </div>
                  </div>
                </div>
                <div class="category">
                  <div class="blood">
                    <h3>혈액형</h3>
                    <div class="list_de">
                      <?php
                          $sql = "SELECT * FROM request_registration WHERE NOW() <= DATE_ADD(upload_at, INTERVAL 7 DAY) ORDER BY ABS(DATEDIFF(upload_at, NOW())) DESC LIMIT 5;";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                                  echo '<div class=con_de onclick="Getdetail('.$row['tr_per_reg_num'].')">'.$row['bl_type'].$row['RH']."</div>";
                              }
                          }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="category">
                  <div class="type">
                    <h3>혈액 종류</h3>
                    <div class="list_de">
                      <?php
                          $sql = "SELECT * FROM request_registration WHERE NOW() <= DATE_ADD(upload_at, INTERVAL 7 DAY) ORDER BY ABS(DATEDIFF(upload_at, NOW())) DESC LIMIT 5;";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class=con_de onclick="Getdetail('.$row['tr_per_reg_num'].')">'.$row['bl_ingr']."</div>";
                              }
                          }
                      ?>
                    </div>
                    <!-- 37.239204, 127.186134-->
                  </div>
                </div>
                <div class="category">
                  <div class="date">
                    <h3>날짜</h3>
                    <div class="list_de">
                      <?php
                          $sql = "SELECT * FROM request_registration WHERE NOW() <= DATE_ADD(upload_at, INTERVAL 7 DAY) ORDER BY ABS(DATEDIFF(upload_at, NOW())) DESC LIMIT 5;";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                                $upload = new datetime($row['upload_at']);
                                $inter = new DateInterval('P7D');
                                $deadline = $upload->add($inter);
                                $diff = $now->diff($deadline);
                                $daysLeft = $diff->days;
                                echo '<div class=date_de onclick="Getdetail('.$row['tr_per_reg_num'].')">'."D- ".$daysLeft."</div>";
                              }
                          }
                      ?>
                    </div>
                  </div>
                </div>
            </div>
            <button onClick="location.href='../directed/directed.php'">지정헌혈 목록 바로가기</button>
          </div>
        </div>
      
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
    </div>
    <script src="home.js"></script>
    <script>
        <?php       
        $sql = "SELECT * FROM request_registration WHERE tr_per_reg_num NOT IN ( SELECT brkd_tr_per_reg_num FROM bl_do_breakdown WHERE id = '$userid' ) AND DATE_ADD(upload_at, INTERVAL 7 DAY) > NOW() LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $rows = array(); // 내역들을 저장할 배열
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row; // 각 내역을 배열에 추가
        }
        if($_SESSION['islogin'] == true)
        {?>              
            console.log("로그인중");
            var rows = <?= json_encode($rows) ?>;
            console.log(rows);
            window.onload = function () {
                if (window.Notification) {
                    Notification.requestPermission();
                }
                Getpush(rows); // Getpush 함수에 내역 배열 전달
            };
<?php   }?>
</script>
</body>
</html>