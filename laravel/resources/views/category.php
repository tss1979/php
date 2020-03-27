<?php
include "menu.php";
use App\Category;
?>
<hr>
<div class="category_all">
    <?php foreach(Category::getCategories() as $category):?>
    <a href ="<?=route('NewsCategory', $category)?>"><?=$category?></a><br>
    <?php endforeach;?>
</div>
