<?php
include "db.php";

// 사용자가 입력한 값 가져오기
$id = $_POST['username'];
$pw = $_POST['password'];
$star = $_POST['star'];

// DB에 저장하는 쿼리
$sql = "INSERT INTO users (username, password, star) VALUES ('$id', '$pw', '$star')";

if (mysqli_query($conn, $sql)) {
    // 요청하신 대로 ID와 좋아하는 연예인(Star)을 포함한 알림창 띄우기
    echo "<script>
        alert('$id ❤️ $star 계정이 생성되었습니다.');
        location.href='index.html';
    </script>";
} else {
    echo "에러: " . mysqli_error($conn);
}
?>