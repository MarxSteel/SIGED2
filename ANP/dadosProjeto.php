<?php 
$Dados = $PDO->prepare("SELECT * FROM icbr_projeto WHERE id='$codProjeto'");
$Dados->execute();
$Qry = $Dados->fetch();

$NomeProjeto = $Qry['pro_nome'];
$AvenidaProjeto = $Qry['pro_avenida'];
$ClubeCodigo = $Qry['pro_clube'];
$StatusProjeto = $Qry['pro_status'];
$DistritoProjeto = $Qry['pro_distrito'];
$AndamentoProjeto = $Qry['pro_and'];
$AbrangenciaProjeto = $Qry['pro_dimensao'];
$DataCadastro = $Qry['pro_DataCadastro'];
$ChaveSCry = $DistritoProjeto . $codProjeto;
$ChaveCry = crypt($ChaveSCry, 12);



$ChamaClube = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$ClubeCodigo'");
$ChamaClube->execute();
 $Valores = $ChamaClube->fetch();
  $ClubeProjeto = $Valores['icbr_Clube'];
  $EmailClube = $Valores['icbr_ProjetoEmail'];

?>

