<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "cadastro";

    $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
?>