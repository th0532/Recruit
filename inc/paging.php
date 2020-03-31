<?php
include "./inc/dbconnect.php";
include "./inc/function.php";
/*
    페이징 처음처리,,, 후 어렵다 어려워
*/

    // ----------------------------- 페이징 start--------------------------------
    // url로 구분하여 쿼리 변경 
    if( $_SERVER['PHP_SELF'] == '/recruit/license.php' ) {
        if($search_type == 1){
            $query = "SELECT num FROM license where title LIKE '%".$search_text."%' ORDER BY num ";
            }else if($search_type == 2){
                $query = "SELECT num FROM license where id='".$search_text."' ORDER BY num";
            }else{
                $query = "SELECT num FROM license ORDER BY num";
            }
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            
            if($count == '0'){
                $query = "SELECT num FROM license ORDER BY num DESC";
            }
    }
    // url로 구분하여 쿼리 변경     
    else if( $_SERVER['PHP_SELF'] == '/recruit/community.php' ) {
        if($search_type == 1){ //search 제목 검색 LIKE %% 이기에 검색칸이 공백이어도 모든값을 가져옴
            $query = "SELECT num FROM community where title LIKE '%".$search_text."%' ORDER BY num ";
        }else if($search_type == 2){ //search ID 값 기준 가져오기
            $query = "SELECT num FROM community where id='".$search_text."' ORDER BY num";
        }else{                      //prameter 에 타입이 없을경우
            $query = "SELECT num FROM community ORDER BY num";
        }
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count == '0'){
            $query = "SELECT num FROM community ORDER BY num DESC";
        }
    }
    // url로 구분하여 쿼리 변경     
    else if( $_SERVER['PHP_SELF'] == '/recruit/employment.php' ) {
        // 카테고리 구분
        if($category_gubun == "전체"){
            if($search_type == 1){
                $query = "SELECT num FROM employment where title LIKE '%".$search_text."%' ORDER BY num";
            }else if($search_type == 2){
                $query = "SELECT num FROM employment where id='".$search_text."' ORDER BY num";
    
            }else{
                $query = "SELECT num FROM employment ORDER BY num";
            }
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            
            if($count == '0'){
                $query = "SELECT num FROM employment ORDER BY num DESC";
                
            }
        }// 카테고리 구분
        else{
            if($search_type == 1){
                $query = "SELECT num FROM employment where category ='".$category_gubun."' AND title LIKE '%".$search_text."%' ORDER BY num";
            }else if($search_type == 2){
                $query = "SELECT num FROM employment where category ='".$category_gubun."' AND id='".$search_text."' ORDER BY num";
            }else{
                $query = "SELECT num from employment where category ='".$category_gubun."' order by num";
            }
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            
            if($count == '0'){
                $query = "SELECT num FROM employment ORDER BY num DESC";
            }
        }
    }
    // url로 구분하여 쿼리 변경     
    else if( $_SERVER['PHP_SELF'] == '/recruit/incruit.php' ) {
        // 카테고리 구분
        if($category_gubun == "전체"){
            if($search_type == 1){
                $query = "SELECT num FROM incruit where title LIKE '%".$search_text."%' ORDER BY num";
            }else if($search_type == 2){
                $query = "SELECT num FROM incruit where id='".$search_text."' ORDER BY num";
    
            }else{
                $query = "SELECT num FROM incruit ORDER BY num";
            }
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            
            if($count == '0'){
                $query = "SELECT num FROM incruit ORDER BY num DESC";
            }
        }// 카테고리 구분
        else{
            if($search_type == 1){
                $query = "SELECT num FROM incruit where category ='".$category_gubun."' AND title LIKE '%".$search_text."%' ORDER BY num";
            }else if($search_type == 2){
                $query = "SELECT num FROM incruit where category ='".$category_gubun."' AND id='".$search_text."' ORDER BY num";
            }else{
                $query = "SELECT num from incruit where category ='".$category_gubun."' order by num";
            }
            $result = mysqli_query($connect,$query);
            $count = mysqli_num_rows($result);
            
            if($count == '0'){
                $query = "SELECT num FROM incruit ORDER BY num DESC";
            }
        }
    }

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

    //  리스트 수 적을때 블록이동 >> << 오류 예외처리
    // 리스트 갯수 에 따라
    if ($count<11){
        $s_page = 1;
        $e_page = 1;
    }
    else if ($count<21){
        $s_page = 1;
        $e_page = 2;
    }
    else if ($count<31){
        $s_page = 1;
        $e_page = 3;
     }

    $s_point = ($page-1) * $list;


// ----------------------------- 페이징 end--------------------------------
?>

