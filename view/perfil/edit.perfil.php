<?php
$id = $_GET['id'];
$resultado = $perfil->procurar($id);
?>  

<div class="row">
   
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Atualizar perfil</div>
            <div class="panel-body">


             <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-4">Hora Inicio</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="descricao" value="<?= $resultado->descricao ?>">
                        </div>
                    </div>
                    <button type="submit" name="atualizar" class="btn btn-default">Atualizar</button>
                </form>