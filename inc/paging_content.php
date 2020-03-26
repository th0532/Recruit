
<?php
    //카테고리 구분있는 페이지들이 있어 구분.
        // 카테고리 있는 페이지
        if( $_SERVER['PHP_SELF'] == '/review/employment.php' || $_SERVER['PHP_SELF'] == '/review/incruit.php' ) {
            ?>
            <div class="paging"> <!--paging start -->
                <a href="<?=$_SERVER['PHP_SELF']?>?mode=search&category=<?=$param_category?>&page=<?=$s_page-1?>&type=<?=$search_type?>&search=<?=$search_text?>"><<</a>
                    
                <?php
                    for ($p=$s_page; $p<=$e_page; $p++) {
                ?>
                        <a class="paging_val" href="<?=$_SERVER['PHP_SELF']?>?mode=search&category=<?=$param_category?>&page=<?=$p?>&type=<?=$search_type?>&search=<?=$search_text?>"><?=$p?></a>       
                <?php
                    }
                ?>
                <div>
                    <a href="<?=$_SERVER['PHP_SELF']?>?mode=search&category=<?=$param_category?>&page=<?=$e_page+1?>&type=<?=$search_type?>&search=<?=$search_text?>">>></a>
                </div>
            </div> <!--paging end -->
    <?php
        }else{// 카테고리 없는페이지
    ?>
            <div class="paging"> <!--paging start -->
                <a href="<?=$_SERVER['PHP_SELF']?>?mode=search&page=<?=$s_page-1?>&type=<?=$search_type?>&search=<?=$search_text?>"><<</a>
                <?php
                    for ($p=$s_page; $p<=$e_page; $p++) {
                ?>
                        <a class="paging_val" href="<?=$_SERVER['PHP_SELF']?>?mode=search&page=<?=$p?>&type=<?=$search_type?>&search=<?=$search_text?>"><?=$p?></a>
                <?php
                    }
                ?>
                <div>
                    <a href="<?=$_SERVER['PHP_SELF']?>?mode=search&page=<?=$e_page+1?>&type=<?=$search_type?>&search=<?=$search_text?>">>></a>
                </div>
            </div> <!--paging end -->
    <?php
    }

?>




