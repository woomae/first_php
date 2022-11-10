<?php

include('db.php');

if(isset($_POST['user_id']) && isset($_POST['user_nick']) && isset($_POST['user_pass1']) && isset($_POST['user_pass2']))
{
    //보안강화(시큐어코딩)

    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_nick = mysqli_real_escape_string($db, $_POST['user_nick']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);
    $user_pass2 = mysqli_real_escape_string($db, $_POST['user_pass2']);

    //에러체크

    if(empty($user_id))
    {
        // echo "<script>
        // alert('아이디가 비어있어요');
        // history.back();
        // </script>";

        header('location: register_view.php?error=아이디가 비어있어요');
        exit();
    }
    else if(empty($user_nick))
    {
        // echo "<script>
        // alert('닉네임이 비어있어요');
        // location.replace('register_view.php');
        // </script>";

        header('location: register_view.php?error=닉네임이 비어있어요');
        exit();
    }
    else if(empty($user_pass1))
    {
        header('location: register_view.php?error=비밀번호가 비어있어요');
        exit();
        
    }
    else if(empty($user_pass2))
    {
        header('location: register_view.php?error=비밀번호확인란 비어있어요');
        exit();
    }
    else if($user_pass1 != $user_pass2){
        header('location: register_view.php?error=비밀번호가 일치하지 않아요');
        exit();
    }
    else{
        //암호화
        $md5 = md5($user_pass1); // 양방향 암호 =>복호화 가능
        echo $md5;

        echo '<br>';
        echo '<br>';

        $hash = password_hash($user_pass2, PASSWORD_DEFAULT); // 단방향 암호
        echo $hash;

        // 아이디,닉네임 중복체크

        //저장시키기



    }
    




    //저장

}
else
{
    //에러 메세지
}









?>