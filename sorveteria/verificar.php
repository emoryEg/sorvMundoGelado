<?php
// INICIALIZA A SESSÃO
session_start();

// SE NÃO TIVER VARIÁVEIS REGISTRADAS OU SE O NÍVEL DE ACESSO NÃO FOR DEFINIDO
// RETORNA PARA A TELA DE LOGIN
if (!isset($_SESSION['sessaoID']) || !isset($_SESSION['sessaoNome']) || !isset($_SESSION['nivelAcesso'])) {
    Header("Location: index.php");
    exit();
}
?>
