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
<link type="text/css" rel="stylesheet" href="./index1_files/nova.css">
<link rel="shortcut icon" href="http://localhost/imagens/fav.png">
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
			<legend><img src="imagens/controle_fichas_faixa.png" width="600" height="40" border="0"></legend>
	

<?php

//$link = mysqli_connect("localhost","root","","2becmb");
$a1 = $_GET['id_mat'];
if (!$a1){$a1='%';}



	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_ch_vtr = utf8_decode($_POST['f_ch_vtr']);
	$f_motorista = utf8_decode($_POST['f_motorista']);
    $f_destino = utf8_decode($_POST['f_destino']);
		$f_saida_data_hora = $_POST['f_saida_data_hora'];
		$f_saida_odo = $_POST['f_saida_odo'];
		$f_chegada_data_hora = $_POST['f_chegada_data_hora'];
		$f_chegada_odo = $_POST['f_chegada_odo'];
		$f_situacao_ficha = $_POST['f_situacao_ficha'];
	
		
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	
	//$pi = $_POST['f_pi'];
	}
	
	if ($nivel_2becmb < 4){$lim = 21;}else{$lim = 360;}
	
	// Limite para mostrar apenas os dados dos últimos 20 dias na consulta sem filtros para não ficar lento
	if ($f_saida_data_hora == ''){$lim = date("Y-m-d", strtotime('-'.$lim.' days')); echo 'Consulta dos últimos 20 dias. Para outros períodos, preencher filtros de data.';} else {$lim = date("Y-m-d", strtotime('-'.$lim.' days'));}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'data_apresenta DESC';}
	if ($ord2 == ''){$ord2 = 'situacao_ficha ASC';}
	if ($ord3 == ''){$ord3 = 'data_hora_apresenta DESC';}
	if ($ord4 == ''){$ord4 = 'id_mat ASC';}
	
	//if ($pi == ''){$pi = date("Y-m-d+7 H:m:s");}
    echo $f_saida_data_hora;
	// consulta com filtros
	$sql1 = "SELECT * FROM 2becmb_lr_ficha WHERE ch_vtr LIKE '%$f_ch_vtr' AND motorista LIKE '%$f_motorista' AND destino LIKE '$f_destino%' AND data_apresenta > '$lim%' AND saida_odo LIKE '%$f_saida_odo' AND saida_data_hora LIKE '%$f_saida_data_hora%' AND chegada_data_hora LIKE '%$f_chegada_data_hora%' AND chegada_odo LIKE '%$f_chegada_odo' AND situacao_ficha LIKE '%$f_situacao_ficha%' AND id_mat LIKE '$a1' ORDER BY $ord1, $ord2, $ord3, $ord4";
	$query1 = mysqli_query($link, $sql1);
	
	
	// contador de registros
	$encontrados = mysqli_num_rows($query1); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM 2becmb_lr_ficha"); //total de registros na tabela material
	$total = mysqli_num_rows($sql_listar_total);
	
	
			
?>

<form method="post" action="" enctype="multipart/form-data" name="consulta1"></form>
<form method="post" action="" enctype="multipart/form-data" name="consulta">

<font size="2" face="arial">

<p align="center">



<?php
$opc = '
			<option value="id_mat ASC">Material Asc</option>
			<option value="id_mat DESC">Material Desc</option>
			<option value="ch_vtr ASC">Ch Vtr Asc</option>
			<option value="ch_vtr DESC">Ch Vtr Desc</option>
			<option value="motorista ASC">Motorista/Operador Asc</option>
			<option value="motorista DESC">Motorista/Operador Asc</option>
			<option value="destino ASC">Destino Asc</option>
			<option value="destino DESC">Destino Asc</option>
			<option value="chegada_data_hora ASC">DataHora-Chegada Asc</option>
			<option value="chegada_data_hora DESC">DataHora-Chegada Desc</option>
			<option value="saida_data_hora ASC">DataHora-Saída Asc</option>
			<option value="saida_data_hora DESC">DataHora-Saída Desc</option>
			<option value="situacao_ficha ASC">Sit Ficha Asc</option>
			<option value="situacao_ficha DESC">Sit Ficha Desc</option>'
?>


			

</font>

<label for="from"><font color='#000000' face="arial" size=2>Ordenar por:</font></label>
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
</select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="consulta" value="Filtrar e Ordenar">


