<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0" />
<title><?=$titulo?></title>
<meta name="description" content="Simulador Logistica" />
<meta name="robots" content="index, follow" />
<link rel="icon" type="image/png" href="<?=$url_base?>libs/imgs/icon.png" />
<meta name="author" content="SENAC" />
<link href="<?= base_url('libs/css/index.css')?>" rel="stylesheet" />
<link href="<?= base_url('libs/css/bootstrap.css')?>" rel="stylesheet" />
<script src="<?= base_url('libs/js/jquery.js')?>"></script>
<script src="<?= base_url('libs/js/bootstrap.js')?>"></script>


<style>
/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 190px;
  height: 200px;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}

</style>


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




<div class="container">
    <div class="row profile">
<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
                    <?php if(isset($_SESSION['avatar'])):?>
					<img src="<?= base_url($_SESSION['avatar'])?>" class="img-responsive" alt="">
                    <?php else: ?>
					<img src="<?= base_url('user-photo/1.jpg')?>" class="img-responsive" alt="">
                    <?php  endif; ?>
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?= $_SESSION['nome_usu'] ?>
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- Botoes menu lateral -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Editar</button>
					<a type="button" href="?pag=login&acao=logout" class="btn btn-danger btn-sm">Sair</a>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Inicio </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Gerenciar Conta </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tarefas </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							 </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>

<div class="col-md-9 jumbotron">
<?= include $conteudo ?>
</div>
