<?php
    include_once('../../include/DBConnect.php');
    $ID = $_POST['userid'];                         // 아이디
    $PW = $_POST['password'];                       // 비밀번호
    $C_PW = $_POST['confirm-password'];             // 재입력 비밀번호
    $hash = password_hash($PW, PASSWORD_DEFAULT);   // 비밀번호 암호화
    $type = $_POST['blood-type'];                   // 혈액형
    $email = $_POST['email'];
    $Place = $_POST['place'];

    //메인 화면  리다이렉트 함수 
    function gotohome()
    {
        echo "<script> document.location.href='../../main/home.php';</script>";
    }
      
    //마이 페이지 리다이렉트 함수 
    function gotomypage()
    {
        echo "<script> document.location.href='mypage.php';</script>";
    }

    //비밀번호 불일치
    if(strcmp($PW, $C_PW)!= 0)
    {
        echo "<script>alert('비밀번호가 일치하지 않습니다.'); </script>";
        gotomypage();
    }

    $sql = "SELECT * FROM city WHERE name = '$Place'";
    $result = mysqli_query($conn, $sql);
    if($result == false)
    {
        echo "<script>alert('지역이 잘못되었습니다.'); </script>";
        gotomypage();
    }

    //회원 정보 버장
    else
    {
        $sql= "UPDATE `user` SET `password`='$PW',`u_area`='$Place',`u_email`='$email' WHERE userid = '$ID'";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            echo "<script>alert('수정에 실패하였습니다.'); </script>";
            gotomypage();
        }
        else{
        echo "<script>alert('수정되었습니다.'); </script>";
        gotohome();
    }
    }