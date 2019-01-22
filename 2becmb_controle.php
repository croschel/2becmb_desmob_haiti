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
<title>2° B log L</title>
<link href="./index1_files/formCss.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./index1_files/nova.css">
<link rel="shortcut icon" href="http://10.12.125.10/imagens/fav.png">
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

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
date_default_timezone_set('America/Sao_Paulo');

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
			<legend><img src="imagens/controle_vtreqp_faixa.png" width="600" height="40" border="0"></legend>
	

<?php

//$link = mysqli_connect("localhost","root","","2becmb");
	
	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_emprego = utf8_decode($_POST['f_emprego']);
	$f_classe = utf8_decode($_POST['f_classe']);
    $f_tipo = $_POST['f_tipo'];
	$f_material = utf8_decode($_POST['f_material']);
	$f_marca = utf8_decode($_POST['f_marca']);
	$f_ppeb = utf8_decode($_POST['f_ppeb']);
	$f_modelo = utf8_decode($_POST['f_modelo']);
	$f_versao = utf8_decode($_POST['f_versao']);
	$f_serie = utf8_decode($_POST['f_serie']);
	$f_capacidade = utf8_decode($_POST['f_capacidade']);
	$f_ano = $_POST['f_ano'];
	$f_prio = $_POST['f_prio'];
	$f_motorista = $_POST['f_motorista'];
	$f_sit_doc = $_POST['f_sit_doc'];
	if ($f_sit_doc == '1'){$op = 'AND'; $op_reg = '>='; $hoje = date('Y-m-d');}
	if ($f_sit_doc == '0'){$op = 'OR'; $op_reg = '<'; $hoje = date('Y-m-d');}
	if ($f_sit_doc == '2'){$op = 'AND'; $op_reg = 'LIKE'; $hoje = '%';}
	if ($f_sit_doc == ''){$f_sit_doc == '%'; $op = 'OR'; $op_reg = 'LIKE'; $hoje = '%';}
	$f_sit_mnt = utf8_decode($_POST['f_sit_mnt']);
	
	
	//echo $f_prio;
	
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'emprego ASC';}
	if ($ord2 == ''){$ord2 = 'marca ASC';}
	if ($ord3 == ''){$ord3 = 'modelo ASC';}
	if ($ord4 == ''){$ord4 = 'emprego ASC';}
	
	if ($_POST['consulta'])
	// consulta sem filtro
	{$sql1 = "SELECT * FROM 2becmb_material WHERE (sit_doc LIKE '%$f_sit_doc' $op doc_validade $op_reg '$hoje') AND classe LIKE '%$f_classe' AND emprego LIKE '%$f_emprego%' AND material LIKE '%$f_material%' AND tipo LIKE '%$f_tipo%' AND marca LIKE '%$f_marca%' AND ppeb LIKE '%$f_ppeb%' AND modelo LIKE '%$f_modelo%' AND versao LIKE '%$f_versao%' AND serie LIKE '%$f_serie%' AND capacidade LIKE '%$f_capacidade%' AND ano LIKE '%$f_ano' AND sit_mnt LIKE '%$f_sit_mnt' ORDER BY $ord1, $ord2, $ord3, $ord4";} else
		
	// consulta sem filtros
	{$sql1 = "SELECT * FROM 2becmb_material ORDER BY $ord1, $ord2, $ord3, $ord4";}
	
	$query1 = mysqli_query($link, $sql1);
	
	
	// contador de registros
	$encontrados = mysqli_num_rows($query1); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM 2becmb_material"); //total de registros na tabela material
	$total = mysqli_num_rows($sql_listar_total);
	
	
			
?>

<form method="post" action="" enctype="multipart/form-data" name="consulta1"></form>
<form method="post" action="" enctype="multipart/form-data" name="consulta">

<font size="2" face="arial">

<p align="left">


