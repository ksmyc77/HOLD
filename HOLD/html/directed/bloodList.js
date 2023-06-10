var currentpage=1;
var userid = sessionStorage.getItem("id");

function toprev(page)
{
    console.log(page)
    if(page == 1)
        alert("맨 처음 페이지입니다.");
    else
    {  
        currentpage--;
        movepage(currentpage, userid);
    }
}

function tonext(page, max)
{
    if(max == page)
        alert("마지막 페이지입니다.");
    else
    {  
        currentpage++;
        movepage(currentpage, userid);
    }
}

function movepage(currentpage, userid)
{
  $.ajax({
      url: 'print_BL.php', // 데이터를 처리할 서버 파일 경로
      type: 'POST',
      data: {
        page : (currentpage-1)*7,
        userid : userid
      },
      success: function(response) {
        // 서버로부터 받은 데이터로 화면 업데이트
        $('.box').html(response);
      
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
}

window.onload= movepage(currentpage, userid);

function Getdetail(tr_per_reg_num) {
    // URL 생성 및 이동
    $(document).ready(function() 
    {
      document.cookie= "id="+tr_per_reg_num+";path=/;domain=hold.pe.kr;"
      var url = 'https://hold.pe.kr/directed/detailed.php?id='+tr_per_reg_num;
      window.location.href = url;
    })}
