<?php
include "./inc/dbconnect.php";
include "./inc/top.php";

$query = "select id from login";
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $member_id='';

    while($row = mysqli_fetch_array($result)){
        
        $member_id_row = $row['id'];
        $member_id .= $member_id_row."#";
    }  


?>  
<style>
   /* The Modal (background) */
   .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
    
        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 50%; /* Could be more or less, depending on screen size */                          
        }
        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

</style>
<link rel="stylesheet" href="./assets/css/login.css">
<!-- 회원가입 -->
<form action="./exec/login_exec.php" method ="POST"  onSubmit="formChk();return false">

<input value="signup" type="hidden" name="db_gubun">  <!-- db구분 위하여 -->
    <div class="content">
        <div class="signup">
        <ul>
                <li><p>이름</p></li>
                <li><input id='name' style="width:30%;" type="text" name="name"> </li>
                <li><p>주민등록번호</p></li>
                <li class="phone">
                    <input type="text" id = 'sec_number1' name="sec_number1" maxlength=6 placeholder=""> &nbsp - &nbsp
                    <input type="password" id = 'sec_number2' name="sec_number2" maxlength=7>
                </li>
                <li><p>휴대폰 번호</p></li>
                <li class="phone">
                    <input type="text" id = 'phone1' name="phone1" maxlength=3 placeholder=""> &nbsp - &nbsp
                    <input type="text" id = 'phone2' name="phone2" maxlength=4 placeholder=""> &nbsp - &nbsp
                    <input type="text" id = 'phone3' name="phone3" maxlength=4 placeholder="">
                </li>
                <li><p>아이디</p></li>
                <!-- Trigger/Open The Modal -->
                <button id = "check_id" type=button style="position:absolute; height:35px; left:67%;" id="myBtn">중복체크</button>
                <li><input id="id" type="text" name="id" placeholder="ID 를 입력해 주세요"> </li>
                <li><p>비밀번호</p></li>
                <li><input type="password" name="pass" id ="password1" placeholder="PassWord 를 입력해 주세요"> </li>
                <li><p>비밀번호 확인</p></li>
                <li><input type="password" id ="password2" placeholder="PassWord 를 입력해 주세요"> </li>
                
                <li class="login_btn"><input type="submit" value="회원가입"></li>
                <li class="signup_btn"><button type="button"><a href="./login.php">로그인 하러가기</a></button></li>
            </ul>
 
            </div>
        </div>
    </div>
</form>
        <!-- The Modal -->
        <!-- <div id="myModal" class="modal"> -->

<!-- Modal content -->
<!-- <form action=""></form>
    <div class="modal-content">
        <span class="close">&times;</span>                                                               
        <li><p style="font-weight:bold">아이디</p></li>
        <li><input  style="height:30px; width:50%;" id="modal_id" name ="modal_id" type="text" placeholder="ID 를 입력해 주세요"> </li>
        <li><button id="modal_id_check" type=button style="height:35px;margin-top:3%;">중복체크</button></li>
    </div>
</form> -->

<?php 
// echo "<script>$('#check_id').on('click', function(){
//     var test ='admin#th0532';
//     var test_arr = test.split('#');
//     var check_id = $('#id').val();
//     for(var i=0; i<test_arr.length; i++){
//         if(check_id == 'th0532'){
//             check_flag =0;
//         }
//         else{
//             check_flag =1;
//         }
//     }
    
//     if(check_id ==''){
//         alert('ID란을 입력해주세요.');
//     }
//     else if(check_flag == 0 ){
//         alert('사용중인 ID 입니다.');
//     }
//     else{
//         alert('사용가능한 ID 입니다');
//     }

//     });</script>";

