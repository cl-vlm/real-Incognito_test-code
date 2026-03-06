let container = document.getElementById('container')

toggle = () => {
  container.classList.toggle('sign-in')
  container.classList.toggle('sign-up')
}

setTimeout(() => {
  container.classList.add('sign-in')
}, 200)

function handleSignup() {
    const id = document.getElementById('sign-id').value;
    const star = document.getElementById('sign-star').value;
    if(!id || !star) { alert("빈칸을 채워주세요!"); return; }
    alert(id + "님 가입 성공! 최애 연예인 " + star + "과 함께 즐거운 시간 보내세요.");
    toggle();
}

function handleLogin() {
    const id = document.getElementById('login-id').value;
    if(!id) { alert("아이디를 입력하세요!"); return; }
    alert(id + "님 환영합니다!");
    location.href = "main.html";
}