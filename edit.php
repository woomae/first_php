<?php
session_start();

if(isset($_GET['mb_id'])){
    $mb_id = $_GET['mb_id'];
}
else{
    $mb_id = $_SESSION['mb_id'];
    echo "$mb_id";
}
/* DB 연결 */
include "db.php";

/* 쿼리 작성 */
$sql = "select * from member where mb_id = '$mb_id';";

/* 쿼리 전송 */
$result = mysqli_query($db, $sql);

/* 결과 가져오기 */
$array = mysqli_fetch_array($result);

?>
<style type="text/css">
  body,select,option,button{font-size:16px}
  input{border:1px solid #999;font-size:14px;padding:5px 10px}
  input,button,select,option{vertical-align:middle}
  form{width:700px;margin:auto}
  input[type=checkbox]{width:20px;height:20px}
  span{font-size:14px;color:#f00}
  legend{font-size:20px;text-align:center}
  p span{display:block;margin-left:130px}
  button{cursor:pointer}
  .txt{display:inline-block;width:120px}
  .btn{background:#fff;border:1px solid #999;font-size:14px;padding:4px 10px}
  .btn_wrap{text-align:center}
  .email_sel{width:120px;height:28px}
  .postal_code{width:100px;margin-bottom:5px}
  .addr1{width:300px;margin-bottom:5px}
  .addr2{width:300px;margin-bottom:5px}
</style>
<script type="text/javascript">
function edit_check(){
    
    var pwd = document.getElementById("pwd");
    var repwd = document.getElementById("repwd");


    

    if(pwd.value){
        if(pwd.value != repwd.value){
            var err_txt = document.querySelector(".err_repwd");
            err_txt.textContent = "비밀번호를 확인해 주세요.";
            repwd.focus();
            return false;
        };
    };

    
};


</script>
<form name="edit_form" action="edit_ok.php?mb_id=<?php echo $array["mb_id"]; ?>" method="post" onsubmit="return edit_check()">
<fieldset>
    <legend>정보 수정</legend>
    <p>
        <div class="txt">이름</div>
        <?php echo $array["mb_nick"]; ?>
    </p>

    <p>
        <div class="txt">아이디</div>
        <?php echo $array["mb_id"]; ?>
    </p>

    <p>
        <label for="pwd" class="txt">비밀번호</label>
        <input type="password" name="pwd" id="pwd" class="pwd">
        <br>
        
    </p>

    <p>
        <label for="repwd" class="txt">비밀번호 확인</label>
        <input type="password" name="repwd" id="repwd" class="repwd">
        <br>
        <span class="err_repwd"></span>
    </p>
    

    <p class="btn_wrap">
        <button type="button" class="btn" onclick="history.back()">이전으로</button>
        <button type="submit" class="btn">정보수정</button>
    </p>
</fieldset>
</form>