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

	if ($nivel_2becmb < 4 ) { echo "
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
<link rel="shortcut icon" href="http://localhost/imagens/fav.png">
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

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
date_default_timezone_set('America/Sao_Paulo');

//$link = mysqli_connect("localhost","root","","2becmb");
$a1 = $_GET['id_os']; 
if (!$a1){$a1='%';}	

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
			<legend><img src="imagens/controle_mnt_faixa.png" width="600" height="40" border="0"></legend>
	

<?php
    // consulta tabela 2becmb_os
	$sqlx = "SELECT * FROM 2becmb_os WHERE id_os LIKE '$a1'";
	$queryx = mysqli_query($link, $sqlx);
	$resultadox = mysqli_fetch_assoc($queryx);
		
		$id_mat = utf8_encode($resultadox['id_mat']);
		$tipo_mnt = utf8_encode($resultadox['tipo_mnt']);
		$disponibilidade = utf8_encode($resultadox['disponibilidade']);
		
		$cadastrador = utf8_encode($resultadox['cadastrador']);
		$datahora_cadastro = utf8_encode($resultadox['datahora_cadastro']);
		$datahora_entrada = utf8_encode($resultadox['datahora_entrada']);
		$verificador = utf8_encode($resultadox['verificador']);
		$status = utf8_encode($resultadox['status']);
		$datahora_pronto = utf8_encode($resultadox['datahora_pronto']);
		$liberacao = utf8_encode($resultadox['liberacao']);
		$datahora_liberado = utf8_encode($resultadox['datahora_liberado']);
		$observacao = utf8_encode($resultadox['observacao']);
		$xpainel = utf8_encode($resultadox['xpainel']);
		$xdisp_seg = utf8_encode($resultadox['xdisp_seg']);
		$xtransmissao = utf8_encode($resultadox['xtransmissao']);
		$xhidraulica = utf8_encode($resultadox['xhidraulica']);
		$xsuspensao = utf8_encode($resultadox['xsuspensao']);
		$xguincho = utf8_encode($resultadox['xguincho']);
		$xanfibio = utf8_encode($resultadox['xanfibio']);
		$xcabine = utf8_encode($resultadox['xcabine']);
		$xfreio = utf8_encode($resultadox['xfreio']);
		$xeletrica = utf8_encode($resultadox['xeletrica']);
		$xmotor = utf8_encode($resultadox['xmotor']);
		$xvisao = utf8_encode($resultadox['xvisao']);
		$xdirecao = utf8_encode($resultadox['xdirecao']);
		$xbateria = utf8_encode($resultadox['xbateria']);
		$xlubrificacao = utf8_encode($resultadox['xlubrificacao']);
		$xreboque = utf8_encode($resultadox['xreboque']);
		$xpneus = utf8_encode($resultadox['xpneus']);
		
		$sql1 = "SELECT * FROM 2becmb_material WHERE id LIKE '$id_mat'";
		$query1 = mysqli_query($link, $sql1);
		$resultado1 = mysqli_fetch_assoc($query1);
	
		$chassis_sn = utf8_encode($resultado1['chassis_sn']);
		$marca = utf8_encode($resultado1['marca']);
		$modelo = utf8_encode($resultado1['modelo']);
		$material = utf8_encode($resultado1['material']);
		$ppeb = utf8_encode($resultado1['ppeb']);
		$classe = utf8_encode($resultado1['classe']);
		
		
?>



<table class="backcolor" id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
  
			<tr><td align="center" ><font color='#000000' face="verdana" size=3><b>OSv nº<?php echo ' '.$a1;?></b></font></td><td rowspan="1" colspan="1" align="center"><img src="<?php echo './2becmb_foto/'.$id_mat.'.jpg';?>" width="60" height="90"></td><td><font color='#000000' face="verdana" size=2><b>Material:</b></font></td><td><input name="material" type="varchar" id="material" size="25" value="<?php echo $material.' - '.$marca.' - '.$modelo;?>" readonly /><input name="id_os" type="hidden" id="id_os" value="<?php echo $id_os;?>"/><input name="id_mat" type="hidden" id="id_mat" value="<?php echo $id_mat;?>"/></td><td><font color='#000000' face="verdana" size=2><b>&nbsp&nbsp&nbsp&nbspPlaca/Prefixo/EB:</b></font></td><td><input name="ppeb" type="varchar" id="ppeb" value="<?php echo $ppeb;?>" readonly /></td><td></td><td></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Painel:</font></td><td><textarea rows="2" cols="28" name="xpainel" value="" readonly><?php echo $xpainel;?></textarea></td>		<td><font color='#000000' face="verdana" size=2>Dispositivos Segurança:</font></td><td><textarea rows="2" cols="28" name="xdisp_seg" value="" readonly><?php echo $xdisp_seg;?></textarea></td><td><font color='#000000' face="verdana" size=2>Motor:</font></td><td><textarea rows="2" cols="28" name="xmotor" value="" readonly><?php echo $xmotor;?></textarea></td><td><font color='#000000' face="verdana" size=2>Sistema Elétrico:</font></td><td><textarea rows="2" cols="28" name="xeletrica" value="" readonly><?php echo $xeletrica;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Suspensão:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</font></td><td><textarea rows="2" cols="28" name="xsuspensao" value="" readonly><?php echo $xsuspensao;?></textarea></td><td><font color='#000000' face="verdana" size=2>Freio:</font></td><td><textarea rows="2" cols="28" name="xfreio" value="" readonly><?php echo $xfreio;?></textarea></td>
				<td><font color='#000000' face="verdana" size=2>Direção:</font></td><td><textarea rows="2" cols="28" name="xdirecao" value="" readonly><?php echo $xdirecao;?></textarea></td>	<td><font color='#000000' face="verdana" size=2>Transmissão:</font></td><td><textarea rows="2" cols="28" name="xtransmissao" value="" readonly><?php echo $xtransmissao;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Bateria:</font></td><td><textarea rows="2" cols="28" name="xbateria" value="" readonly><?php echo $xbateria;?></textarea></td>	<td><font color='#000000' face="verdana" size=2>Visão:</font></td><td><textarea rows="2" cols="28" name="xvisao" value="" readonly><?php echo $xvisao;?></textarea></td>
				<td><font color='#000000' face="verdana" size=2>Cabine:</font></td><td><textarea rows="2" cols="28" name="xcabine" value="" readonly><?php echo $xcabine;?></textarea></td>		<td><font color='#000000' face="verdana" size=2>Reboque:</font></td><td><textarea rows="2" cols="28" name="xreboque" value="" readonly><?php echo $xreboque;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Hidráulica:</font></td><td><textarea rows="2" cols="28" name="xhidraulica" value="" readonly><?php echo $xhidraulica;?></textarea></td><td><font color='#000000' face="verdana" size=2>Guincho:</font></td><td><textarea rows="2" cols="28" name="xguincho" value="" readonly><?php echo $xguincho;?></textarea></td>
				<td><font color='#000000' face="verdana" size=2>Anfíbio:</font></td><td><textarea rows="2" cols="28" name="xanfibio" value="" readonly><?php echo $xanfibio;?></textarea></td>	<td><font color='#000000' face="verdana" size=2>Lubrificação:</font></td><td><textarea rows="2" cols="28" name="xlubrificacao" value="" readonly><?php echo $xlubrificacao;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Pneus:</font></td><td><textarea rows="2" cols="28" name="xpneus" value="" readonly><?php echo $xpneus;?></textarea></td>		<td><font color='#000000' face="verdana" size=2>Pneus:</font></td><td></td><td><font color='#000000' face="verdana" size=2>Observações:</font></td><td><textarea rows="2" cols="28" name="xpneus" value="" readonly><?php echo $observacao;?></textarea></td></tr>
			
			
  
</tr>
</table>	
	
<?php



	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_mnt = utf8_decode($_POST['f_mnt']);
	$f_disponibilidade = utf8_decode($_POST['f_disponibilidade']); echo $f_disponibilidade;
    $f_problemas = utf8_decode($_POST['f_problemas']);
	$f_cadastrador = utf8_decode($_POST['f_cadastrador']);
	$f_datahora_cadastro = utf8_decode($_POST['f_datahora_cadastro']);
	$f_datahora_entrada = utf8_decode($_POST['f_datahora_entrada']);
	$f_verificador = utf8_decode($_POST['f_verificador']);
	$f_status = utf8_decode($_POST['f_status']);
	$f_datahora_pronto = utf8_decode($_POST['f_datahora_pronto']);
	$f_liberacao = utf8_decode($_POST['f_liberacao']);
	$f_datahora_liberado = utf8_decode($_POST['f_datahora_liberado']);
	
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'id_os DESC';}
	if ($ord2 == ''){$ord2 = 'id_os DESC';}
	if ($ord3 == ''){$ord3 = 'id_os DESC';}
	if ($ord4 == ''){$ord4 = 'id_os DESC';}
	
	
	// consulta com filtros
	$sql1 = "SELECT * FROM 2becmb_mnt WHERE id_os LIKE '$a1' AND datahora_item LIKE '%$f_datahora_item' AND item_tipo LIKE '%$f_item_tipo' AND item_descricao LIKE '%$f_item_descricao%' AND item_cadastrador LIKE '%$f_item_cadastrador' AND item_cod LIKE '$f_item_cod%' AND item_valor_unit LIKE '$f_item_valor_unit%' AND item_qtde LIKE '%$f_item_qtde' AND item_valor_total LIKE '%$f_item_valor_total' AND ne LIKE '%$f_ne' ORDER BY $ord1, $ord2, $ord3, $ord4";
	$query1 = mysqli_query($link, $sql1);
	
	//
	
	
	// contador de registros
	$encontrados = mysqli_num_rows($query1); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM 2becmb_mnt"); //total de registros na tabela material
	$total = mysqli_num_rows($sql_listar_total);
	
	
			
