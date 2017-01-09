<!-- MODAL DE TROCA DE ROTARY CLUB PATROCINADOR -->

<div class="modal fade" id="TrocaRotary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Alterar Rotary Club Patrocinador</h4>
      </div>
      <div class="modal-body">
        <h3>Rotary Club Patrocinador Atual: <strong><?php echo $clubeRotary; ?></strong></h3>

       <form name="ReativaClube" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="col-xs-8">Rotary Club Padrinho
         <input name="RCPadrinho" type="text" required class="form-control" placeholder="Nome Completo do Rotary Club Padrinho" />
        </div>
        <div class="col-xs-4">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="modal-footer"><br /><br /><br />
         <input name="ReativaClube" type="submit" class="btn btn-primary" value="Atualizar Cadastro"  />
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
       </form>
       <?php 
        if(@$_POST["ReativaClube"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $RotaryPadrinho = $_POST['RCPadrinho'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_RotaryPadrinho='$RotaryPadrinho' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DE RC PATROCINADOR -->
<!-- MODAL DE TROCA DE ROTARY CLUB PATROCINADOR -->
<div class="modal fade" id="DataFundacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Alterar Data de Fundação do Interact Club</h4>
      </div>
      <div class="modal-body">
        <h3>Data de Fundação/Reativação Atual: <strong><?php echo $clubeDataFundado; ?></strong></h3>
       <form name="TrocaDataFundado" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="input-group">
         <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
          <input type="text" name="DataFund" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required="required" placeholder="Data">
         </div>
        <div class="col-xs-4">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="col-xs-4"><br />
         <input name="TrocaDataFundado" type="submit" class="btn btn-primary" value="Atualizar Cadastro"  />
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        <div class="modal-footer"><br /><br /><br />
        </div>
       </form>
       <?php 
        if(@$_POST["TrocaDataFundado"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $NovaData = $_POST['DataFund'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_DataFundado='$NovaData' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DE RC PATROCINADOR -->
<!-- MODAL DE TROCA DADOS DE REUNIÃO -->
<div class="modal fade" id="AlteraReuniao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Alterar Dados de Reunião</h4>
      </div>
      <div class="modal-body">
       <form name="TrocaReuniao" id="name" method="post" action="" enctype="multipart/form-data">
       <div class="col-xs-10">Local de Reunião
        <input type="text" name="LocalReuniao" required class="form-control" placeholder="Digite aqui o nome do local de reunião" />
       </div>
       <div class="col-xs-2">Hor&aacute;rio de Reuni&atilde;o
        <input type="text" name="HoraReuniao" required class="form-control" minlength="5" maxlength="5" placeholder="HH:MM" />
       </div>
       <div class="col-xs-3">Periodo
        <select class="form-control" name="PeriodoReuniao" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="semanal"> Semanal</option>
         <option value="quinzenal"> Quinzenal</option>
         <option value="mensal"> Mensal</option>
        </select>
       </div>
       <div class="col-xs-3">Dia da Semana
        <select class="form-control" name="diaSemana" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="Segunda-Feira"> Segunda-Feira</option>
         <option value="Ter&ccedil;a-Feira"> Ter&ccedil;a-Feira</option>
         <option value="Quarta-Feira"> Quarta-Feira</option>
         <option value="Quinta-Feira"> Quinta-Feira</option>
         <option value="Sexta-Feira"> Sexta-Feira</option>
         <option value="Sabado"> S&aacute;bado</option>
         <option value="Domingo"> Domingo</option> 
        </select>
       </div>
       <div class="col-xs-3">Senha de Administrador
        <input name="passRDI" type="password" required class="form-control" />
       </div>
       <div class="col-xs-3"><br />
        <input name="TrocaReuniao" type="submit" class="btn bg-purple btn-block" value="ATUALIZAR DADOS"  />
       </div>
       <div class="modal-footer"><br /><br /><br />
        </div>
       </form>
       <?php 
        if(@$_POST["TrocaReuniao"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $LocalReuniao = $_POST['LocalReuniao'];
          $HoraReuniao = $_POST['HoraReuniao'];
          $PeriodoReuniao = $_POST['PeriodoReuniao'];
          $DiaReuniao = $_POST['diaSemana'];
          $NovaData = $_POST['DataFund'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_Periodo='$PeriodoReuniao' , icbr_Semana='$DiaReuniao', icbr_Horario='$HoraReuniao', icbr_Complemento='$LocalReuniao'  WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DADOS DE REUNIÃO -->
<!-- MODAL DE TROCA DE ENDEREÇO -->
<div id="AlteraEndereco" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-yellow">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Endereço</h4>
   </div>
   <div class="modal-body">
    <form name="AlteraEndereco" method="post" action="" enctype="multipart/form-data">
       <div class="col-xs-10">Endere&ccedil;o
        <input type="text" name="rua" required class="form-control" placeholder="RUA SETE DE SETEMBRO" />
       </div>
       <div class="col-xs-2">N&uacute;mero
        <input type="text" name="num" required class="form-control"/>
       </div>
       <div class="col-xs-4">CEP (COM PONTUAÇÃO)
        <input type="text" name="CEP" required class="form-control" minlength="10" maxlength="10" placeholder="12.345-678" />
       </div>
       <div class="col-xs-4">Bairro
        <input type="text" name="bairro" required class="form-control" placeholder="BAIRRO" />
       </div>
       <div class="col-xs-4">Cidade
        <input type="text" name="cidade" required class="form-control" placeholder="CIDADE" />
       </div>
       <div class="col-xs-4">Estado
        <select class="form-control" name="UF" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="AC"> Acre</option>
         <option value="AL"> Alagoas</option>
         <option value="AM"> Amap&aacute;</option>
         <option value="BA"> Bahia</option>
         <option value="CE"> Cear&aacute;</option>
         <option value="DF"> Distrito Federal</option>
         <option value="ES"> Esp&iacute;rito Santo</option>
         <option value="GO"> Goi&aacute;</option>
         <option value="MA"> Maranh&atilde;o</option>
         <option value="MT"> Mato Grosso</option>
         <option value="MS"> Mato Grosso do Sul</option>
         <option value="MG"> Minas Gerais</option>
         <option value="PA"> Par&aacute;</option>
         <option value="PB"> Para&iacute;ba</option>
         <option value="PR"> Paran&aacute;</option>
         <option value="PE"> Pernambuco</option>
         <option value="PI"> Piau&iacute;</option>
         <option value="RJ"> Rio de Janeiro</option>
         <option value="RN"> Rio Grande do Norte</option>
         <option value="RS"> Rio Grande do Sul</option>
         <option value="RO"> Rond&ocirc;nia</option>
         <option value="RR"> Roraima</option>
         <option value="SC"> Santa Catarina</option>
         <option value="SP"> S&atilde;o Paulo</option>
         <option value="SE"> Sergipe</option>
        </select>
       </div>
       <div class="col-xs-4">Senha de Administrador
        <input name="passRDI" type="password" required class="form-control" />
       </div>
       <div class="col-xs-4"><br />
        <input name="AlteraEndereco" type="submit" class="btn btn-warning btn-block" value="ATUALIZAR ENDEREÇO"  />
       </div>
       <div class="modal-footer"><br /><br /><br />
        </div>
       </form>
       <?php 
        if(@$_POST["AlteraEndereco"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $Rua = $_POST['rua'];
          $Num = $_POST['num'];
          $CEP = $_POST['cep'];
          $Bairro = $_POST['bairro'];
          $Cidade = $_POST['cidade'];
          $UF = $_POST['UF'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_CEnd='$Rua', icbr_CNum='$Num', icbr_Bairro='$Bairro', icbr_Cidade='$Cidade', icbr_UF='$UF' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>    





   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FIM DO MODAL DE TROCA DE ENDEREÇO -->
<!-- Cadastro de novo clube -->
<div id="NovoClub" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-blue-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastrar Novo Clube</h4>
   </div>
   <div class="modal-body">
    <form name="NovoClube" id="NovoClube" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-4">Interact Club de:
      <input type="text" name="NomeClube" class="form-control" placeholder="Curitiba Leste" />
     </div>
     <div class="col-xs-4">Rotary Club Patrocinador (Nome Completo):
      <input type="text" name="NomeRotary" class="form-control" placeholder="Rotary Club de Curitiba Leste" />
     </div><br />
     <div class="input-group">
      <div class="input-group-addon">
       <i class="fa fa-calendar"></i>[
      </div>
       <input type="text" name="DataFundado" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)"  placeholder="Data de Funda&ccedil;&atilde;o">
      </div>
      <div class="col-xs-12">
      <h5><strong>DADOS DE REUNI&Atilde;O</strong></h5>
      </div>
       <div class="col-xs-4">Local de Reunião
        <input type="text" name="LocalReuniao"  class="form-control" placeholder="Digite aqui o nome do local de reunião" />
       </div>
       <div class="col-xs-2">Hor&aacute;rio de Reuni&atilde;o
        <input type="text" name="HoraReuniao"  class="form-control" minlength="5" maxlength="5" placeholder="HH:MM" />
       </div>
       <div class="col-xs-3">Periodo
        <select class="form-control" name="PeriodoReuniao" >
         <option checked> >>SELECIONE<<</option>
         <option value="semanal"> Semanal</option>
         <option value="quinzenal"> Quinzenal</option>
         <option value="mensal"> Mensal</option>
        </select>
       </div>
       <div class="col-xs-3">Dia da Semana
        <select class="form-control" name="diaSemana" >
         <option checked> >>SELECIONE<<</option>
         <option value="Segunda-Feira"> Segunda-Feira</option>
         <option value="Ter&ccedil;a-Feira"> Ter&ccedil;a-Feira</option>
         <option value="Quarta-Feira"> Quarta-Feira</option>
         <option value="Quinta-Feira"> Quinta-Feira</option>
         <option value="Sexta-Feira"> Sexta-Feira</option>
         <option value="Sabado"> S&aacute;bado</option>
         <option value="Domingo"> Domingo</option> 
        </select>
       </div>
      <div class="col-xs-12">
      <h5><strong>DADOS DE ENDERE&Ccedil;O</strong></h5>
      </div>
       <div class="col-xs-10">Endere&ccedil;o
        <input type="text" name="rua"  class="form-control" placeholder="RUA SETE DE SETEMBRO" />
       </div>
       <div class="col-xs-2">N&uacute;mero
        <input type="text" name="num"  class="form-control"/>
       </div>
       <div class="col-xs-4">CEP (COM PONTUAÇÃO)
        <input type="text" name="CEP"  class="form-control" minlength="10" maxlength="10" placeholder="12.345-678" />
       </div>
       <div class="col-xs-4">Bairro
        <input type="text" name="bairro"  class="form-control" placeholder="BAIRRO" />
       </div>
       <div class="col-xs-4">Cidade
        <input type="text" name="cidade"  class="form-control" placeholder="CIDADE" />
       </div>
       <div class="col-xs-4">Estado
        <select class="form-control" name="UF" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="AC"> Acre</option>
         <option value="AL"> Alagoas</option>
         <option value="AM"> Amap&aacute;</option>
         <option value="BA"> Bahia</option>
         <option value="CE"> Cear&aacute;</option>
         <option value="DF"> Distrito Federal</option>
         <option value="ES"> Esp&iacute;rito Santo</option>
         <option value="GO"> Goi&aacute;</option>
         <option value="MA"> Maranh&atilde;o</option>
         <option value="MT"> Mato Grosso</option>
         <option value="MS"> Mato Grosso do Sul</option>
         <option value="MG"> Minas Gerais</option>
         <option value="PA"> Par&aacute;</option>
         <option value="PB"> Para&iacute;ba</option>
         <option value="PR"> Paran&aacute;</option>
         <option value="PE"> Pernambuco</option>
         <option value="PI"> Piau&iacute;</option>
         <option value="RJ"> Rio de Janeiro</option>
         <option value="RN"> Rio Grande do Norte</option>
         <option value="RS"> Rio Grande do Sul</option>
         <option value="RO"> Rond&ocirc;nia</option>
         <option value="RR"> Roraima</option>
         <option value="SC"> Santa Catarina</option>
         <option value="SP"> S&atilde;o Paulo</option>
         <option value="SE"> Sergipe</option>
        </select>
       </div>
        <div class="col-xs-4">Senha de Administrador
         <input name="passRDI" type="password"  class="form-control" />
        </div>
        <div class="col-xs-4"><br />
         <input name="NovoClub" type="submit" class="btn btn-primary block" value="CADASTRAR CLUBE"  />
        </div>
        <div class="modal-footer"><br /><br /><br />
        </div>
       </form>

       <?php 
        if(@$_POST["NovoClub"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {          
          $NomeClube = $_POST['NomeClube'];
          $NomeRotary = $_POST['NomeRotary'];
          $DataFundado = $_POST['DataFundado'];
          $Rua = $_POST['rua'];
          $Num = $_POST['num'];
          $CEP = $_POST['cep'];
          $Bairro = $_POST['bairro'];
          $Cidade = $_POST['cidade'];
          $UF = $_POST['UF'];
          $LocalReuniao = $_POST['LocalReuniao'];
          $HoraReuniao = $_POST['HoraReuniao'];
          $PeriodoReuniao = $_POST['PeriodoReuniao'];
          $DiaReuniao = $_POST['diaSemana'];
          $NovaData = $_POST['DataFund'];

          $Cadastra = $PDO->query("INSERT INTO icbr_clube (icbr_Clube, icbr_DataFundado, icbr_Distrito, icbr_RotaryPadrinho, icbr_CEnd, icbr_CNum, icbr_Bairro, icbr_Cidade, icbr_CEP, icbr_UF, icbr_Periodo, icbr_Semana, icbr_Horario, icbr_Complemento, icbr_Status) VALUES ('$NomeClube', '$DataFundado', '$Distrito', '$NomeRotary', '$Rua', '$Num', '$Bairro', '$Cidade', '$CEP', '$UF', '$PeriodoReuniao', '$DiaReuniao', '$HoraReuniao', '$LocalReuniao', 'A')");

           if($Cadastra)
           {
            echo '<script type="text/JavaScript">alert("Clube Cadastrado com Sucesso");
              location.href="dashboard.php"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL CADASTRAR, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }



         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>    





   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- Cadastro de Novo Clube -->



<!-- MODAL DE EXEMPLO -->
<div id="modalnovo" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Preço</h4>
   </div>
   <div class="modal-body">
    

   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE EXEMPLO -->