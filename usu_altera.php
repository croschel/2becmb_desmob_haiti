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
	$nivel_adm = $_SESSION['nivel_adm'];

	if ($nivel_adm < 10 ) { echo "
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index0.php'>
				<script type=\"text/javascript\"  charset=UTF-8>
				alert(\"Acesso negado para seu nível de usuário. \");
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
        background:#000;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:800px;
        background: #000;
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
	<title>#</title>
  
  

</head>	

<body>
<?php

$a1 = $_GET['id_usu'];

// consulta
	$sql = "SELECT * FROM usu WHERE id_usu LIKE '$a1'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
	$usuario = $resultado['usuario'];
	$posto_grad = utf8_encode($resultado['posto_grad']);
	$nome_guerra = utf8_encode($resultado['nome_guerra']);
	$om = utf8_encode($resultado['om']);
	$su = utf8_encode($resultado['su']);
	$funcao = utf8_encode($resultado['funcao']);
	$tel_movel = $resultado['tel_movel'];
	$niv_adm = utf8_encode($resultado['nivel_adm']);
	$niv_2becmb = utf8_encode($resultado['nivel_2becmb']);
	$niv = utf8_encode($resultado['nivel']);
	
	
?>

<form class="jotform-form" action="usu_alterar.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="60" height="75"></td>
		<td colspan="2"><font color='#000000' size="5" face="verdana">2º Batalhão Logístico Leve</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Controle do Material Classe IX</font></td>
		<td>
			<p align="right">
		
		<a href="index2.php" title="Página Inicial" > <img src="./imagens/home.png" width="40" height="40"></a> &nbsp&nbsp&nbsp
		
		<a href="session_destroy.php" title="Sair do sistema" > <img src="./imagens/sair.png" width="40" height="40"></a> &nbsp&nbsp&nbsp
			</p>
		</td>
		</tr>
	</tbody></table>
	
	<ul class="form-section">
		

<hr align="center">
	  <li class="backcolor" data-type="control_text" id="id_56">
        <div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
			
			<fieldset align='center'>
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/altera.png" width="80%" height="40" border="0"></font></legend>

			<table align="center" cellpadding="4">			
			
			<tr><td><font color='#000000' face="verdana" size=2>Id:</font></td><td><input name="id" type="text" id="id" value="<?php echo $a1;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>CPF:</font></td><td><input name="usuario" type="text" id="usuario" value="<?php echo $usuario;?>" readonly></td></tr>
			
			<tr><td colspan="2"><hr></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Posto/Grad: </b></font></td><td><select name='posto_grad'><?php
			echo "<option value='$posto_grad'>".$posto_grad."</option>";
			echo "<option value='Gen Ex'>Gen Ex</option>";
			echo "<option value='Gen Div'>Gen Div</option>";
			echo "<option value='Gen Bda'>Gen Bda</option>";
			echo "<option value='Cel'>Cel</option>";
			echo "<option value='Ten Cel'>Ten Cel</option>";
			echo "<option value='Maj'>Maj</option>";
			echo "<option value='Cap'>Cap</option>";
			echo "<option value='1º Ten'>1º Ten</option>";
			echo "<option value='2º Ten'>2º Ten</option>";
			echo "<option value='Asp Of'>Asp Of</option>";
			echo "<option value='S Ten'>S Ten</option>";
			echo "<option value='1º Sgt'>1º Sgt</option>";
			echo "<option value='2º Sgt'>2º Sgt</option>";
			echo "<option value='3º Sgt'>3º Sgt</option>";
			echo "<option value='Cb'>Cb</option>";
			echo "<option value='Taifeiro'>Taifeiro</option>";
			echo "<option value='Sd'>Sd</option>";
			?>
			</select></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Nome Guerra:</b></font></td><td><input name="nome_guerra" type="text" id="nome_guerra" value="<?php echo $nome_guerra;?>"  size="20"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>OM: </b></font></td><td><input type="varchar" name='om' value="<?php echo $om;?>" size="10"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>SU: </b></font></td><td><select name='su'><?php
			echo "<option value='$su'>".$su."</option>";
			echo "<option value='EM'>EM</option>";
			echo "<option value='Cia C Ap'>Cia C Ap</option>";
			echo "<option value='Cia Log Sup'>Cia Log Sup</option>";
			echo "<option value='Cia Log Mnt'>Cia Log Mnt</option>";
			?>
			</select></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Função:</b></font></td><td><input name="funcao" type="text" value="<?php echo $funcao;?>" size="20"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Tel Móvel:</b></font></td><td><input name="tel_movel" type="text" value="<?php echo $tel_movel;?>" size="20"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Nível Adm: </b></font></td><td><input type="integer" name='nivel_adm' value="<?php echo $niv_adm;?>" size="2"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Nível MadMax: </b></font></td><td><input type="integer" name='nivel' value="<?php echo $niv;?>"  size="2"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Nível 2ºBECmb: </b></font></td><td><input type="integer" name='nivel_2becmb' value="<?php echo $niv_2becmb;?>" size="2"></td></tr>
			
			</table>

				<p align="center"><input type="image" src="imagens/alterar.png" width="31%" height="50" value="submit"></p>
				
				</fieldset>
			
		  </div>
        </div>
      </li>
    </ul>
  </div>
</form>

</body></html>