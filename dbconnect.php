<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=data", "root" , "");    
}catch(PDOException $pdo){
    die("Unsuccessful connection");
}