<?php

try{
    $pdo = new PDO(
        "mysql:host=db;dbname=loja;charsert=utfmb4", "root", "root"
    );
    echo "Conectou";
} catch (PDOException $e){
    echo "Erro: " . $e->getMassage();
}