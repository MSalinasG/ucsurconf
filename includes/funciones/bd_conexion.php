<?php 
    $conn = new mysqli('localhost','root','','gdlwebcamp');
    $conn->query("SET NAMES utf8");
    $conn->query("SET CHARACTER SET utf8");
    $conn->set_charset('utf8');
    $conn->set_charset('utf-8');

    if($conn -> connect_error){
        echo $error -> $conn->connect_error;
    } 
?>