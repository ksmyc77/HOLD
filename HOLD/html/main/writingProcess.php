<?php
    include_once('../include/DBConnect.php');
    //회원 가입 리다이렉트 함수 
    function gotowrite()
    {
        echo "<script> document.location.href='writing directed.php';</script>";
    }
      
    //로그인 리다이렉트 함수 
    function gotologin()
    {
        echo "<script> document.location.href='../main/home.php';</script>";
    }

    $name = $_POST['name'];
    $Blood_Type = $_POST['type'].$_POST['RH'];
    $PHR = $_POST['inputPHR'];
    $PHG = $_POST['inputPHG'];
    $id = $_POST['inputid'];
    $category = $_POST['category'];
    $Story = $_POST['story'];
    $email = $_POST['inputEmail'];

    

    if(isset($_POST["story"]))
    {
        $Story = $_POST['story'];
    }


   // $sql= "INSERT INTO request_registration(name, bl_type, bl_ingr, tr_per_ph_num, guar_num, tr_per_reg_num, story, r_area, r_email, upload_at)  VALUES('$name','$Blood_Type','$category', '$PHR','$PHG', '$id','$Story','$city' ,'$email', CURRENT_TIMESTAMP)";
   // $result = mysqli_query($conn, $sql);
//
//
   // if(!$result)
   // {
   //     echo "<script>alert('업로드에 실패했습니다.'); </script>";
   //     gotowrite();
   // }
   // else{
   //     echo "<script>alert('업로드에 성공했습니다.'); </script>";
   //     gotologin();
   //     }  
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <button onclick="location.href='writing directed.php'">이전화면으로</button >
</body>
</html>
