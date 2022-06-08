<?php

if(!isset($_SESSION["name"])){
    header('Location: /?page=home');
}