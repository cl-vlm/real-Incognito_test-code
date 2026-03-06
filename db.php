<?php
$host = "dpg-d6l9987gi27c73f6vb0g-a";
$dbname = "incognito_db";
$user = "incognito_db_user";
$pass = "KI1TosRdRhrNSPdazKdjP0cl4Hkx9wS9"; // image_dbdf6c에서 확인한 값

try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname";
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 테이블 자동 생성
    $conn->exec("CREATE TABLE IF NOT EXISTS users (id SERIAL PRIMARY KEY, username TEXT UNIQUE, password TEXT, star TEXT)");
    $conn->exec("CREATE TABLE IF NOT EXISTS board (num SERIAL PRIMARY KEY, title TEXT, author TEXT, content TEXT, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
} catch(PDOException $e) {
    // 연결 실패 시 에러 출력 (디버깅용)
    die("DB 연결 실패: " . $e->getMessage());
}
?>
