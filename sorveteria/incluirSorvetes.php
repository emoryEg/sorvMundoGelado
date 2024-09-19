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
                    <li><a href="menuGerSorvetes.php"><i class="material-icons left">tag_faces</i>Gerenciamento de Sorvetes</a></li>
                    <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
                </ul>
            </div> 
        </nav>
    </div> 
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="menuGerSorvetes.php"><i class="material-icons left">tag_faces</i>Gerenciamento de Clientes</a></li>
        <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>    
    </ul>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Sorvetes</b></font></div></td>
        </tr>
    </table><br/>
    <?php
        //Recebe os dados digitados no formulário de cadastro de clientes via método POST
        $nomeSor = $_POST["sorNome"];
        $kgprSor = $_POST["sorKgPr"];
        $kgesSor = $_POST["sorKgEs"];
        //O comando SQL que gravará os dados dos clientes na tabela clientes. Observem que estamos utilizando o comando str_to_date no campo $dtInclusao para que o usuário possa digitar a data no formato dd/mm/aaaa
        $sql = mysqli_query($conexao,"INSERT INTO sorvetes (sorNome, sorKgPr, sorKgEs) VALUES ('$nomeSor', '$kgprSor', '$kgesSor')") or die("Erro no comando SQL!!!<br/> <b><a href='formIncluirSorvetes.php'><b>Voltar Para a Inclusão de Sorvetes</a><br/>".mysqli_error($conexao));
        echo "<div align=center>Os dados do Sorvete $nomeSor foram cadastrados com sucesso!!! Veja abaixo os dados cadastrados.<br/><br/>";
        echo "<table class='striped'>";
        echo "<tr>";
        echo "<th><div>Nome do Sorvete:</div></th>";
        echo "<th><div>Preço do Sorvete /Kg:</div></th>";
        echo "<th><div>Kg do Sorvete no Estoque:</div></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$nomeSor</font></td>";
        echo "<td>$kgprSor</font></td>";
        echo "<td>$kgesSor</font></td>";
        echo "</tr>";
        echo "</table><br/>";
        echo "<div align='center'><font face='Arial' size='2'>";
        echo "<b><a href='formIncluirSorvetes.php'><b>Voltar para a Inclusão de Sorvetes</a><br/>";
        echo "<b><a href='formAlterarSorvetes.php'><b>Voltar para a Alteração de Sorvetes</a><br/>";
        echo "<b><a href='formExcluirSorvetes.php'><b>Voltar para a Exclusão de Sorvetes</a><br/>";
        echo "<b><a href='menuPesquisarSorvetes.php'><b>Voltar para a Pesquisa de Sorvetes</a><br/>";
        echo "<b><a href='menuGerSorvetes.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a><br/>";
        echo "<b><a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Gerais</a><br/>";
    ?>
    <div align="center">
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">done</i>Sair do Sys Sorveteiro</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>
