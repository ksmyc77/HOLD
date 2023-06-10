var page = 1;

function Getdetail(tr_per_reg_num) {
  // URL 생성 및 이동
  $(document).ready(function() 
  {
    document.cookie= "id="+tr_per_reg_num+";path=/;domain=hold.pe.kr;"
    var url = 'https://hold.pe.kr/directed/detailed.php?id='+tr_per_reg_num;
    window.location.href = url;
  })}

    var bl_ingr;
    // 버튼 요소들을 선택함
    var buttons = document.querySelectorAll(".ingr"); // 버튼에 추가한 클래스명으로 선택자를 수정해야 함   
    // 각 버튼에 대해 반복하여 이벤트를 연결함
    buttons.forEach(function(button) {
      button.addEventListener("click", function() {
        bl_ingr = button.value;
        console.log(bl_ingr);
      });
    });

  function getFilteredData() {
    // 선택한 필터 값 가져오기

    var bloodType = document.getElementsByName('bloodType')[0].value;
    var RHtype = document.getElementsByName('RHtype')[0].value;

    // AJAX 요청 보내기
    $.ajax({
      url: 'filter.php', // 데이터를 처리할 서버 파일 경로
      type: 'POST',
      data: {
        bl_type : bloodType,
        rh_type : RHtype,
        bl_ingr: bl_ingr,
        page : (page-1)*7,
      },
      success: function(response) {
        // 서버로부터 받은 데이터로 화면 업데이트
        var data = JSON.parse(response);
        var updatedHtml = data.html;
        var updatedMax = parseInt(data.max);
        console.log("sql : "+data.sql);
        $('.post').html(updatedHtml);
        sessionStorage.setItem('max', updatedMax);
        console.log("max : "+sessionStorage.getItem("max"));
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }

  function toprev()
{
    console.log(page)
    if(page == 1)
        alert("맨 처음 페이지입니다.");
    else
    {  
        page--;
        getFilteredData();
    }
}

function tonext()
{
    var maxpage =Math.ceil(sessionStorage.getItem("max")/7);
    if(maxpage == page)
        alert("마지막 페이지입니다.");
    else
    {  
        page++;
        getFilteredData();
    }
}

function setfilter()
{
    page = 1;
    getFilteredData();
}

window.onload = getFilteredData(page);
