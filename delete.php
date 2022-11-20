<?php

$mb_id = $_GET['mb_id'];
// echo $idx;
// exit;

/*  DB 접속 */
include "db.php";


/* 쿼리 작성 */
$sql = "delete from member where mb_id='$mb_id';";
// echo $sql;
// exit;

/* 데이터베이스에 쿼리 전송 */
mysqli_query($db, $sql);


/* DB(연결) 종료 */
mysqli_close($db);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"list.php\";
    </script>
";
?>