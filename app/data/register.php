<?php
$user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
$user->addUser();

Utils::redirect('connexion');
