<?php 
$Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube'");
$Dados->execute();
$Qry = $Dados->fetch();

$clubeNome = $Qry['icbr_Clube'];
$clubeRotary = $Qry['icbr_RotaryPadrinho'];
$clubeDataFundado = $Qry['icbr_DataFundado'];
$StatusClub = $Qry['icbr_Status'];
$clubePresidente = $Qry['icbr_Presidente'];
$clubeSecretario = $Qry['icbr_Secretario'];
$clubeTesoureiro = $Qry['icbr_Tesoureiro'];





  ?>