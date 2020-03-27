<?php
include "menu.php";
use App\News;
dump(\App\Category::getId('politics'));
dump(News::getOneNews(1));
?>

<h1>Добро пожаловать на наш новостной портал</h1>

<p>Флагманский сайт медиагруппы — стал первым из новостных ресурсов рунета, вошедших в топ-20 Европы</p>
