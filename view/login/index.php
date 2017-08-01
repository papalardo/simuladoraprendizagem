
<body style="background-color:powderblue;">

<style>
    .login {
        margin: 0 auto;
        width: 400px;
        margin-top: 100px;
    }

</style>


<div class="login">
    <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?= base_url('login/entrar')?>" method="post">
                <div class="form-group">
                    <label>Usuário</label>
                    <input name="username" type="text" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input name="password" type="password" class="form-control" autocomplete="off">
                </div>
                <?php if (isset($_COOKIE['msg'])){
                    echo '<div class="alert alert-danger" role="alert"><center><strong>';
                    echo $_COOKIE['msg'];
                    echo '</strong></center></div>';
                }
                    DestroyCookie('msg'); #Funcao para destruir um cookie
                ?>
                    <button type="submit" class="btn btn-primary col-md-4 col-md-offset-4">Logar</button>
                </form>
        </div>
    </div>
</div>
