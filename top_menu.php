<body class="hold-transition skin-purple-light fixed sidebar-mini">
<div class="wrapper">
 <header class="main-header">
  <a href="#" class="logo">
   <span class="logo-mini"><img src="<?php echo $server; ?>/dist/img/logo/ICLogoMin.png" width="50"/></span>
   <span class="logo-lg"><img src="<?php echo $server; ?>/dist/img/logo/ICLogoMini.png" width="180" /></span>
  </a>
  <nav class="navbar navbar-static-top">
   <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Minizar Navegação</span>
   </a>
   <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
    <!-- PAINEL DE USUÁRIO, MENU SUPERIOR (TOP-MENU) -->
     <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo $server; ?>/Associados/uploads/<?php echo $FotoUsuario; ?>" class="user-image" alt="Foto do perfil de <?php echo $uNome; ?>">
        <span class="hidden-xs"><?php echo $NomeUserLogado; ?></span>
      </a>
      <ul class="dropdown-menu">
              <!-- User image -->
       <li class="user-header">
        <img src="<?php echo $server; ?>/Associados/uploads/<?php echo $FotoUsuario; ?>" class="img-circle" alt="Foto do perfil de <?php echo $uNome; ?>">
        <p>
        <?php echo $uNome; ?>
         <small>Interact Club de <?php echo $uClubeNome; ?></small>
        </p>
       </li>
       <!-- INATIVO POR ENQUANTO -->  
       <li class="user-body">
        <div class="row">
         <div class="col-xs-4 text-center">
          <a href="#">Followers</a>
         </div>
         <div class="col-xs-4 text-center">
          <a href="#">Sales</a>
         </div>
         <div class="col-xs-4 text-center">
          <a href="#">Friends</a>
         </div>
        </div>
       </li>
       <!-- RODAPÉ DO MENU -->
       <li class="user-footer">
        <div class="pull-left">
         <a href="<?php echo $server; ?>/MeuPerfil/dashboard.php" target="_blank" class="btn btn-default btn-flat">MEU PERFIL</a>
        </div>
        <div class="pull-right">
         <a href="#" class="btn btn-default btn-flat">Sign out</a>
        </div>
       </li>
      </ul>
    </li>
     </li>
     <li>
       <a href="<?php echo $server; ?>/logout.php" class="btn btn-danger btn-flat">Sair</a>
     </li>
    </ul>
    </div>
    </nav>
  </header>