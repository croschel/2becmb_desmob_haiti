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
<link type="text/css" rel="stylesheet" href="./index1_files/nova.css">
<link rel="icon" href="http://10.12.125.45/imagens/fav.png">
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
$a1 = $_GET['id'];
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
			<legend><img src="imagens/controle_os_faixa.png" width="600" height="40" border="0"></legend>
	

<?php



	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_mnt = utf8_decode($_POST['f_mnt']);
	$f_id_os = utf8_decode($_POST['f_id_os']);
	$f_disponibilidade = utf8_decode($_POST['f_disponibilidade']); 
   
	$f_cadastrador = utf8_decode($_POST['f_cadastrador']);
	$f_datahora_cadastro = utf8_decode($_POST['f_datahora_cadastro']);
	$f_datahora_entrada = utf8_decode($_POST['f_datahora_entrada']);
	if ($f_datahora_entrada == '-'){$f_datahora_entrada = '0001';}
	$f_verificador = utf8_decode($_POST['f_verificador']);
	$f_status = utf8_decode($_POST['f_status']);
	$f_datahora_pronto = utf8_decode($_POST['f_datahora_pronto']);
	if ($f_datahora_pronto == '-'){$f_datahora_pronto = '0001';}
	$f_liberacao = utf8_decode($_POST['f_liberacao']);
	$f_datahora_liberado = utf8_decode($_POST['f_datahora_liberado']);
	if ($f_datahora_liberado == '-'){$f_datahora_liberado = '0001';}
	
	
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
	$sql1 = "SELECT * FROM 2becmb_os WHERE id_mat LIKE '$a1' AND tipo_mnt LIKE '%$f_tipo_mnt' AND disponibilidade LIKE '%$f_disponibilidade' AND cadastrador LIKE '%$f_cadastrador' AND datahora_cadastro LIKE '$f_datahora_cadastro%' AND datahora_entrada LIKE '$f_datahora_entrada%' AND verificador LIKE '%$f_verificador' AND status LIKE '%$f_status' AND datahora_pronto LIKE '%$f_datahora_pronto' AND liberacao LIKE '%$f_liberacao' AND datahora_liberado LIKE '%$f_datahora_liberado' AND id_os LIKE '%$f_id_os' ORDER BY $ord1, $ord2, $ord3, $ord4";
	$query1 = mysqli_query($link, $sql1);
	
	// 
	// contador de registros
	$encontrados = mysqli_num_rows($query1); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM 2becmb_os"); //total de registros na tabela material
	$total = mysqli_num_rows($sql_listar_total);
	
	
			
?>

<form method="post" action="" enctype="multipart/form-data" name="consulta1"></form>
<form method="post" action="" enctype="multipart/form-data" name="consulta">

<font size="2" face="arial">

<p align="center">


<label for="from"><font color='#000000' face="arial" size=2>Ordenar por:</font></label>
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
  if ($a1 != '%'){echo '<a href="2becmb_lr_cadastra_os.php?id_mat='.$a1.'" title="Cadastrar nova OS" target="_blank">';}?>
  <?php if ($a1 != '%'){echo '<button type="button">Cadastra OSv</button>';} echo '<a/>';?>

</font>
</p>

<BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td width="30" ><font size=2 color="#000000" face="arial"><b>Ord</b><BR></font></td>
  
  <td width="30" ><font size=2 color="#000000" face="arial"><b>OSv</b><BR><input type="varchar" size="1" name='f_id_os'></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Foto</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Tipo Mnt</b><BR><select name='f_tipo_mnt'><?php
  $tipo_mnts = "SELECT DISTINCT tipo_mnt FROM 2becmb_os ORDER by tipo_mnt ASC";
  $sql = mysqli_query($link, $tipo_mnts);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $tipo_mnt = utf8_encode($resultado2['tipo_mnt']);
  echo "<option value='$tipo_mnt'>$tipo_mnt</option>";
  }
  ?>
  </select></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Sit_Mnt</b><BR><select name='f_disponibilidade'><?php
  $disponibilidades = "SELECT DISTINCT disponibilidade FROM 2becmb_os ORDER by disponibilidade ASC";
  $sql = mysqli_query($link, $disponibilidades);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $disponibilidade = utf8_encode($resultado2['disponibilidade']);
  echo "<option value='$disponibilidade'>$disponibilidade</option>";
  }
  ?>
  </select></font></td>
  
   
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Odometro</b><BR>Horímetro</font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>DH-Cadastro</b><BR><input type="varchar" size="7" name='f_datahora_cadastro'></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Cadastrador</b><BR><select name='f_cadastrador'><?php
  $cadastradors = "SELECT DISTINCT cadastrador FROM 2becmb_os ORDER by cadastrador ASC";
  $sql = mysqli_query($link, $cadastradors);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $cadastrador = utf8_encode($resultado2['cadastrador']);
  echo "<option value='$cadastrador'>$cadastrador</option>";
  }
  ?>
  </select></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>DH-Entrada</b><BR><input type="varchar" size="7" name='f_datahora_entrada'></font></td>
  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Verificador</b><BR><select name='f_verificador'><?php
  $verificadors = "SELECT DISTINCT verificador FROM 2becmb_os ORDER by verificador ASC";
  $sql = mysqli_query($link, $verificadors);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $verificador = utf8_encode($resultado2['verificador']);
  echo "<option value='$verificador'>$verificador</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Status</b><BR><select name='f_status'><?php
  $statuss = "SELECT DISTINCT status FROM 2becmb_os ORDER by status ASC";
  $sql = mysqli_query($link, $statuss);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $status = utf8_encode($resultado2['status']);
  echo "<option value='$status'>$status</option>";
  }
  ?>
  </select></font></td> 
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>DH-Pronto</b><BR><input type="varchar" size="7" name='f_datahora_pronto'></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Liberação</b><BR><select name='f_liberacao'><?php
  $liberacaos = "SELECT DISTINCT liberacao FROM 2becmb_os ORDER by liberacao ASC";
  $sql = mysqli_query($link, $liberacaos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $liberacao = $resultado2['liberacao'];
  echo "<option value='$liberacao'>$liberacao</option>";
  }
  ?>
  </select></font></td> 
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>DH-Liberado</b><BR><input type="varchar" size="7" name='f_datahora_liberado'></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><img src="./imagens/os.png" width="33" height="33" title="Alterar os dados das Ordens de Serviço"><BR></font></td>
  
  </tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#58ACFA";

	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_os = $resultado['id_os'];
  $id_mat = $resultado['id_mat'];
  $tipo_mnt = utf8_encode($resultado['tipo_mnt']);
  $disponibilidade = utf8_encode($resultado['disponibilidade']);
  $odometro = utf8_encode($resultado['odometro']);
  
  $cadastrador = utf8_encode($resultado['cadastrador']);
  $datahora_cadastro= utf8_encode($resultado['datahora_cadastro']);
  
  $datahora_entrada = utf8_encode($resultado['datahora_entrada']);
  if ($datahora_entrada == '0001-01-01 00:00:00') {$datahora_entrada = '-';}
  $verificador= utf8_encode($resultado['verificador']);
  $status= utf8_encode($resultado['status']);
  $datahora_pronto= utf8_encode($resultado['datahora_pronto']);
  if ($datahora_pronto == '0001-01-01 00:00:00') {$datahora_pronto = '-';}
  $liberacao= utf8_encode($resultado['liberacao']);
  $datahora_liberado= utf8_encode($resultado['datahora_liberado']);
  if ($datahora_liberado == '0001-01-01 00:00:00') {$datahora_liberado = '-';}
  
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
  
  $data = date("Y_m_d");
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#58ACFA") {
	$cor="white";
} else {
	$cor="#58ACFA";
	//$cor="#87CEFF";
}
 if ($cor=="#58ACFA"){$cor1="white";}else{$cor1="#58ACFA";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial"  title=""><?php echo $cont; ?></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial"  title="<?php echo 'Manutenções realizadas na Ordem de Serviço';?>"><?php echo '<a href="./2becmb_lr_mnt.php?id_os='.$id_os.'" target="blank">'; ?><button type="button"><?php echo 'OSv_'.$id_os.' Mnt'; ?></button></a></font></p></td>

  <td width="30" ><font size=2 color="#000000" face="arial"><?php if ($foto == 'sem_foto'){echo '<a href="2becmb_baltera_foto.php?id='.$id_mat.'" target="blank">';}else{echo '<a href="./2becmb_foto/'.$foto.'.jpg" target="blank">';}?><img src="<?php echo './2becmb_foto/'.$foto.'.jpg';?>" width="45" height="60" title="<?php echo $ppeb;?>"></a></font></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $tipo_mnt;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $disponibilidade;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $odometro;?></font></p></td>
    
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $datahora_cadastro;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo $cadastrador; ?></a></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $datahora_entrada; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $verificador; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $status; ?></font></p></td> 
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $datahora_pronto; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $liberacao; ?></font></p></td> 
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $datahora_liberado; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php if ((($liberacao == 'OK') && ($nivel_2becmb > 4))||($liberacao != 'OK')){echo '<a href="2becmb_lr_altera_os.php?id_os='.$id_os.'" target="blank">';} echo '<img src="./imagens/'; if ($liberacao == 'OK'){echo 'os0';}else{echo 'os1';} echo '.png" width="33" height="33" title="Alterar os dados da Ordem de Serviço">'; if ((($liberacao == 'OK') && ($nivel_2becmb > 4))||($liberacao != 'OK')){echo '</a>';}?></font></p></td>

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
			$comando = utf8_decode('Visualizou o Controle de Ordens de Serviço');
			$sql = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
			?>

 
    </ul>
  </div>


</body></html>