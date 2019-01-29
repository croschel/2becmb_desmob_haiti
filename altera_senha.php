<?php
    header('Content-Type: text/html; charset=UTF-8');
	session_start();

    if(!isset($_SESSION['usuario']) AND !isset($_SESSION['senha'])) {
   header("Location: index.php");
   exit;
  }

    if($_SESSION['final'] < time()){
   header("Location: session_destroy.php");
   exit;
   }
    
	include "conecta.php";

    $usuario = $_SESSION['usuario'];
	$su = $_SESSION['su'];
	$posto_grad = utf8_encode($_SESSION['posto_grad']);
	$nome_guerra =  utf8_encode($_SESSION['nome_guerra']);
	$funcao = utf8_encode($_SESSION['funcao']);
	$nivel_2becmb = $_SESSION['nivel_2becmb'];
	$nivel_adm = $_SESSION['nivel_adm'];
	$nivel = $_SESSION['nivel'];
	
	if (($nivel_2becmb < 1 )&&($nivel < 1 )&&($nivel_adm < 1 )) { echo "
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index0.php'>
				<script type=\"text/javascript\"  charset=UTF-8>
				alert(\"Acesso negado. \");
				</script>
				";  
			} 
	

?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="alternate" type="" href="" title=""><link rel="" type="" href="" title="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="HandheldFriendly" content="true">
<title>2º B Log L</title>
<link href="./index1_files/formCss.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./index1_files/nova.css">
<link rel="shortcut icon" href="http://10.12.125.45/imagens/fav.png">
<link type="text/css" media="print" rel="stylesheet" href="./index1_files/printForm.css">
<style type="text/css">
 .backcolor1 {
 /* Firefox 3.6+ */
 background-image: -moz-linear-gradient(top,#EEE9E9, #000000);
 /* Safari 5.1+ e Chrome 10+ */
 background-image: -webkit-linear-gradient(top,#EEE9E9, #000000);
 /* Opera 11.10+ */
 background-image: -o-linear-gradient(top,#EEE9E9, #000000);
 /* Para IE 8 */
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#EEE9E9, endColorstr=#000000,GradientType=0);
  }
 </style>
 
<style type="text/css">
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    body, html{
        margin:0;
        padding:0;
        background:#000;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:600px;
        background: #000;
        color:#555 !important;
        font-family:'Lucida Grande',' Lucida Sans Unicode',' Lucida Sans',' Verdana',' Tahoma',' sans-serif';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: #555;
    }

</style>


</head>
<body>

<form class="jotform-form" action="alterar_senha.php" method="post" name="teste" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="50" height="75"></td>
		<td><font color='#000000' size="5" face="verdana">2º Batalhão Logístico Leve</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Controle de Material Classe IX</font></td>
		</tr>
	</tbody></table>
	
	<ul class="form-section">
     
 
		

<hr align="center">
	  <li class="backcolor1" data-type="control_text" id="id_56">
        <div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
			
			<fieldset align='center'>
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/altera_senha_faixa.png" width="80%" height="50" border="0"></font></legend>

			<br><br>
			
			<table align="center" cellpadding="4">
			
			<tr>
			<td><img src="./imagens/cpf.png" width="130" height="25" title="usuário(CPF)"></td>						<td><input name="usuario" type="int" size="9" id="usuario" maxlength="11"/></td></tr>
			
			<tr><td><img src="./imagens/senha_2.png" width="130" height="25"> </td>									<td><input name="senha_ant" type="password" size="9" /></td></tr>
			
			<tr><td><img src="./imagens/senha_3.png" width="130" height="25"> </td>									<td><input name="nova_senha1" type="password" size="9" /></td></tr>
			
			<tr><td><img src="./imagens/senha_3.png" width="130" height="25" title="Confirmar Nova Senha"> </td>	<td><input name="nova_senha2" type="password" size="9" title="Confirmar Nova Senha"/></td></tr>
			
			<tr></tr>
			
			</table>


				<p align="center">
				<input type="image" src="imagens/alterar.png" width="120" height="50" value="submit"></p> &nbsp
				
				
                <!--<a href="cadastra_usuarios.php"><img src="imagens/novo_usuario.png" width="120" height="50" border="0"></a> &nbsp
                  <a href="altera_senha.php"><img src="imagens/altera_senha.png" width="31%" height="50" border="0"></a></p>-->
				
				<p align="center"><font color="#EEE9E9" size="4" face="verdana">O Suor Poupa o Sangue! <br> Ao Braço Firme!</font></p>
				
				
				</fieldset>
				
			
		  </div>
        </div>
      </li>
    </ul>
  </div>
</form>

</body></html>