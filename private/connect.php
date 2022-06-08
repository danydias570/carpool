<?php

try
{
    $bdd = new PDO('mysql:host=localhost; dbname=Carpool; charset=UTF8', 'root', 'root');
}
catch(Exception $e)
{
    die($e->getMessage());
}