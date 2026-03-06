<?php
include "db.php";
$num = $_GET['num'];
$stmt = $conn->prepare("SELECT * FROM board WHERE num = ?");
$stmt->execute([$num]);
$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>VIEW - INCOGNITO</title>
    <link rel="stylesheet" href="index.css">
</head>
<body style="background: #f0f2f5;">
    <div style="padding: 50px; max-width: 800px; margin: auto; background: #fff; margin-top: 50px; border-radius: 15px;">
        <h2><?= htmlspecialchars($row['title']) ?></h2>
        <hr>
        <div style="min-height: 200px; padding: 20px;"><?= $row['content'] ?></div>
        <button onclick="location.href='main.php'">목록으로</button>
    </div>

    <script>
        // DOM Clobbering 타겟
        var cfg = window.config; 
        var targetUrl = cfg ? (cfg.href || cfg.libUrl) : "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js";

        if (targetUrl && String(targetUrl).includes("getSuccess")) {
            fetch('check_flag.php?key=getSuccess')
                .then(res => res.text())
                .then(data => alert("FLAG: " + data));
        }
    </script>
</body>
</html>
