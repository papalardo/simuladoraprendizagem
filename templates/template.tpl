<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulador</title>

	<link href="<?= base_url('assets/fonts/icon.css?family=Material+Icons')?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.min.css')?>" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?= base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?= base_url('assets/css/custom-styles.css')?>" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href="<?= base_url('assets/fonts/css.css?family=Open+Sans')?>" rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="#"><i class="large material-icons">view_quilt</i> <strong>Simulador de Logistica</strong></a>

		<div id="sideNav" href="#"><i class="material-icons">chevron_left</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?= $_SESSION['nome_usu']?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-user fa-fw"></i>Meu perfil</a>
</li>
<li><a href="login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>
	   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-user"></i> Perfis<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?= base_url('perfil')?>">Novo</a>
                            </li>
                            <li>
                                <a href="<?= base_url('perfil/listar')?>">Lista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-users"></i> Usuários<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?= base_url('usuario')?>">Novo</a>
                            </li>
                            <li>
                                <a href="<?= base_url('usuario/listar')?>">Listar</a>
                            </li>
                            <li>
                                <a href="#">Nivel 2<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Nivel 3</a>
                                    </li>
                                </ul>

                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
					     <div class="clearBoth"><br/></div>
		      <div class="col-md-12">
                    <div class="card">
                       <!-- <div class="card-action">
                         Empty Page
                        </div> -->
                         <div class="card-content">

                        <?php include $conteudo ?>



					     <div class="clearBoth"><br/></div>

						 </div>
						 </div>

				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?= base_url('assets/js/jquery-1.10.2.js')?>"></script>

	<!-- Bootstrap Js -->
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>

	<script src="<?= base_url('assets/materialize/js/materialize.min.js')?>"></script>

    <!-- Metis Menu Js -->
		<script src="<?= base_url('assets/js/jquery.metisMenu.js')?>"></script>
    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/custom-scripts.js')?>"></script>



</body>

</html>
