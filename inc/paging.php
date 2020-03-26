<?php
include "./inc/dbconnect.php";
include "./inc/function.php";

// ----------------------------- 페이징 start--------------------------------
// url로 구분하여 쿼리 변경 
    if( $_SERVER['PHP_SELF'] == '/review/license.php' ) {
        $query = "SELECT num FROM license ORDER BY num DESC";
    }
    else if( $_SERVER['PHP_SELF'] == '/review/community.php' ) {
        $query = "SELECT num FROM community ORDER BY num DESC";
    }

    else if( $_SERVER['PHP_SELF'] == '/review/employment.php' ) {
        // 카테고리 구분
        if($category_gubun == "전체"){
            $query = "SELECT num FROM employment ORDER BY num DESC";
        }
        else{
            $query = "select * from employment where category ='".$category_gubun."' order by num DESC";
        }
    }

    else if( $_SERVER['PHP_SELF'] == '/review/incruit.php' ) {
         // 카테고리 구분
        if($category_gubun == "전체"){
            $query = "SELECT num FROM incruit ORDER BY num DESC";
        }
        else{
            $query = "select * from incruit where category ='".$category_gubun."' order by num DESC";
        }
    }

    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $list = 10;
    $block = 3;
    $pageNum = ceil($count/$list); // 총 페이지
    $blockNum = ceil($pageNum/$block); // 총 블록
    $nowBlock = ceil($page/$block);
    $s_page = ($nowBlock * $block) - 2;

    if ($s_page <= 1) {
        $s_page = 1;
    }

    $e_page = $nowBlock*$block;

    if ($pageNum <= $e_page) {
        $e_page = $pageNum;
    }

    // 페이징 parameter 오류 예외처리
    if($page == 0 ){
        $page = 1;
        $s_page = 1;
        $e_page = 3;
    }else if ($pageNum < $page ){
        $page = $pageNum;
        $s_page = $pageNum-2;
    }

        
    if ($count<10){
        $s_page = 1;
        $e_page = 1;
    }
    else if ($count<20){
        $s_page = 1;
        $e_page = 2;
    }
    else if ($count<30){
        $s_page = 1;
        $e_page = 3;
     }

    $s_point = ($page-1) * $list;


// ----------------------------- 페이징 end--------------------------------
?>

