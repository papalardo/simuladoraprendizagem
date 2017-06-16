<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Adicionar Perfil</div>
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Descricao</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="descricao" value="<?= $resultado->desc_per?>">
                        <center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
                    </div>
                </div>
                <button type="submit" name="acao" value="update" class="btn btn-default"> Atualizar </button>
            </form>
        </div>
    </div>
</div>
