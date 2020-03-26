<!DOCTYPE html>
<?php
if(isset($_GET['search'])){$search_text = $_GET['search'];}else{$search_text ='';}
if(isset($_GET['type'])){$search_type = $_GET['type'];}else{$search_type ='';}
if(isset($_GET['mode'])){$mode_search = $_GET['mode'];}else{$mode_search ='';}
?>
<html>
<head>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/top.css">

    <title>Review</title>
</head>

<body>
    <div class="top">
        <div class="main_logo" >
            <a href="./index.php" >Review</a>
        </div>
    </div>
</body>
</html>