<?php 
  if ($a1 != '%'){echo '<a href="2becmb_lr_cadastra_ficha.php?id_mat='.$a1.'" title="Cadastrar Ficha" target="_blank">';}?>
  <?php if ($a1 != '%'){echo '<button type="button"><b>Cadastrar Ficha<b/></button>';}else{echo '';}?><a/>
<BR><BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td width="30" ><font size=2 color="#000000" face="arial"><b>Ord</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Foto</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Abast</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Modelo</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Placa/Prefixo/EB</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Ficha</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Ch Vtr</b><BR><select name='f_ch_vtr'><?php
  $ch_vtrs = "SELECT DISTINCT ch_vtr FROM 2becmb_lr_ficha ORDER by ch_vtr ASC";
  $sql = mysqli_query($link, $ch_vtrs);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $ch_vtr = utf8_encode($resultado2['ch_vtr']);
  $sql3 = "SELECT * FROM usu WHERE usuario LIKE '$ch_vtr'";
	$query3 = mysqli_query($link, $sql3);
	$resultado3 = mysqli_fetch_assoc($query3);

			$posto_grad1 = utf8_encode($resultado3['posto_grad']);
			$nome_guerra1 = utf8_encode($resultado3['nome_guerra']);
  echo "<option value='$ch_vtr'>$posto_grad1 $nome_guerra1</option>";
  }
  ?>
  </select></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Motorista/Operador</b><BR><select name='f_motorista'><?php
  $motoristas = "SELECT DISTINCT motorista FROM 2becmb_lr_ficha ORDER by motorista ASC";
  $sql = mysqli_query($link, $motoristas);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $motorista = utf8_encode($resultado2['motorista']);
  $sql3 = "SELECT * FROM usu WHERE usuario LIKE '$motorista'";
	$query3 = mysqli_query($link, $sql3);
	$resultado3 = mysqli_fetch_assoc($query3);

			$posto_grad1 = utf8_encode($resultado3['posto_grad']);
			$nome_guerra1 = utf8_encode($resultado3['nome_guerra']);
  echo "<option value='$motorista'>$posto_grad1 $nome_guerra1</option>";
  }
  ?>
  </select></font></td>
  
   
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Destino</b><BR><select name='f_destino'><?php
  $destinos = "SELECT DISTINCT destino FROM 2becmb_lr_ficha ORDER by destino ASC";
  $sql = mysqli_query($link, $destinos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $destino = utf8_encode($resultado2['destino']);
  echo "<option value='$destino'>$destino</option>";
  }
  ?>
  </select></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>DH-Saída</b><BR><input type="varchar" size="8" name='f_saida_data_hora'></font></td>
  
  
  <td width="100" ><font size=2 color="#000000" face="arial" title="Odômetro/Horímetro de saída"><b>Saída</b><BR><select name='f_saida_odo'><?php
  $saida_odos = "SELECT DISTINCT saida_odo FROM 2becmb_lr_ficha ORDER by saida_odo ASC";
  $sql = mysqli_query($link, $saida_odos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $saida_odo = utf8_encode($resultado2['saida_odo']);
  echo "<option value='$saida_odo'>$saida_odo</option>";
  }
  ?>
  </select></font></td>
    
  <td width="100" ><font size=2 color="#000000" face="arial"><b>DH-Chegada</b><BR><input type="varchar" size="8" name='f_chegada_data_hora'></font></td>  
  
  <td width="100" ><font size=2 color="#000000" face="arial" title="Odômetro/Horímetro de chegada"><b>Chegada</b><BR><select name='f_chegada_odo'><?php
  $chegada_odos = "SELECT DISTINCT chegada_odo FROM 2becmb_lr_ficha ORDER by chegada_odo ASC";
  $sql = mysqli_query($link, $chegada_odos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $chegada_odo = $resultado2['chegada_odo'];
  echo "<option value='$chegada_odo'>$chegada_odo</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Situação</b><BR><select name='f_situacao_ficha'><?php
  $situacao_fichas = "SELECT DISTINCT situacao_ficha FROM 2becmb_lr_ficha ORDER by situacao_ficha ASC";
  $sql = mysqli_query($link, $situacao_fichas);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $situacao_ficha = $resultado2['situacao_ficha'];
  echo "<option value='$situacao_ficha'>$situacao_ficha</option>";
  }
  ?>
  </select></font></td> 
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Alterar</b></font></td>
  
  </tr>
  
</form>


<?php
$cont=0;

$cor="#6CD48A";

$agora = time();
$ontem = $agora - (24*3600);

