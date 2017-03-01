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
      <form name="cadastrar_anuncio" id="name" method="post" action="" enctype="multipart/form-data">
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
       $ChamaCargo = "SELECT * FROM ListaCargos WHERE TipoCargo='1'";
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
        <input name="enviar" type="submit" class="btn btn-success btn-block" id="enviar" value="Adicionar Cargo"  />
       </div>
      </form>
      <?php
      if(@$_POST["enviar"]){
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




