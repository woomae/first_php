<?php
/* 세션 시작 */
session_start();
if(isset($_SESSION["mb_id"])){
    $mb_id = $_SESSION["mb_id"];
}
else{
    $mb_id = $_GET['mb_id'];
}


/* 이전 페이지에서 값 가져오기 */
$pwd = $_POST["pwd"];

// 값 확인
echo "비밀번호 : ".$pwd."<br>";

// exit;


/*  DB 접속 */
include "db.php";


/* 쿼리 작성 */
// update 테이블명 set 필드명=값, 필드명=값, ....;
if(!$pwd){
    $sql = "update member set where mb_id='$mb_id';";
} else{
    $sql = "update member set password='$pwd' where mb_id='$mb_id';";
};

// exit;


/* 데이터베이스에 쿼리 전송 */
mysqli_query($db, $sql);




/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정보가 수정되었습니다.\");
        location.href = \"list.php\";
    </script>
";
?>