<!-- INÍCIO DO MODAL DE ADICIONAR CARGO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="NovoCargo" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Adicionar novo Cargo ao Histórico do associado</h4>
    </div>
    <div class="box-body">
     <div class="col-md-12">
      <div class="box box-success collapsed-box box-solid">
       <div class="box-header with-border">
        <h3 class="box-title">ADICIONAR CARGO DO CLUBE</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus"></i> Clique aqui para expandir</button>
        </div>
       </div>
       <div class="box-body">
        <form name="NovoCargoClube" id="name" method="post" action="" enctype="multipart/form-data">
         <div class="col-xs-4">Distrito
          <input class="form-control" disabled="disabled" TYPE="text" VALUE="<?php echo $DistritoSocio; ?>">
         </div>
         <div class="col-xs-4">Gestão
          <input name="gestao" type="text" class="form-control" id="gestao" minlength="7" maxlength="7" required="required" placeholder="2011-12" />
         </div>
         <div class="col-xs-4">Tipo de Cargo
          <select class="form-control" name="tipo" id="tipo" required="required">   
           <option value="" checked="checked"> >><<</option>
           <option value="1">Clube</option>
           <option value="2">Distrito</option>
           <option value="3">Interact Brasil</option>
          </select>
         </div>
         <div class="col-md-8">SELECIONE O CLUBE:
         <?php
          $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
           // seleciona os registros
           $stmt3 = $PDO->prepare($QueryClubes3);
           $stmt3->execute();
         ?>
          <div class="form-group">
           <select class="form-control select2" name="cl" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $r['icbr_Clube'] ?>"><?php echo $r['icbr_Clube'] ?></option>
            <?php endwhile; ?>
           </select>
          </div>
         </div>
       <div class="col-md-4">Cargo:
        <?php
         $ChamaCargo = "SELECT * FROM ListaCargos";
          // seleciona os registros
          $stmt2 = $PDO->prepare($ChamaCargo);
          $stmt2->execute();
        ?>
        <div class="form-group">
         <select class="form-control select3" name="cargo" style="width: 100%;">
          <option value="" selected="selected">SELECIONE</option>
          <?php while ($c = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
          <option value="<?php echo $c['NomeCargo'] ?>"><?php echo $c['NomeCargo'] ?></option>
          <?php endwhile; ?>
         </select>
        </div>
       </div>
         <div class="col-xs-12"><br />
          <input name="NovoCargoClube" type="submit" class="btn btn-success btn-block" id="NovoCargoClube" value="Adicionar Cargo"  />
         </div>
        </form>
        <?php
        if(@$_POST["NovoCargoClube"])
        {
         $Gestao = $_POST["gestao"];
         $TipoCargo = $_POST["tipo"];
         $Clube = $_POST["cl"];
         $Cargo = $_POST["cargo"];
         $executa = $PDO->query("INSERT INTO icbr_historico (hist_uid, hist_Gestao, hist_Cargo, hist_Clube, hist_Distrito, hist_Tipo) VALUES ('$IDClube', '$Gestao', '$Cargo', '$Clube', '$DistritoSocio', '$TipoCargo')");
         if($executa)
         {
          echo '
          <script type="text/JavaScript">alert("Cargo Adicionado com Sucesso");
          location.href="VerSocio.php?ID=' . $IDClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }
        }
        ?>      






       </div>
      </div>
     </div> 
     <div class="col-md-12">
      <div class="box box-warning collapsed-box box-solid">
       <div class="box-header with-border">
        <h3 class="box-title">ADICIONAR CARGO DISTRITAL</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus"></i> Clique aqui para expandir</button>
        </div>
       </div>
       <div class="box-body">

       </div>
      </div>
     </div> 








    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE ADICIONAR CARGO -->
<!-- INÍCIO DO MODAL DE TROCAR FOTO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="NovaFoto" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Trocar Foto </h4>
    </div>
    <div class="box-body">

       <form name="trocarFoto" id="name" method="post" action="" enctype="multipart/form-data">
         <div>
          <input name="foto" type="file" class="form" id="foto" onfocus="this.value='';"/>      
         </div><br /><br /><br /><br /><br /><br /><br />
         <div>
          <input name="tc" type="submit" class="btn btn-primary" id="tc" value="Atualizar Foto" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
        </form>
        <?php 
if(@$_POST["tc"]){
  
  if(pega_ext($_FILES["foto"]["name"]) != "jpg" and pega_ext($_FILES["foto"]["name"]) != "png" and pega_ext($_FILES["foto"]["name"]) != "gif"){
    echo '<script type="text/javascript">alert("Sua foto deve ser no formato JPG, PNG ou GIF.");</script>';
    echo '<script type="text/javascript">location.href="javascript: history.back(0);";</script>';
    exit;
  }
  
  if(@$_FILES["foto"]["name"] == true){
    $foto_form = $_FILES["foto"];
    include_once ("../config/upload.php");
      $foto_old = upload_xy ($foto_form, $foto_form, 360, 280);
      $thumb_old = upload_xy ($foto_form, $foto_form, 140, 90);
      $nome_foto = md5(uniqid(time()));
      manipulacao_img($nome_foto, $thumb_old, $foto_old);
      $foto = $nome_foto . '.jpg';
      $thumb = $nome_foto . '_thumb.jpg';
  }

  
  echo '<script type="text/javascript">alert("Foto atualizada no Sistema");</script>';

     $executa = $PDO->query("UPDATE icbr_associado SET icbr_AssFoto='$foto', icbr_AssThumb='$thumb' WHERE icbr_uid='$IDClube'");
   if($executa){
echo '
    <script type="text/JavaScript">alert("Foto Vinculada ao Perfil");
  location.href="VerSocio.php?ID=' . $IDClube . '"</script>';
   }
   else{
      echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';

   }
  
}
?>



    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE TROCAR FOTO -->

<!-- INÍCIO DO MODAL DE REATIVAR ASSOCIADO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="Reintegra" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Readmitir associado</h4>
    </div>
    <div class="box-body">
     <form name="Reativa" id="name" method="post" action="" enctype="multipart/form-data">
      <div class="col-md-8">SELECIONE O CLUBE:
      <?php
       $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
       // seleciona os registros
       $stmt3 = $PDO->prepare($QueryClubes3);
       $stmt3->execute();
      ?>
       <div class="form-group">
        <select class="form-control select2" name="cl" style="width: 100%;">
         <option value="" selected="selected">SELECIONE</option>
          <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
         <option value="<?php echo $r['icbr_Clube'] ?>"><?php echo $r['icbr_Clube'] ?></option>
          <?php endwhile; ?>
        </select>
       </div>
      </div>
       <div class="col-xs-4"><br />
        <input name="Reativa" type="submit" class="btn btn-success btn-block" id="Reativa" value="REATIVAR ASSOCIADO"  />
       </div>
      </form>
      <?php
      if(@$_POST["Reativa"]){
        $NomeClube = $_POST['cl'];      //AQUI CHAMA O NOME DO CLUBE BASEADO NO FORM
        $Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_Clube='$NomeClube'");
        $Dados->execute();
        $Qry = $Dados->fetch();
        $IDNClube = $Qry['icbr_id'];    
        $executa = $PDO->query("UPDATE icbr_associado SET icbr_AssStatus='A', icbr_AssClube='$NomeClube', icbr_AssClubeID='$IDNClube' WHERE icbr_uid='$IDClube' ");
        if($executa)
        {
        echo '
        <script type="text/JavaScript">alert("Associado Reativado com Sucesso");</script>
        <script type="text/JavaScript">window.close();</script>';
        }
        else{
      echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
        }
      }
      ?>


    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE REATIVAR ASSOCIADO -->



<!-- INÍCIO DO MODAL DE DESATVIAR ASSOCIADO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="Desativa" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">DESATIVAR ASSOCIADO</h4>
    </div>
    <div class="box-body">
    <h2> ATENÇÃO, DESEJA REALMENTE DESLIGAR O ASSCIADO? </h2>
     <form name="Desativa" id="name" method="post" action="" enctype="multipart/form-data">
      <div class="col-xs-12"><br />
       <input name="Desativa" type="submit" class="btn btn-danger btn-block btn-lg" id="Desativa" value="SIM, DESATIVAR ASSOCIADO"  />
      </div>
     </form>
     <?php
     if(@$_POST["Desativa"]){
      $DesativaAssociado = $PDO->query("UPDATE icbr_associado SET icbr_AssStatus='I' WHERE icbr_uid='$IDClube' ");
       if($DesativaAssociado)
        {
         echo '
         <script type="text/JavaScript">alert("Associado Desligado com Sucesso");</script>
         <script type="text/JavaScript">window.close();</script>';
        }
        else
        {
         echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
        }
      }
      ?>
    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE DESATIVAR ASSOCIADO -->


