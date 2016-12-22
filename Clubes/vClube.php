<?php
require("../restritos.php"); 
require_once '../init.php';
$codClube = $_GET['ID']; 
$PDO = db_connect();
require_once '../QueryUser.php';
require_once 'ValidaClube.php';

$teste = "teste";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title><?php echo $titulo; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <style type="text/css">
  .texto {
    word-wrap: break-word;
  }
  </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
 <div class="wrapper">
  <header class="main-header">
   <nav class="navbar navbar-static-top">
    <div class="container">
     <div class="navbar-header">
      <span class="logo-lg"><img src="../dist/img/logo/ICLogoMini.png" width="200"></span>
     </div>
     <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
       <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs">Olá, <?php echo $NomeUserLogado; ?></span></a>
       </li>
      </ul>
     </div>
    </div>
   </nav>
  </header>
  <div class="content-wrapper">
   <div class="container">
    <section class="content">
     <div class="box box-default">
      <div class="box-header with-border">
       <h2 class="box-title"><strong>#<?php echo $codClube; ?></strong>
        - Interact Club de <?php echo $clubeNome; ?></h2>
      </div>
      <div class="box-body">
       <div class="col-xs-8">
        <li class="list-group-item">
         <b>Rotary Club Patrocinador:</b> 
         <a class="pull-right"><?php echo $clubeRotary; ?></i></a>
        </li>
        <li class="list-group-item">
         <b>Data de Fundação:</b> 
         <a class="pull-right"><?php echo $clubeDataFundado; ?></strong></i></a>
        </li>
        <li class="list-group-item">
         <b>Status:</b>
         <a class="pull-right">
         <?php 
          if($StatusClub === 'A')
          {
            echo '<span class="btn btn-success btn-xs btn-block">ATIVO</span>';  
          }
          elseif($StatusClub === 'D')
          {
            echo '<span class="btn bg-orange btn-xs btn-block">INATIVO</span>';  
          }
          else{
              
          }
         ?> </a>
        </li>
       </div>
       <div class="col-xs-4">
        <li class="list-group-item">

        </li>
       </div>
       <div class="col-xs-12">
        <h4>CONSELHO DIRETOR</h4>
       </div>  
      <div class="col-xs-4">
       <li class="list-group-item">
        <b>PRESIDENTE</b> 
       </li>
       <li class="list-group-item">
        <?php echo $clubePresidente; ?>
       </li>
      </div>
      <div class="col-xs-4">
       <li class="list-group-item">
        <b>SECRETÁRIO</b> 
       </li>
       <li class="list-group-item">
        <?php echo $clubePresidente; ?>
       </li>
      </div>
      <div class="col-xs-4">
       <li class="list-group-item">
        <b>TESOUREIRO</b> 
       </li>
       <li class="list-group-item">
        <?php echo $clubePresidente; ?>
       </li>
      </div>
     <div class="col-xs-12"> 
      <h4>LISTA DE ASSOCIADOS</h4>
     </div>
      <div class="col-xs-12">
       <li class="list-group-item">
        <?php
           $QueryClubes = "SELECT * FROM icbr_associado WHERE icbr_AssClubeID='$codClube'";
           $stmt = $PDO->prepare($QueryClubes);
           $stmt->execute();
        ?>
        <table id="associados" class="table table-responsive table-bordered table-striped">
         <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Cargo</th>
            <th>Data de Posse</th>
          </tr>
         </thead>
         <tbody>
          <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
           <td><?php echo $user['icbr_uid']; ?></td>
           <td><?php echo $user['icbr_AssNome']; ?></td>
           <td><?php echo $user['icbr_AssDtNascimento']; ?></td>
           <td><?php echo $user['icbr_AssCargo']; ?></td>
           <td><?php echo $user['icbr_DtPosse']; ?></td>             
          </tr>
         </tbody>
           <?php endwhile; ?>

        </table>
           
      </li>
      </div>
      </div>
     </div>
    </section>
  </div>
 </div><?php include_once '../footer.php'; ?></div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
</body>
</html>
