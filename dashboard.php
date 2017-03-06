<?php
require("restritos.php"); 
require_once 'init.php';
$cHome = "active";
$PDO = db_connect();
require_once 'QueryUser.php';
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title><?php echo $titulo; ?></title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
 <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
</head>
 <?php include_once 'top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once 'menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Página Inicial
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
  <?php if ($PrivClubes === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Clubes/dashboard.php" >
      <span class="info-box-icon btn-primary"><i class="fa fa-industry"></i></span>
     </a>
     <div class="info-box-content"><h4>Lista de Clubes</h4></div>
    </div>
   </div>
  <?php } else { } ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Associados/dashboard.php" >
      <span class="info-box-icon btn-danger"><i class="fa fa-user"></i></span>
     </a>
     <div class="info-box-content"><h4>Lista de Associados</h4></div>
    </div>
   </div>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Tesouraria/dashboard.php" >
      <span class="info-box-icon bg-black disabled">
       <i class="fa fa-dollar"></i>
      </span>
     </a>
     <div class="info-box-content"><h4>Tesouraria</h4></div>
    </div>
   </div>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="ANP/dashboard.php" >
      <span class="info-box-icon bg-orange">
       <i class="fa fa-file-text"></i>
      </span>
     </a>
     <div class="info-box-content"><h4>Cadastro de Projetos</h4></div>
    </div>
   </div>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="ANP/arquivo.php" >
      <span class="info-box-icon bg-navy">
       <i class="fa fa-list-alt"></i>
      </span>
     </a>
     <div class="info-box-content"><h4>Arquivo Nacional de Projetos</h4></div>
    </div>
   </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php include_once 'footer.php'; ?>

</div>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
