<center>
    <?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?>
</center>
<style>

    tr:first-child > td {
        border-top: px!important;
    }

    tr td{
      padding: 1px !important;
      margin: 5px !important;
    }

</style>
<div class="col-md-6 col-md-offset-3">
<table class="table table-hover">
    <tbody>
        <?php foreach ($listar as $dados): ?>
        <tr>
            <td rowspan="4" width="200px">
            <center>
                <?php if ( ! $dados->avatar_usu){
                echo "<img src='" . base_url('user-photo/1.jpg') . "' width='100px'>";

                }
                ?>
            <br>
            <div class="btn-group">
                <a href="<?= base_url('index.php?pag=usuario&acao=deletar&id='.$dados->id_usu) ?>" class="btn btn-xs btn-danger">Deletar</a>
                <a href="<?= base_url('index.php?pag=usuario&acao=editar&id='.$dados->id_usu) ?>" class="btn btn-xs btn-warning">Editar</a>
            </div>
            </center>
            </td>
            <td>
               <label>Nome/Perfil</label> <?= $dados->nome_usu ?> - <?= $dados->desc_per ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email:</label> <?= $dados->email_usu ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>CPF:</label> <?= $dados->cpf_usu ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Sexo:</label> <?= $dados->sexo_usu ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
