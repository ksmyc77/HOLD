<?php
	include_once('../include/DBConnect.php')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>H.O.L.D</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
	<!-- CSS 파일 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../include/dropdown.css">
  <link rel="stylesheet" type="text/css" href="self_check.css">
	<script type="text/javascript">   
		$(document).ready( function() {
		$("#headers").load('../include/dropdown.php');  // 원하는 파일 경로를 삽입하면 된다
		});
	</script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-..."></script>
</head>


<body>
  <div class="self_check">
    <div id="headers"></div>	
    <main>
      <h1>자가진단</h1>
      <h3>헌혈 전 아래 항목들을 테스트해주시기 바랍니다.</h3>
      <div class="boxing">
        <div class="col1">
          <div class="block">
            <h4>나이:</h4>
            전혈: 만 16~69세<br/>
            혈장: 만 17~69세<br/>
            혈소판성분헌혈, 혈소판혈장성분헌혈 : 만 17 ~ 59세
          </div>
          <h5>※ 65세 이상인 자의 헌혈은 60세부터 64세까지 헌혈한 경험이 있는 자에만 가능함</h5>
          <div class="block">
            <h4>체중:</h4>
            남자: 50kg 이상<br/>
            여자: 45kg 이상<br/>
          </div>
          <div class="block">
            <h4>건강진단:</h4>
            혈압(mmHg) : 수축기 90~179, 이완기 100 미만<br/>
            체온(℃) : 37.5℃ 이하<br/>
            맥박(회/분) : 50~100 
          </div>
          <div class="block">
            <h4>간격:</h4>
            전혈: 8주 후<br/>
            체온: 37.5℃ 이하<br/>
            맥박: 50~100회 (1분당)
          </div>
          <div class="block">
            <h4>횟수:</h4>
            전혈 : 최근 1년 이내에 전혈헌혈횟수 최대 5회<br/>
            혈소판성분헌혈, 혈소판혈장성분헌혈 : 최근 1년 이내에 성분헌혈횟수 최대 24회
          </div>
          <div class="block">
            <h4>해외여행 여부:</h4>
            여행 후 30~90일 경과 후 가능.<br/>
            (국가별 상이, 확인 필수)
          </div>
          <div class="block">
            <h4>진료:</h4>
            수혈 후 1년 경과<br/>
            기타 진료 후 일정기간 경과
          </div>
          <h5>※ 임신 중인자, 분만 또는 유산 후 6개월 이내인 자는 헌혈에 참여하실 수 없습니다.</h5>
        </div>
        <div class="col2">
          <div class="block">
            <h4>질병:</h4>
            감염병 완치 후 일정기간 경과<br/>
            기타 질병 완치 후 일정기간 경과
          </div>
          <div class="block">
            <h4>약물:</h4>
            건선 치료제 복용 후 3년 경과 (일부는 영구 헌혈금지)<br/>
            전립선비대증 치료제 복용 후 4주 또는 6개월 경과<br/>
            탈모증 치료제 복용 후 4주 경과<br/>
            여드름 치료제 복용 후 4주 경과<br/>
            기타 헌혈금지약물 복용 후 일정기간 경과
          </div>
          <h5>※ 혈액관리법 제7조에 따라 운영중인 ‘혈액사고방지 정보 조회시스템’을 통해 제공받은 헌혈금지약물 처방 정보는 상기 약물(태아 영향)을 복용하는 것과 동일하게 판정됩니다.</h5>
          <div class="block">
            <h4>예방접종:</h4>
            인플루엔자, A형간염, 일본뇌염 등 예방접종<br/>
            받은 후 24시간 경과<br/>
            B형 간염 예방접종 받은 날로부터 2주 경과<br/>
            홍역, 유행성이하선염, 풍진(MMR)의 혼합백신, 수두 등 예방접종 받은 날로부터 4주 경과
          </div>
          <div class="block">
            <h4>검사결과:</h4>
            과거 헌혈검사(B형간염, C형간염, 매독검사 등) 결과 정상
          </div>
          <div class="block">
            <h4>기타:</h4>
            장애가 있는 경우 장애등급에 관계없이 헌혈기록카드 문진항목을 이해할 수 있어야 헌혈이 가능함 (의사소통이 원활하지 않는 경우 이해관계가 없는 제3자의 도움을 받을 것을 권장함)
          </div>
          <div class="block">
            문진결과 헌혈 적합에 해당되는 경우 헌혈가능<br/>
            헌혈참여 시 반드시 기본 신분증 지참 필요
          </div>
          <h5>
          ※ 기본 신분증의 정의:<br/>
              헌혈기록카드의 실명확인 방법에 있는 신분증으로
              사진이 부착되어 있는 주민등록증, 여권, 그 밖의 신분
              증명서를 말하며 공공기관 및 법인등이 발급한 사진이      
              부착되어 있는 그 밖의 신분증을 말함.
              (고교생의 경우 사진 및 이름이 표시된 학생증)
          </h5>
        </div>
      </div>
    </main>
    <!-- <footer>
      <p>헌혈 플랫폼 &copy; 2023</p>
    </footer> -->
  </div>
</body>
</html>
