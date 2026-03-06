<?php
include "db.php";
$num = $_GET['num'];

// PDO 방식으로 수정
$stmt = $conn->prepare("DELETE FROM board WHERE num = ?");
if ($stmt->execute([$num])) {
    echo "<script>alert('삭제되었습니다.'); location.href='main.php';</script>";
} else {
    echo "삭제 실패";
}
?>
