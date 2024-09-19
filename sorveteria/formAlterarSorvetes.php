<?php
    require_once("includes/conectarBD.php");
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
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados de Sorvetes</b></font></div></td>
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
                        <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar" value="Alterar Dados do Sorvete"><i class="material-icons left">border_color</i>Alterar Dados do Sorvete</button>
                    <div><br>
                    <div class = "col s12">
                        <button class="waves-effect waves-light btn-large blue lighten-1">Não Lembra o Código?<a href='pesqTodosSorvetes.php'> Clique Aqui</button>
                    </div>
                </div>
            </div>
        </form>
    <?php
        }
        //Buscará os dados do Cliente
        else if(!isset($_POST["enviar"]))
        {
            $sorID = $_POST["sorID"];
            $consulta = mysqli_query($conexao, "SELECT sorID, sorNome, sorKgPr, sorKgEs FROM sorvetes WHERE sorID = $sorID");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
            if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, o sorvete não foi encontrado
        {
            echo "Sorvete não encontrado: $sorID";
        }
        else
        {
            echo "<div><font face=Arial size=4><b>Sorvete Encontrado:</b></font></div>";
            //seta a linha de campoCliente da tabela clientes e depois, coloca cada campo em uma variável.
            $campoSorvete = mysqli_fetch_row($consulta);
            $sorNome = $campoSorvete[1];
            $sorKgPr = $campoSorvete[2];
            $sorKgEs = $campoSorvete[3];
        ?>
        <form name="formSorvetes" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <tr>
                <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Sorvetes Cadastrados</font></b></font></div></td>
            </tr>
            <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Sorvete</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Sorvete</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Preço do Sorvete /Kg</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Kg do Sorvete no Estoque</font></b></div></td>
            </tr>
            <tr>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $sorID;?></font></td>
                    <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="sorNome" size="42" value="<?php echo $sorNome;?>"></font></td>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="sorKgPr" size="42" value="<?php echo $sorKgPr;?>"></font></td>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="sorKgEs" size="10" value="<?php echo $sorKgEs;?>"></font></td>
                </tr>
        </table>
        <input type ="hidden" name="sorID" value="<?php echo $sorID;?>">
        <input type ="hidden" name="enviar" value="S"><br>
        <div class = "col s12 center">
            <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar" value="Alterar Dados do Sorvete"><i class="material-icons left">assignment_ind</i>Alterar Dados do Sorvete</button>
        </div>
        </form>
    <?php
            mysqli_close($conexao);
        }
        }
        else // alterar cliente
        {
            $sorID=$_POST["sorID"];
            $sorNome=$_POST["sorNome"];
            $sorKgPr=$_POST["sorKgPr"];
            $sorKgEs=$_POST["sorKgEs"];
            $altera = mysqli_query($conexao, "UPDATE sorvetes SET sorNome='$sorNome', sorKgPr='$sorKgPr', sorKgEs='$sorKgEs' WHERE sorID='$sorID'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados do Sorvete $sorNome alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center'>";
                    echo "<tr>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%'><div align='left'><b><font face='Arial'csize='2'>Código do Sorvete</font></b></div></td>";
                        echo "<td width='10%'><div align='left'><b><font face='Arial' size='2'>Sorvete</font></b></div></td>";
                        echo "<td width='10%'><div align='left'><b><font face='Arial' size='2'>Preço do Sorvete por Kg</font></b></div></td>";
                        echo "<td width='10%'><div align='left'><b><font face='Arial' size='2'>Sorvete no Estoque/ em Kg</font></b></div></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$sorID</font></td>";
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$sorNome</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$sorKgPr</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$sorKgEs</font></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
        mysqli_close($conexao);
    }
    ?>
    <div class = "col s12 center">
        <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>

