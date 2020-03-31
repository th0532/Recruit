<?php
header("Content-Type:application/json");
include "./dbconnect.php";

    $db_gubun   =   $_POST['db_gubun'];
    $result_array = array();
    $param_num  =   $_GET['num'];

        if( $db_gubun == "community"){
            $query = "SELECT * from comment where page='community' AND postnum = $param_num";

            $result = mysqli_query($connect, $query);
            if(!$result){
                $result_array["result"] = "N";
                $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
                $result_array["query"] = $query;
            }else{
                $result_array["result"] = "Y";
                $result_array["message"] = "조회성공";
                $result_array["query"] = $query;

                while($row = mysqli_fetch_array($result)){
                    $print_array[] = array(
                        "content" => $row["content"],
                        "id" => $row["id"],
                        "date" => $row["date"]
                    );
                    $result_array["col"] = $print_array;
                }
            }	
        }
        else if( $db_gubun == "license"){
            $query = "SELECT * from comment where page='license' AND postnum = $param_num";

            $result = mysqli_query($connect, $query);
            if(!$result){
                $result_array["result"] = "N";
                $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
                $result_array["query"] = $query;
            }else{
                $result_array["result"] = "Y";
                $result_array["message"] = "조회성공";
                $result_array["query"] = $query;

                while($row = mysqli_fetch_array($result)){
                    $print_array[] = array(
                        "content" => $row["content"],
                        "id" => $row["id"],
                        "date" => $row["date"]
                    );
                    $result_array["col"] = $print_array;
                }
            }	
        }
        else if( $db_gubun == "employment"){
            $query = "SELECT * from comment where page='employment' AND postnum = $param_num";

            $result = mysqli_query($connect, $query);
            if(!$result){
                $result_array["result"] = "N";
                $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
                $result_array["query"] = $query;
            }else{
                $result_array["result"] = "Y";
                $result_array["message"] = "조회성공";
                $result_array["query"] = $query;

                while($row = mysqli_fetch_array($result)){
                    $print_array[] = array(
                        "content" => $row["content"],
                        "id" => $row["id"],
                        "date" => $row["date"]
                    );
                    $result_array["col"] = $print_array;
                }
            }	
        }
        else if( $db_gubun == "incruit"){
            $query = "SELECT * from comment where page='incruit' AND postnum = $param_num";

            $result = mysqli_query($connect, $query);
            if(!$result){
                $result_array["result"] = "N";
                $result_array["message"] = "데이터베이스 에러 관리자에게 문의하세요.";
                $result_array["query"] = $query;
            }else{
                $result_array["result"] = "Y";
                $result_array["message"] = "조회성공";
                $result_array["query"] = $query;

                while($row = mysqli_fetch_array($result)){
                    $print_array[] = array(
                        "content" => $row["content"],
                        "id" => $row["id"],
                        "date" => $row["date"]
                    );
                    $result_array["col"] = $print_array;
                }
            }	
        }
	echo json_encode(array($result_array));
	mysqli_close($connect);
?>