<?php
include "db.php"; // PDO 연결이 포함된 파일

// 1. GET 방식으로 전달된 번호(num)를 받습니다.
$num = isset($_GET['num']) ? $_GET['num'] : null;

if ($num) {
    try {
        // 2. PostgreSQL은 데이터 타입을 엄격하게 따지므로 정수형으로 강제 변환합니다.
        $num = (int)$num;

        // 3. PDO 준비 구문(Prepared Statement)을 사용하여 삭제를 실행합니다.
        $stmt = $conn->prepare("DELETE FROM board WHERE num = ?");
        $stmt->execute([$num]);

        // 4. 삭제 성공 알림 후 게시판 목록으로 이동합니다.
        echo "<script>alert('게시물이 성공적으로 삭제되었습니다.'); location.href='main.php';</script>";
    } catch (PDOException $e) {
        // 에러 발생 시 메시지를 출력합니다.
        echo "삭제 중 에러 발생: " . $e->getMessage();
    }
} else {
    echo "<script>alert('잘못된 접근입니다.'); location.href='main.php';</script>";
}
?>
