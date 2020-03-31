<?php
include "./inc/login_session.php";
include "./inc/left.php";
include "./inc/top.php";

?>  
<link rel="stylesheet" href="./assets/css/index.css">
<div class="content">
  <div class="menu">
    <ul>
      <li>
        <div class="menu_img">
          <img src="./assets/img/list/list2.png" style="float:right;" alt="">
        </div>
        <div class="answer">
          <a class="menu_a" href="./employment.php?start=0">
            <span>
              <p>취업후기</p><br>
              대기업, 중견기업, 중소기업, 공기업의 <br>
              취업후기와 TSET, NCS 시험후기를 확인하고<br>
              취업의 도전하세요
              </span>
          </a>
        </div>
      </li>
      <li>
        <div class="menu_img">
          <img src="./assets/img/list/list4.png" style="float:right;" alt="">
        </div>
        <div class="answer">
          <a class="menu_a" href="./incruit.php?start=0">
            <span>
            <p>공채소식</p><br>
              대기업, 중견기업, 중소기업, 공기업의 <br>
              신입 공채, 수시채용, 경력 채용, 인턴 등<br>
              여러 소식을 확인 해 보세요
            </span>
          </a>
        </div>
      </li>
      <li>
        <div class="menu_img">
          <img src="./assets/img/list/list1.png" alt="">  
        </div>
        <div class="answer">
          <a class="menu_a" href="./license.php?start=0">
            <span >
              <p style>자격증후기</p><br>
              토익, 제2외국어, IT, 금융, 한국사, 컴활 등 <br> 
              여러 자격증의 후기를 확인하고<br>
              합격률을 높여보세요
            </span>
          </a>
        </div>
      </li>
      <li>
        <div class="menu_img">
          <img src="./assets/img/list/list3.png" style="float:right;" alt="">
        </div>
        <div class="answer">
          <a class="menu_a" href="./community.php?start=0">
            <span>
            <p>자유게시판</p><br>
              취업을 준비하는 다른 친구들과  <br>
              자유게시판을 통하여 정보를<br>
              공유해 보세요
            </span>
          </a>
        </div>
      </li>
    </ul>
  </div>
  <div class="menu_content">
    <img src="./assets/img/bg/bg_1.png" height=95%; width=95%; alt="">
  </div>
</div>
<script>
///// 모바일 네비게이션 on off

</script>

<?php
    include "./inc/footer.php";
?>