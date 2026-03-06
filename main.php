<?php
include "db.php";
$stmt = $conn->query("SELECT * FROM board ORDER BY num DESC");
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>INCOGNITO BOARD</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div style="padding:50px; max-width:900px; margin:auto;">
        <h2>INCOGNITO PROJECT BOARD</h2>
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="background:#4EA685; color:white;">
                    <th>번호</th><th>제목</th><th>작성자</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row) { ?>
                <tr>
                    <td style="text-align:center;"><?= $row['num'] ?></td>
                    <td><a href="view.php?num=<?= $row['num'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
                    <td style="text-align:center;"><?= htmlspecialchars($row['author']) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <button onclick="location.href='write.php'">새 글 쓰기</button>
    </div>
</body>
</html>
