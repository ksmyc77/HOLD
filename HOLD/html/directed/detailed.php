<?php
	include_once('../include/DBConnect.php');
    session_start();
    
    $tr_per_reg_num = $_COOKIE['id'];
    function Canaccept($tr_id)
    {
      global $conn;
      $userid= $_SESSION['ID'];
      $sql = "SELECT accept, acceptable, upload_at, RH, bl_type from `request_registration` where tr_per_reg_num='$tr_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $now = new datetime();
      $upload = new datetime($row['upload_at']);
      $inter = new DateInterval('P7D');
      $deadline = $upload->add($inter);
    $bltype = $row['bl_type'].$row['RH'];
     if($bltype != $_SESSION['blood_type'])
        echo "false_a";
      //최대 인원 체크
      if($row['accept'] == $row['acceptable'])
        echo "false_m";
      //마감기간 체크
      else if($deadline < $now)
        echo "false_e";
      else if(!isset($_SESSION['ID']))
        echo "false_l";
      else
      {
        $sql = "SELECT * FROM bl_do_breakdown WHERE id='$userid' AND brkd_tr_per_reg_num='$tr_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if($row > 0) 
            echo "false_d"; // 중복시
        else
            echo "true";
      }
    }
          
?>
<!-- 지정헌혈 대상자 페이지 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
    H.O.L.D
  </title>
	<!-- CSS 파일 -->

	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="./detailed.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>

    
</head>
<body>
    <?php
        
        $sql = "SELECT * FROM request_registration where tr_per_reg_num='$tr_per_reg_num'";
        $result = mysqli_query($conn, $sql);
        if(!$result)
            echo "<script>alert('sql 결과 없음');</script>";
        $row=mysqli_fetch_assoc($result);
        if(!$row)
            echo "<script>alert('row 없음');</script>";
    ?>
  <div class="detailed">
    <div id="headers"></div>
    <main>
      <div class="box">
        <div class="col">
          <div class="cen">
            <h1>이름</h1>
            <h1><?php echo $row['name']?></h1>
          </div>
          <div class="cen">
            <h3> 혈액종류</h3>
            <h3> <?php echo $row['bl_ingr']?></h3>
          </div>
          <div class="frame">
            <div class="row">
              <div class="blood">
                <h4>혈액형</h4>
                <h4><?php echo $row['bl_type'].$row['RH']?></h4>
              </div>
              <div class="num">
                <h4>수혈자 등록 번호</h4>
                <h4><?php echo $row['tr_per_reg_num']?></h4>
              </div>
            </div>
          </div>
          <div class="frame">
            <div class="center">
              <h4>수혈자 연락처</h4>
              <h4><?php echo $row['tr_per_ph_num']?></h4>
          </div>
          </div>
          <div class="frame">
            <div class="center">
              <h4>보호자 연락처</h4>
              <h4><?php echo $row['guar_num']?></h4></div>
          </div>
        </div>
        <div class="col">
          <div class="date">
            <h1><?php
              $now = new datetime();
              $upload = new datetime($row['upload_at']);
              $inter = new DateInterval('P7D');
              $deadline = $upload->add($inter);
              $diff = $now->diff($deadline);
              $daysLeft = $diff->days;

              if($deadline < $now)
                echo "마감됨";
              else
                echo "마감까지 앞으로 ".$daysLeft."일";
            ?></h1>
          </div>
          <div class="name">
            <h2>사연</h2>
          </div>
          <div class="con">
            <h3><?php echo $row['story']?></h3></div>
          </div>
        </div>
        <div class="btn">
          <button id="accept" onclick="gets()">수락</button>
        </div>
    </main>
  </div>
  <script>
        var accept_value = "<?php Canaccept($tr_per_reg_num) ?>";
        if(accept_value != "true")
        {
          document.getElementById("accept").innerHTML = "수락불가";
          document.getElementById("accept").disabled = true;
        }

        function gets() {
            // AJAX를 사용하여 서버에 getaccept 함수를 호출
            tr_id = <?php echo $tr_per_reg_num ?>;
            $.ajax({
                url: 'getaccept.php', // PHP 파일의 경로
                type: 'POST',
                data: {
                    tr_id: tr_id // getaccept 함수에 전달할 파라미터 값
                },
                success: function(response) {
                    // 서버에서 반환한 응답을 처리
                   if(response)
                   {
                        alert("수락하였습니다.");
                        location.reload();
                   }
                },
                error: function() {
                    // 오류 처리
                    console.log('An error occurred.');
                }
            });
        }

  </script>
</body>
</html>