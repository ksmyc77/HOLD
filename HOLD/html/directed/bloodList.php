<?php
	include_once('../include/DBConnect.php');

  function getmax()
  {
    echo $_SESSION['max'];
  }
  $userid = $_SESSION['ID'];
  echo "<script> sessionStorage.setItem('id', '$userid'); </script>"
?>

<!-- 지정헌혈 대상자 페이지 -->
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
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="./bloodList.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
    
    
</head>
<body>
  <div class="bloodList">
    <div id="headers"></div>
    <main>
        <?php
            if(!isset($_SESSION['ID']))
            {
              echo "<script> alert('로그인후 이용해주시길 바랍니다') </script>";
              echo "<script> document.location.href='../user/log/login.php';</script>";
            }

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            // 시작 인덱스
            $start = ($page - 1) * 10;
            $user = $_SESSION['ID'];
            //echo "ID : ".$user;
            $sql = "SELECT rr.* FROM request_registration AS rr WHERE rr.tr_per_reg_num IN ( SELECT bdb.brkd_tr_per_reg_num FROM bl_do_breakdown AS bdb WHERE bdb.id = '$user' )";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
        ?>
      <div class="col">
        <div class="count">
          <h1>♥:</h1>
          <h1><?php echo $count;
            $_SESSION['max'] = $count;
          ?></h1>
        </div>
        <div class="box" id="box">

      </div>
        <div class="btn">
          <button type="button" id="prev" onclick="toprev(<? echo $page ?>)">이전</button>
          <button type="button" id="next" onclick="tonext(<? echo $next ?>)">다음</button>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="level">
            <h1><?php echo $count?></h1>
          </div>
          <div class="content">
            <div class="name">
              <h2>이름 : </h2>
              <h2><?php echo $_SESSION['name']?></h2>
            </div>
            <div class="blood">
              <h2>혈액형 : </h2>
              <h2><?php echo $_SESSION['blood_type'] ?></h2>
            </div>
            <div class="phone">
              <h2>전화번호 : </h2>
              <h2><?php echo $_SESSION['phone_number'] ?>  </h2>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script type="text/javascript" src = "bloodList.js" defer> </script>
</body>
