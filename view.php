<?php
include "db.php";
$num = $_GET['num'];
$sql = "SELECT * FROM board WHERE num = $num";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>VIEW - INCOGNITO</title>
    <link rel="stylesheet" href="index.css">
    <style>
        .view-container { padding: 50px; max-width: 800px; margin: auto; background: #fff; margin-top: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .view-header { border-bottom: 2px solid #4EA685; padding-bottom: 10px; margin-bottom: 20px; }
        .content-box { line-height: 1.8; white-space: pre-wrap; min-height: 300px; }
    </style>
</head>
<body style="background: #f0f2f5;">
    <div class="view-container">
        <div class="view-header">
            <h2><?php echo $row['title']; ?></h2>
            <p style="color: #757575;">작성자: <strong><?php echo $row['author']; ?></strong> | 날짜: <?php echo $row['reg_date']; ?></p>
        </div>
        
        <div class="content-box"><?php echo $row['content']; ?></div>
        
        <br>
        <button class="btn" onclick="location.href='main.php'" style="background: #757575;">목록으로</button>
    </div>

<script>
    // [DOM Clobbering 핵심 로직]
    // window.config가 HTML 요소로 덮어씌워졌다면 cfg는 그 요소를 가리킵니다.
    var cfg = window.config;

    // 만약 cfg가 HTML 요소(Anchor)라면 .href를 가져오고, 
    // 아니라면 기존처럼 libUrl 속성을 찾습니다.
    var targetUrl = "";
    if (cfg) {
        // cfg가 <a> 태그면 cfg.href를, 일반 객체면 cfg.libUrl을 사용
        targetUrl = cfg.href || cfg.libUrl || String(cfg);
    } else {
        targetUrl = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js";
    }

    console.log("검출된 객체:", cfg);
    console.log("최종 분석된 URL:", targetUrl);

    function getSuccess() {
        // check_flag.php로 요청을 보냄
        fetch('check_flag.php?key=getSuccess')
            .then(response => response.text())
            .then(data => {
                alert("성공! 플래그: " + data);
            })
            .catch(err => console.error("에러 발생:", err));
    }

    // 분석된 URL 문자열에 'getSuccess'가 포함되어 있으면 플래그 함수 실행
    if (targetUrl && String(targetUrl).includes("getSuccess")) {
        getSuccess();
    }
</script>
</body>
</html>