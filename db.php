<?php
$host = "localhost";
$user = "root";
$pw = "";
$dbName = "incognito_test_db"; 

$conn = mysqli_connect($host, $user, $pw, $dbName);

if (!$conn) {
    die("DB 연결 실패: " . mysqli_connect_error());
}
?>