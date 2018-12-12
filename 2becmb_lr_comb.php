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

	if (($nivel_2becmb < 2)) { echo "
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
<title>2° BE Cmb</title>
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
        background:#ffFFFF;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:100%;
        background: #ffffff;
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
$a1 = $_GET['id_mat'];
if (!$a1){$a1='%';}	

$b1 = $_GET['id_ficha'];
if (!$b1){$b1='%';}	

    ?>
<form class="jotform-form" action="" enctype="multipart/form-data" method="post" name="busca" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2becmb.png" width="50" height="65"></td>
		<td colspan="3"><font color='#000000' size="5" face="arial">Batalhão Borba Gato </font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="arial">Controle do Material Classe VI e IX</font></td>
		<td align="center"> <font color="#EEE9E9" size="4" face="arial"><?php echo $posto_grad.' '.$nome_guerra.'('.$funcao.')';?></font></td>
		<td>
		<p align="right">
		
		<a href="/2becmb_desmob_haiti/index2.php" title="Página Inicial" > <img src="./imagens/home.png" width="40" height="40"></a> &nbsp&nbsp
		
		<a href="/2becmb_desmob_haiti/session_destroy.php" title="Sair do sistema" > <img src="./imagens/sair.png" width="40" height="40"></a> &nbsp&nbsp
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
			<legend><img src="imagens/controle_abast_faixa.png" width="600" height="40" border="0"></legend>
	

<?php

	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_combustivel = utf8_decode($_POST['f_combustivel']);
	$f_bomba_i = utf8_decode($_POST['f_bomba_i']);
    $f_bomba_f = utf8_decode($_POST['f_bomba_f']);
	$f_cadastrador = utf8_decode($_POST['f_cadastrador']);
	$f_datahora = utf8_decode($_POST['f_datahora']);
	
	
	
	
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	$pi = $_POST['f_pi'].' 00:00:00';
	$pf = $_POST['f_pf'].' 23:59:59';
	}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'id_ficha ASC';}
	if ($ord2 == ''){$ord2 = 'id_abast DESC';}
	if ($ord3 == ''){$ord3 = 'id_abast DESC';}
	if ($ord4 == ''){$ord4 = 'id_abast DESC';}
	
	if ($pi == ' 00:00:00' || $pi == ''){$pi = '2010-01-01 00:00:01';} //echo 'pi'.$pi;
	if ($pf == ' 23:59:59' || $pf == ''){$pf = date("Y-m-d H:m:s");} //echo 'pf'.$pf;
	
	// consulta com filtros
	$sql1 = "SELECT * FROM 2becmb_abast WHERE id_mat LIKE '$a1' AND id_ficha LIKE '$b1' AND combustivel LIKE '%$f_combustivel' AND datahora LIKE '%$f_datahora%' AND datahora > '$pi' AND datahora < '$pf' AND cadastrador LIKE '%$f_cadastrador' AND bomba_i LIKE '$f_bomba_i%' AND bomba_f LIKE '$f_bomba_f%' ORDER BY $ord1, $ord2, $ord3, $ord4";
	$query1 = mysqli_query($link, $sql1);
	
	//$resultado3 = mysqli_fetch_assoc($query1);
	//$id_fich = $resultado3['id_ficha'];
	
	// contador de registros
	$encontrados = mysqli_num_rows($query1); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM 2becmb_abast"); //total de registros na tabela material
	$total = mysqli_num_rows($sql_listar_total);
	
	
			
?>

<form method="post" action="" enctype="multipart/form-data" name="consulta1"></form>
<form method="post" action="" enctype="multipart/form-data" name="consulta">

<font size="2" face="arial">

<p align="center">



<?php
$opc = '    <option value="id_mat ASC">Material Asc</option>
			<option value="id_mat DESC">Material Desc</option>
			<option value="combustivel ASC">Combustivel Asc</option>
			<option value="combustivel DESC">Combustivel Desc</option>
			<option value="bomba_i ASC">Bomba Inicial Asc</option>
			<option value="bomba_i DESC">Bomba Inicial</option>
			<option value="bomba_f ASC">Bomba Final Asc</option>
			<option value="bomba_f DESC">Bomba Final Desc</option>
			<option value="cadastrador ASC">Responsável Asc</option>
			<option value="cadastrador DESC">Responsável Desc</option>'
?>

<label for="from"><font color='#000000' face="arial" size=2>Período (em branco para tudo):&nbsp&nbsp</font></label>
<label for="from"><font color='#000000' face="arial" size=2>Inicio</font></label> <input type="date" size="4" name='f_pi'>&nbsp&nbsp&nbsp&nbsp
<label for="from"><font color='#000000' face="arial" size=2>Fim</font></label> <input type="date" size="4" name='f_pf'><br><br>

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
</select>&nbsp&nbsp&nbsp&nbsp&nbsp	
			
<input type="submit" name="consulta" value="Filtrar e Ordenar">&nbsp&nbsp&nbsp&nbsp&nbsp

<?php 
  if ($b1 != '%'){echo '<a href="/2becmb_desmob_haiti/2becmb_cadastra_abast.php?id_ficha='.$b1.'" title="Cadastrar Abastecimento" target="_blank"><button type="button">Cadastra Abastecimento</button><a/>';}?>

