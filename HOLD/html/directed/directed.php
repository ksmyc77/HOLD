<?php
	include_once('../include/DBConnect.php');
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
  <link rel="stylesheet" type="text/css" href="./directed.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});

</script>

</head>
<body>
  <div class="direct">
    <div id="headers"></div>
    <main>
      <div class="bar">
        <div><h1>카테고리</h1></div>
        <div class="choose">
          <select name="bloodType">
            <option value= "*" selected>혈액형 선택</option>
            <option value= "*">전체</option>
            <option value= "A">A</option>
            <option value= "B">B</option>
            <option value= "AB">AB</option>
            <option value= "O">O</option>
          </select>
          <select name="RHtype">
            <option value= "*" selected>Rh 선택</option>
            <option value= "*">전체</option>
            <option value= "+">Rh+</option>
            <option value= "-">Rh-</option>
          </select>
          <div class="chooseBtn">
            <button class="ingr" value= "전혈">전혈</button>
            <button class="ingr" value= "혈장">혈장</button>
            <button class="ingr" value= "혈소판">혈소판</button>
         </div>
          <div class="apply">
            <button onclick="setfilter()">적용하기</button>
          </div>
        </div>
      </div>
      <div class="list">
        <div class="ti">
          <div class="name"><h4>이름</h4></div>
          <div class="num"><h4>수혈자번호</h4></div>
          <div class="blood"><h4>혈액형</h4></div>
          <div class="date"><h4>카테고리</h4></div>
          <div class="counting"><h4>수락자</h4></div>
        </div>
        <div class="post">
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            // 시작 인덱스
            $start = ($page - 1) * 7;

            // 최신순으로 10개 정보 가져오기
            $sql = "SELECT * FROM request_registration ORDER BY upload_at DESC LIMIT $start, 7";
            $result = mysqli_query($conn, $sql);

            

            // 목록 출력
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) 
                {
                    ?>
                    <div id="post-list" onclick="Getdetail(<?php echo $row['tr_per_reg_num'] ?>)">
                        <a> <?php echo $row['name']; ?> </a>
                        <a> <?php echo $row['tr_per_reg_num']; ?></a>
                        <a> <?php echo $row['bl_type'].$row['RH']; ?></a>
                        <a> <?php echo $row['bl_ingr'];?> </a>
                        <a> <?php
                          echo $row['accept'];
                          echo " / ";
                          echo $row['acceptable'];
                        ?></a>
                    </div><?php
                }
            }?>
            </div><?php 
            // 이전 버튼 출력

            // 다음 버튼 출력
            $sql = "SELECT COUNT(*) as count FROM request_registration";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total = $row['count'];
            $pages = ceil($total / 7);
            $next = $page.",".$pages;
        ?>
          <div class="btns">
            <button type="button" id="prev" onclick="toprev()" >이전</button>
            <button type="button" id="next" onclick="tonext()">다음</button>
          </div>
      </div>
    </main>
  </div>
</body>
<script type="text/javascript" src = "directed.js" defer> </script>