$hora = date('H:i:s',$agora);
$hoje = date('Y-m-d',$agora);
$ontem = date('Y-m-d',$ontem);

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_ficha = $resultado['id_ficha'];
  $id_mat = $resultado['id_mat'];
  $destino = utf8_encode($resultado['destino']);
  $missao = utf8_encode($resultado['missao']); 
  $ch_vtr = utf8_encode($resultado['ch_vtr']);
  $motorista = utf8_encode($resultado['motorista']);
  $saida_data_hora = utf8_encode($resultado['saida_data_hora']);
  $saida_odo = utf8_encode($resultado['saida_odo']);
  $chegada_data_hora = utf8_encode($resultado['chegada_data_hora']);
  $chegada_odo = utf8_encode($resultado['chegada_odo']);
  $situacao_ficha = utf8_encode($resultado['situacao_ficha']);
  $observacao = utf8_encode($resultado['observacao']);
  $data_apresenta = utf8_encode($resultado['data_apresenta']);
  $saida_data = substr($saida_data_hora, 0, -9);
  
  $sql2 = "SELECT * FROM usu WHERE usuario LIKE '$motorista'";
	$query2 = mysqli_query($link, $sql2);
	$resultado2 = mysqli_fetch_assoc($query2);

			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);
			$tel_movel = utf8_encode($resultado2['tel_movel']);
	
	$sql3 = "SELECT * FROM usu WHERE usuario LIKE '$ch_vtr'";
	$query3 = mysqli_query($link, $sql3);
	$resultado3 = mysqli_fetch_assoc($query3);

			$posto_grad1 = utf8_encode($resultado3['posto_grad']);
			$nome_guerra1 = utf8_encode($resultado3['nome_guerra']);
			$tel_movel1 = utf8_encode($resultado3['tel_movel']);
			
	$sql4 = "SELECT * FROM 2becmb_material WHERE id LIKE '$id_mat'";
	$query4 = mysqli_query($link, $sql4);
	$resultado4 = mysqli_fetch_assoc($query4);

			$foto = utf8_encode($resultado4['foto']);
			$ppeb = utf8_encode($resultado4['ppeb']);
			$modelo = utf8_encode($resultado4['modelo']);
			
	$sql5 = "SELECT * FROM 2becmb_abast WHERE id_ficha LIKE '$id_ficha'";
	$query5 = mysqli_query($link, $sql5);
	$nr_abast = mysqli_num_rows($query5);
  
  $data = date("Y_m_d");
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#6CD48A") {
	$cor="white";
} else {
	$cor="#6CD48A";
	//$cor="#87CEFF";
}
 if ($cor=="#6CD48A"){$cor1="white";}else{$cor1="#6CD48A";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php echo 'Material: '.$id_mat;?>"><?php echo $cont; ?></font></p></td>

  <td width="30" ><font size=2 color="#000000" face="arial"><?php if ($foto == 'sem_foto'){echo '<a href="2becmb_baltera_foto.php?id='.$id_mat.'" target="_blank">';}else{echo '<a href="./2becmb_foto/'.$foto.'.jpg" target="blank">';}?><img src="<?php echo './2becmb_foto/'.$foto.'.jpg';?>" width="47" height="63"></a></font></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"  ><?php if ($nr_abast == 0){echo '<a href="2becmb_lr_comb.php?id_ficha='.$id_ficha.'" target="_blank" title="Sem abastecimentos nesta ficha até o momento"><img src="./imagens/modelo.png" width="33" height="33"></a>';}else{echo '<a href="2becmb_lr_comb.php?id_ficha='.$id_ficha.'" target="blank" title="Abastecimentos referentes à Ficha de Vtr/Eqp"><img src="./imagens/combustivel.png" width="33" height="33"></a>';}?></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $modelo; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $ppeb; ?></font></p></td>
    
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo '<a href="2becmb_gera_ficha.php?id_ficha='.$id_ficha.'" target="_blank">';?><img src="<?php echo './imagens/ficha.png';?>" width="33" height="33" title="Gerar Ficha"></a></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php if ($situacao_ficha == 'Aberta'){echo $tel_movel1;}?>"><?php echo $posto_grad1.' '.$nome_guerra1;if ($nivel_2becmb > 7){echo '<br><br>('.$tel_movel1.')';}?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php if ($situacao_ficha == 'Aberta'){echo $tel_movel;}?>"><?php echo $posto_grad.' '.$nome_guerra;if ($nivel_2becmb > 7){echo '<br><br>('.$tel_movel.')';}?></font></p></td>
  
  <td bgcolor="<?php if ($situacao_ficha == 'Aberta' && $data_apresenta < $ontem){echo '#ffbf00';}else{if ($situacao_ficha == 'Aberta' && $data_apresenta < $hoje ){echo '#FE2E2E';}}?>"><p align="center"><font size=2 color="#000000" face="arial" title="<?php if ($situacao_ficha == 'Aberta' && $data_apresenta < $ontem){echo '#Ficha Aberta a mais de 1 dia! #Escalão: Verificar com urgência a situação e explicar ao SCmt Btl. ';}else{if ($situacao_ficha == 'Aberta' && $data_apresenta < $hoje){echo '#Ficha Aberta ONTEM #Cmt Gda: Verificar porque não fechou e explicar ao SCmt Btl. ';}} echo ' #Apresentação: '.$data_apresenta.' - Missão: '.$missao.'.'?> <?php if ($observacao != ''){echo '#Observação: '.$observacao;} ?>"><?php echo $destino; ?></font></p></td> 
    
  <td bgcolor="<?php if ($situacao_ficha == 'Aberta' && $saida_data_hora == '0001-01-01 00:00:00'){echo '#FE2E2E';}?>"><p align="center"><font size=2 color="#000000" face="arial" ><?php if ($saida_data_hora == '0001-01-01 00:00:00'){echo '.:Pendente:.';}else{echo $saida_data_hora;} ?></a></font></p></td>
  
  <td bgcolor="<?php if ($situacao_ficha == 'Aberta' && $saida_odo == '0'){echo '#FE2E2E';}?>"><p align="center"><font size=2 color="#000000" face="arial"><?php if ($saida_odo == '0'){echo '.:###:.';}else{echo $saida_odo;}?></font></p></td>
  
  <td bgcolor="<?php if ($chegada_data_hora == $saida_data_hora && $situacao_ficha == 'Fechada'){echo '#FE2E2E';}?>"><p align="center"><font size=2 color="#000000" face="arial" title="<?php if ($chegada_data_hora == $saida_data_hora && $situacao_ficha == 'Fechada'){echo 'Cmt Gda: Atualizar Data-Hora da Chegada';}?>"><?php if ($chegada_data_hora == '0001-01-01 00:00:00'){echo '.:Pendente:.';}else{echo $chegada_data_hora;} ?></font></p></td>
  
  <td bgcolor="<?php if ($chegada_odo == $saida_odo && $situacao_ficha == 'Fechada'){echo '#FE2E2E';}?>"><p align="center"><font size=2 color="#000000" face="arial" title="<?php if ($chegada_odo == $saida_odo && $situacao_ficha == 'Fechada'){echo 'Cmt Gda: Atualizar o Odômetro de chegada';}?>"><?php if ($chegada_odo == '0'){echo '.:###:.';}else{echo $chegada_odo;} ?></font></p></td>
  
  <td bgcolor="<?php if ($situacao_ficha == 'Aberta' && $chegada_odo != '0'){echo '#FE2E2E';} if ($situacao_ficha == 'Preparando' && $data_apresenta < $hoje){echo '#ffbf00';}?>"><p align="center"><font size=2 color="#000000" face="arial" title="<?php if ($situacao_ficha == 'Aberta' && $chegada_odo != '0'){echo 'Cmt Gda: Atualizar Situação da Ficha.';} if ($situacao_ficha == 'Preparando' && $data_apresenta < $hoje){echo 'Escalão: verificar se a Vtr saiu e cancelar a Ficha, se for o caso.';}?>"><?php echo $situacao_ficha; ?></font></p></td> 
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php if ($situacao_ficha != 'Cancelada') {echo '<a href="2becmb_baltera_ficha.php?id_ficha='.$id_ficha.'" target="_blank"><img src="./imagens/altera_material.png" width="30" height="30" title="Alterar dados das Fichas de Vtr/Eqp"></a>';} elseif($nivel_2becmb > 1) {echo '<a href="2becmb_baltera_ficha.php?id_ficha='.$id_ficha.'" target="_blank"><img src="./imagens/altera_material.png" width="30" height="30" title="Alterar dados das Fichas de Vtr/Eqp"></a>';}?></font></p></td>

<?php

}

?>

<tr>
  <td colspan="14" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] cadastrados. </p></font></td>
  
  
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
			$comando = utf8_decode('Visualizou o Painel de Controle de Motoristas e Operadores');
			$sql = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
			?>

 
    </ul>
  </div>


</body></html>