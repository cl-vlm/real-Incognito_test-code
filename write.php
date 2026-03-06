<?php
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>WRITE - INCOGNITO</title>
    <link rel="stylesheet" href="index.css">
</head>
<body style="background: #f0f2f5;">
    <div class="write-container" style="padding: 50px; max-width: 700px; margin: auto; background: #fff; margin-top: 50px; border-radius: 15px;">
        <h2 style="margin-bottom: 20px; color: #4EA685;">새 글 작성</h2>
        <form action="write_process.php" method="POST">
            <input type="text" name="title" placeholder="제목을 입력하세요" required style="width: 100%; padding: 15px; margin-bottom: 15px;">
            <p style="margin-bottom: 15px; padding: 15px; background: #eee; border-radius: 8px;">
                작성자: <strong>Guest</strong> </p>
            <textarea name="content" placeholder="내용을 입력하세요" required style="width: 100%; height: 250px; padding: 15px; margin-bottom: 15px;"></textarea>
            <button type="submit" style="width: 100%; padding: 15px; background: #4EA685; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">게시글 등록</button>
        </form>
        <button onclick="location.href='main.php'" style="width: 100%; margin-top: 10px; padding: 10px; background: #757575; color: white; border: none; border-radius: 8px; cursor: pointer;">목록으로</button>
    </div>
</body>
</html>

