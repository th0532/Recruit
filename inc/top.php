<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./assets/css/top.css">
    <title>취업 | 채용 안내 | 커뮤니티 | 자격증후기</title>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="취업준비 하는 사람들을 위한 커뮤니티 사이트">
    <meta property="og:type" content="website"> 
    <meta property="og:title" content="취업커뮤니티 | 채용 안내 | Recruit">
    <meta property="og:description" content="취업준비 하는 사람들을 위한 커뮤니티 사이트">
    <meta property="og:image" content="http://recruit.dothome.co.kr/recruit/assets/img/bg/bg_1.jpg">
    <meta property="og:url" content="http://recruit.dothome.co.kr/recruit/">
</head>
<?php
if(isset($_GET['search'])){$search_text = $_GET['search'];}else{$search_text ='';}
if(isset($_GET['type'])){$search_type = $_GET['type'];}else{$search_type ='';}
if(isset($_GET['mode'])){$mode_search = $_GET['mode'];}else{$mode_search ='';}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
if(isset($_GET['type'])){$type = $_GET['type'];}else{$type = 1;}
if(isset($_GET['search'])){$search = $_GET['search'];}else{$search = 1;}
if(isset($_GET['category'])){
    $param_category = $_GET['category'];
}
else{
    $param_category = 1;
}
if(isset($_GET['num'])){$param_num = $_GET['num'];}else{$param_num = 1;}

?>
<html>

<style>
input,button {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
    vertical-align: baseline;
    box-sizing: content-box;
}
input[type=submit]{
    all:unset;
    border:1px solid rgb(169, 169, 169);
}
input{
    border:1px solid rgb(169, 169, 169);
}
</style>
<body>
    <div class="top">
        <div class="main_logo" >
            <a href="./index.php" >Recruit</a>
        </div>
    </div>
</body>
</html>

<!-- textarea ë†’ì�´ì¡°ì ˆ -->
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