?>

<form method="post" action="" enctype="multipart/form-data" name="consulta1"></form>
<form method="post" action="" enctype="multipart/form-data" name="consulta">

<font size="2" face="arial">

<p align="center">


<label for="from"><font color='#ffffff' face="arial" size=2>Ordenar por:</font></label>
<?php
$opc = '<option value="id ASC">Id Asc</option>
			<option value="id DESC">Id Desc</option>
			<option value="posto_grad ASC">Posto Grad Asc</option>
			<option value="posto_grad DESC">Posto Grad Desc</option>
			<option value="nome_guerra ASC">Nome Guerra Asc</option>
			<option value="nome_guerra DESC">Nome Guerra Desc</option>
			<option value="cnh ASC">CNH Asc</option>
			<option value="cnh DESC">CNH Desc</option>
			<option value="cnh_val ASC">CNH Validade Asc</option>
			<option value="cnh_val DESC">CNH Validade Desc</option>
			<option value="coletivo ASC">Coletivo Asc</option>
			<option value="coletivo DESC">Coletivo Desc</option>
			<option value="mopp ASC">MOPP Asc</option>
			<option value="mopp DESC">MOPP Desc</option>
			<option value="mot_militar ASC">Mot Militar Asc</option>
			<option value="mot_militar DESC">Mot Militar Desc</option>
			<option value="operador ASC">Operador Asc</option>
			<option value="operador DESC">Operador Desc</option>
			<option value="eqp_opera ASC">Eqp que opera Asc</option>
			<option value="eqp_opera DESC">Eqp que opera Desc</option>'
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
  if ($a1 != '%'){echo '<a href="2becmb_lr_cadastra_mnt.php?id_os='.$a1.'" title="Cadastrar item de Mnt" target="_blank">';}?>
  <?php if ($a1 != '%'){echo '<button type="button">Cadastra Manutenção</button>';}else{echo '<b>Ficha<b/>';} echo '<a/>';?>

