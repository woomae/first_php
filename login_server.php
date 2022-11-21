<?php
session_start();
include('db.php');
if(isset($_POST['user_id']) && isset($_POST['user_pass1']))
{
    //보안강화(시큐어코딩)
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);
    //에러체크
    if(empty($user_id)){
        header('location: login_view.php?error=아이디가 비어있어요');
        exit();
    }
    else if(empty($user_pass1))
{
        header('location: login_view.php?error=비밀번호가 비어있어요');
        exit();
    }
    else{
        $sql = "select * from member where mb_id = '$user_id'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)=== 1){
            $row = mysqli_fetch_assoc($result);
            $check = $row['password'];
            
            if($user_pass1 === $check)
            {
                $_SESSION['mb_id'] = $array['mb_id'];
                $_SESSION['mb_nick'] = $array['mb_nick'];
                $_SESSION['no'] = $array['no'];
                if($user_id ==='root'){
                    header('location: root_view.php');
                    exit();
                }
                else{
                    header('location: mypage/mypage.php');
                    exit();
                }
            }
            else
            {
                header('location: login_view.php?error=로그인에 실패하였습니다.');
                exit();
            }
        }
        else
        {
            header('location: login_view.php?error=아이디가 잘못되었습니다.');
                exit();
        }

    }
}
else
{
    header('location: login_view.php?error=알수없는 오류가 발생하였습니다.');
    exit();
}
?>