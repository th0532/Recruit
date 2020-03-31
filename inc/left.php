<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<link rel="stylesheet" href="./assets/css/left.css">
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- mobile_navigation -->
<div id ="mobile_nav" class="mobile_nav_off" >
        <img id="mobile_menu" style="float:right;" width=30px; src="./assets/img/side_menu.png" alt="">
    </div>
<div id = "side_menu" class="side_menu">

<!-- login -->
    <div class="login">
        <?php
            if(!isset($_SESSION['userid'])) {
        ?>
        <a href="./login.php">login</a>
        <?php
            }else{
        ?>
        <a href="./logout.php">logout</a>
        <?php } 
        ?>
    </div>
<!-- logo -->
    <div class="logo_box">
        <h1>Category</h1>
    </div>
<!-- side_content -->
    <div class="side_menu_content">
        <ul class="nav">
            <button><a href="./index.php">HOME</a></button>
        <div class="dropdown">
            <div class="dropdown_employment">
                <button>취업후기</button>
                <ul class="list_hover_onoff">
                    <li><a href="./employment.php?category=1">전체</a></li>
                    <li><a href="./employment.php?category=2">유통, 무역</a></li>
                    <li><a href="./employment.php?category=3">금융, 보험</a></li>
                    <li><a href="./employment.php?category=4">의료, 보건</a></li>
                    <li><a href="./employment.php?category=5">서비스</a></li>
                    <li><a href="./employment.php?category=6">미디어, 문화</a></li>
                    <li><a href="./employment.php?category=7">정보통신, IT</a></li>
                    <li><a href="./employment.php?category=8">제조</a></li>
                    <li><a href="./employment.php?category=9">건설</a></li>
                    <li><a href="./employment.php?category=10">교육기관</a></li>
                    <li><a href="./employment.php?category=11">공공기관, 공기업, 협회</a></li>
                </ul>
            </div>
        </div>
        <div class="dropdown">
            <div class="dropdown_incruit">
                <button>채용공고</button>
                <ul class="list_hover_onoff">
                    <li><a href="./incruit.php?category=1">전체</a></li>
                    <li><a href="./incruit.php?category=2">금융권</a></li>
                    <li><a href="./incruit.php?category=3">IT기업</a></li>
                    <li><a href="./incruit.php?category=4">대기업</a></li>
                    <li><a href="./incruit.php?category=5">중견기업</a></li>
                    <li><a href="./incruit.php?category=6">중소기업</a></li>
                    <li><a href="./incruit.php?category=7">해외기업</a></li>
                    <li><a href="./incruit.php?category=8">스타트업</a></li>
                    <li><a href="./incruit.php?category=9">인턴</a></li>
                </ul>
            </div>
        </div>
            <button><a href="./license.php">자격증후기</a></button>
            <button><a href="./community.php">자유게시판</a></button>
        </ul>
    </div>
</div>

<script>
// 모바일 네비 메뉴 on off
var flag = 1;
  $('#mobile_menu').on('click', function(){
    if(flag == 1){
      $('#side_menu' ).addClass( 'side_menu_on' );
      $('#side_menu' ).removeClass( 'side_menu_off' );
      $('#mobile_nav').addClass('mobile_nav_on'); 
      $('#mobile_nav').removeClass('mobile_nav_off');
      flag = 0;
    }
    else{
      $('#side_menu' ).addClass( 'side_menu_off' );
      $('#side_menu' ).removeClass( 'side_menu_on' );
      $('#mobile_nav').addClass('mobile_nav_off'); 
      $('#mobile_nav').removeClass('mobile_nav_on');
      flag = 1;
    }
  });

// 네비 hover_on list print
var flagn_employment = 1;
var flagn_incruit = 1;

$(".dropdown_employment button").on("click",function(){
    if(flagn_employment == 1){
        $(".dropdown_employment ul").css("display", "block");
        flagn_employment = 0;
    }
    else{
        $(".dropdown_employment ul").css("display", "none");
        flagn_employment = 1;
    }
})
$(".dropdown_incruit button").on("click",function(){
    if(flagn_incruit == 1){
        $(".dropdown_incruit ul").css("display", "block");
        flagn_incruit = 0;
    }
    else{
        $(".dropdown_incruit ul").css("display", "none");
        flagn_incruit = 1;
    }
})

</script>