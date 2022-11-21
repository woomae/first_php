<?php
include('db.php');
if(isset($_POST['user_id']) && isset($_POST['user_nick']) && isset($_POST['user_pass1']) && isset($_POST['user_pass2']))
{
    //보안강화(시큐어코딩)

    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_nick = mysqli_real_escape_string($db, $_POST['user_nick']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);
    $user_pass2 = mysqli_real_escape_string($db, $_POST['user_pass2']);

    #주소창 GET
    $user_info = "user_id=".$user_id."&user_nick=".$user_nick;

    //에러체크
    if(empty($user_id))
    {
        // echo "<script>
        // alert('아이디가 비어있어요');
        // history.back();
        // </script>";

        header("location: register_view.php?error=아이디가 비어있어요&$user_info");
        exit();
    }
    else if(empty($user_nick))
    {
        // echo "<script>
        // alert('닉네임이 비어있어요');
        // location.replace('register_view.php');
        // </script>";

        header("location: register_view.php?error=닉네임이 비어있어요&$user_info");
        exit();
    }
    else if(empty($user_pass1))
    {
        header("location: register_view.php?error=비밀번호가 비어있어요&$user_info");
        exit();
        
    }
    else if(empty($user_pass2))
    {
        header("location: register_view.php?error=비밀번호확인란 비어있어요&$user_info");
        exit();
    }
    else if($user_pass1 != $user_pass2){
        header("location: register_view.php?error=비밀번호가 일치하지 않아요&$user_info");
        exit();
    }
    else{
        
        
        // 아이디,닉네임 중복체크

        $sql_same = "SELECT * FROM member where mb_id = '$user_id' and mb_nick = '$user_nick'";
        $order = mysqli_query($db, $sql_same);

        if(mysqli_num_rows($order)>0)
        {
            header("location: register_view.php?error=아이디 또는 닉네임이 이미 있어요&$user_info");
            exit();
            
        }
        else
        {
            $sql_save = "insert into member(mb_id,mb_nick,password) values('$user_id','$user_nick','$user_pass1')";
            $result = mysqli_query($db, $sql_save);

            if($result){

                header("location: register_view.php?success=성공적으로 가입되었습니다.&$user_info");
                exit();
            }
            else{
                header("location: register_view.php?error=가입에 실패하였습니다.&$user_info");
                exit();
            }
        }
    }
}
else
{
    header("location: register_view.php?error=알수없는 오류가 발생하였습니다.&$user_info");
    exit();
}
?>