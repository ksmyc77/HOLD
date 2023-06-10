<?php
    include_once('../include/DBConnect.php');
    if (!isset($_SESSION['ID']))
    {
        echo "<script>alert('로그인을 진행해주세요'); </script>";
        echo "<script> document.location.href='../user/log/login.php';</script>";
    }
    
    $uploadTime = date('Y-m-d H:i:s');
    $text = $_POST['inputtext'];
    $type = $_POST['type'];
    $uploaded = $_POST['uploaded'];
    $uploader = $_SESSION['ID'];

    function gotohope()
    {
        echo "<script> document.location.href='oneHope.php';</script>";
    }

    if($type == 'new')
    {
        $sql = "INSERT INTO `one_sentence`(`sentence`, `uploader`, `upload_at`) VALUES ('$text','$uploader', CURRENT_TIMESTAMP)";
    }
    else if($type == 'update')
    {
        $sql = "UPDATE `one_sentence` SET `sentence`='$text' WHERE sentence = '$uploaded'";
    }
    else if($type == 'delete')
    {
        $sql = " DELETE FROM `one_sentence` WHERE sentence = '$uploaded'";
    }
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        if($type=='new')
            echo "<script>alert('업로드에 실패했습니다.'); </script>";
        elseif($type =='update')
            echo "<script>alert('수정에 실패했습니다.'); </script>";
        elseif($type=='delete')
            echo "<script>alert('삭제에 실패했습니다.'); </script>";
    }
    else
    {
        if($type=='new')
            echo "<script>alert('업로드에 성공했습니다.'); </script>";
        elseif($type =='update')
            echo "<script>alert('수정에 성공했습니다.'); </script>";
        elseif($type=='delete')
            echo "<script>alert('삭제에 성공했습니다.'); </script>";
    }
    gotohope();
?>