<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 페이지</title>
    <style type="text/css">
        body{font-size:16px}
        a{text-decoration:none;color:rgb(0, 132, 255)}
        a:hover{color:rgb(255, 153, 0)}
        .bar:after{content:"|";margin:0 6px 0 10px}
    </style>
</head>
<body>
    <h2>* 관리자 페이지 *</h2>
    <p>관리자님 안녕하세요.</p>
    <p>
        
        <a href="list.php" class="bar">회원 관리</a>
        <a href="search.php" class="bar">회원 검색</a>
        <a href="logout.php"">로그아웃</a>
    </p>
    <hr>
</body>
</html>