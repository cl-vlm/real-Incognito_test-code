<?php
include "db.php";

// 세션 체크 코드($_SESSION...)가 있다면 모두 삭제하세요.
$title = $_POST['title'];
$content = $_POST['content'];
$author = "Guest"; // 누구나 쓸 수 있게 Guest로 고정

// DOM Clobbering 취약점 유지
$content = str_ireplace("script", "x-script", $content);

$stmt = $conn->prepare("INSERT INTO board (title, author, content) VALUES (?, ?, ?)");
$stmt->execute([$title, $author, $content]);

echo "<script>alert('등록되었습니다.'); location.href='main.php';</script>";
?>
