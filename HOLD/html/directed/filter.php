<?php
    include_once('../include/DBConnect.php');
    // 필터 값 받기


    $bl_type = $_POST['bl_type'];
    $bl_ingr = $_POST['bl_ingr'];
    $RH = $_POST['rh_type'];
    $page = $_POST['page'];

    // 필터를 적용하여 데이터 조회
    // ...
    $sql = "SELECT * FROM request_registration WHERE 1";

    if ($bl_type != "*") {
      $sql .= " AND bl_type = '$bl_type'";
    }
    if($bl_ingr != "1" && $bl_ingr != ""){
      $sql .= " AND bl_ingr = '$bl_ingr'";
    }
    if($RH != "*")
    {
        $sql .= " AND RH = '$RH'";
    }
    $sql .= " ORDER BY upload_at DESC LIMIT $page, 7";

    $result = mysqli_query($conn, $sql);
    // 조회한 데이터로 HTML 생성
    ob_start();
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
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
        </div>
        <?php
      }
    }

    $html = ob_get_clean();

    $sql = "SELECT COUNT(*) as count FROM request_registration WHERE 1";

    if ($bl_type != "*") {
      $sql .= " AND bl_type = '$bl_type'";
    }
    if($bl_ingr != "1" && $bl_ingr != ""){
      $sql .= " AND bl_ingr = '$bl_ingr'";
    }
    if($RH != "*")
    {
        $sql .= " AND RH = '$RH'";
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $response = array(
    'html' => $html,
    'max' => $row['count'],
    'sql' => $sql
    );


    // 생성된 HTML 반환
    echo json_encode($response);
?>
