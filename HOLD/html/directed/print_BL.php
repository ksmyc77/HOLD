<?php
    include_once('../include/DBConnect.php');

    session_start();

    // 필터 값 받기
    $start = $_POST['page'];
    $user = $_POST['userid'];

    // 최신순으로 10개 정보 가져오기
    $sql = "SELECT rr.* FROM request_registration AS rr WHERE rr.tr_per_reg_num IN ( SELECT bdb.brkd_tr_per_reg_num FROM bl_do_breakdown AS bdb WHERE bdb.id = '$user' ) ORDER BY upload_at DESC LIMIT 10;";
    $result = mysqli_query($conn, $sql);

    // 목록 출력
    // 조회한 데이터로 HTML 생성
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) 
      {
          ?>
          <div id="post-list" onclick="Getdetail(<?php echo $row['tr_per_reg_num'] ?>)">
              <a> <?php echo $row['name']; ?> </a>
              <a> <?php echo $row['bl_ingr']; ?></a>
              <a> <?php echo $row['tr_per_reg_num'];?> </a>
              <a> ♥</a>
          </div><?php
      }   
  }

    $html = ob_get_clean();
  
    echo $html;
?>
