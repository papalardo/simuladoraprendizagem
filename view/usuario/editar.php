<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">  <center> Atualizar Cadastro
              <?php if (isset($_COOKIE['msg'])){ echo ' - ' . $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>  </div>
        <div class="panel-body">
            <form action="?pag=usuario&acao=atualizar&id=<?= $resultado->id_usu ?>" method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome" value="<?= $resultado->nome_usu ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Sobrenome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sobrenome" value="<?= $resultado->sobrenome_usu ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" value="<?= $resultado->username_usu ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="<?= $resultado->email_usu ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">CPF</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cpf" value="<?= $resultado->cpf_usu ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Senha</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="senha">
                    </div>
                </div>


                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Sexo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sexo" value="<?= $resultado->sexo_usu ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Perfil</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="perfil">
                        <?php
                        foreach($perfis as $perfil):
                            if ($resultado->id_per == $perfil->id_per){
                                echo "<option value='{$perfil->id_per}' selected>{$perfil->desc_per}</option>";
                            } else {
                                echo "<option value='{$perfil->id_per}'>{$perfil->desc_per}</option>";
                            }
                        endforeach; ?>
                        </select>
                    </div>
                </div>


                <center><button type="submit" name="acao" value="update" class="btn btn-default"> Atualizar Cadastro </button></center>
            </form>
        </div>
    </div>
</div>
