<?php
 
/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/
 
if (isset($_POST['enviarFormulario'])){
 
 
/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
 
$enviaFormularioParaNome = 'Nome do destinatário que receberá formulário';
$enviaFormularioParaEmail = 'Lminichelli@hotmail.com';
 
$caixaPostalServidorNome = 'Interact Brasil - CNP (Cadastro Nacional de Projetos)';
$caixaPostalServidorEmail = 'projetos@interactbrasil.org';
$caixaPostalServidorSenha = 'testar';
 
/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
 
 
/* abaixo as veriaveis principais, que devem conter em seu formulario*/
 
$remetenteNome  = $_POST['remetenteNome'];
$remetenteEmail = $_POST['remetenteEmail'];

$assunto  = $_POST['assunto'];
$AssuntoEmail = "Novo Projeto Cadastrado: ID:545 - " . $remetenteNome;
$mensagem = $_POST['mensagem'];
 

$mensagemConcatenada = '<meta Content-type: text/html; charset="UTF-8"><link href="/email-marketing/style.css" rel="stylesheet" type="text/css" media="all"/><div class="conteudo" style="margin-top:0px;"><html><head></head> <style>body{margin: 0;padding: 0;}@media only screen and (max-width: 340px){table, img[class="partial-image"]{width:100% !important; min-width: 200px !important;}}</style><body topmargin=0 leftmargin=0> <table style="border-collapse: collapse; border-spacing: 0; min-height: 418px;" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f2f2f2"> <tbody> <tr> <td align="center" style="border-collapse: collapse; padding-top: 30px; padding-bottom: 30px;"> <table cellpadding="5" cellspacing="5" width="600" bgcolor="white" style="border-collapse: collapse; border-spacing: 0;"> <tbody> <tr> <td style="border-collapse: collapse; padding: 0px; text-align: center; width: 600px;"> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; max-width: 600px; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 0px; line-height: 0px; mso-line-height-rule: exactly;"> <table width="100%" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"> <tbody> <tr> <td align="center" style="border-collapse: collapse; line-height: 0px; padding: 0; mso-line-height-rule: exactly;"> <a target="_blank" style="display: block; text-decoration: none; box-sizing: border-box; font-family: arial; width: 100%;"> <img class="partial-image" src="http://interactbrasil.org/layoutemail/capa.png" width="600" style="box-sizing: border-box; display: block; max-width: 600px; min-width: 160px;"> </a> </td></tr></tbody> </table> </td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; font-family: Arial; font-size: 25px; padding-bottom: 20px; padding-top: 20px; text-align: center; vertical-align: middle;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"> <table width="100%" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"> <tbody> <tr> <td style="border-collapse: collapse;"> <h2 style="font-weight: normal; margin: 0px; padding: 0px; color: rgb(251,73,89); word-wrap: break-word;"> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(0,165,208);">Voc&ecirc; tem um novo projeto, Hora de Revisar!</span> </h2> </td></tr></tbody> </table> </td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"> <table width="100%" style="border-collapse: collapse; border-spacing: 0; text-align: left; font-family: Arial;"> <tbody> <tr> <td style="border-collapse: collapse;"> <div style="font-family: Arial; font-size: 15px; font-weight: normal; line-height: 170%; text-align: left; color: #666; word-wrap: break-word;"> <span>Foi cadastrado um novo projeto para o seu clube, e você recebeu uma nova chave para edita-lo.</span><br/> <h3 style="font-weight: normal; margin: 0px; padding: 0px; color: rgb(251,73,89); word-wrap: break-word;"> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(0,165,208);"> Nome do Projeto: <span style="color: rgb(251,73,89);">' . $remetenteNome . '</span><br/> Data de Cadastro: <span style="color: rgb(251,73,89);">10/01/2017</span> Avenida: <span style="color: rgb(251,73,89);">' . $assunto . '</span><br/> </span> <h2 style="font-weight: normal; margin: 0px; padding: 0px; color: rgb(251,73,89); word-wrap: break-word;"> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(0,165,208);">Chave de Acesso:</span> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(251,73,89);">JJKO23JKSAS</span> </h2> </h3> </div></td></tr></tbody> </table></td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; padding-bottom: 10px; padding-top: 10px; text-align: center;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"> <div style="font-family: Arial; text-align: center;"> <table style="border-collapse: collapse; border-spacing: 0; background-color: rgb(251,73,89); border-radius: 10px; color: rgb(255,255,255); display: inline-block; font-family: Arial; font-size: 15px; font-weight: bold; text-align: center;"> <tbody style="display: inline-block;"> <tr style="display: inline-block;"> <td align="center" style="border-collapse: collapse; display: inline-block; padding: 15px 20px;"> <a target="_blank" href="#LINKEDITARPROJETO" style="display: inline-block; text-decoration: none; box-sizing: border-box; font-family: arial; color: #fff; font-size: 15px; font-weight: bold; margin: 0px; padding: 0px; text-align: center; word-wrap: break-word; width: 100%;">CLIQUE AQUI PARA EDITAR SEU PROJETO </a> </td></tr></tbody> </table> </div></td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; display: table;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"><table width="100%" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"><tbody><tr><td style="border-collapse: collapse;"><hr style="border-color: rgb(161,128,97); border-style: dashed;"></td></tr></tbody></table></td></tr></tbody></table><table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%;"><tbody><tr><td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"><table width="170" align="right" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"><tbody><tr><td style="border-collapse: collapse; padding-left: 10px;"><a target="_blank" style="display: inline-block; text-decoration: none; box-sizing: border-box; font-family: arial; width: 100%;"><img width="160" style="box-sizing: border-box; display: block; max-width: 100%; min-width: 160px; padding-left: 0px!important; padding: 0px 5px; width: 270px;" class="partial-image" src="http://interactbrasil.org/layoutemail/logoICBRasil.png"></a></td></tr></tbody></table><div style="text-align: left; font-family: Arial; font-size: 15px; font-weight: normal; line-height: 170%; color: #666;"><div style="word-wrap: break-word; font-size: 16px;"><div><i>Este é um email automático, favor não responder.</i></div><div>MDIO Interact Brasil.<span style="line-height: 0; display: none;"></span><span style="line-height: 0; display: none;"></span></div></div></div></td></tr></tbody></table><table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; padding: 30px 0px; text-align: center;"><tbody><tr><td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html></div>';



 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 
require_once('PHPMailerAutoload.php');
 
$mail = new PHPMailer();
 
$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'mx1.hostinger.com.br';
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($AssuntoEmail);
$mail->Body  = utf8_decode($mensagemConcatenada);
 
 
$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
 
if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
$mensagemRetorno = 'Formulário enviado com sucesso!';
} 
 
 
}
?>
 
 
 
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
    <meta charset="utf-8">
<title>Formulário Exemplo Autenticado</title>
 
 
</head>
 
<body>
 
<?php
if(isset($mensagemRetorno)){
echo $mensagemRetorno;
}
 
?>
 
<form method="POST" action="" style="width:300px;">
<input type="text" name="remetenteNome" placeholder="Nome completo" style="float:left;margin:10px;">
<input type="text" name="remetenteEmail" placeholder="Email" style="float:left;margin:10px;">
<input type="text" name="assunto" placeholder="Assunto" style="float:left;margin:10px;">
<textarea name="mensagem" placeholder="Mensagem" style="float:left;margin:10px;height:100px;width:200px;"></textarea>
<input type="submit" value="enviar" name="enviarFormulario" style="float:left;margin:10px;">
</form>
 
</body>
</html>