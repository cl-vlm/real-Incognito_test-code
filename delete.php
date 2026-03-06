<?php
include "db.php";
$num = $_GET['num'];

$sql = "DELETE FROM board WHERE num = $num";
mysqli_query($conn, $sql);
echo "<script>alert('삭제되었습니다.'); location.href='main.php';</script>";
?>