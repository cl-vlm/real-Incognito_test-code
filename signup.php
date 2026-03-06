<?php
include "db.php";

$id = $_POST['username'];
$pw = $_POST['password'];
$star = $_POST['star'];

try {
    $sql = "INSERT INTO users (username, password, star) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$id, $pw, $star])) {
        echo "<script>
            alert('$id ❤️ $star 계정이 생성되었습니다.');
            location.href='index.html';
        </script>";
    }
} catch(PDOException $e) {
    echo "에러: " . $e->getMessage();
}
?>
