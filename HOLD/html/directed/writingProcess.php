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
        echo "<script> document.location.href='./directed.php';</script>";
    }

    $name = $_POST['name'];
    $Blood_Type = $_POST['type'];
    $RH = $_POST['RH'];
    $PHR = $_POST['inputPHR'];
    $PHG = $_POST['inputPHG'];
    $id = $_POST['inputid'];
    $category = $_POST['category'];
    $Story = $_POST['story'];
    $email = $_POST['inputEmail'];
    $Lng    = $_POST['Lng'];
    $Lat    = $_POST['Lat'];
    $acceptable = $_POST['accpetable'];


    echo "name : ".$name."<br>";
    echo "bl_type : ".$Blood_Type."<br>";
    echo "RH : ".$RH."<br>";
    echo "PHR : ".$PHR."<br>";
    echo "RHG : ".$PHG."<br>";
    echo "id : ".$id."<br>";
    echo "bl_ingr : ".$category."<br>";
    echo "story : ".$Story."<br>";
    echo "email : ".$email."<br>";
    echo "Lat : ".$Lat."<br>";
    echo "Lng : ".$Lng."<br>";
    echo "acceptable : ".$acceptable."<br>";
    if(isset($_POST["story"]))
    {
        $Story = $_POST['story'];
    }


    $sql= "INSERT INTO request_registration(name, bl_type,RH, bl_ingr, tr_per_ph_num, guar_num, tr_per_reg_num, story, r_email, upload_at, Lat, Lng, acceptable)VALUES('$name','$Blood_Type','$RH' ,'$category', '$PHR','$PHG', '$id','$Story','$email', CURRENT_TIMESTAMP, '$Lat','$Lng', '$acceptable')";
    $result = mysqli_query($conn, $sql);


    if(!$result)
    {
        echo "<script>alert('업로드에 실패했습니다.'); </script>";
        die('쿼리 실행 오류: ' . mysqli_error($conn));
        //gotowrite();
    }
    else{
        echo "<script>alert('업로드에 성공했습니다.'); </script>";
        gotologin();
        }  
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <button onclick="location.href='./helpWrite.php'">이전화면으로</button >
</body>
</html>
