<?php
// SQLite 사용 (파일 기반 DB)
try {
    $conn = new PDO("sqlite:database.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 게시판 테이블 생성
    $conn->exec("CREATE TABLE IF NOT EXISTS board (
        num INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        author TEXT,
        content TEXT,
        reg_date DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // 테스트용 데이터 하나 삽입 (선택 사항)
    $stmt = $conn->query("SELECT COUNT(*) FROM board");
    if ($stmt->fetchColumn() == 0) {
        $conn->exec("INSERT INTO board (title, author, content) VALUES ('Welcome!', 'Admin', '게시판이 시작되었습니다.')");
    }
} catch(PDOException $e) {
    die("DB 연결 실패: " . $e->getMessage());
}
?>
