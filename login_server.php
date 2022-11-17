<?php
session_start();
include('db.php');

if(isset($_POST['user_id']) && isset($_POST['user_pass1']))
{
    //보안강화(시큐어코딩)

    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);


    //에러체크

    if(empty($user_id))
    {
        // echo "<script>
        // alert('아이디가 비어있어요');
        // history.back();
        // </script>";

        header('location: login_view.php?error=아이디가 비어있어요');
        exit();
    }
    
    else if(empty($user_pass1))
    {
        header('location: login_view.php?error=비밀번호가 비어있어요');
        exit();
        
    }
    else
    {

        $sql = "select * from member where mb_id = '$user_id'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result)=== 1)
        {
            #1. 해당열을 가져옴
            #2. 배열로 가져옴
            #3. print_r은 배열 출력함수
            // $row = mysqli_fetch_assoc($result);
            // print_r($row); //배열출력
            // echo '<br>';
            // echo '<br>';
            // var_dump($row);// 더많은 정보 출력
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];
            

            if(password_verify($user_pass1, $hash))
            {
                $_SESSION['mb_id'] = $row['mb_id'];
                $_SESSION['mb_nick'] = $row['mb_nick'];
                $_SESSION['no'] = $row['no'];
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