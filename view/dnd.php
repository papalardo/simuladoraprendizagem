<!doctype html>
<?php include '../config/DB.php' ; ?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Draggable + Sortable</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style>
  ul { list-style-type: none; margin: 0; padding: 0; margin-bottom: 10px; }
  li { margin: 5px; padding: 5px; width: 150px; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    
     $("#sortable1,#sortable2").sortable({
      revert: true,
    connectWith: ".connectedSortable",
      update: function(){
          var posicao = $("#sortable1").sortable("serialize")+'&acao=atualizar';
          $.post("atualizar.php", posicao, function(retorno){
              $("#array").html(retorno);
          })
      }
    });
      
    $( "ul, li" ).disableSelection();
  } );
  </script>
</head>
<body>
 
<?php 

$id = $_GET['simulador_id'];
    
 function listarTodos($id){
        $sql  = "SELECT * FROM tb_itens WHERE AtividadeSimulador_id = :id ORDER by descricao ASC";
		$stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}
    
    $usuarios = listarTodos($id);
    
   
?>
<div class="well col-md-3">
<ul id="sortable2" class="connectedSortable">
<?php foreach ($usuarios as $key): ?>
 <li class="ui-state-default" id="posicao_<?= ($key->id_item); ?>"><?= $key->descricao?></li>
<?php endforeach ?>
</ul>
</div>
<div class="well col-md-3">
<ul id="sortable1" class="connectedSortable">
<li></li>
</ul>
</div>
<div id="array" class="cold-md-3"></div>
 
</body>
</html>