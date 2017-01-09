<?php 
$Dados = $PDO->prepare("SELECT * FROM icbr_projeto WHERE id='$codProjeto'");
$Dados->execute();
$Qry = $Dados->fetch();

$NomeProjeto = $Qry['pro_nome'];
$AvenidaProjeto = $Qry['pro_avenida'];
$ClubeProjeto = $Qry['pro_clube'];
$StatusProjeto = $Qry['pro_status'];
$DistritoProjeto = $Qry['icbr_distrito'];
$AndamentoProjeto = $Qry['pro_and'];
$AbrangenciaProjeto = $Qry['pro_dimensao'];
?>