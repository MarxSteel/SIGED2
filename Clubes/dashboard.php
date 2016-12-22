<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
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
 <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
   <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="hold-transition skin-blue-light fixed sidebar-mini">
<div class="wrapper">
 <header class="main-header">
  <a href="../#" class="logo">
   <span class="logo-mini"><img src="../dist/img/logo/ICLogoMin.png" width="50"/></span>
   <span class="logo-lg"><img src="../dist/img/logo/ICLogoMini.png" width="180" /></span>
  </a>
  <nav class="navbar navbar-static-top">
   <a href="../#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Minizar Navegação</span>
   </a>
   <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
     <li class="dropdown user user-menu">
      <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
       <span class="hidden-xs"><?php echo $NomeUserLogado; ?></span>
      </a>
      <ul class="dropdown-menu">
       <li class="user-header">
        <p><?php echo $NomeUserLogado; ?></p>
       </li>
       <li class="user-footer">
        <div class="pull-left">
         <a href="../user/perfil.php" class="btn btn-info">Dados de Perfil</a>
        </div>
        <div class="pull-right">
         <a href="../logout.php" class="btn btn-danger">Sair</a>
        </div>
       </li>
      </ul>
     </li>
     <li>
       <a href="../logout.php" class="btn btn-danger btn-flat">Sair</a>
     </li>
    </ul>
    </div>
    </nav>
  </header>
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once '../menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Cadastro de Clubes
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <?php
    if($PrivClubes === '1'){
   ?> 
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#NovoClub">
      <span class="info-box-icon btn-primary"><i class="fa fa-plus"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Adicionar Club</h4></div>
    </div>
   </div>
   <div class="col-xs-12">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs pull-right">
      <li class="active"><a href="#ativo" data-toggle="tab">CLUBES ATIVOS</a></li>
      <li><a href="#inativo" data-toggle="tab">CLUBES INATIVOS</a></li>
      <li class="pull-left header"><i class="fa fa-inbox"></i> Lista de Clubes</li>
     </ul>
     <div class="tab-content no-padding">
      <div class="chart tab-pane active" id="ativo">
       <table id="ativo" class="table table-hover table-striped table-responsive" cellspacing="0" width="100%">
        <thead>
         <tr>
          <td>ID</td>
          <td>Interact Club de:</td>
          <td>Reuni&otilde;es</td>
          <td>Presidente</td>
          <td></td>
         </tr>
        </thead>
        <tbody>
         <?php
          $ClubeAtivo = "SELECT * FROM icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_Status='A'";
           $ChamaAtivo = $PDO->prepare($ClubeAtivo);
           $ChamaAtivo->execute();
            while ($at = $ChamaAtivo->fetch(PDO::FETCH_ASSOC)): 
            echo '<tr>';
            echo '<td>' . $at["icbr_id"] . '</td>';
            echo '<td>' . $at["icbr_Clube"] . '</td>';
            echo '<td>' . $at["icbr_Semana"] . ' - ' . $at["icbr_Horario"] . ' (' . $at["icbr_Periodo"] . ')</td>';
            echo '<td>' . $at["icbr_Presidente"] . '</td>';
            echo '<td>';
             echo '<a class="btn btn-info btn-xs" href="javascript:abrir(';
             echo "'vClube.php?ID=" . $at['icbr_id'] . "');";
             echo '"><i class="fa fa-search"></i></a>&nbsp;';
             echo '<a class="btn btn-danger btn-xs" href="javascript:abrir(';
             echo "'dClube.php?ID=" . $at['icbr_id'] . "');";
             echo '"><i class="fa fa-close"></i></a>&nbsp;';
            echo "</td>";
            echo '</tr>';
               endwhile;
         ?>
        </tbody>
       </table>
      </div>
      <div class="chart tab-pane" id="inativo">TESTE2</div>
     </div>
    </div>
   </div>
   <?php
    }
    else {
     echo '<div class="col-xs-12">';
     echo '<div class="info-box">';
     echo '<div class="alert alert-danger alert-dismissible">';
     echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
     echo '<h4><i class="icon fa fa-ban"></i>Erro!</h4>';
     echo '<h3> Você não tem privilégios suficientes para abrir esta página</h3>';
     echo '</div>';
     echo '</div>';
     echo '</div>';
    }
    ?>
  </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php include_once '../footer.php'; ?>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script>
  $(function () {
    $("#ativo").DataTable();
    $("#Reteste1510").DataTable();
    $("#RetesteAcesso").DataTable();
  });
</script>
<script language="JavaScript">
function abrir(URL) {
 
  var width = 1000;
  var height = 650;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
</body>
</html>
