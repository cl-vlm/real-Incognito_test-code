<?php
session_start();
include "db.php";

// 로그인 체크 (최소한의 보안)
if(!isset($_SESSION['userid'])) {
    die("<script>alert('로그인이 필요합니다.'); location.href='index.html';</script>");
}

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_SESSION['userid'];

/* 🚩 워게임 장치: 가짜 방어 로직 
   'script'라는 단어를 'x-script'로 치환합니다. 
   이로 인해 일반적인 XSS 공격은 막히지만, <a>나 <div> 태그를 이용한 
   DOM Clobbering 공격은 그대로 허용하게 됩니다.
*/
$content = str_ireplace("script", "x-script", $content);

// DB에 저장 (내용을 그대로 저장해야 취약점이 발생함)
$sql = "INSERT INTO board (title, author, content) VALUES ('$title', '$author', '$content')";
mysqli_query($conn, $sql);

echo "<script>alert('글이 등록되었습니다.'); location.href='main.php';</script>";
?>