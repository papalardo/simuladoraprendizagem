<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0" />
    <title><?=$title?></title>
    <meta name="description" content="Simulador Logistica" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="<?=$url_base?>libs/imgs/icon.png" />
    <meta name="author" content="SENAC" />
    <link href="<?= base_url('libs/css/index.css')?>" rel="stylesheet" />
    <link href="<?= base_url('libs/css/bootstrap.css')?>" rel="stylesheet" />
    <script src="<?= base_url('libs/js/jquery.js')?>"></script>
    <script src="<?= base_url('libs/js/bootstrap.js')?>"></script>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="<?= base_url('index.php?pag=perfil')?>">Adicionar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url('index.php?pag=perfil&acao=listar')?>">Listar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="<?= base_url('?pag=usuario')?>">Adicionar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url('?pag=usuario&acao=listar')?>">Listar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
