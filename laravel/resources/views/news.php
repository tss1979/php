<?php
include "menu.php";
?>
<hr>
<div class="news_all">
    <?php foreach($newsAll as $news):?>
    <a href ="<?=route('NewsOne', $news['id'])?>"><?=$news['title']?></a><br>
    <?php endforeach;?>
</div>
