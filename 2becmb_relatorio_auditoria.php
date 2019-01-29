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
	$su = $_SESSION['su'];
	$posto_grad = utf8_encode($_SESSION['posto_grad']);
	$nome_guerra =  utf8_encode($_SESSION['nome_guerra']);
	$funcao = utf8_encode($_SESSION['funcao']);

?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="alternate" type="" href="" title=""><link rel="" type="" href="" title="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="HandheldFriendly" content="true">
<title>2° B Log L</title>
<link href="./index1_files/formCss.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="http://10.12.125.45/imagens/fav.png">
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
        background: black;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:100%;
        background: black;
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
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
header('Content-Type: text/html; charset=UTF-8');




    ?>
<form class="jotform-form" action="" enctype="multipart/form-data" method="post" name="busca" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="50" height="65"></td>
		<td colspan="3"><font color='#000000' size="5" face="arial">Batalhão Cidade de Campinas</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="arial">Controle do Material Classe IX</font></td>
		<td align="center"> <font color="#EEE9E9" size="4" face="arial"><?php echo $posto_grad.' '.$nome_guerra.'('.$funcao.')';?></font></td>
		<td>
		<p align="right">
		
		<a href="index2.php" title="Página Inicial" > <img src="./imagens/home.png" width="40" height="40"></a> &nbsp&nbsp
		
		<a href="session_destroy.php" title="Sair do sistema" > <img src="./imagens/sair.png" width="40" height="40"></a> &nbsp&nbsp
			</p>
		
		</td>
		
		</tr>
	</tbody></table>
	
	<ul class="form-section">
	


<?php $a = date('Y'); $mm = date('m');?>
					
		
<hr align="center">
	  <li class="backcolor1" data-type="control_text" id="id_56">
        
		
		
		
		
		<div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
	
			
	
			<fieldset align='center'>
			<legend><font color='#000000' face="arial" size=3>Relatório de Auditoria</font></legend>
	

<?php
   
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);


	
	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_usuario = utf8_decode($_POST['f_usuario']);
	$f_posto_grad = utf8_decode($_POST['f_posto_grad']);
	$f_nome_guerra = utf8_decode($_POST['f_nome_guerra']);
	$f_comando = utf8_decode($_POST['f_comando']);
	$f_om = utf8_decode($_POST['f_om']);
	$f_datahora_comando = utf8_decode($_POST['f_datahora_comando']);


	
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'datahora_comando DESC';}
	if ($ord2 == ''){$ord2 = 'comando ASC';}
	
	
	
	// consulta com filtros
	$sql = "SELECT * FROM 2becmb_auditoria WHERE usuario LIKE '%$f_usuario' AND comando LIKE '%$f_comando%' AND om LIKE '%$f_om%' AND nome_guerra LIKE '%$f_nome_guerra' AND posto_grad LIKE '%$f_posto_grad' AND datahora_comando LIKE '%$f_datahora_comando%' ORDER BY $ord1, $ord2";
	$query = mysqli_query($link, $sql);
	
	
	// contador de registros
	$encontrados = mysqli_num_rows($query); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM 2becmb_auditoria"); //total de registros na tabela material
	$total = mysqli_num_rows($sql_listar_total);
	
	
			
?>

<form method="post" action="" enctype="multipart/form-data" name="consulta1"></form>
<form method="post" action="" enctype="multipart/form-data" name="consulta">

<font size="2" face="arial">
<!--<input type="submit" name="consulta1" value="Mostar Todos os Dados">&nbsp&nbsp&nbsp&nbsp&nbsp-->

<label for="from"><font color='#000000' face="arial" size=2>Ordenar por:</font></label>
<select name="ord1" >
			<option value="">1º Critério</option>
			<option value="comando ASC">Comando Asc</option>
			<option value="comando DESC">Comando Desc</option>
			<option value="datahora ASC">Datahora Asc</option>
			<option value="datahora DESC">Datahora Desc</option>
			<option value="om ASC">Datahora Asc</option>
			<option value="om DESC">Datahora Desc</option>
			<option value="usuario ASC">Usuário Asc</option>
			<option value="usuario DESC">Usuário Desc</option>
</select>&nbsp&nbsp&nbsp&nbsp&nbsp
			
