<?php
include "db.php";
// 에러 디버깅을 위해 추가
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $stmt = $conn->query("SELECT * FROM board ORDER BY num DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("데이터를 불러오지 못했습니다: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>INCOGNITO BOARD</title>
    <link rel="stylesheet" href="index.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #4EA685; color: white; }
        .del-btn { background-color: #ff4d4d; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div style="padding:50px; max-width:1000px; margin:auto; background: white; border-radius: 15px;">
        <h2>INCOGNITO PROJECT BOARD</h2>
        <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>관리</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($rows) > 0): ?>
                    <?php foreach($rows as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['num']) ?></td>
                        <td style="text-align: left;">
                            <a href="view.php?num=<?= $row['num'] ?>"><?= htmlspecialchars($row['title']) ?></a>
                        </td>
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td>
                            <button class="del-btn" onclick="if(confirm('정말 삭제할까요?')) location.href='delete.php?num=<?= $row['num'] ?>'">삭제</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">게시글이 없습니다.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            <button onclick="location.href='write.php'" style="padding: 10px 20px;">새 글 쓰기</button>
            <button onclick="location.href='index.html'" style="padding: 10px 20px;">홈으로</button>
        </div>
    </div>
</body>
</html>
