<?php
require_once("includes/conectarBD.php");
// Verifica se a sessão está ativa
require_once("verificar.php");
// Função para exibir a data completa, dia e ano corrente
include 'includes/exibirDia.fcn';
include_once 'includes/cabecalho.php';

// Exibirá o nome do usuário que está logado e a data corrente
echo "O usuário " . $_SESSION['sessaoNome'] . " está logado no sistema neste momento !!!! Hoje é " . $data . "</b><br/><br/>";
?>

<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Usuários</b></font></div></td>
    </tr>
</table><br/>

<?php
// Recebe os dados digitados no formulário de cadastro de usuários via método POST
$usuNome = $_POST["usuNome"];
$usuSenha = $_POST["usuSenha"];
$nivelAcesso = $_POST["nivelAcesso"];

// Hash da senha
$hashedPassword = password_hash($usuSenha, PASSWORD_BCRYPT);

// Comando SQL para inserir os dados do usuário
$sql = "INSERT INTO usuariosadm (usuNome, usuSenha, nivelAcesso) VALUES (?, ?, ?)";
$stmt = $conexao->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssi", $usuNome, $hashedPassword, $nivelAcesso);

    if ($stmt->execute()) {
        echo "<div align=center>Os dados do Usuário $usuNome foram cadastrados com sucesso!!! Veja abaixo os dados cadastrados.<br/><br/>";
        echo "<table class='striped'>";
        echo "<tr>";
        echo "<th><div>Nome de Usuário:</div></th>";
        echo "<th><div>Senha:</div></th>";
        echo "<th><div>Nível de Acesso:</div></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$usuNome</font></td>";
        echo "<td>$usuSenha</font></td>";
        echo "<td>$nivelAcesso</font></td>";
        echo "</tr>";
        echo "</table><br/>";
        echo "<div align='center'><font face='Arial' size='2'>";
        echo "<b><a href='formIncluirUsuario.php'><b>Voltar para a Inclusão de Usuários</a><br/>";
        echo "<b><a href='formAlterarUsuario.php'><b>Voltar para a Alteração de Usuários</a><br/>";
        echo "<b><a href='formExcluirUsuario.php'><b>Voltar para a Exclusão de Usuários</a><br/>";
        echo "<b><a href='formPesquisarUsuarios.php'><b>Voltar para a Pesquisa de Usuários</a><br/>";
        echo "<b><a href='menuGerSorvetes.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a><br/>";
        echo "<b><a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Gerais</a><br/>";
    } else {
        echo "Erro ao executar a consulta SQL: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro ao preparar a consulta SQL: " . $conexao->error;
}
?>

<div align="center">
    </br></br>
    <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
</div>

<?php
include_once 'includes/rodape.php';
?>

