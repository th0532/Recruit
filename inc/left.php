<link rel="stylesheet" href="./assets/css/left.css">
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<style>

</style>
<!-- mobile_navigation -->
<div id ="mobile_nav" class="mobile_nav_off" >
        <img id="mobile_menu" style="float:right;" width=30px; src="./assets/img/side_menu.png" alt="">
    </div>
<div id = "side_menu" class="side_menu">

<!-- login -->
    <div class="login">
        <a href="#">login</a>
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
                <ul class="list_hover_off">
                    <li><a href="./employment.php">전체</a></li>
                    <li><a href="./employment.php">유통, 무역</a></li>
                    <li><a href="./employment.php">금융, 보험</a></li>
                    <li><a href="./employment.php">의료, 보건</a></li>
                    <li><a href="./employment.php">서비스</a></li>
                    <li><a href="./employment.php">미디어, 문화</a></li>
                    <li><a href="./employment.php">정보통신, IT</a></li>
                    <li><a href="./employment.php">제조</a></li>
                    <li><a href="./employment.php">건설</a></li>
                    <li><a href="./employment.php">교육기관</a></li>
                    <li><a href="./employment.php">공공기관, 공기업, 협회</a></li>
                </ul>
            </div>
        </div>
        <div class="dropdown">
            <div class="dropdown_incruit">
                <button>채용공고</button>
                <ul class="list_hover_off">
                    <li><a href="./incruit.php">전체</a></li>
                    <li><a href="./incruit.php">대기업</a></li>
                    <li><a href="./incruit.php">금융권</a></li>
                    <li><a href="./incruit.php">중견기업</a></li>
                    <li><a href="./incruit.php">중소기업</a></li>
                    <li><a href="./incruit.php">해외기업</a></li>
                    <li><a href="./incruit.php">스타트업</a></li>
                    <li><a href="./incruit.php">인턴</a></li>
                </ul>
            </div>
        </div>
        <!-- <div class="dropdown"> -->
            <button><a href="./license.php">자격증후기</a></button>
           <!-- <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div> -->
        <!-- </div> -->
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
$(".dropdown_employment button").on("mouseenter",function(){
    var text = "<button>취업후기</button>"+
               "<ul>"+
               "     <li><a href='./employment.php'>전체</a></li>"+
               "     <li><a href='./employment.php'>유통, 무역</a></li>"+
               "     <li><a href='./employment.php'>금융, 보험</a></li>"+
               "     <li><a href='./employment.php'>의료, 보건</a></li>"+
               "     <li><a href='./employment.php'>서비스</a></li>"+
               "     <li><a href='./employment.php'>미디어, 문화</a></li>"+
               "     <li><a href='./employment.php'>정보통신, IT</a></li>"+
               "     <li><a href='./employment.php'>제조</a></li>"+
               "     <li><a href='./employment.php'>건설</a></li>"+
               "     <li><a href='./employment.php'>교육기관</a></li>"+
               "     <li><a href='./employment.php'>공공기관, 공기업, 협회</a></li>"+
               "</ul>"
    $(".dropdown_employment").html(text);
})
$(".dropdown_incruit button").on("mouseenter",function(){
    var text = "<button>채용공고</button>"+
               " <ul>"+
               "     <li><a href='./incruit.php'>전체</a></li>"+
               "     <li><a href='./incruit.php'>대기업</a></li>"+
               "     <li><a href='./incruit.php'>금융권</a></li>"+
               "     <li><a href='./incruit.php'>중견기업</a></li>"+
               "     <li><a href='./incruit.php'>중소기업</a></li>"+
               "     <li><a href='./incruit.php'>해외기업</a></li>"+
               "     <li><a href='./incruit.php'>스타트업</a></li>"+
               "     <li><a href='./incruit.php'>인턴</a></li>"+
               "</ul>";
    $(".dropdown_incruit").html(text);
})

// // 네비 hover_off list none
// $(".dropdown_employment").on("mouseleave",function(){
//     $(".dropdown_employment ul").css("display","none");
// })
// $(".dropdown_incruit").on("mouseleave",function(){
//     $(".dropdown_incruit ul").css("display","none");
// })


</script>