<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";
include "../inc/function.php";

//공통 변수
$db_gubun       = $_POST['db_gubun'];
$search_type    = $_POST['search_type'];
$search_text    = $_POST['search_text'];
if(isset($_GET['num'])){
    $param_num = $_GET['num'];
}
else{
    $param_num =1;
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
//검색

    if($search_text == ''){
        echo "<script>window.alert('검색어를 입력해주세요');</script>";
        echo "<script>location.href = '../".$db_gubun.".php'</script>";
    }

    if($db_gubun == 'community' || $db_gubun == 'license'){
        echo "<script>location.href = '../".$db_gubun.".php?mode=search&type=".$search_type."&search=".$search_text."'</script>";
    }else{ // 카테고리 있는 페이지 검색기능을 위하여
        $param_category       = $_POST['param_category'];
        
        echo "<script>location.href = '../".$db_gubun.".php?mode=search&category=".$param_category."&type=".$search_type."&search=".$search_text."'</script>";
    }

?>  