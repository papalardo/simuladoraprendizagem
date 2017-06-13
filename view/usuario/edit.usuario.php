<?php
$id = $_GET['id'];
$resultado = $usuario->procurar($id);
?>  

<div class="row">
   
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Atualizar usuario</div>
            <div class="panel-body">


             <form action="" method="post" class="form-horizontal">
                   <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome" value="<?= $resultado->nome ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="<?= $resultado->email ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">CPF</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cpf"value="<?= $resultado->cpf ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pwd" class="control-label col-sm-4">Avatar</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="avatar">
                    </div>
                </div>
                    <button type="submit" name="atualizar" class="btn btn-default">Atualizar</button>
                </form>