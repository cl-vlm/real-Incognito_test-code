<?php
include "db.php";
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
        /* 힌트 박스 스타일 */
        .hint-box {
            background-color: #e8f5e9;
            border-left: 5px solid #4EA685;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <div style="padding:50px; max-width:1000px; margin:auto; background: white; border-radius: 15px;">
        <h2>INCOGNITO PROJECT BOARD</h2>
        
        <div class="hint-box">
            <strong>💡 Challenge Hint:</strong> 
            게시판에 글을 작성하여 <code>window.config</code> 변수를 조작하고 플래그를 획득하세요. 
            정답 페이로드가 포함된 글을 직접 클릭했을 때 플래그가 나타납니다.
        </div>

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
            <button onclick="location.href='write.php'" style="padding: 10px 20px; cursor:pointer;">새 글 쓰기</button>
            <button onclick="location.href='index.html'" style="padding: 10px 20px; cursor:pointer;">홈으로</button>
        </div>
    </div>
</body>
</html>
