<?php
include "db.php";
$sql = "SELECT * FROM board ORDER BY num DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>INCOGNITO PROJECT BOARD</title>
    <link rel="stylesheet" href="index.css">
    <style>
        .board-container { padding: 50px; max-width: 900px; margin: auto; background: #fff; min-height: 100vh; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header-box { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #4EA685; padding-bottom: 15px; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #4EA685; color: white; padding: 15px; }
        td { border-bottom: 1px solid #eee; padding: 15px; text-align: center; }
        .btn { background: #4EA685; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; text-decoration: none; font-weight: bold; }
        .del-btn { background: #ff4d4d; padding: 5px 10px; font-size: 12px; }
    </style>
</head>
<body style="background: #f0f2f5;">
    <div class="board-container">
        <div class="header-box">
            <h2>INCOGNITO PROJECT BOARD</h2>
            <button class="btn" onclick="location.href='index.html'" style="background: #757575;">LOGOUT</button>
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
                <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['num']; ?></td>
                    <td style="text-align: left;">
                        <a href="view.php?num=<?php echo $row['num']; ?>"><?php echo $row['title']; ?></a>
                    </td>
                    <td><?php echo $row['author']; ?></td>
                    <td>
                        <button class="btn del-btn" onclick="if(confirm('정말 삭제할까요?')) location.href='delete.php?num=<?php echo $row['num']; ?>'">삭제</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <button class="btn" onclick="location.href='write.php'">새 글 쓰기</button>
    </div>
</body>
</html>