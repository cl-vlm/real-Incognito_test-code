<?php
// Render Connections 섹션에서 복사한 정보들
$host = "dpg-d6l9987gi27c73f6vb0g-a"; 
$dbname = "incognito_db";
$user = "incognito_db_user";
$pass = "KI1TosRdRhrNSPdazKdjP0cl4Hkx9wS9"; 

try {
    // PostgreSQL 연결 (포트 5432)
    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 테이블 자동 생성
    $conn->exec("CREATE TABLE IF NOT EXISTS board (
        num SERIAL PRIMARY KEY,
        title TEXT,
        author TEXT,
        content TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id SERIAL PRIMARY KEY,
        username TEXT UNIQUE,
        password TEXT,
        star TEXT
    )");

} catch(PDOException $e) {
    // 에러 발생 시 메시지 출력
    die("DB 연결 실패: " . $e->getMessage());
}
?>
