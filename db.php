<?php
// Render Postgres Instance 정보
$host = "dpg-d6l9987gi27c73f6vb0g-a"; // Hostname
$dbname = "incognito_db";             // Database
$user = "incognito_db_user";        // Username
$pass = "KI1TosRdRhrNSPdazKdjP0cl4Hkx9wS9";        // image_dbdf6c의 PASSWORD 섹션에서 확인

try {
    // PostgreSQL 전용 PDO 연결 방식 (mysqli 대신 이것을 써야 합니다)
    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 테이블 자동 생성 로직
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
    die("DB 연결 실패: " . $e->getMessage());
}
?>
