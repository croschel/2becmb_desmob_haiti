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
    $nivel_2becmb = $_SESSION['nivel_2becmb'];

	if ($nivel_2becmb < 1) { echo "
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index0.php'>
				<script type=\"text/javascript\"  charset=UTF-8>
				alert(\"Conta não ativada! Aguarde até que sua conta seja ativada.\");
				</script>
				";  
			} 
	
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="alternate" type="" href="" title=""><link rel="" type="" href="" title="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="HandheldFriendly" content="true">
<title>2° B Log L</title>
<link href="./index1_files/formCss.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./index1_files/nova.css">
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
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#EEE9E9, endColorstr=#cccccc,GradientType=0);
  }
  
   .backcolor {
 /* Firefox 3.6+ */
 background-image: -moz-linear-gradient(top,#EEE9E9, #cdcdcd);
 /* Safari 5.1+ e Chrome 10+ */
 background-image: -webkit-linear-gradient(top,#EEE9E9, #cdcdcd);
 /* Opera 11.10+ */
 background-image: -o-linear-gradient(top,#EEE9E9, #cdcdcd);
 /* Para IE 8 */
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#EEE9E9, endColorstr=#cdcdcd,GradientType=0);
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
        background:black;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:100%;
        color:#555 !important;
        font-family:'Lucida Grande',' Lucida Sans Unicode',' Lucida Sans',' Verdana',' Tahoma',' sans-serif';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: #555;
    }

</style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>2º B Log L</title>
	

</head>


<body>
<?php
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
header('Content-Type: text/html; charset=UTF-8');




    ?>
<form class="jotform-form" action="" enctype="multipart/form-data" method="post" name="busca" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="50" height="65"></td>
		<td colspan="2"><font color='#000000' size="5" face="arial">Batalhão Cidade de Campinas</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="arial">Controle do Material Classe IX</font>&nbsp </td>
		<td>
		<p align="right">		
			
		<a href="index0.php" title="Página Inicial" > <img src="./imagens/home.png" width="40" height="40"></a> &nbsp&nbsp
		
		<a href="session_destroy.php" title="Sair do sistema" > <img src="./imagens/sair.png" width="40" height="40"></a> &nbsp&nbsp
		</p>
		</td>
		</tr>
	</tbody></table>
	
	<ul class="form-section">
			

<?php 
date_default_timezone_set('America/Sao_Paulo');

$a = date('Y'); $mm = date('m');?>
					
		
<hr align="center">
	  <li class="backcolor1" data-type="control_text" id="id_56">
        
		
		
		
		
		<div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
	
			
	
			<fieldset align='center'>
			<!--<legend><font color='#000000' face="arial" size=3></font></legend>-->
	
			<br><br><br>
			<table align="center" >
			
			<tr>
			<td align="center"><a href="2becmb_controle.php" title="Controle de Vtr e Eqp" target="blank">			<img src="./imagens/material.png" width="80" height="80"></a> &nbsp&nbsp&nbsp&nbsp </td>
			<td align="center"><a href="2becmb_lr_os.php" title="Ordens de Serviço de Vtr e Eqp" target="blank">	<img src="./imagens/os.png" width="80" height="80"></a> &nbsp&nbsp&nbsp&nbsp </td>
			<td align="center"><a href="2becmb_ficha.php" title="Controle de Movimentação de Vtr e Eqp (Fichas e Missões)" target="blank">	<img src="./imagens/ficha.png" width="80" height="80"></a><br></td>
			</tr>
			
			<tr>
			<td align="center"><a href="2becmb_lr_comb.php" title="Abastecimento de Vtr e Eqp" target="blank">		<img src="./imagens/combustivel.png" width="80" height="80"></a> &nbsp&nbsp&nbsp&nbsp </td>
			<td align="center">																						<img src="./imagens/2blogl-logo.png" width="90" height="120" title=""> &nbsp&nbsp&nbsp&nbsp </td>
			<td align="center"><a href="2becmb_lr_mnt.php" title="Itens de Manutenção de Vtr e Eqp" target="blank">	<img src="./imagens/mnt.png" width="80" height="80"></a><br></td>
			</tr>
			
			<tr>
			<td align="center"><?php if ($nivel_2becmb > 1){echo '<a href="2becmb_mot.php" title="Controle de Motoristas e Operadores">';}?><img src="./imagens/motorista.png" width="80" height="80"></a> &nbsp&nbsp&nbsp&nbsp </td>
			<td align="center"><a href="2becmb_controle_busca.php" title="Busca de Vtr e Eqp" target="blank">			<img src="./imagens/busca.png" width="80" height="80"></a> &nbsp&nbsp&nbsp&nbsp </td>
			<td align="center"><?php if ($nivel_2becmb > 7){echo '<a href="2becmb_relatorio_auditoria.php" title="Auditoria" target="blank">';}?><img src="./imagens/auditoria.png" width="80" height="80"></a><br></td>
			</tr>
			
			</table>
			
		    <br><br><br><br>
			
			</fieldset>
			
			


<?php	
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	date_default_timezone_set('America/Sao_Paulo');
	

	
?> 

				
			
		  </div>
		  
        </div>
		
      </li>
	 
	  
</form>


    </ul>
  </div>


</body></html>