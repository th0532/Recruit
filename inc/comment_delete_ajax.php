<?php
header("Content-Type:application/json");
include "./dbconnect.php";

    $db_gubun   =   $_POST['db_gubun'];
    $comment_date   =   $_POST['comment_date'];
    $result_array = array();
    $param_num  =   $_GET['num'];


    if ($db_gubun =='community'){
        $query = "DELETE FROM comment  WHERE postnum = $param_num AND page ='community' AND date = '$comment_date' " ;
        $result = mysqli_query($connect, $query);
        if(!$result){
            $result_array["result"] = "N";
            $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
            $result_array["query"] = $query;
        }else{
            $result_array["result"] = "Y";
            $result_array["message"] = "조회성공";
            $result_array["query"] = $query;
        }
    }
    else if ($db_gubun =='license'){
        $query = "DELETE FROM comment  WHERE postnum = $param_num AND page ='license' AND date = '$comment_date' " ;
        $result = mysqli_query($connect, $query);
        if(!$result){
            $result_array["result"] = "N";
            $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
            $result_array["query"] = $query;
        }else{
            $result_array["result"] = "Y";
            $result_array["message"] = "조회성공";
            $result_array["query"] = $query;
        }
    }
    else if ($db_gubun =='employment'){
        $query = "DELETE FROM comment  WHERE postnum = $param_num AND page ='employment' AND date = '$comment_date' " ;
        $result = mysqli_query($connect, $query);
        if(!$result){
            $result_array["result"] = "N";
            $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
            $result_array["query"] = $query;
        }else{
            $result_array["result"] = "Y";
            $result_array["message"] = "조회성공";
            $result_array["query"] = $query;
        }
    }
    else if ($db_gubun =='incruit'){
        $query = "DELETE FROM comment  WHERE postnum = $param_num AND page ='incruit' AND date = '$comment_date' " ;
        $result = mysqli_query($connect, $query);
        if(!$result){
            $result_array["result"] = "N";
            $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
            $result_array["query"] = $query;
        }else{
            $result_array["result"] = "Y";
            $result_array["message"] = "조회성공";
            $result_array["query"] = $query;
        }
    }


	echo json_encode(array($result_array));
	mysqli_close($connect);
?>