<?php
    include_once('../include/DBConnect.php');

    session_start();

    // 필터 값 받기
    $type = $_POST['type'];
    $start = $_POST['page'];

    $sql = "SELECT * FROM notice WHERE";

    if($type == "all" || $type == "")
    {
      $sql .=" notice_type != 'ㄱ' ORDER BY notice_number DESC LIMIT $start, 7;";
    }
    else
    {
      $sql .= " notice_type = '$type' ORDER BY notice_number DESC LIMIT $start, 7;";
    }
    // 조회한 데이터로 HTML 생성
    ob_start();
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="content" onclick="tonotice(<?php echo $row['notice_number'] ?>)">
            <a class="n"> <?php echo $row['notice_number']?> </a>
            <a class="t"> <?php echo $row['notice_title']?> </a>
          </div>
        <?php
      }
    }
    $html = ob_get_clean();
    // 생성된 HTML 및 $_SESSION['max'] 값을 반환
    
    $sql = "SELECT COUNT(*) as count FROM notice WHERE";
    if($type == "all" || $type == "")
    {
      $sql .=" notice_type != 'ㄱ';";
    }
    else
    {
      $sql .= " notice_type = '$type';";
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $response = array(
    'html' => $html,
    'max' => $row['count']
    );
  
    echo json_encode($response);
?>
