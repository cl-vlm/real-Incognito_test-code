let container = document.getElementById('container');

// 화면 전환 함수
const toggle = () => {
  container.classList.toggle('sign-in');
  container.classList.toggle('sign-up');
};

// 페이지 로드 후 0.2초 뒤에 로그인 폼을 표시
setTimeout(() => {
  if (container) {
    container.classList.add('sign-in');
  }
}, 200);
