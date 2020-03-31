<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
    session_start();
    include "../inc/dbconnect.php";

    $db_gubun = $_POST['db_gubun'];

//로그인
    if($db_gubun == "login"){       //gubun login
        $id     = $_POST['id'];
        $pass   = $_POST['pass'];

        $query = "select * from login where id = '$id' AND pass ='$pass' ";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        if(!isset($row['id'])){
            echo "<script>window.alert('ID 또는 PassWord 를 확인해주세요');</script>";
            echo "<script>location.href='../login.php';</script>";
        }
        else if($row['id'] == $id && $row['pass'] == $pass){
            $name = $row['name'] ;
            $id   = $row['id'];
            //성공 세션등록
            $_SESSION['userid'] = $id;
            if(isset($_SESSION['userid'])){
                echo "<script>location.href='../index.php';</script>";
            }
        }
        else{
            echo "<script>window.alert('ID 또는 PassWord 를 확인해주세요');</script>";
            echo "<script>location.href='../login.php';</script>";
        }
    }

// 회원가입
    else if ($db_gubun == "signup"){            //gubun signup
        $date   = date("Y-m-d H:i:s");
        $name   = $_POST['name'];
        // $sec_number1 = $_POST['sec_number1'];
        // $sec_number2 = $_POST['sec_number2'];
        // $sec_number = $sec_number1."-".$sec_number2;

        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];
        $email = $email1."@".$email2;

        $phone1  = $_POST['phone1'];
        $phone2  = $_POST['phone2'];
        $phone3  = $_POST['phone3'];
        $phone = $phone1."-".$phone2."-".$phone3;
        $id     = $_POST['id'];
        $pass   = $_POST['pass']; 
        
        //id 중복 오류 체크
        $query = "select id,email from login";
        mysqli_query($connect, $query);
        $result = mysqli_query($connect,$query);

        while($row = mysqli_fetch_array($result)){
            $member_id = $row['id'];
            $member_email = $row['email'];

            if($member_id == $id){
                echo "<script>window.alert('접근오류 입니다.');</script>";
                echo "<script>location.href='../login.php';</script>";
                exit;
            }
            if($member_email == $email){
                echo "<script>window.alert('이미 가입된 회원입니다.');</script>";
                echo "<script>location.href='../login.php';</script>";
                exit;
            }
        }  

        $query = "INSERT INTO login(date, name, email, phone, id, pass) VALUES ('$date','$name','$email','$phone','$id','$pass')";
        $result = mysqli_query($connect,$query);
        // 회원가입완료시
        
        echo "<script>window.alert('회원가입이 완료되었습니다.');</script>";
        echo "<script>location.href='../login.php';</script>";
        ?>

    <?php
    }else if ($db_gubun == "find_id"){      // gubun find_id
        $name    = $_POST['name'];
        // $sec_number1    = $_POST['sec_number1'];
        // $sec_number2    = $_POST['sec_number2'];
        // $sec_number     = $sec_number1."-".$sec_number2;
        $email1    = $_POST['email1'];
        $email2    = $_POST['email2'];
        $email     = $email1."@".$email2;
        $phone1  = $_POST['phone1'];
        $phone2  = $_POST['phone2'];
        $phone3  = $_POST['phone3'];
        $phone = $phone1."-".$phone2."-".$phone3;

        $query = "select * from login where name ='$name' AND email ='$email' AND phone ='$phone'";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_array($result);
        
        if($name == '' || $email1 == '' || $email2 == '' || $phone1 == '' || $phone2 == '' || $phone3 == '' ){
            echo "<script>window.alert('정보를 모두 입력하여주세요')</script>";
            echo "<script>location.href='../find.php';</script>";
        }
        else if (!isset($row['id'])){
            echo "<script>window.alert('등록한 정보가 없습니다.')</script>";
            echo "<script>location.href='../find.php';</script>";
        }
        else{
            $id_res = $row['id'];
            $name_res = $row['name'];

            echo "<script>window.alert('".$name_res." 님의 ID는 ".$id_res." 입니다.')</script>";
            echo "<script>location.href='../find.php';</script>";
        }
    }else if ($db_gubun == "find_pass"){   // gubun find_pass
            $name    = $_POST['name'];
            $id      = $_POST['id'];
            // $sec_number1    = $_POST['sec_number1'];
            // $sec_number2    = $_POST['sec_number2'];
            // $sec_number     = $sec_number1."-".$sec_number2;
            $email1    = $_POST['email1'];
            $email2    = $_POST['email2'];
            $email     = $email1."@".$email2;
            $phone1  = $_POST['phone1'];
            $phone2  = $_POST['phone2'];
            $phone3  = $_POST['phone3'];
            $phone = $phone1."-".$phone2."-".$phone3;

            $query = "select * from login where name ='$name' AND email ='$email'AND phone ='$phone' AND id ='$id'";
            $result = mysqli_query($connect,$query);
            $row = mysqli_fetch_array($result);
            
            if($name == '' || $id == '' || $email1 == '' || $email2 ==''){
                echo "<script>window.alert('정보를 모두 입력하여주세요')</script>";
                echo "<script>location.href='../find.php';</script>";
            }
            else if (!isset($row['id'])){
                echo "<script>window.alert('등록한 정보가 없습니다.')</script>";
                echo "<script>location.href='../find.php';</script>";
                
            }
            else{
                $pass_res = $row['pass'];
    
                echo "<script>window.alert('".$pass_res." 입니다.')</script>";
                echo "<script>location.href='../login.php';</script>";
            }
    }  
    
    ?>
