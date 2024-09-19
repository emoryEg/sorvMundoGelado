<?php
    require_once("includes/conectarBD.php");
    // Vai verificar se a sessão está ativa
    require_once("verificar.php");
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
    <li><a href="formIncluirSorvetes.php"><i class="material-icons left">done</i>Incluir</a>
    <li><a href="formExcluirSorvetes.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarSorvetes.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerSorvetes.php"><i class="material-icons left">person_pin</i>Gerenciamento de Sorvetes</a></li>
    <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>   
</ul>
<div>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
      <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
          <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar Sorvetes por Termos de Pesquisa</b></font></div></td>
      </tr>
      </table><br>
<?php
    //Recebe os dados digitados no formulário de cadastro de clientes via método POST
    $sorItemPesquisa = $_POST["sorItemPesquisa"];
    $sorTermoPesquisa = $_POST["sorTermoPesquisa"];
      
    //Elimina os espaços em branco digitados pelo usuário através do comando trim
    $sorItemPesquisa = trim($sorItemPesquisa);
      
    $sqlSorvete = mysqli_query($conexao,"SELECT * FROM sorvetes WHERE ".$sorItemPesquisa." LIKE '%".$sorTermoPesquisa."%'"
    //Ordena pelo número do código do cliente
    ." ORDER BY sorID") or die ("Não foi possível realizar a consulta !!!!");      
?>
<?php
    //Se encontrar algum registro na tabela
    if(mysqli_num_rows($sqlSorvete) > 0)
    {
?>
       <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
       <tr>
           <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Sorvetes Pesquisados</font></b></font></div>
           </td>
       <tr>
           <td width="5%"><div align="left"><b><font face="Arial" size="2">Código do Sorvete</font></b></div></td>
           <td width="5%"><div align="left"><b><font face="Arial" size="2">Nome do Sorvete</font></b></div></td>
       </tr>
<?php
       //Lista os dados da tabela enquanto existir
       while($arraySorvete = mysqli_fetch_array($sqlSorvete))
       {
?>
        <tr>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arraySorvete['sorID'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arraySorvete['sorNome'];?></font></td>
        </tr>
<?php
        //Fecha a execução do comando mysqli_fetch_array 
        }
?>
        </table>
<?php
     }//Fecha a execução do comando mysqli_num_rows > 0
     else
     {
         echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mas não foram encontrados nenhum sorvete !<br><br></font></div>";
     }
?>
<div align="center">
    </br></br>
    <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
</div>
<?php
    include_once 'includes/rodape.php';
?>

