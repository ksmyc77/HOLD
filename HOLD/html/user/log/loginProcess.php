<?php
    include_once('../../include/DBConnect.php');
    
    $ID = $_POST['userid'];
    $pw = $_POST['password'];
    $sql = "SELECT * FROM user where userid='$ID'";
    $result =  mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    //쿼리문 실행 결과 존재 -> 해당 아이디 및 비밀번호 정보를 가지는 계정 존재.
    if(password_verify($pw, $row['password']))
    {
        //세션 설정 - 설정 내용 (이름, 혈액형)
        $_SESSION['ID'] = $row['userid'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['blood_type'] = $row['blood_type'];
        $_SESSION['phone_number'] = $row['phone_number'];
        $_SESSION['guardian_phone_number'] = $row['guardian_phone_number'];
        $_SESSION['islogin'] = true;
        
        //홈으로 이동
        echo "<script>alert('환영합니다.'); </script>";
        echo "<script> document.location.href='../../main/home.php';</script>";
    }
    else // 쿼리문 실행 결과 없음 -> 해당 아이디 및 비밀번호 정보를 가지는 계정 미존재
    {
        echo "<script>alert('아이디나 비밀번호가 틀렸습니다.'); </script>";
        echo "<script> document.location.href='login.php';</script>";
    }
?>