</font>
</p>

<BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td ><font size=2 color="#000000" face="arial"><b>Ord</b><BR></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Vtr/Eqp</b><BR></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Ficha nº</b><BR></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Data-Hora</b><BR><input type="varchar" size="12" name='f_datahora'></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Combustível</b><BR><select name='f_combustivel'><?php
  $combustivels = "SELECT DISTINCT combustivel FROM 2becmb_abast ORDER by combustivel ASC";
  $sql = mysqli_query($link, $combustivels);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $combustivel = utf8_encode($resultado2['combustivel']);
  echo "<option value='$combustivel'>$combustivel</option>";
  }
  ?>
  </select></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Bomba Ini</b><BR><select name='f_bomba_i'><?php
  $bomba_is = "SELECT DISTINCT bomba_i FROM 2becmb_abast ORDER by bomba_i ASC";
  $sql = mysqli_query($link, $bomba_is);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $bomba_i = utf8_encode($resultado2['bomba_i']);
  echo "<option value='$bomba_i'>$bomba_i</option>";
  }
  ?>
  </select></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Bomba Fim</b><BR><select name='f_bomba_f'><?php
  $bomba_fs = "SELECT DISTINCT bomba_f FROM 2becmb_abast ORDER by bomba_f ASC";
  $sql = mysqli_query($link, $bomba_fs);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $bomba_f = utf8_encode($resultado2['bomba_f']);
  echo "<option value='$bomba_f'>$bomba_f</option>";
  }
  ?>
  </select></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Abastecido</b><BR></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Distância</b><BR><b>Tempo</b></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Consumo</b><BR></font></td>
  
  <td ><font size=2 color="#000000" face="arial"><b>Responsável</b><BR><select name='f_cadastrador'><?php
  $cadastradors = "SELECT DISTINCT cadastrador FROM 2becmb_abast ORDER by cadastrador ASC";
  $sql = mysqli_query($link, $cadastradors);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $cadastrador = utf8_encode($resultado2['cadastrador']);
  echo "<option value='$cadastrador'>$cadastrador</option>";
  }
  ?>
  </select></font></td>
  
</tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#FACC2E";

	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_abast = $resultado['id_abast'];
  $id_ficha = $resultado['id_ficha'];
  $combustivel = utf8_encode($resultado['combustivel']);
  $bomba_i = utf8_encode($resultado['bomba_i']);
  $bomba_f = utf8_encode($resultado['bomba_f']);
  $cadastrador = utf8_encode($resultado['cadastrador']);
  $datahora= utf8_encode($resultado['datahora']);
  $abast = round($bomba_f - $bomba_i,1);
  $abastecido += round($bomba_f - $bomba_i,1);
  
	$sql2 = "SELECT * FROM 2becmb_lr_ficha WHERE id_ficha = '$id_ficha'";
	$query2 = mysqli_query($link, $sql2);
	$resultado2 = mysqli_fetch_assoc($query2);

		$id_mat = utf8_encode($resultado2['id_mat']);
		$saida_odo = $resultado2['saida_odo'];
		$chegada_odo = $resultado2['chegada_odo'];
		if ($chegada_odo == 0){$distancia == 0;}else{$distancia = $chegada_odo - $saida_odo;}
		$dist_tot += $distancia;
	
	$sql3 = "SELECT * FROM 2becmb_material WHERE id = '$id_mat'";
	$query3 = mysqli_query($link, $sql3);
	$resultado3 = mysqli_fetch_assoc($query3);
			$classe = $resultado3['classe'];
	
			if ($classe == 'Cl IX'){$consum = $dist_tot/$abastecido;}else{$consum = $abastecido/$distancia;}
			$consumo = round($consum, 2);
			if ($classe == 'Cl IX'){$und_cons = 'Km/l';}else{$und_cons = 'L/hora';}
			$und_comb = 'litros';
			if ($classe == 'Cl IX'){$und_dist = 'Km';}else{$und_dist = 'H';}
			
	
			
	
			
			
  $data = date("Y_m_d");
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#FACC2E") {
	$cor="white";
} else {
	$cor="#FACC2E";
}
 if ($cor=="#FACC2E"){$cor1="white";}else{$cor1="#FACC2E";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial"  title=""><?php echo $cont; ?></font></p></td>

  <td width="30" ><font size=2 color="#000000" face="arial"><img src="<?php echo './2becmb_foto/'.$id_mat.'.jpg';?>" width="40" height="50" title=""></a></font></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $id_ficha;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $datahora;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $combustivel;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $bomba_i;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $bomba_f;?></font></p></td>  
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $abast.'-'.$abastecido.' '.$und_comb;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo $distancia.'-'.$dist_tot.' '.$und_dist; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo $consumo.' '.$und_cons; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $cadastrador; ?></font></p></td>
  
<?php

}

?>

<tr>
  <td colspan="10" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] cadastrados. </p></font></td>
  
  
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
			$comando = utf8_decode('Visualizou o Controle de Ordens de Serviço');
			$sql = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
			?>

 
    </ul>
  </div>


</body></html>