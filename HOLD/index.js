// DOM 요소 선택
const loadingScreen = document.querySelector("#loading-screen");
const mainContent = document.querySelector("#main-content");

// 로딩 스크린을 보여주는 함수
function showLoadingScreen() {
  loadingScreen.style.display = "flex";
  mainContent.style.display = "none";
}

// 로딩 스크린을 숨기고 메인 콘텐츠를 보여주는 함수
function hideLoadingScreen() {
  loadingScreen.style.display = "none";
  mainContent.style.display = "block";
}

// 서버와 DB 연결 함수
function connectToServerAndDB() {
  showLoadingScreen();


  hideLoadingScreen();
}

// 페이지가 로드될 때 서버와 DB 연결 함수 실행
window.onload = connectToServerAndDB;
