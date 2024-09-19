<?php
    // Verifica se a sessão está ativa
    require_once("verificar.php");
    // Função para exibir a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include_once 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
        <nav>
            <div class="nav-wrapper blue lighten-1">
                <a href="#!" class="brand-logo">Menu de Opções</a>
                <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="navbar-itens" class="right hide-on-med-and-down">
                    <li><a href="formAlterarUsuario.php">Alterar</a>
                    <li><a href="formExcluirUsuario.php">Excluir</a>
                    <li><a href="formPesquisarUsuarios.php">Pesquisar</a>
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
        <li><a href="formAlterarUsuario.php"><i class="material-icons left">done</i>Alterar</a>
        <li><a href="formExcluirUsuario.php"><i class="material-icons left">delete</i>Excluir</a>
        <li><a href="formPesquisarUsuarios.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerSorvetes.php"><i class="material-icons left">mood</i>Gerenciamento de Sorvetes</a></li>
        <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>     
    </ul>
    <div>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Usuários</b></font></div></td>
        </tr>
    </table>
    <form name="formUsuario" id="formUsuario" method="POST" action="incluirUsuario.php">
    <div class = "container" style="margin-top: 100px">
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">keyboard</i>
                    <input type="text" name="usuNome" required>
                    <label for="usuNome">Nome de Usuário:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">dehaze</i>
                    <input type="password" name="usuSenha" required>
                    <label for="usuSenha">Senha:</label>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col s12">
            <div class="input-field col s12">
                <i class="material-icons prefix">supervisor_account</i>
                <select name="nivelAcesso" required>
                    <option value="" disabled selected>Selecione o nível de acesso:</option>
                    <option value="1">Administrador</option>
                    <option value="2">Sub-administrador</option>
                </select>
                    <label for="nivelAcesso">Nível de Acesso:</label>
                </div>
            </div>
        </div>
    </div><br/><br/>
    <div align="center">
        <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="cadUsuario" value="Cadastrar Usuario"><i class="material-icons left">assignment_ind</i>Cadastrar Usuário</button>
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
    </div>
    </form>
<?php
    include_once 'includes/rodape.php';
?>

