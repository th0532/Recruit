<?php
include "./inc/top.php";
?>  
<link rel="stylesheet" href="./assets/css/login.css">
<!-- ID 찾기 -->
<form action="./exec/login_exec.php" method ="POST">
    <input value="find_id" type="hidden" name="db_gubun">  <!-- db구분 위하여 -->
    <div class="content">
        <div class="IDPASS">
            <ul>
                <li><h2>ID 찾기</h2></li>
                <li><p>이름</p></li>
                <li><input  style="width:30%;" style type="text" name="name"> </li>
                <li><p>주민등록 번호</p></li>
                <li class="phone">
                    <input type="text" maxlength=6 name="sec_number1" placeholder=""> &nbsp - &nbsp
                    <input type="password" maxlength=7 name="sec_number2" placeholder="">
                </li>
                <li><p>휴대폰 번호</p></li>
                <li class="phone">
                    <input type="text" maxlength=3 name="phone1" placeholder=""> &nbsp - &nbsp
                    <input type="text" maxlength=4 name="phone2" placeholder=""> &nbsp - &nbsp
                    <input type="text" maxlength=4 name="phone3" placeholder="">
                </li>
                <li class="login_btn"><input type="submit" value="찾기"></li>
                <li class="signup_btn"><button type="button"><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
        </div>
    </div>
</form>

<!-- PW 찾기 -->
<form action="./exec/login_exec.php" method ="POST">
    <input value="find_pass" type="hidden" name="db_gubun">  <!-- db구분 위하여 -->
    <div class="content" >
        <div class="IDPASS" style=" border-top:2px solid black; margin-top:5%; padding-top:3%;">
            <ul>
                <li><h2>PW 찾기</h2></li>
                <li><p>이름</p></li>
                <li><input style="width:30%;" type="text" name="name"> </li>
                <li><p>주민등록 번호</p></li>
                <li class="phone">
                    <input type="text" maxlength=6 name="sec_number1" placeholder=""> &nbsp - &nbsp
                    <input type="password" maxlength=7 name="sec_number2" placeholder="">
                </li>
                <li><p>ID</p></li>
                <li>
                    <input style="width:98%;" type="text" name="id" placeholder="">
                </li>
                
                <li class="login_btn"><input type="submit" value="찾기"></li>
                <li class="signup_btn"><button type="button"><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
        </div>
    </div>
</form>