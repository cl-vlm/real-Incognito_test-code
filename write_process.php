<?php
include "db.php";

$title = $_POST['title'] ?? 'No Title';
$content = $_POST['content'] ?? '';
$author = "Guest"; // 세션 대신 Guest로 고정

// 🚩 DOM Clobbering 취약점 유지를 위해 script만 치환
$content = str_ireplace("script", "x-script", $content);

try {
    $stmt = $conn->prepare("INSERT INTO board (title, author, content) VALUES (?, ?, ?)");
    $stmt->execute([$title, $author, $content]);
    echo "<script>alert('게시글이 등록되었습니다.'); location.href='main.php';</script>";
} catch (PDOException $e) {
    echo "등록 에러: " . $e->getMessage();
}
?>
