<?php
include "./inc/top.php";
?>  
<link rel="stylesheet" href="./assets/css/login.css">
<!-- ID 찾기 -->
<form action="./exec/login_exec.php" method ="POST" onSubmit="formChk();return false">
    <input value="find_id" type="hidden" name="db_gubun">  <!-- db구분 위하여 -->
    <div class="content">
        <div class="IDPASS">
            <ul>
                <li><h2>ID 찾기</h2></li>
                <li><p>이름</p></li>
                <li><input id='id_name' style="width:40%;" style type="text" name="name"> </li>
                <li><p>Email</p></li>
                <li class="email">
                    <!-- <input type="text" maxlength=6 name="sec_number1" placeholder=""> &nbsp - &nbsp
                    <input type="password" maxlength=7 name="sec_number2" placeholder=""> -->
                    <input type="text" id = 'id_email1' name="email1" maxlength="20" placeholder=""> @
                    <input type="text" id = 'id_email2' name="email2" maxlength="20" placeholder=""> 
                </li>
                <li><p>휴대폰 번호</p></li>
                <li class="phone">
                    <input type="text" minlength=3 maxlength=3 id = "id_phone1" name="phone1" placeholder=""> &nbsp - &nbsp
                    <input type="text" minlength=4 maxlength=4 id = "id_phone2" name="phone2" placeholder=""> &nbsp - &nbsp
                    <input type="text" minlength=4 maxlength=4 id = "id_phone3" name="phone3" placeholder="">
                </li>
                <li class="login_btn"><input id="find_exec" type="submit" value="찾기"></li>
                <li class="signup_btn"><button type="button"><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
        </div>
    </div>
</form>

<!-- PW 찾기 -->
<form action="./exec/login_exec.php" method ="POST" onSubmit="formChk_pw();return false">
    <input value="find_pass" type="hidden" name="db_gubun">  <!-- db구분 위하여 -->
    <div class="content" >
        <div class="IDPASS" style=" border-top:2px solid black; margin-top:5%; padding-top:3%;">
            <ul>
                <li><h2>PW 찾기</h2></li>
                <li><p>이름</p></li>
                <li><input id = 'pw_name' style="width:40%;" type="text" name="name"> </li>
                <li><p>ID</p></li>
                <li>
                    <input style="width:40%;" id= 'pw_id' type="text" name="id" placeholder="">
                </li>
                <li><p>Email</p></li>
                <li class="email">
                    <!-- <input type="text" maxlength=6 name="sec_number1" placeholder=""> &nbsp - &nbsp
                    <input type="password" maxlength=7 name="sec_number2" placeholder=""> -->
                    <input type="text" id = 'pw_email1' name="email1" maxlength="20" placeholder=""> @
                    <input type="text" id = 'pw_email2' name="email2" maxlength="20" placeholder=""> 
                </li>
                <li><p>휴대폰 번호</p></li>
                <li class="phone">
                    <input type="text" minlength=3 maxlength=3 id = "pw_phone1" name="phone1" placeholder=""> &nbsp - &nbsp
                    <input type="text" minlength=4 maxlength=4 id = "pw_phone2" name="phone2" placeholder=""> &nbsp - &nbsp
                    <input type="text" minlength=4 maxlength=4 id = "pw_phone3" name="phone3" placeholder="">
                </li>
                <li class="login_btn"><input type="submit" value="찾기"></li>
                <li class="signup_btn"><button type="button"><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
        </div>
    </div>
</form>

<script>
//ID alert
function formChk(){
    var getCheck= RegExp(/^[a-zA-Z0-9]{4,12}$/);
    var getemail= RegExp(/^[0-9a-zA-Z][0-9a-zA-Z\_\-]*[0-9a-zA-Z](\.[a-zA-Z]{2,6}){1,2}$/);
    var getName = RegExp(/^[가-힣]+$/);
    var getNum  = RegExp(/^[0-9]*$/);
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();

    if( !$('#id_name').val()){
        alert("이름을 입력하여주세요");
        $('#id_name').focus();
    }
    else if(!getName.test($('#id_name').val())){
        alert("이름을 한글로 입력해주세요");
        $('#id_name').focus();
    }
    else if(!getNum.test($("#id_phone1").val()) || !getNum.test($("#id_phone2").val()) || !getNum.test($("#id_phone3").val()) ){
        alert("휴대폰 번호를 숫자로 입력해주세요");
        $('#id_phone1').focus();
    }
    else if(!getCheck.test($("#id_email1").val())){
        alert('4글자 이하, 한글및 특수기호는 입력하실 수 없습니다.');
        $('#id_email1').focus();
    }
    else if( !$('#id_email1').val()){
        alert("email을 입력하여주세요");
        $('#id_email1').focus();
    }
    else if( !$('#id_email2').val()){
        alert("email을 입력하여주세요");
        $('#id_email2').focus();
    }
    else if(!getemail.test($("#id_email2").val())){
        alert('이메일 형식을 확인해주세요');
        $('#id_email2').focus();
    }
    else{
        document.joinForm1.submit();
       return true;
    }
}
//비밀번호 alert
function formChk_pw(){
    var getCheck= RegExp(/^[a-zA-Z0-9]{4,12}$/);
    var getemail= RegExp(/^[0-9a-zA-Z][0-9a-zA-Z\_\-]*[0-9a-zA-Z](\.[a-zA-Z]{2,6}){1,2}$/);
    var getName = RegExp(/^[가-힣]+$/);
    var getNum  = RegExp(/^[0-9]*$/);
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();
   
    if( !$('#pw_name').val()){
        alert("이름을 입력하여주세요");
        $('#pw_name').focus();
    }
    else if(!getName.test($('#pw_name').val())){
        alert("이름을 한글로 입력해주세요");
        $('#pw_name').focus();
    }
    else if(!$('#pw_id').val()){
        alert("ID를 입력하여주세요");
        $('#pw_id').focus();
    }
    else if( !$('#pw_id').val()){
        alert(" id를 입력하여주세요");
        $('#pw_id').focus();
    }
    else if(!getCheck.test($("#pw_id").val())){
        alert('4글자 이하, 한글및 특수기호는 입력하실 수 없습니다.');
        $("#pw_id").focus();
    }
    else if( !$('#pw_email1').val()){
        alert("email을 입력하여주세요");
        $('#pw_email1').focus();
    }
    else if( !$('#pw_email2').val()){
        alert("email을 입력하여주세요");
        $('#pw_email2').focus();
    }
    else if(!getCheck.test($("#pw_email1").val())){
        alert('4글자 이하, 한글및 특수기호는 입력하실 수 없습니다.');
        $('#pw_email1').focus();
    }
    else if(!getemail.test($("#pw_email2").val())){
        alert('이메일 형식을 확인해주세요');
        $('#pw_email2').focus();
    }
    else if(!getNum.test($("#pw_phone1").val()) || !getNum.test($("#pw_phone2").val()) || !getNum.test($("#pw_phone3").val()) ){
        alert("휴대폰 번호를 숫자로 입력해주세요");
        $('#pw_phone1').focus();
    }
    else{
        document.joinForm1.submit();
       return true;
    }
}
</script>