<?php

$mb_id = $_GET['mb_id'];
include "db.php";

/* 쿼리 작성 */
$sql = "select * from member where mb_id = '$mb_id';";

/* 쿼리 전송 */
$result = mysqli_query($db, $sql);

/* 결과 가져오기 */
$array = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원목록</title>
    <style type="text/css">
        body{font-size:16px}
        a{text-decoration:none;color:rgb(0, 132, 255)}
        a:hover{color:rgb(255, 153, 0)}
        table{width:1328px;border-collapse:collapse}
        td{padding:10px 15px;text-align:center}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold}
        .brd{border-bottom:1px solid #999}
        table a{text-decoration:none;color:#000;border:1px solid #333;display:inline-block;padding:3px 5px;font-size:12px;border-radius:5px}
        table a:hover{border:0 none;background:rgb(0, 132, 255);color:#fff}
    </style>
    
</head>
<body>
    <h2>* 관리자 페이지 *</h2>
    <p> 관리자님 안녕하세요.</p>
    <p>
        <a href="root_view.php" class="bar">홈으로</a>
        <a href="list.php" class="bar">회원 관리</a>
        <a href="logout.php">로그아웃</a>
    </p>
    <hr>
    <table>
        <tr class="title">
            <td>번호</td>
            <td>이름</td>
            <td>아이디</td>
            <td>수정</td>
            <td>삭제</td>
        </tr>
        <tr class="brd">
            <!-- <td><?php echo $i; ?></td> -->
            <td><?php echo "1" ?></td>
            <td><?php echo $array["mb_nick"]; ?></td>
            <td><?php echo $array["mb_id"]; ?></td>
            <td><a href="edit.php?mb_id=<?php echo $array["mb_id"]; ?>">수정</a></td>
            <td><a href="delete.php?mb_id=<?php echo $array["mb_id"]; ?>" >삭제</a></td>
        </tr>
    </table>
</body>
</html>