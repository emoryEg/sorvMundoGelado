<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include_once 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="#!" class="brand-logo">Menu de Opções</a>
            <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="navbar-itens" class="right hide-on-med-and-down">
                <li><a href="formIncluirSorvetes.php">Incluir</a>
                <li><a href="formAlterarSorvetes.php">Alterar</a>
                <li><a href="formExcluirSorvetes.php">Excluir</a>
                <li><a href="menuPesquisarSorvetes.php">Pesquisar</a>
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
    <li><a href="formIncluirSorvetes.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
    <li><a href="formAlterarSorvetes.php"><i class="material-icons left">done</i>Alterar</a>
    <li><a href="formExcluirSorvetes.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarSorvetes.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerSorvetes.php"><i class="material-icons left">tag_faces</i>Gerenciamento de Sorvetes</a></li>
    <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>        
</ul>
<div>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar por Código ou Nome</b></font></div></td>
        </tr>
    </table>      
    <form method="POST" action="resultadoPesquisarTermosSorvetes.php">
          <p><div align="left"><font face="Arial" size="2">
          <b>Selecione Código ou Nome:<br>
          <select name="sorItemPesquisa">
              <option value="sorID"><b>Código</option>    
              <option value="sorNome"><b>Nome</option>
              </select><br/><br/>
          <b>Digite um Termo Conforme Item Escolhido Acima:</br>
          <input name="sorTermoPesquisa" type="text" size="40"></br>
          <input type="submit" value="Pesquisar"></font></div><br>               
     </form>
<div class = "col s12 center">
    <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
</div>
<?php
    include_once 'includes/rodape.php';
?>

