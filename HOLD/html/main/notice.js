function tonotice(id) {
    // URL 생성 및 이동
    $(document).ready(function() 
    {
      document.cookie= "id="+id+";path=/;domain=hold.pe.kr;"
      var url = 'https://hold.pe.kr/main/noticeDe.php?id='+id;
      window.location.href = url;
    })
} 



var currentpage = 1;
var perpage = 7;
function toprev()
{
  if(currentpage > 1)
  {
    currentpage--; // 현재 페이지 번호 감소
    getFilteredData();
    console.log(currentpage);
  }
  else
  {
    alert("첫 페이지입니다.")
  }
}

function tonext()
{
  var maxpage =Math.ceil(sessionStorage.getItem("max")/perpage);
  if(currentpage < maxpage)
  {
    currentpage++; // 현재 페이지 번호 감소
    getFilteredData();
    console.log("page : "+currentpage);
  }
  else
  {
    alert("마지막 페이지입니다.")
  }
}


document.getElementById("next").addEventListener("click", function() {

});

function getFilteredData() {
    // 선택한 필터 값 가져오기
    console.log("선택된 공지 타입 : "+sessionStorage.getItem("filter_type"));

    //AJAX 요청 보내기
    $.ajax({
      url: 'notice_filter.php', // 데이터를 처리할 서버 파일 경로
      type: 'POST',
      data: {
        type : sessionStorage.getItem("filter_type"),
        page : (currentpage-1)*7,
      },
      success: function(response) {
        var data = JSON.parse(response);
        var updatedHtml = data.html;
        var updatedMax = parseInt(data.max);
      
        // 서버로부터 받은 데이터로 화면 업데이트
        $('.normal').html(updatedHtml);
      
        // JavaScript에서 세션 변수 갱신
        sessionStorage.setItem('max', updatedMax);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
}

function Setfilter(type)
{
  currentpage = 1;
  sessionStorage.setItem("filter_type", type);

  getFilteredData();
}

window.onload = getFilteredData();
window.addEventListener('beforeunload', function(event) {
    sessionStorage.clear(); // 세션 스토리지의 모든 정보 삭제
});
