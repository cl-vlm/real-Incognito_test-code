<?php
include "db.php";

$title = $_POST['title'];
$content = $_POST['content'];
$author = "Guest"; // 로그인을 없앴으므로 Guest로 고정

// 🚩 워게임 장치: script 태그만 치환 (DOM Clobbering은 허용)
$content = str_ireplace("script", "x-script", $content);

$stmt = $conn->prepare("INSERT INTO board (title, author, content) VALUES (?, ?, ?)");
$stmt->execute([$title, $author, $content]);

echo "<script>alert('등록 완료!'); location.href='main.php';</script>";
?>
