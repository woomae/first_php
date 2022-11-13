<?php

include('db.php');
session_start();
$user_id = $_SESSION['mb_id'];

// sql로 탈퇴처리

$destroy = "DELETE FROM member where mb_id = '$user_id'";
mysqli_query($db, $destroy);
session_unset();
session_destroy();
echo "<script>alert('탈퇴 완료');</script>";
header("location: register_view.php");



exit();

?>