function initMap() {
    // 현재 위치를 가져오는 함수
    navigator.geolocation.getCurrentPosition(function(position) {
      // 현재 위치를 변수에 저장
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      // 맵 생성 및 위치 설정
      var map = new google.maps.Map(document.getElementById("map"), {
        center: pos,
        zoom: 15
      });
      // 마커 생성
      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: "현재 위치"
      });
      
    });
}

function searchBloodDonationCenter() {
    var service = new google.maps.places.PlacesService(map);
  
    var request = {
      location: map.getCenter(),
      radius: '5000',  // 검색 반경 (미터 단위)
      query: '헌혈의 집'  // 검색어
    };
  
    service.textSearch(request, function(results, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        // 결과를 처리하는 코드
        console.log(results);
      }
    });
  }

function searchBloodDonationCenter() {
    var service = new google.maps.places.PlacesService(map);
  
    var request = {
      location: map.getCenter(),
      radius: '5000',  // 검색 반경 (미터 단위)
      query: '헌혈의 집'  // 검색어
    };
  
    service.textSearch(request, function(results, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        // 결과를 처리하는 코드
        for (var i = 0; i < results.length; i++) {
          var place = results[i];
          var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location
          });
        }
      }
    });
  }
  