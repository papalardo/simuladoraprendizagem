<div class="col-md-8 col-md-offset-2">
<table class="table table-condensed table-striped table-bordered">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Hora Inicio</th>                    
					<th>Hora Fim</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($usuario->listarTodos() as $value): ?>

			
				<tr>
					<td><?php echo $value->usuario_id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->email; ?></td>
					<td>
						<?php echo "<a class='btn btn-success btn-xs' href='?acao=editar&id={$value->usuario_id}'><span class='glyphicon glyphicon-pencil'> Editar</span></a>"; ?>
						<?php echo "<a class='btn btn-danger btn-xs' href='?acao=deletar&id={$value->usuario_id}' onclick='return confirm(\"Deseja realmente deletar?\")'><span class='glyphicon glyphicon-trash'> Deletar</span></a"; ?>
					</td>
				</tr>
			

			<?php endforeach; ?>
    </tbody>
</table>
</div>