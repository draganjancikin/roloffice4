﻿<?php
$page = "cutting";
require_once filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/../config/appConfig.php';
require_once filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/../config/bootstrap.php';
require_once filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') .'/../vendor/autoload.php';
session_start();
if(isset($_SESSION['username'])):
    $username = $_SESSION['username'];
    $user_role_id = $_SESSION['user_role_id'];
    $pidb = new \Roloffice\Controller\PidbController();
    $article = new \Roloffice\Controller\ArticleController();
    $cutting = new \Roloffice\Controller\CuttingController();
    include filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/../templates/cutting/index.php';
else:
    header('Location: /');
endif;