<label for="from"><font color='#000000' face="arial" size=2>Ordenar por:</font></label>
<?php
$opc = '<option value="id ASC">Id Asc</option>
			<option value="id DESC">Id Desc</option>
			<option value="ano ASC">Ano Asc</option>
			<option value="ano DESC">Ano Desc</option>
			<option value="classe ASC">Classe Asc</option>
			<option value="classe DESC">Classe Desc</option>
			<option value="emprego ASC">Emprego Asc</option>
			<option value="emprego DESC">Emprego Desc</option>
			<option value="marca ASC">Marca Asc</option>
			<option value="marca DESC">Marca Desc</option>
			<option value="material ASC">Material Asc</option>
			<option value="material DESC">Material Desc</option>
			<option value="modelo ASC">Modelo Asc</option>
			<option value="modelo DESC">Modelo Desc</option>
			<option value="ppeb ASC">Placa/Prefixo/EB Asc</option>
			<option value="ppeb DESC">Placa/Prefixo/EB Desc</option>
			<option value="sit_doc ASC">Situação Documento Asc</option>
			<option value="sit_doc DESC">Situação Documento Desc</option>
			<option value="sit_mnt ASC">Situação Manutenção Asc</option>
			<option value="sit_mnt DESC">Situação Manutenção Desc</option>
			<option value="tipo ASC">Tipo Asc</option>
			<option value="tipo DESC">Tipo Desc</option>
						
			
			
			'
?>

<select name="ord1" >
			<option value="">1º Critério</option>
			<?php
			echo $opc;
			?>			
</select>&nbsp&nbsp&nbsp&nbsp&nbsp
			
<select name="ord2" >
			<option value="">2º Critério</option>
			<?php
			echo $opc;
			?>	
</select>&nbsp&nbsp&nbsp&nbsp&nbsp
			
<select name="ord3" >
			<option value="">3º Critério</option>
			<?php
			echo $opc;
			?>	
</select>&nbsp&nbsp&nbsp&nbsp&nbsp	

<select name="ord4" >
			<option value="">4º Critério</option>
			<?php
			echo $opc;
			?>	
</select>&nbsp&nbsp&nbsp&nbsp&nbsp	
			
<input type="submit" name="consulta" value="Filtrar e Ordenar">&nbsp&nbsp&nbsp&nbsp&nbsp

<?php 
  echo '<a href="2becmb_cadastra_material.php" title="Cadastrar Material" target="_blank"><button type="button">Cadastra Material</button><a/>';?>

 
</font>
</p>

<BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td width="30" ><font size=2 color="#000000" face="arial" ><b>Ord</b><BR><BR></font></td>
  
   
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Emprego</b><BR><select name='f_emprego'><?php
  $empregos = "SELECT DISTINCT emprego FROM 2becmb_material ORDER by emprego ASC";
  $sql = mysqli_query($link, $empregos);
  echo "<option value=''>Listar</option>";
  echo "<option value=''>Todas</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $emprego = utf8_encode($resultado2['emprego']);
  if ($emprego == 1){$emprego1 = 'Adm';}else{$emprego1 = 'Op';}
  echo "<option value='$emprego'>$emprego1</option>";
  }
  ?>
  </select></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Foto</b><BR>
  </font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Classe</b><BR><select name='f_classe'><?php
  $classes = "SELECT DISTINCT classe FROM 2becmb_material ORDER by classe ASC";
  $sql = mysqli_query($link, $classes);
  echo "<option value=''>Listar</option>";
  echo "<option value=''>Todas</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $classe = utf8_encode($resultado2['classe']);
  echo "<option value='$classe'>$classe</option>";
  }
  ?>
  </select></font></td>
  
   
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Tipo</b><BR><select name='f_tipo'><?php
  $tipos = "SELECT DISTINCT tipo FROM 2becmb_material WHERE tipo LIKE '%$f_tipo' ORDER by tipo ASC";
  $sql = mysqli_query($link, $tipos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $tipo = utf8_encode($resultado2['tipo']);
  echo "<option value='$tipo'>$tipo</option>";
  }
  ?>
  </select></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Material</b><BR><select name='f_material'><?php
  $materials = "SELECT DISTINCT material FROM 2becmb_material WHERE material LIKE '%' ORDER by material ASC";
  $sql = mysqli_query($link, $materials);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $material = utf8_encode($resultado2['material']);
  echo "<option value='$material'>$material</option>";
  }
  ?>
  </select></font></td>
  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Placa/Prefixo/EB</b><BR><select name='f_ppeb'><?php
  $ppebs = "SELECT DISTINCT ppeb FROM 2becmb_material WHERE ppeb LIKE '%' ORDER by ppeb ASC";
  $sql = mysqli_query($link, $ppebs);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $ppeb = utf8_encode($resultado2['ppeb']);
  echo "<option value='$ppeb'>$ppeb</option>";
  }
  ?>
  </select></font></td>
    
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Marca</b><BR><select name="f_marca"><?php
  $marcas = "SELECT DISTINCT marca FROM 2becmb_material WHERE marca LIKE '%' ORDER by marca ASC";
  $sql = mysqli_query($link, $marcas);
  if ($nivel > 1){echo  "<option value=''>Listar</option>";}
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $marca = utf8_encode($resultado2['marca']);
  if ($nivel > 1){echo "<option value='$marca'>$marca</option>";}
  }
  ?>
  </select></font></td>  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Modelo</b><BR><select name='f_modelo'><?php
  $modelos = "SELECT DISTINCT modelo FROM 2becmb_material WHERE classe LIKE '%' ORDER by modelo ASC";
  $sql = mysqli_query($link, $modelos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $modelo = $resultado2['modelo'];
  echo "<option value='$modelo'>$modelo</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Versão</b><BR><select name='f_versao'><?php
  $versaos = "SELECT DISTINCT versao FROM 2becmb_material WHERE classe LIKE '%' ORDER by versao ASC";
  $sql = mysqli_query($link, $versaos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $versao = $resultado2['versao'];
  echo "<option value='$versao'>$versao</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Série</b><BR><select name='f_serie'><?php
  $series = "SELECT DISTINCT serie FROM 2becmb_material WHERE serie LIKE '%' ORDER by serie ASC";
  $sql = mysqli_query($link, $series);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $serie = $resultado2['serie'];
  echo "<option value='$serie'>$serie</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Ano</b><BR><select name='f_ano'><?php
  $anos = "SELECT DISTINCT ano FROM 2becmb_material WHERE classe LIKE '%$f_classe' ORDER by ano ASC";
  $sql = mysqli_query($link, $anos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $ano = $resultado2['ano'];
  echo "<option value='$ano'>$ano</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Capacidade</b><BR><select name='f_capacidade'><?php
  $capacidades = "SELECT DISTINCT capacidade FROM 2becmb_material WHERE classe LIKE '%' ORDER by capacidade ASC";
  $sql = mysqli_query($link, $capacidades);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $capacidade = $resultado2['capacidade'];
  echo "<option value='$capacidade'>$capacidade</option>";
  }
  ?>
  </select></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Sit_Doc</b><BR><select name='f_sit_doc'>
  <?php
  
  echo "<option value=''>Listar</option>";
  echo "<option value='0'>Irregular</option>";
  echo "<option value='1'>Regular</option>";
  echo "<option value='2'>Providenciando</option>";
    
  ?>
  </select></font></td>
  
   <td width="60" ><font size=2 color="#000000" face="arial"><b>Sit_Mnt</b><BR><select name='f_sit_mnt'>
  <?php
  
  echo "<option value=''>Listar</option>";
  echo "<option value='1'>Disponível</option>";
  echo "<option value='0'>Indisponível</option>";
    
  ?>
  </select></font></td>
 
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Livro Registro</b><br><br></font></td>

  
  </tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#F5DEB3";

	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id = $resultado['id'];
  $emprego = $resultado['emprego'];
  if ($emprego == 1){$emprego1 = 'Adm';}else{$emprego1 = 'Op';}
  $foto = $resultado['foto'];
  $tipo = $resultado['tipo'];
  $material = $resultado['material'];
  $marca = utf8_encode($resultado['marca']);
  $modelo = $resultado['modelo'];
  $chassis_sn = $resultado['chassis_sn'];
  $ano = $resultado['ano'];
  $sit_mnt = utf8_encode($resultado['sit_mnt']);
  $ficha = $resultado['ficha'];
  $classe = $resultado['classe'];
  $serie = $resultado['serie'];
  $versao = $resultado['versao'];
  $capacidade = $resultado['capacidade'];
  
  $sit_doc = $resultado['sit_doc'];
  if ($sit_doc == 0){$sit_doc1 = 'Irregular';}else{if ($sit_doc == 1){$sit_doc1 = 'Regular';}else{$sit_doc1 = 'Providenciando';}}
  $doc_validade = $resultado['doc_validade'];//echo $doc_validade;
  $hoje = date('Y-m-d');//echo $hoje;
  
  $doc = $resultado['doc'];
  $ppeb = $resultado['ppeb'];
  $array = explode("-", $saida_data);
  $dia = $array[2];
  $mes = $array[1];
  $ano_saida = $array[0];
  $saida_data = $dia.'/'.$mes.'/'.$ano_saida;
  
  $datahora_atualizado = $resultado['datahora_atualizado'];
  $motorista = utf8_encode($resultado['motorista']);
  
	  
  //$file_trem = 'trem/'.$id.'.pdf';
  //$carregar_trem = 'carrega_trem.php?id='.$id;
  
  $motoristas1 = "SELECT * FROM usu WHERE usuario LIKE '$motorista' ORDER by usuario ASC";
  $sql3 = mysqli_query($link, $motoristas1);
  $resultado3 = mysqli_fetch_array($sql3);
  $motorista3 = utf8_encode($resultado3['nome_guerra']);
  $motorista4 = utf8_encode($resultado3['posto_grad']);
  if ($motorista == '-'){$motorista3 = 'Selecionar Motorista';}
  
  $sql_ficha = "SELECT * FROM 2becmb_lr_ficha WHERE id_mat LIKE '$id' AND situacao_ficha LIKE 'Aberta'";
		$query_ficha = mysqli_query($link, $sql_ficha);
		//$destino
		$fichas = mysqli_fetch_assoc($query_ficha);
		$destino = utf8_encode($fichas['destino']);
		$ordenou = utf8_encode($fichas['ordenou']);
		$missao = utf8_encode($fichas['missao']);
		
		// contador de registros de fichas abertas
		$abertas = mysqli_num_rows($query_ficha);
		if ($abertas > 0){$situacao = 'Aberta';} else {$situacao = 'Fechada';}
		
  $data = date("Y_m_d");
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#F5DEB3") {
	$cor="white";
} else {
	$cor="#F5DEB3";
	//$cor="#87CEFF";
}
 if ($cor=="#F5DEB3"){$cor1="white";}else{$cor1="#F5DEB3";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php echo 'Visualizar fichas';?>"><?php echo '<a href="./2becmb_ficha.php?id_mat='.$id.'" target="_blank">'; ?><button type="button"><?php echo $cont; ?></button></a></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo utf8_encode($emprego1);?></font></p></td>
  
  <td width="30" ><font size=2 color="#000000" face="arial"><?php echo '<a href="2becmb_baltera_foto.php?id='.$id.'" target="_blank">';?><img src="<?php echo './2becmb_foto/'.$foto.'.jpg';?>" width="45" height="60"></a></font></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo utf8_encode($classe);?></font></p></td>
  
  <?php echo '<td><p align="center"><font size=2 color="#000000" face="arial" title="">'.$tipo.'</font></p></td>';?>
    
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo utf8_encode($material); ?></a></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $ppeb;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $marca; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $modelo; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $versao; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $serie; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $ano; ?></font></p></td> 
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $capacidade; ?></font></p></td>
  
  <td><p align="center"><?php
	    if (($doc == 0) && (($sit_doc == 0) || ($doc_validade < $hoje))) {echo '<a href="./2becmb_documento/sem_doc.jpg" target="_blank"><img src="./imagens/vencido_sem_doc.png" width="33" height="33" title="Documento validade: '.$doc_validade.'. Situação IRREGULAR. Documento não carregado"></a>  &nbsp <a href="2becmb_baltera_sit_doc.php?id='.$id.'" target="_blank"> <img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar a situação da documentação"></a>';} 
	elseif (($doc == 1) && (($sit_doc == 0) || ($doc_validade < $hoje))) {echo '<a href="./2becmb_documento/doc_'.$id.'.jpg" target="_blank"> <img src="./imagens/doc1.png" width="33" height="33" title="Documento validade: '.$doc_validade.'. Situação IRREGULAR. Visualizar Documento"></a>  &nbsp <a href="2becmb_baltera_sit_doc.php?id='.$id.'" target="_blank"> <img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar a situação da documentação"></a>';} 
	elseif (($doc == 0) && (($sit_doc == 1) && ($doc_validade >= $hoje))){echo '<a href="./2becmb_documento/sem_doc.jpg" target="_blank"><img src="./imagens/modelo.png" width="33" height="33" title="Documento válido até: '.$doc_validade.'. Situação REGULAR. Documento não carregado"></a>  &nbsp <a href="2becmb_baltera_sit_doc.php?id='.$id.'" target="_blank"> <img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar a situação da documentação"></a>';}
	elseif (($doc == 1) && (($sit_doc == 1) && ($doc_validade >= $hoje))){echo '<a href="./2becmb_documento/doc_'.$id.'.jpg" target="_blank"><img src="./imagens/doc.png" width="33" height="33" title="Documento válido até: '.$doc_validade.'. Situação REGULAR. Visualizar Documento"></a> &nbsp <a href="2becmb_baltera_sit_doc.php?id='.$id.'" target="_blank"> <img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar a situação da documentação"></a>';}
    elseif ($sit_doc == 2){echo '<a href="./2becmb_documento/doc_'.$id.'.jpg" target="_blank"><img src="./imagens/providenciando.png" width="33" height="33" title="Documento validade: '.$doc_validade.'. Situação PROVIDENCIANDO. Visualizar Documento"></a> &nbsp <a href="2becmb_baltera_sit_doc.php?id='.$id.'" target="_blank"> <img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar a situação da documentação"></a>';}

  ?></p></td>
   
  <td><p align="center"><?php 
   
   if ($sit_mnt == 0){echo '<a href="2becmb_lr_os.php?id='.$id.'" target="_blank">';echo '<img src="./imagens/mnt0.png" width="33" height="33" title="Indisponível. Visualizar Ordens de Serviço."></a>';}else{
   if ($sit_mnt == 1){echo '<a href="2becmb_lr_os.php?id='.$id.'" target="_blank">';echo '<img src="./imagens/mnt.png" width="33" height="33" title="Disponível. Visualizar Ordens de Serviço."></a>';}}
   ?></p></td>
  
  <td><p align="center"><?php 
   echo '&nbsp&nbsp&nbsp<a href="2becmb_lr.php?id='.$id.'" target="_blank"><img src="./imagens/livro.png" width="33" height="33" title="Clique para visualizar o Livro Registro"></a>';
  ?></p></td>
  

  </tr>

<?php

}

?>

<tr>
  <td colspan="15" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] cadastrados. Resultado Percentual: [<?php $percentual = round($encontrados*100/$total,2);echo $percentual ?> %]</p></font></td>
  
  
  <td colspan="1" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center"></font></td>
</tr>
</form>
</form>
			

				</fieldset>
			
		  </div>
		  
        </div>
		
      </li>
	 
	  
</form>

<?php
			// Gravar na tabela auditoria
			$cpf = $_SESSION['usuario'];
				$sql_i = "SELECT * FROM usu WHERE usuario LIKE '$cpf'";
				$query_i = mysqli_query($link, $sql_i);	
				$resultado_i = mysqli_fetch_assoc($query_i);
				$posto_grad = $resultado_i['posto_grad'];
				$nome_guerra = $resultado_i['nome_guerra'];
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$comando = utf8_decode('Visualizou o Painel de Controle da Manutenção');
			$sql = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
			?>

 
    </ul>
  </div>


</body></html>