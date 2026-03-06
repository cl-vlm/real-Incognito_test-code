<?php
include "db.php";

$num = $_GET['num'] ?? null;

if ($num) {
    try {
        // PostgreSQL의 SERIAL(ID) 타입에 맞게 정수로 변환
        $num = (int)$num;

        $stmt = $conn->prepare("DELETE FROM board WHERE num = ?");
        $stmt->execute([$num]);

        echo "<script>alert('삭제 완료'); location.href='main.php';</script>";
    } catch (PDOException $e) {
        echo "삭제 실패: " . $e->getMessage();
    }
} else {
    echo "<script>location.href='main.php';</script>";
}
?>
