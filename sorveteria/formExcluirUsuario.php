<?php
    // Vai verificar se a nossa sessão está ativa
    require_once("verificar.php");
    // Vai fazer a conexão com o nosso banco de dados imaginário
    require_once("includes/conectarBD.php");
    // Função que vai exibir a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include_once 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="#!" class="brand-logo">Menu de Opções</a>
            <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="navbar-itens" class="right hide-on-med-and-down">
                <li><a href="formIncluirUsuario.php">Incluir</a></li>
                <li><a href="formAlterarUsuario.php">Alterar</a></li>
                <li><a href="formPesquisarUsuarios.php">Pesquisar</a></li>
                <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i class="material-icons">arrow_drop_down</i></a></li>
            </ul>
        </div> 
    </nav>
</div>
<ul id="dropdown" class="dropdown-content">
    <li><a href="menuGerSorvetes.php"><i class="material-icons left">tag_faces</i>Gerenciamento de Sorvetes</a></li>
    <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
</ul>

<ul id="mobile-navbar" class="sidenav">
    <li><a href="formIncluirUsuario.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a></li>
    <li><a href="formExcluirUsuario.php"><i class="material-icons left">delete</i>Excluir</a></li>
    <li><a href="formPesquisarUsuarios.php"><i class="material-icons left">search</i>Pesquisar</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerSorvetes.php"><i class="material-icons left">mood</i>Gerenciamento de Sorvetes</a></li>
    <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
</ul>
<div>
    <b><?php
        //vai exibir o nome do usuário que está logado e a data corrente
        echo "O Usuário " . $_SESSION['sessaoNome'] . " está logado no sistema neste momento!!!! Hoje é " . $data;
    ?></b>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Usuário</b></font></div></td>
        </tr>
    </table>
<?php
    if (!isset($_POST["usuID"]) && !isset($_POST["enviar"])) {
?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">event_note</i>
                        <input type="text" name="usuID" size="10" required>
                        <label for="usuID">Código do Usuário</label>
                    </div>
                </div>                    
            </div>
            <div class="row center">
                <div class="col s12">
                    <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="excluir" value="Excluir Dados do Usuário">
                        <i class="material-icons left">delete</i>Excluir Dados do Usuário
                    </button>
                </div>
                <div class="col s12">
                    <br><button class="waves-effect waves-light btn-large blue lighten-1">Não Lembra o Código?<a href='formPesquisarUsuarios.php'>Clique Aqui</a></button>
                </div>
            </div>
        </div>
    </form>
<?php
    }
    //Vai buscar dados do Cliente
    else if (!isset($_POST["enviar"])) {
        $usuID = $_POST["usuID"];
        $consulta = mysqli_query($conexao, "SELECT usuID, usuNome FROM usuariosadm WHERE usuID = '$usuID'");          
        //obtém a resposta do Select executado acima
        $linha = mysqli_num_rows($consulta);
        if ($linha == 0) {
            echo "Cliente não encontrado: $usuID";
        } else {
            echo "<div><font face=Arial size=4><b>Usuário Encontrado:</b></font></div>";
            //seta a linha de campoCliente da tabela clientes e depois coloca cada campo em uma variável
            $campoUsuario = mysqli_fetch_assoc($consulta);
            $usuID = $campoUsuario["usuID"];
            $usuNome = $campoUsuario["usuNome"];
?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
            <tr bgcolor="#6699CC">
                <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Usuários Cadastrados</font></b></font></div></td>
            </tr>
            <tr>
                <td width="5%"><div align="left"><b><font face="Arial" size="2">Código do Usuário</font></b></div></td>
                <td width="5%"><div align="left"><b><font face="Arial" size="2">Nome do Usuário</font></b></div></td>
            </tr>
            <tr>
                <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $usuID;?></font></td>
                <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $usuNome;?></font></td>
            </tr>
        </table>
        <input type="hidden" name="usuID" value="<?php echo $usuID;?>">
        <input type="hidden" name="enviar" value="S">
        <div class="col s12 center">
            <br><button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="excluir" value="Deseja Realmente Excluir o Usuário?">
                <i class="material-icons left">delete</i>Deseja Realmente Excluir o Usuário?
            </button>
        </div>
    </form>
<?php
        mysqli_close($conexao);
    }
    } else {
        // Excluir Usuário
        $usuID = $_POST["usuID"];
        $deleta = mysqli_query($conexao, "DELETE FROM usuariosadm WHERE usuID = '$usuID'");
        // O comando mysqli_affected_rows() vai retornar a quantidade de linhas alteradas com o comando DELETE
        if (mysqli_affected_rows($conexao) > 0) {
            echo "<p align='center'>Dados do Usuário foram excluídos com sucesso!!!</p>";
        } else {
            $erro = mysqli_error($conexao);
            echo "<p align='center'>Erro: $erro</p>";
        }
        mysqli_close($conexao);
    }
?>
    <div class="col s12 center">
        <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
    </div>
<?php
include_once 'includes/rodape.php';
?>
