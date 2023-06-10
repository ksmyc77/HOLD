<?php
	include_once('../include/DBConnect.php')
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
  <link rel="stylesheet" type="text/css" href="noticeDe.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..."></script>
</head>


<body>
  <div class="noticeDe">
    <div id="headers"></div>	
    <main>
        <?php 
            $id = $_COOKIE['id'];
            $sql = "SELECT * FROM `notice`WHERE `notice_number` ='$id'";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
        ?>
      <div class="standard">
        <div class="title"><?php echo $row['notice_title']?></div>
        <div class="date"><?php echo $row['notice_date']?></div>
      </div>
      <div class="box">
      <?php echo $row['notice_content']?>
      </div>
      <div class="btn">
        <button  onclick="location.href='./notice.php'">목록</button>
      </div>
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
  </div>
</body>
</html>
