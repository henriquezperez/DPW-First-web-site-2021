<?php
    $dbName="uClases";
    $dbUser = "root";
    $dbPass = "";

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser,$dbPass);
        $pdo->query("SET NAMES 'utf8'");
    }catch(Exception $ex){
        echo "Error. " . $ex->getMessage();
    }