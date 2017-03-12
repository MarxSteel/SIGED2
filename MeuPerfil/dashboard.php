<?php
require("../restritos.php"); 
require_once '../init.php';
$cPerfil = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
$QueryClubes = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='A' ORDER BY icbr_AssNome ASC";
$stmt = $PDO->prepare($QueryClubes);
$stmt->execute();

$QryAssI = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='I' ORDER BY icbr_AssNome ASC";
$AssI = $PDO->prepare($QryAssI);  //AQUI CHAMO ASSOCIADOS DESLIGADOS
$AssI->execute();
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
 <link rel="stylesheet" href="../plugins/select2/select2.min.css">
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once '../menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Meu Perfil
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-md-4"><!-- DADOS DO PERFIL -->
    <!-- Profile Image -->
    <div class="box box-primary">
     <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="<?php echo $server; ?>/dist/img/perfil/<?php echo $FotoUsuario; ?>" alt="Foto do perfil de <?php echo $uNome; ?>">
      <h3 class="profile-username text-center"><?php echo $uNome;?></h3>
      <ul class="list-group list-group-unbordered">
       <li class="list-group-item">
        <b>Interact Club de </b> <a class="pull-right"><?php echo $uClubeNome; ?></a>
       </li>
       <li class="list-group-item">
        <b>Cargo Atual: </b> <a class="pull-right"><?php echo $uCargoAtual; ?></a>
       </li>
      </ul>
      <!--
      <strong><i class="fa fa-book margin-r-5"></i> Ensino</strong>
       <p class="text-muted">
       <?php
        /*
        DECLARANDO A VALIDAÇÃO DE NÍVEL DE ESCOLARIDADE
        1 - ALFABETIZADO
        2 - FUNDAMENTAL INCOMPLETO
        3 - FUNDAMENTAL COMPLETO
        4 - MÉDIO INCOMPLETO
        5 - MÉDIO COMPLETO
        6 - SUPERIOR INCOMPLETO
        7 - SUPERIOR COMPLETO
        8 - PÓS GRADUAÇÃO
        9 - MESTRADO
        10 - DOUTORADO
        */
        if ($uEnsino == "1") {
          echo "ALFABETIZADO";
        }
        elseif ($uEnsino === "2") {
          echo "FUNDAMENTAL INCOMPLETO";
        }
        elseif ($uEnsino === "3") {
          echo "FUNDAMENTAL COMPLETO";
        }
        elseif ($uEnsino === "4") {
          echo "MÉDIO INCOMPLETO";
        }
        elseif ($uEnsino === "5") {
          echo "MÉDIO COMPLETO";
        }
        elseif ($uEnsino === "6") {
          echo "SUPERIOR INCOMPLETO";
        }
        elseif ($uEnsino === "7") {
          echo "SUPERIOR COMPLETO";
        }
        elseif ($uEnsino === "8") {
          echo "PÓS GRADUAÇÃO";
        }
        else{
          echo "NÃO CADASTRADO";
        }
       ?>
       </p>
       <hr>-->
       <strong><i class="fa fa-map-marker margin-r-5"></i> Localização</strong>
        <p class="text-muted"><?php echo $uEnd . ", " . $uNum . " - " . $uBai . ". " . $uCidade . "/" . $uUF; ?></p>
       <hr>
       <strong><i class="fa fa-phone margin-r-5"></i> Contato</strong>
        <p>
         <span>E-Mail: <?php echo $uMail; ?></span><br />
         <span>Fone 1: <?php echo '(' . $uDDD1 . ') ' . $uF1; ?></span><br />
         <span>Fone 2: <?php echo '(' . $uDDD2 . ') ' . $uF2; ?></span>
        </p>
     </div>
    </div>
   </div>
   <div class="col-md-8">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs">
      <li class="active"><a href="#settings" data-toggle="tab"> Dados de Login</a></li>
      <li><a href="#activity" data-toggle="tab">Dados de Distrito</a></li>
      <li><a href="#timeline" data-toggle="tab">Linha do Tempo</a></li>
      
     </ul>
     <div class="tab-content">
      <div class=" tab-pane" id="activity">
      EM BREVE DADOS DO DISTRITO
      </div>
      <div class="tab-pane" id="timeline">
      EM BREVE LINHA DO TEMPO
      </div>
      <div class="active  tab-pane" id="settings">
       <div class="col-xs-8">
        <li class="list-group-item">
         <b>Login do Usuário:</b> 
         <span class="pull-right"><?php echo $login; ?></i>
         </span>
        </li>
        <li class="list-group-item">
         <b>Apelido:</b> 
         <span class="pull-right"><?php echo $NomeUserLogado; ?></i>
         </span>
        </li>
        <li class="list-group-item">
         <b>E-Mail:</b> 
         <span class="pull-right"><?php echo $uMail; ?></i>
         </span>
        </li>
        <li class="list-group-item">
         <b>Senha:</b> 
         <span class="pull-right">***********</i>
         </span>
        </li>
        <li class="list-group-item">
         <b>Padrão de Cor:</b> 
         <span class="pull-right">
         <?php
         if ($CorPainel === "blue") {
           echo "Azul / Painel Escuro";
         }
         elseif ($CorPainel === "blue-light") {
           echo "Azul / Painel Claro";
         }
         elseif ($CorPainel === "yellow") {
           echo "Laranja / Painel Escuro";
         }
         elseif ($CorPainel === "yellow-light") {
           echo "Laranja / Painel Claro";
         }
         elseif ($CorPainel === "green") {
           echo "Verde / Painel Escuro";
         }
         elseif ($CorPainel === "green-light") {
           echo "Verde / Painel Claro";
         }           
         elseif ($CorPainel === "purple") {
           echo "Roxo / Painel Escuro";
         }
         elseif ($CorPainel === "purple-light") {
           echo "Roxo / Painel Claro";
         }  
         elseif ($CorPainel === "red") {
           echo "Vermelho / Painel Escuro";
         }
         elseif ($CorPainel === "red-light") {
           echo "Vermelho / Painel Claro";
         }  
         elseif ($CorPainel === "black") {
           echo "Branco / Painel Escuro";
         }
         elseif ($CorPainel === "black-light") {
           echo "Branco / Painel Claro";
         }  

         ?>
         </span>
        </li> 
       </div>
       <div class="col-xs-4">
       <p>
<br /><br />
       </p>
       <p>
        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#TNome">
         <i class="fa fa-refresh"></i> Atualizar Apelido
        </button>
       </p>
       <p>
        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#TMail">
         <i class="fa fa-refresh"></i> Atualizar E-Mail
        </button>
       </p>
       <p>
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#TPass">
         <i class="fa fa-refresh"></i> Atualizar Senha
        </button>
       </p>
       <p>
        <button type="button" class="btn bg-purple btn-block" data-toggle="modal" data-target="#TCor">
         <i class="fa fa-refresh"></i> Atualizar Padrão de Cor
        </button>
       </p>
       </div>
       <form class="form-horizontal"><div class="form-group"></div></form>
      </div>
     </div>
    </div>
   </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php 
include_once 'modal.php';
include_once '../footer.php';
?>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
