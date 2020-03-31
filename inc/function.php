<?php

// url로 구분하여 쿼리 변경 
if( $_SERVER['PHP_SELF'] == '/recruit/employment.php' ) {
        
    if(!isset($_GET['category'])){
        $param_category = 1;
    }else{
        $param_category = $_GET['category'];
    }
    //category get 값 체크 후 카테고리 기능 구현
        switch($param_category){
            case 1: $category_gubun = "전체";
                break;
            case 2: $category_gubun = "유통, 무역";
                break;
            case 3: $category_gubun = "금융, 보험";
                break;
            case 4: $category_gubun = "의료, 보건";
                break;
            case 5: $category_gubun = "서비스";
                break;
            case 6: $category_gubun = "미디어, 문화";
                break;
            case 7: $category_gubun = "정보통신, IT";
                break;
            case 8: $category_gubun = "제조";
                break;
            case 9: $category_gubun = "건설";
                break;
            case 10: $category_gubun = "교육기관";
                break;
            case 11: $category_gubun = "공공기관, 공기업, 협회";
                break;
            default:     $category_gubun = "전체";
        }
}
else if( $_SERVER['PHP_SELF'] == '/recruit/incruit.php' ) {
    //category get 값 체크 후 카테고리 기능 구현
    if(!isset($_GET['category'])){
        $param_category = 1;
    }else{
        $param_category = $_GET['category'];
    }
        switch($param_category){
        case 1: $category_gubun = "전체";
            break;
        case 2: $category_gubun = "금융권";
        break;
        case 3: $category_gubun = "IT기업";
        break;
        case 4: $category_gubun = "대기업";
            break;
        case 5: $category_gubun = "중견기업";
            break;
        case 6: $category_gubun = "중소기업";
            break;
        case 7: $category_gubun = "해외기업";
            break;
        case 8: $category_gubun = "스타트업";
            break;
        case 9: $category_gubun = "인턴";
            break;
        default:$category_gubun = "전체";
        }
}
?>