echo "<script>
$('#check_id').on('click', function(){
    var getCheck= RegExp(/^[a-zA-Z0-9]{4,12}$/);
    var test ='".$member_id."';
    var check_flag =0;
    var cnt = 0;
    var test_arr = test.split('#');
    var check_id = $('#id').val();
    for(var i=0; i<test_arr.length-1; i++){
        if(check_id == test_arr[i]){
            cnt ++;
        }else{
        }
    }
    if(1<=cnt){
        check_flag =0;
    }
    else{
        check_flag =1;
    }

    if(check_id ==''){
        alert('ID란을 입력해주세요.');
    }
    else if(check_flag == 0 ){
        alert('사용중인 ID 입니다.');
        $('#id').val('');
        var check_flag_OK =0;

    }
    else if (check_flag == 1 ){
        if(!getCheck.test($('#id').val())){
            alert('4글자 이하, 한글및 특수기호는 입력하실 수 없습니다.');
            $('#id').val('');
            var check_flag_OK = 0;

        }else{
            alert('사용가능한 ID 입니다');
            var check_flag_OK =1;
        }
    }
})
</script>";
?>
<script>
function formChk(){
    var getCheck= RegExp(/^[a-zA-Z0-9]{4,12}$/);
    var getName = RegExp(/^[가-힣]+$/);
    var getNum  = RegExp(/^[0-9]*$/);
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();
   
    if( !$('#name').val()){
        alert("이름을 입력하여주세요");
        $('#name').focus();
    }
    else if(!getName.test($('#name').val())){
        alert("이름을 한글로 입력해주세요");
        $('#name').focus();
    }
    else if($('#sec_number1').val().length<6 || $('#sec_number2').val().length<7){
        alert('주민번호를 확인하여주세요');
        $('#sec_number1').focus();
    }
    else if(!getNum.test($('#sec_number1').val()) || !getNum.test($('#sec_number2').val())){
        alert('주민번호는 숫자만 입력가능합니다.');
    }
    else if(!$('#phone1').val() || !$('#phone2').val()|| !$('#phone3').val()){
        alert("휴대폰 번호를 입력하여주세요");
        $('#phone1').focus();
    }
    else if(!$('#id').val()){
        alert("ID를 입력하여주세요");
        $('#id').focus();
    }
    else if(!getCheck.test($("#id").val())){
        alert("한글및 특수기호는 입력하실 수 없습니다.");
        $("#id").focus();
    }
    else if(!password1 || !password2){
        alert("패스워드를 입력하여주세요");
        $('#password1').focus();
    }
    else if(password1 != password2){
        alert("패스워드가 일치하지 않습니다.");
        $('#password1').val('');
        $('#password2').val('');

    }else if(check_flag_OK !== 1){
        alert("ID 중복체크를 확인해주세요");
    }
    else{
        document.joinForm1.submit();
       return true;
    }
}


// //id 중복체크 모달
//   // Get the modal
//   var modal = document.getElementById('myModal');
 
//  // Get the button that opens the modal
//  var btn = document.getElementById("myBtn");

//  // Get the <span> element that closes the modal
//  var span = document.getElementsByClassName("close")[0];                                          

//  // When the user clicks on the button, open the modal 
//  btn.onclick = function() {
//      modal.style.display = "block";
//  }

//  // When the user clicks on <span> (x), close the modal
//  span.onclick = function() {
//      modal.style.display = "none";
//  }

//  // When the user clicks anywhere outside of the modal, close it
//  window.onclick = function(event) {
//      if (event.target == modal) {
//          modal.style.display = "none";
//      }
//  }

// 중복확인
// $('#check_id').on('click', function(){
//     var test ="admin#th0532";
//     var test_arr = test.split('#');
//     var check_id = $('#id').val();
//     for(var i=0; i<test_arr.length; i++){
//         if(check_id == 'th0532'){
//             check_flag =0;
//         }
//         else{
//             check_flag =1;
//         }
//     }
    
//     if(check_id ==''){
//         alert('ID란을 입력해주세요.');
//     }
//     else if(check_flag == 0 ){
//         alert('사용중인 ID 입니다.'));
//     }
//     else{
//         alert('사용가능한 ID 입니다'));
//     }
// })
</script>