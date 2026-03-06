<?php
session_start(); // 세션 시작
include "db.php";

$id = $_POST['username'];
$pw = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$id' AND password='$pw'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['userid'] = $id; // 세션에 ID 저장
    echo "<script>alert('로그인 성공!'); location.href='main.php';</script>";
} else {
    echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.back();</script>";
}
?>