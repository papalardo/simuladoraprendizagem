<center><?php if (isset($_COOKIE['msg'])){ echo $_COOKIE['msg']; } setcookie('msg', NULL, time()-1) ?></center>
<table class="table">
    <thead>
    <th>#</th>
    <th>Descricao</th>
    <th>Acao</th>

    </thead>
    <tbody>
<?php foreach ($listar as $dados): ?>
    <tr>
    <td><?= $dados->id_per ?></td>
    <td><?= $dados->desc_per ?></td>
        <td><a href="<?= base_url('index.php?pag=perfil&acao=deletar&id='.$dados->id_per) ?>">Deletar</a>
            <a href="<?= base_url('index.php?pag=perfil&acao=editar&id='.$dados->id_per) ?>">Editar</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
