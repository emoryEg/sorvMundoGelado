<?php
    include_once 'includes/cabecalho.php';
    include_once 'includes/imagem.php';
?>

<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card blue lighten-5"> <!-- Altere a classe aqui -->
            <div class="card-content">
                <span class="card-title center-align">Acesse o Sistema Sys Sorveteiro</span>
                <form name="formAutentica" method="post" action="autenticar.php">
                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="indexUsuario" required>
                        <label for="indexUsuario">Usuário</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" class="validate" name="indexSenha" required>
                        <label for="indexSenha">Senha</label>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light" type="submit" name="btnEntrar">Entrar no Sistema Sys Sorveteiro
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'includes/rodape.php';
?>
