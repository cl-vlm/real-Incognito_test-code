<?php
include "db.php";
// 게시글 목록을 번호 내림차순으로 가져옵니다.
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
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>관리</th> </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row) { ?>
                <tr>
                    <td style="text-align:center;"><?= $row['num'] ?></td>
                    <td><a href="view.php?num=<?= $row['num'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
                    <td style="text-align:center;"><?= htmlspecialchars($row['author']) ?></td>
                    <td style="text-align:center;">
                        <button onclick="if(confirm('정말 삭제하시겠습니까?')) location.href='delete.php?num=<?= $row['num'] ?>'" style="background:#ff4d4d; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">삭제</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <div style="margin-top: 20px;">
            <button onclick="location.href='write.php'" style="padding:10px 20px; cursor:pointer;">새 글 쓰기</button>
            <button onclick="location.href='index.html'" style="padding:10px 20px; cursor:pointer; background:#757575; color:white; border:none; border-radius:5px;">홈으로</button>
        </div>
    </div>
</body>
</html>
