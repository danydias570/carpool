<?php

session_start();

define("ROOT", "../");

if(!empty($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 'home';
}

if(file_exists(ROOT . 'pages/' . $page . '/index.php'))
{
    require ROOT . 'pages/' . $page . '/index.php';
}
else
{
    header("Location: /?page=home");
    exit;
}