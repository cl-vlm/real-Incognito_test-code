<?php
session_start();
include "db.php";

if(!isset($_SESSION['userid'])) die("로그인이 필요합니다.");

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_SESSION['userid'];

// 워게임 장치: script 단어만 무력화
$content = str_ireplace("script", "x-script", $content);

$stmt = $conn->prepare("INSERT INTO board (title, author, content) VALUES (?, ?, ?)");
$stmt->execute([$title, $author, $content]);

echo "<script>alert('등록되었습니다.'); location.href='main.php';</script>";
?>
