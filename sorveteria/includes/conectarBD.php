<?php
    define("HOST", "localhost");
    define("USUARIO", "root");
    define("SENHA", "");
    define("NOMEBD", "sorveteria");

    $conexao = new mysqli(HOST, USUARIO, SENHA, NOMEBD);

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }
?>
