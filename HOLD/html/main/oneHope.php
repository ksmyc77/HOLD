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
	<!-- CSS 파일 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="oneHope.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});

	</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..."></script>
</head>


<body>
  <div class="hope">
    <div id="headers"></div>	
    
    <main>
        <div class="row1">
        <h1>♥한 줄의 희망♥</h1>
        <form method="POST" id="uploadForm" action = "hopeProcess.php">
            <div class="box">
                <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    
                    $sql = "SELECT COUNT(*) as count FROM one_sentence";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = $row['count'];
                    $pages = ceil($total / 10);

                    // 시작 인덱스
                    $start = ($page - 1) * 10;

                    // 최신순으로 10개 정보 가져오기
                    $sql = "SELECT * FROM one_sentence ORDER BY upload_at DESC LIMIT $start, 10";
                    $result = mysqli_query($conn, $sql);
                //<!-- 리스트가 반복된다고 생각하면됨 -->
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
                        <div class="list">
                            <div class="con">
                                <?php
                                    echo $row['sentence']; ?>
                            </div>
                <?php       if($_SESSION['ID'] == $row['uploader']){?>
                                <div class="btn">
                                    <button type="button" id="update" onclick="setupdate('<?php echo $row['sentence']?>')">수정</button>
                                    <button type="button" id="delete" onclick="deleteForm('<?php echo $row['sentence'];?>')">삭제</button>
                                    
                                </div>
                <?php       }   ?>
                        </div>  
            <?php   }
                } ?>  
            </div>
          <div class="passBtn">
            <?php 
                $next = $page.",".$pages;
            ?>
            <button type="button" id="prev" onclick="toprev(<?php echo $page?>)" >이전</button>
            <button type="button" id="next" onclick="tonext(<?php echo $next ?>)">다음</button>
          </div>
        </div>
        <div class="row2">
          <h2>나도 참여하기!</h2>    
          <div class="write" >
              <textArea name = "inputtext" id="inputtext" maxlength="50" placeholder="여러분들의 희망을 들려주세요(최대 50자)" ></textArea>
              <input type="hidden" name="type" id="type" value="new">
              <input type="hidden" name="uploaded" id="uploaded">
              <button type="submit" name="upload">업로드</button>
          </div>
        </div>
        </form>
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
    </div>
    <script>
        function setupdate(sentence){
            document.getElementById("type").value = "update";
            document.getElementById("inputtext").value = sentence;
            document.getElementById("uploaded").value = sentence;
        }

        function deleteForm(sentence) {
          // 폼을 제출
          document.getElementById("type").value = "delete";
          document.getElementById("uploaded").value = sentence;
          document.getElementById("uploadForm").submit();
        }
        
        function toprev(page)
        {
            console.log(page)
            if(page == 1)
                alert("맨 처음 페이지입니다.");
            else
            {  
                var place = page-1;
                location.href="https://hold.pe.kr/main/oneHope.php?page="+place;
            }
        }

        function tonext(page, max)
        {
            if(max == page)
                alert("마지막 페이지입니다.");
            else
            {  
                var place = page+1;
                location.href="https://hold.pe.kr/main/oneHope.php?page="+place;
            }
        }
    </script>
</body>
</html>
