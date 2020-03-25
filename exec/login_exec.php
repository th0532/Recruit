
<?php
    session_start();
    $localhost = 'localhost';
    $dbname = 'review';
    $id = 'root';
    $pass = '';

    $connect = mysqli_connect($localhost, $id, $pass, $dbname) or die ('connect error');
    $connectResult = mysqli_select_db($connect, $dbname);

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
        $date   = date("Y-m-d h:i:s", time());
        $name   = $_POST['name'];
        $age    = $_POST['age'];
        $phone1  = $_POST['phone1'];
        $phone2  = $_POST['phone2'];
        $phone3  = $_POST['phone3'];
        $phone = $phone1."-".$phone2."-".$phone3;
        $id     = $_POST['id'];
        $pass   = $_POST['pass']; 

        $query = "INSERT INTO login(num, date, name, age, phone, id, pass) VALUES ('','$date','$name','$age','$phone','$id','$pass')";
        $result = mysqli_query($connect,$query);
        ?>

        <script>
        // 회원가입시
            location.href = "../login.php";
        </script>
    <?php
    }else if ($db_gubun == "find_id"){      // gubun find_id
        $name    = $_POST['name'];
        $phone1  = $_POST['phone1'];
        $phone2  = $_POST['phone2'];
        $phone3  = $_POST['phone3'];
        $phone = $phone1."-".$phone2."-".$phone3;

        $query = "select * from login where name ='$name' AND phone ='$phone'";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_array($result);
        
        if($name == '' || $phone1 == '' || $phone2 == '' || $phone3 == '' ){
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
            echo "<script>location.href='../login.php';</script>";
        }
    }else if ($db_gubun == "find_pass"){   // gubun find_pass
            $name    = $_POST['name'];
            $id      = $_POST['id'];
            $query = "select * from login where name ='$name' AND id ='$id'";
            $result = mysqli_query($connect,$query);
            $row = mysqli_fetch_array($result);
            
            if($name == '' || $id == ''){
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
