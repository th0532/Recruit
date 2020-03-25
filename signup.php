<?php
include "./inc/top.php";
?>  
<link rel="stylesheet" href="./assets/css/login.css">
<!-- 회원가입 -->
<form action="./exec/login_exec.php" method ="POST">

<input value="signup" type="hidden" name="db_gubun">  <!-- db구분 위하여 -->
    <div class="content">
        <div class="signup">
        <ul>
                <li><p>이름</p></li>
                <li><input style="width:30%;" type="text" name="name"> </li>
                <li><p >나이</p></li>
                <li><input style="width:30%;" type="text" name="age" > </li>
                <li><p>휴대폰 번호</p></li>
                <li class="phone">
                    <input type="text" name="phone1" placeholder=""> &nbsp - &nbsp
                    <input type="text" name="phone2" placeholder=""> &nbsp - &nbsp
                    <input type="text" name="phone3" placeholder="">
                </li>
                <li><p>아이디</p></li>
                <li><input type="text" name="id" placeholder="ID 를 입력해 주세요"> </li>
                <li><p>비밀번호</p></li>
                <li><input type="password" name="pass" placeholder="PassWord 를 입력해 주세요"> </li>
                <li><p>비밀번호 확인</p></li>
                <li><input type="password" placeholder="PassWord 를 입력해 주세요"> </li>
                
                <li class="login_btn"><input type="submit" value="회원가입"></li>
                <li class="signup_btn"><button><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
        </div>
    </div>
</form>