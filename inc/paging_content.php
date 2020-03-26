
<?php
//카테고리 구분있는 페이지들이 있어 구분.
    if( $_SERVER['PHP_SELF'] == '/review/employment.php' || $_SERVER['PHP_SELF'] == '/review/incruit.php' ) {
        ?>
        <div class="paging"> <!--paging start -->
            <a href="<?=$_SERVER['PHP_SELF']?>?category=<?=$param_category?>&page=<?=$s_page-1?>"><<</a>
                
            <?php
                for ($p=$s_page; $p<=$e_page; $p++) {
             ?>
                    <a class="paging_val" href="<?=$_SERVER['PHP_SELF']?>?category=<?=$param_category?>&page=<?=$p?>"><?=$p?></a>       
            <?php
                }
            ?>
            <div>
                <a href="<?=$_SERVER['PHP_SELF']?>?category=<?=$param_category?>&page=<?=$e_page+1?>">>></a>
            </div>
        </div> <!--paging end -->
<?php
    }else{
?>
        <div class="paging"> <!--paging start -->
            <a href="<?=$_SERVER['PHP_SELF']?>?page=<?=$s_page-1?>"><<</a>
            <?php
                for ($p=$s_page; $p<=$e_page; $p++) {
             ?>
                    <a class="paging_val" href="<?=$_SERVER['PHP_SELF']?>?page=<?=$p?>"><?=$p?></a>
       
            <?php
                }
            ?>
            <div>
                <a href="<?=$_SERVER['PHP_SELF']?>?page=<?=$e_page+1?>">>></a>
            </div>
        </div> <!--paging end -->
<?php
}
?>

