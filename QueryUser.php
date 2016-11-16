<?php 
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $Distrito = $row['Distrito'];								//DISTRITO DO USUÁRIO
  $PrivClubes = $row['PClubes'];							//Privilégio para visualizar Clubes
  $PrivAssociado = $row['PAssociados'];						//Privilégios para Acessar Associados
  $PrivTesouraria = $row['PTesouraria'];					//Privilégio para Acessar Tesouraria
  $PrivSecretaria = $row['PSecretaria'];					//Privilégio para Acessar Secretaria
  $PrivANP = $row['PANP'];									//Privilégios ANP

?>
