<?php
# 주소 아이디, 비밀번호, 데이터베이스
$db = mysqli_connect('localhost','root','password','level1');
if(!$db){
    echo "DB접속실패";
}
else
{
    echo "DB접속성공";
}
?>