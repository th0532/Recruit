<?php
include "./inc/top.php";
include "./inc/dbconnect.php";

    $name    = $_POST['name'];
    $id      = $_POST['id'];
    $email1    = $_POST['email1'];
    $email2    = $_POST['email2'];
    $email     = $email1."@".$email2;
    $phone1  = $_POST['phone1'];
    $phone2  = $_POST['phone2'];
    $phone3  = $_POST['phone3'];
    $phone = $phone1."-".$phone2."-".$phone3;

    $query = "select * from login where name ='$name' AND email ='$email'AND phone ='$phone' AND id ='$id'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
    
    if($name == '' || $id == '' || $email1 == '' || $email2 ==''){
        echo "<script>window.alert('정보를 모두 입력하여주세요')</script>";
        echo "<script>location.href='./find.php';</script>";
    }
    else if (!isset($row['id'])){
        echo "<script>window.alert('등록한 정보가 없습니다.')</script>";
        echo "<script>location.href='./find.php';</script>";
    }
    else{
        echo "<script>window.alert('패스워드를 변경하세요.')</script>";
    }
    ?>

<link rel="stylesheet" href="./assets/css/login.css">
<!-- pw update -->
<form action="./exec/login_exec.php" method ="POST" onSubmit="formChk_update(); return false">
        <input value="update_pass"  type="hidden" name="db_gubun">  
        <input value=<?=$name?>     type="hidden" id= "db_name" name="db_name">  
        <input value=<?=$id?>       type="hidden" id= "db_id" name="db_id">  
        <input value=<?=$email?>    type="hidden" id= "db_email1" name="db_email">  
        <input value=<?=$phone?>    type="hidden" id= "db_email2" name="db_phone"> 
    <div class="content" >
        <div class="IDPASS" style=" border-top:2px solid black; margin-top:5%; padding-top:3%;">
            <ul>
                <li><h2>패스워드 변경</h2></li>
                <li><p>새로운 비밀번호</p></li>
                <li><input type="password" name="pass" id ="password1" > </li>
                
                <li><p>비밀번호 확인</p></li>
                <li><input type="password" id ="password2" > </li>
                <li class="login_btn"><input type="submit" value="변경"></li>
                <li class="signup_btn"><button type="button"><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
        </div>
    </div>
</form>

<script>

//비밀번호 alert
function formChk_update(){
    password1 = $("#password1").val();
    password2 = $("#password2").val();
    if(!password1 || !password2){
        alert("패스워드를 입력하여주세요");
        $('#password1').focus();
    }
    else if(password1 != password2){
        alert("패스워드가 일치하지 않습니다.");
        $('#password1').val('');
        $('#password2').val('');
    }
    else if(password1.length < 6 || password2.length < 6){
        alert("패스워드를 6자리 이상으로 입력해주세요");
        $('#password1').val('');
        $('#password2').val('');
    }
    else{
        document.joinForm1.submit();
       return true;
    }
}
</script>