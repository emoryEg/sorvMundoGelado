<?php
    // Inicializa a sessão
    session_start();

    // Faz a conexão com o banco de dados MySQL
    include_once("includes/conectarBD.php");

    // Recebe os dados do formulário index.php via método POST
    if (empty($_POST['indexUsuario']) || empty($_POST['indexSenha'])) {
        header('Location: index.php');
        exit();
    }

    $autUsuario = mysqli_real_escape_string($conexao, $_POST['indexUsuario']);
    $autSenha = mysqli_real_escape_string($conexao, (sha1($_POST['indexSenha'])));
    
    // Consulta se os dados digitados estão gravados na tabela usuariosadm
    $sql = "SELECT usuID, usuNome, nivelAcesso FROM usuariosadm WHERE usuNome = '$autUsuario' AND usuSenha = ('$autSenha')";
    $result = mysqli_query($conexao, $sql);

    // Se os dados estiverem gravados no banco, a variável $linhas receberá 1
    $linhas = mysqli_num_rows($result);

// Se os dados estiverem gravados no banco, a variável $linha receberá 1
$linhas = mysqli_num_rows($result);

// Se os dados estiverem em branco ou foram digitados errado e não existem no banco, a variável linha receberá zero (0)
if ($linhas != 0) {
    // Obtenha o nível de acesso a partir do resultado da consulta
    $row = mysqli_fetch_assoc($result);
    $nivelAcesso = $row['nivelAcesso'];

    // Gravar as variáveis que iremos utilizar na nossa sessão
    $_SESSION['sessaoID'] = $autUsuario;
    $_SESSION['sessaoNome'] = $autUsuario;
    $_SESSION['nivelAcesso'] = $nivelAcesso; // Defina o nível de acesso aqui
    Header("Location: menuOpcoesGeral.php");
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}