<select name="ord2" >
			<option value="">2º Critério</option>
			<option value="comando ASC">Comando Asc</option>
			<option value="comando DESC">Comando Desc</option>
			<option value="datahora ASC">Datahora Asc</option>
			<option value="datahora DESC">Datahora Desc</option>
			<option value="om ASC">Datahora Asc</option>
			<option value="om DESC">Datahora Desc</option>
			<option value="usuario ASC">Usuário Asc</option>
			<option value="usuario DESC">Usuário Desc</option>		
</select>&nbsp&nbsp&nbsp&nbsp&nbsp
			

			
<input type="submit" name="consulta" value="Filtrar e Ordenar">
</font>

<BR><BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="100%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td width="5%" ><font size=2 color="#000000" face="arial"><b>Ord</b><BR></font></td>
  
  <td width="10%" ><font size=2 color="#000000" face="arial"><b>.::Datahora::.</b><BR><input name="f_datahora_comando" type="text" size="12" id="" value="" ></font></td>
  
  <td width="6%" ><font size=2 color="#000000" face="arial"><b>.::Posto/Grad::.</b><BR><select name='f_posto_grad'><?php
  $posto_grads = "SELECT DISTINCT posto_grad FROM 2becmb_auditoria ORDER BY posto_grad";
  $sql = mysqli_query($link, $posto_grads);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $posto_grad = utf8_encode($resultado2['posto_grad']);
  echo "<option value='$posto_grad'>$posto_grad</option>";
  }
  ?>
  </select></font></td>
  
  <td width="10%" ><font size=2 color="#000000" face="arial"><b>.::Nome Guerra::.</b><BR><select name='f_nome_guerra'><?php
  $nome_guerras = "SELECT DISTINCT nome_guerra FROM 2becmb_auditoria ORDER BY nome_guerra";
  $sql = mysqli_query($link, $nome_guerras);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $nome_guerra = utf8_encode($resultado2['nome_guerra']);
  echo "<option value='$nome_guerra'>$nome_guerra</option>";
  }
  ?>
  </select></font></td>
  
  <td width="12%" ><font size=2 color="#000000" face="arial"><b>.::CPF::.</b><BR><select name='f_usuario'><?php
  $usuarios = "SELECT DISTINCT usuario FROM 2becmb_auditoria ORDER BY usuario";
  $sql = mysqli_query($link, $usuarios);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $usuario = utf8_encode($resultado2['usuario']);
  echo "<option value='$usuario'>$usuario</option>";
  }
  ?>
  </select></font></td>
  
  <td width="10%" ><font size=2 color="#000000" face="arial"><b>.::OM::.</b><BR><select name='f_om'><?php
  $oms = "SELECT DISTINCT om FROM 2becmb_auditoria ORDER BY om";
  $sql = mysqli_query($link, $oms);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $om = utf8_encode($resultado2['om']);
  echo "<option value='$om'>$om</option>";
  }
  ?>
  </select></font></td>
    
  <td width="55%" ><font size=2 color="#000000" face="arial"><b>.::Comando::.</b><BR><input name="f_comando" type="text" size="12" id="" value="" ></font></td>
 
  </tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#F5DEB3";

	

while ($resultado = mysqli_fetch_assoc($query)) {
  $datahora_comando = $resultado['datahora_comando'];
  $usuario = utf8_encode($resultado['usuario']);
  $comando = utf8_encode($resultado['comando']);
  $posto_grad = utf8_encode($resultado['posto_grad']);
  $nome_guerra = utf8_encode($resultado['nome_guerra']);
  $om = utf8_encode($resultado['om']);
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#87CEEB") {
	$cor="white";
} else {
	$cor="#87CEEB";
	//$cor="#87CEFF";
}

?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial" title=""><?php echo $cont; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial"><?php echo $datahora_comando;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial"><?php echo $posto_grad;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial"><?php echo $nome_guerra;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial"><?php echo $usuario;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial"><?php echo $om;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#<?php if ($om == 'DEC'){echo 'ff0000';}else{echo '000000';} ?>" face="arial"><?php echo $comando;?></font></p></td>

  
</tr>

<?php

}

?>

<tr>
  <td colspan="12" bgcolor="#F5DEB3"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] lançamentos. </p></font></td>
</tr>
</form>
</form>

				</fieldset>
			
		  </div>
		  
        </div>
		
      </li>
	 
	  
</form>

 
    </ul>
  </div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='30;URL=2becmb_relatorio_auditoria.php'>";
?>

</body></html>



