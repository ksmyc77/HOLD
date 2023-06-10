<?php
	include_once('../include/DBConnect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>H.O.L.D</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">-->

	<!-- CSS 파일 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="notice.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..."></script>
</head>


<body>
  <div class="notices">
    <div id="headers"></div>
    <main>

      <div class="bar">
        <div><h1  onclick="Setfilter('all')">공지사항</h1></div>
        <div class="notiBtn">
          <button onclick="Setfilter('ㄴ')"><h2>일반공지</h2></button>
          <button onclick="Setfilter('ㄹ')"><h2>헌혈의 집 공지</h2></button>
          <button onclick="Setfilter('ㄷ')"><h2>HOLD 공지</h2></button>
        </div>
      </div>
      <div class="box">
        <div class="ti">
          <div class="num"><h4>번호</h4></div>
          <div class="titles"><h4>제목</h4></div>
          <!-- <div class="date"><h4>날짜</h4></div> -->

        </div>
        <div class="important">
        <?php 
            $sql = "SELECT * FROM `notice`WHERE `notice_type` = 'ㄱ' ORDER BY `notice_number` DESC LIMIT 3;";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result)) 
                {?>
                    <div class="content" onclick="tonotice(<?php echo $row['notice_number'] ?>)">
                        <a class="n"> <?php echo $row['notice_number']?> </a>
                        <a class="t"> <?php echo $row['notice_title']?> </a>
                    </div>
                <?php }
            }?>
        </div>
        <div class="normal">
          <!-- 해당 내용의 코드는 notice_filter.php로 이전-->
        </div>
        <div class="passBtn">
          <button type="button" id="prev" onclick="toprev()">이전</button>
          <button type="button" id="next" onclick="tonext()">다음</button>
      </div>

      </div>
      
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
  </div>
  <script src="notice.js"></script>

</body>
</html>
