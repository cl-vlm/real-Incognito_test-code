<?php
session_start();
include "db.php";

$id = $_POST['username'] ?? '';
$pw = $_POST['password'] ?? '';

if($id && $pw) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$id, $pw]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['userid'] = $id;
        echo "<script>alert('로그인 성공!'); location.href='main.php';</script>";
    } else {
        echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.back();</script>";
    }
}
?>
