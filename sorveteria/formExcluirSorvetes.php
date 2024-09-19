<?php
    //Vai verificar se a nossa sessão esta ativa
    require_once("verificar.php");
    //Vai fazer a conexão com o nosso banco de dados imaginária
    require_once("includes/conectarBD.php");
    //Função que vai exibir a data completa, dia e ano corrente
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
        <li><a href="formAlterarSorvetes.php"><i class="material-icons left">delete</i>Alterar</a>
        <li><a href="menuPesquisarSorvetes.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerSorvetes.php"><i class="material-icons left">person_pin</i>Gerenciamento de Sorvetes</a></li>
        <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>   
    </ul>
    <div>    
     <b><?php
          //vai exibir o nome do usuário que está logado e a data corrente
          echo "O Usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento!!!! Hoje é ".$data;              
     ?></b>
     <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
     <tr>
     <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Sorvete</b></font></div></td>
     </tr>
     </table>      
<?php
     if (!isset($_POST["sorID"])&& !isset($_POST["enviar"]))
     {
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <div class = "container" style="margin-top: 100px">
               <div class="row">
                    <div class = "col s12">
                         <div class="input-field col s12">
                              <i class="material-icons prefix">edit</i>
                              <input type="text" name="sorID" size="10" required>
                              <label for="sorID">Código do Sorvete</label>
                         </div>
                    </div>                    
               </div>
               <div class="row center">
                    <div class = "col s12">
                         <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="excluir" value="Excluir Dados do Sorvete"><i class="material-icons left">delete</i>Excluir Dados do Sorvete</button>
                    </div>
                    <div class = "col s12">
                         <br><button class="waves-effect waves-light btn-large blue lighten-1">Não Lembra o Código?<a href='pesqTodosClientes.php'> Clique Aqui</button>
                    </div>
               </div>
          </div>
     </form>
<?php
     }
     //Vai buscar dados do Sorvete
     else if(!isset($_POST["enviar"])) 
     {
          $sorID = $_POST["sorID"];
          $consulta = mysqli_query($conexao, "SELECT sorID, sorNome, sorKgPr, sorKgEs FROM sorvetes WHERE sorId = '$sorID'");          
        //obtem a resposta do Select executado acima
        $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero o sorvete nao foi encontrado
     {
          echo "Sorvete não encontrado $sorID";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Sorvete Encontrado:</b></font></div>";
          //seta a linha de campoSorvete da tabela sorvetes e depois coloca cada campo em uma variavel
          $campoSorvete = mysqli_fetch_row($consulta);
          $sorNome = $campoSorvete[1];
          $sorKgPr = $campoSorvete[2];
          $sorKgEs = $campoSorvete[3];
          ?>
          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
             <tr bgcolor="#6699CC">
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Sorvetes Cadastrados</font></b></font></div></td>
             </tr>
             <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Sorvete</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Nome do Sorvete</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Preço do Sorvete em Kg</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Estoque do Sorvete em Kg</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $sorID;?></font></td>
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $sorNome;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $sorKgPr;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $sorKgEs;?></font></td>
             </tr>
          </table>
          <input type ="hidden" name="sorID" value="<?php echo $sorID;?>">
          <input type ="hidden" name="enviar" value="S">
          <div class = "col s12 center">
            <br><button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar" value="Deseja Realmente Excluir o Sorvete?"><i class="material-icons left">delete</i>Deseja Realmente Excluir o Sorvete?</button>
          </div>
     </form>
<?php
          mysqli_close($conexao);
     }
    }
    else
    // Excluir Sorvete
    {
         $sorID = $_POST["sorID"];
         $deleta = mysqli_query($conexao, "DELETE FROM sorvetes WHERE sorID = '$sorID'");
         //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
         if (mysqli_affected_rows($conexao)>0)
         {
            echo "<p align='center'>Dados do Sorvete foram excluídos com sucesso!!!</p>";              
         }
         else
         {
             $erro=mysqli_error($conexao);
             echo "<p align='center'>Erro:$erro</p>";
         }
             mysqli_close($conexao);
         }
?>
     <div class = "col s12 center">
          <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sistema Sys Sorveteiro</a>
     </div>
<?php
    include_once 'includes/rodape.php';
?>