</font>
</p>


<BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td width="30" ><font size=2 color="#000000" face="arial"><b>Ord</b><BR></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>DataHora.Cadastro</b><BR><input type="varchar" size="12" name='f_datahora_item'></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Tipo</b><BR><select name='f_item_tipo'><?php
  $item_tipos = "SELECT DISTINCT item_tipo FROM 2becmb_mnt ORDER by item_tipo ASC";
  $sql = mysqli_query($link, $item_tipos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $item_tipo = utf8_encode($resultado2['item_tipo']);
  echo "<option value='$item_tipo'>$item_tipo</option>";
  }
  ?>
  </select></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Item.Descrição</b><BR><select name='f_item_descricao'><?php
  $item_descricaos = "SELECT DISTINCT item_descricao FROM 2becmb_mnt ORDER by item_descricao ASC";
  $sql = mysqli_query($link, $item_descricaos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $item_descricao = utf8_encode($resultado2['item_descricao']);
  echo "<option value='$item_descricao'>$item_descricao</option>";
  }
  ?>
  </select></font></td>
  
   
    <td width="40" ><font size=2 color="#000000" face="arial"><b>Cadastrador</b><BR><select name='f_item_cadastrador'><?php
  $item_cadastradors = "SELECT DISTINCT item_cadastrador FROM 2becmb_mnt ORDER by item_cadastrador ASC";
  $sql = mysqli_query($link, $item_cadastradors);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $item_cadastrador = utf8_encode($resultado2['item_cadastrador']);
  echo "<option value='$item_cadastrador'>$item_cadastrador</option>";
  }
  ?>
  </select></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Código</b><BR><input type="varchar" size="6" name='f_item_cod'></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Valor Unit</b><BR><input type="varchar" size="8" name='f_item_valor_unit'></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Qtde</b><BR><input type="varchar" size="2" name='f_item_qtde'></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Valor Total</b><BR><input type="varchar" size="8" name='f_item_valor_total'></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Empenho</b><BR><input type="varchar" size="10" name='f_ne'></font></td>
  
  </tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#B0C4DE";

	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_os = $resultado['id_os'];
  $id_mnt = $resultado['id_mnt'];
  $datahora_item = utf8_encode($resultado['datahora_item']);
  $item_tipo = utf8_encode($resultado['item_tipo']);
  $item_descricao = utf8_encode($resultado['item_descricao']);
  $item_cadastrador = utf8_encode($resultado['item_cadastrador']);
  $item_cod = utf8_encode($resultado['item_cod']);
  $item_valor_unit = utf8_encode($resultado['item_valor_unit']);
  $item_qtde = utf8_encode($resultado['item_qtde']);
  $item_valor_total = utf8_encode($resultado['item_valor_total']);
  $ne = utf8_encode($resultado['ne']);
  $status_mnt = utf8_encode($resultado['status_mnt']);
  $datahora_status = utf8_encode($resultado['datahora_status']);
  $alterou_status= utf8_encode($resultado['alterou_status']);
  
  $sql2 = "SELECT id_mat FROM 2becmb_os WHERE id_os LIKE '$id_os'";
	$query2 = mysqli_query($link, $sql2);
	$resultado2 = mysqli_fetch_assoc($query2);

			$id_mat = utf8_encode($resultado2['id_mat']);
			
	$sql4 = "SELECT * FROM 2becmb_material WHERE id LIKE '$id_mat'";
	$query4 = mysqli_query($link, $sql4);
	$resultado4 = mysqli_fetch_assoc($query4);

			$foto = utf8_encode($resultado4['foto']);
			$ppeb = utf8_encode($resultado4['ppeb']);
  
  $data = date("Y_m_d");
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#B0C4DE") {
	$cor="white";
} else {
	$cor="#B0C4DE";
	//$cor="#87CEFF";
}
 if ($cor=="#B0C4DE"){$cor1="white";}else{$cor1="#B0C4DE";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial"  title=""><?php echo $cont; ?></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $datahora_item;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=";?>"><?php echo $item_tipo;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $item_descricao; ?></font></p></td>
    
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $item_cadastrador;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo $item_cod; ?></a></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $item_valor_unit; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $item_qtde; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $item_valor_total; ?></font></p></td> 
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $ne; ?></font></p></td>
  
<?php

}

?>

<tr>
  <td colspan="9" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] cadastrados. </p></font></td>
  
  
  <td colspan="1" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center"></font></td>
</tr>
</table>
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
			$comando = utf8_decode('Visualizou o Controle de Ordens de Serviço');
			$sql = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
			?>

 
    </ul>
  </div>


</body></html>