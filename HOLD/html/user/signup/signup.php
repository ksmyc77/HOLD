<!-- 회원가입 페이지 -->
<?php
	include_once('../../include/DBConnect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>H.O.L.D</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel="stylesheet" type="text/css" href="../../include/dropdown.css">
    <script type="text/javascript" src= "signup.js"> </script>
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../../include/dropdown_user.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
</head>
<body>
  <div>
    <header data-include="../include/dropdown.html"></header >
    <form action ="signupProcess.php" method ="post" id = "singup-form">
    <main>
      <a href="../../main/home.php">
        <img src="../../image/hold.png" alt="hold"/>
      </a>
      <div class="container">
        <div class="box">
          <div class="row">
            <input type="text" id="name" name="name" placeholder="이름을 입력하세요" required>
            <!-- <label for="blood-type">혈액형</label> -->
            <select id="blood-type" name="blood-type">
              <option value="none">혈액형</option>
              <option value="A+">RH+A</option>
              <option value="B+">RH+B</option>
              <option value="O+">RH+O</option>
              <option value="AB+">RH+AB</option>
              <option value="A-">RH-A</option>
              <option value="B-">RH-B</option>
              <option value="O-">RH-O</option>
              <option value="AB-">RH-AB</option>
            </select>
          </div>
          <div>
            <input type="text" id="userid" name="userid" placeholder="ID를 입력하세요" required>
          </div>
          <div>
            <input type="password" id="password" name="password" placeholder="비밀번호를 입력하세요" required>
          </div>
          <div>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="비밀번호를 다시 입력하세요" required>
          </div>
          <div class="row">
            <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="'이메일 형식이 올바르지 않습니다." placeholder="이메일" t required>
          </div>
          <div  class="row">
            <input type="text" id="phone-number" name="phone-number" placeholder="사용자의 연락처를 입력하세요" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{3,4}" title="'EX) XXX-XXXX-XXXX."required>
            <input type="text" id="guardian-number" name="guardian-number" placeholder="보호자의 연락처를 입력하세요" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{3,4}" title="'EX) XXX-XXXX-XXXX." required>
          </div>
            <button type="submit" id="submtbutton">회원가입</button>
        </div>
      </div>
    </main>
    <footer>
		  <p>헌혈 플랫폼 &copy; 2023</p>
	  </footer>
	</form>
    </div>
    <script>
        function test() {
      var p1 = document.getElementById('password').value;
      var p2 = document.getElementById('confirm-password').value;
      
      if(p1.length < 6) {
              alert('입력한 글자가 6글자 이상이어야 합니다.');
              return false;
          }
          
          if( p1 != p2 ) {
            alert("비밀번호불일치");
            return false;
          } else{
            alert("비밀번호가 일치합니다");
            return true;
          }
    }
    </script>
</body>
</html>