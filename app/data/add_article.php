<?php
User::checkAccess($_SESSION['user']['role']);

$nameFile = Upload::uploadFile($_FILES['picture'], 2000000, ['png', 'jpg', 'jpeg']);

$article = new Article($_POST['title'], $nameFile, $_POST['content']);
$article->addArticle();

Utils::redirect('article?id=' . Database::getLastId());
