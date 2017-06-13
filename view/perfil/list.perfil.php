<div class="col-md-8 col-md-offset-2">
<table class="table table-condensed table-striped table-bordered">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Descricao</th> 
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($perfil->listarTodos() as $value): ?>

			
				<tr>
                    <td><?= $value->perfil_id ?> </td>
					<td><?php echo $value->descricao; ?></td>
					<td>
						<?php echo "<a class='btn btn-success btn-xs' href='?acao=editar&id={$value->perfil_id}'><span class='glyphicon glyphicon-pencil'> Editar</span></a>"; ?>
						<?php echo "<a class='btn btn-danger btn-xs' href='?acao=deletar&id={$value->perfil_id}' onclick='return confirm(\"Deseja realmente deletar?\")'><span class='glyphicon glyphicon-trash'> Deletar</span></a"; ?>
					</td>
				</tr>
			

			<?php endforeach; ?>
    </tbody>
</table>
</div>