<?php
session_start();
include '../kernel/router/Router.php';
include '../kernel/router/Route.php';
include '../kernel/Database.php';
include '../kernel/Utils.php';
include '../app/class/Article.php';
include '../app/class/User.php';
include '../app/class/Upload.php';

$router = new Router($_GET['url'], $_SERVER['REQUEST_METHOD']);

$router->addRoute('Accueil', '', 'get', 'pages/home.php');
$router->addRoute('Accueil', '/accueil', 'get', 'pages/home.php');
$router->addRoute('Connexion', '/connexion', 'get', 'pages/login.php');
$router->addRoute('Connexion DB', '/connexion', 'post', 'data/login.php');
$router->addRoute('Inscription', '/inscription', 'get', 'pages/register.php');
$router->addRoute('Inscription DB', '/inscription', 'post', 'data/register.php');
$router->addRoute('Article', '/article', 'get', 'pages/article.php', ['id']);
$router->addRoute('Nouvel Article', '/nouvel-article', 'get', 'pages/add_article.php');
$router->addRoute('Nouvel Article DB', '/nouvel-article', 'post', 'data/add_article.php');
$router->addRoute('Erreur 404', '/erreur404', 'get', 'pages/error.php');
$router->addRoute('Deconnexion', '/deconnexion', 'get', 'data/disconnect.php');

$router->run();