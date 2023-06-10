<?php
    include_once('../../include/DBConnect.php');
    $name = $_POST['name'];                         // 이름
    $ID = $_POST['userid'];                         // 아이디
    $PW = $_POST['password'];                       // 비밀번호
    $C_PW = $_POST['confirm-password'];             // 재입력 비밀번호
    $hash = password_hash($PW, PASSWORD_DEFAULT);   // 비밀번호 암호화
    $phone_number = $_POST['phone-number'];         // 전화 번호
    $guradian_number = $_POST['guardian-number'];   // 보호자 전화번호
    $type = $_POST['blood-type'];                   // 혈액형
    $place = $_POST['place'];
    $email = $_POST['email'];
    //회원 가입 리다이렉트 함수 
    function gotosignup()
    {
        echo "<script> document.location.href='signup.php';</script>";
    }
      
    //로그인 리다이렉트 함수 
    function gotologin()
    {
        echo "<script> document.location.href='../log/login.php';</script>";
    }

    // 아이디 중복
    $sql= "SELECT * FROM user where userid='$ID'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if($result->num_rows > 0)
    {
        echo "<script>alert('중복된 아이디입니다.'); </script>";
        gotosignup();
    }
    //비밀번호 불일치
    else if(strcmp($PW, $C_PW)!= 0)
    {
        echo "<script>alert('비밀번호가 일치하지 않습니다.'); </script>";
        gotosignup();
    }

    //회원 정보 버장
    else
    {
        $sql= "INSERT INTO user (name, userid, password, phone_number, guardian_phone_number, blood_type, u_email) VALUES('$name','$ID','$hash','$phone_number','$guradian_number','$type', '$email')";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            echo "<script>alert('회원 가입에 실패했습니다.'); </script>";
            die('쿼리 실행 오류: ' . mysqli_error($conn));
            //gotosignup();
        }
        else{
        echo "<script>alert('회원 가입에 성공하였습니다.'); </script>";
        gotologin();
    }
    }
?>