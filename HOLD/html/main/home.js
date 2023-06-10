function openNewWindow() {
    var url = location.href='https://www.bloodinfo.net/knrcbs/bh/resv/resvBldHousStep1.do?mi=1094';
    window.open(url, '_blank');
  }

// 위치 정보를 가져오는 함수
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(saveLocation);
  } else {
    console.log("Geolocation is not supported by this browser.");
  }
}

// 위치 정보를 쿠키에 저장하는 함수
function saveLocation(position) {
  // 위치 정보를 쿠키에 저장
  document.cookie = `lat=${position.coords.latitude}; path=/`;
  document.cookie = `lng=${position.coords.longitude}; path=/`;
}

// 페이지 로드 시 위치 정보 가져오기
window.onload = function() {
  getLocation();
};


function tonotice(id) {
    // URL 생성 및 이동
    $(document).ready(function() 
    {
      document.cookie= "id="+id+";path=/;domain=hold.pe.kr;"
      var url = 'https://hold.pe.kr/main/noticeDe.php?id='+id;
      window.location.href = url;
    })} 

function Getdetail(tr_per_reg_num) {
    // URL 생성 및 이동
    $(document).ready(function() 
    {
      document.cookie= "id="+tr_per_reg_num+";path=/;domain=hold.pe.kr;"
      var url = 'https://hold.pe.kr/directed/detailed.php?id='+tr_per_reg_num;
      window.location.href = url;
      console.log(url);
    })} 

var cookies = document.cookie;  // 쿠키 문자열 가져오기
console.log(cookies);  // 쿠키 문자열 출력

// 특정 쿠키 값 가져오기
function getCookie(name) {
  var cookieArr = document.cookie.split(";");  // 쿠키 문자열을 세미콜론으로 분리하여 배열로 저장

  for(var i = 0; i < cookieArr.length; i++) {
    var cookiePair = cookieArr[i].split("=");  // 쿠키 문자열을 등호로 분리하여 이름과 값의 쌍으로 저장
    var cookieName = cookiePair[0].trim();  // 쿠키 이름 가져오기

    if(cookieName === name) {
      return cookiePair[1];  // 해당 쿠키 값 반환
    }
  }

  return null;  // 해당하는 쿠키가 없을 경우 null 반환
}

// row는 위도 경도 수혈자 번호를 가지고 있는 객체로 푸시알림에 사용될 예정
// 자료형을 배열
function Getpush(rows) {
    var lat = getCookie("lat");
    var lng = getCookie("lng");
    

    console.log("현재 Getpush 실행 중");
    console.log(rows);
    for (var i = 0; i < rows.length; i++) {
      var row = rows[i];
      console.log("반복문 진행중");
      console.log(row);
      var distance = getDistance(lat, lng, row['Lat'], row['Lng']);
      console.log(distance);
      console.log('lat : '+row['Lat']);
      console.log('Lng : '+row['Lng']);
      if (distance <= 5) {
        console.log('notify 실행');
        notify(row['tr_per_reg_num']);
        console.log('현재 ' + row['tr_per_reg_num'] + "의 알림이 실행 중");
      }
    }
  }
  

// 두 지점 사이의 거리 계산 함수 (단위: km)
function getDistance(lat1, lon1, lat2, lon2) {
  var R = 6371;  // 지구 반지름 (단위: km)

  var dLat = deg2rad(lat2 - lat1);
  var dLon = deg2rad(lon2 - lon1);

  var a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);

  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var distance = R * c;

  return distance;
}

// 각도를 라디안으로 변환하는 함수
function deg2rad(deg) {
  return deg * (Math.PI / 180);
}

// 전역 변수로 Notification 객체 선언
var notification;

function notify(s) {
    if (!("Notification" in window)) {
        alert("현재 브라우저에서 웹 푸시 알림을 지원하지 않습니다.");
        return;
    }
    if (Notification.permission !== 'granted') {
        alert('notification is disabled');
    }
    else {
        console.log("알림 퍼미션 허용");
        notification = new Notification('하나의 생명을 구해주세요', {
            icon: '../image/push_logo.png',
            body: '지정 번호 : '+ s,
        });
        notification.onclick = function () {
            sessionStorage.setItem(s, 'visit');
            Getdetail(s);
        };
    }
}

