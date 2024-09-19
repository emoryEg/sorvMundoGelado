<?php
    //INICIALIZA A SESSÃO
    session_start();

    //DESTROI AS VARIÁVEIS
    unset($_SESSION['sessaoID']);
    unset($_SESSION['sessaoNome']);

    //REDIRECIONA PARA A TELA DE LOGIN
    Header("Location: index.php");
?>
