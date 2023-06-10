<?php
    include_once('../include/DBConnect.php');
    $name = $_POST['name'];
    $ID = $_POST['userid'];
    $PW = $_POST['password'];
    $C_PW = $_POST['confirm-password'];
    $phone_number = $_POST['phone-number'];
    $guradian_number = $_POST['guardian-number'];
    $type = $_POST['blood-type'];

    //리다이렉트 함수
    function redirect()
    {
        echo "<script> document.location.href='signup.php';</script>";
    }

    // 아이디 중복
    $sql= "SELECT * FROM users where userid='$ID'";
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));
    if($result)
    {
        echo "<script>alert('중복된 아이디입니다.'); </script>";
        redirect();
    }

    //비밀번호 불일치
    if(strcmp($PW, $C_PW)!= 0)
    {
        echo "<script>alert('비밀번호가 일치하지 않습니다.'); </script>";
        redirect();
    }

    //전화번호 양식 불일치
    if(strpos($phone_number,'-') or strpos($guradian_number,'-'))
    {
        echo "<script>alert('전화번호를 다시 입력하세요'); </script>";
        redirect();
    }
?>