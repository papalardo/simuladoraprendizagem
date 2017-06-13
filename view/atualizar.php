<?php include '../config/DB.php' ; 


$pontuacao = 100;
$i = 0;

if ($_POST['acao'] == 'atualizar'){
    
    $posicao = $_POST['posicao'];
    
    $sequencia = array(0 => 1,
                            1 => 2,
                            2 => 3,
                            3 => 4,
                            4 => 5);
    
    foreach($posicao as $key){
        $sql  = "SELECT * FROM tb_usuarios WHERE usuario_id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $key, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetch();
                
        if ($posicao[$i] != $sequencia[$i]){
            $pontuacao = $pontuacao - 20;
        }
        
        $i++;
        
    }
        if ($posicao == $sequencia){
            echo "<a class='btn btn-primary'> Nivel Completo </a>" ;
        }
       
        echo $pontuacao;
       echo '<pre>';
        print_r($posicao);
        echo '</pre>';
    
    
       echo '<pre>';
        print_r($sequencia);
        echo '</pre>';
}

?>