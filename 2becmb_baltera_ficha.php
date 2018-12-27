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
        width:800px;
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
$a1 = $_GET['id_ficha'];

// consulta
	$sql = "SELECT * FROM 2becmb_lr_ficha WHERE id_ficha LIKE '$a1'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
		
		$id_mat = utf8_encode($resultado['id_mat']);
		$motorista = utf8_encode($resultado['motorista']);
		$ch_vtr = utf8_encode($resultado['ch_vtr']);
		$local_apresenta = utf8_encode($resultado['local_apresenta']);
		//$data_apresenta = utf8_decode($resultado['data_apresenta']);
		//$hora_apresenta = utf8_decode($resultado['hora_apresenta']);
		$data_hora_apresenta =utf8_encode($resultado['data_hora_apresenta']);
		$data_apresenta = substr($data_hora_apresenta, 0, 10);
		$hora_apresenta = substr($data_hora_apresenta, 11, 5);
		
		$hoje = date('Y-m-d');
		
		$ordenou = utf8_encode($resultado['ordenou']);
		$destino = utf8_encode($resultado['destino']);
		$missao = utf8_encode($resultado['missao']);
		$itinerario = utf8_encode($resultado['itinerario']);
		$cmt_su = utf8_encode($resultado['cmt_su']);
		$enc_mnt = utf8_encode($resultado['enc_mnt']);
		//$saida_data = utf8_decode($resultado['saida_data']);
		//$saida_hora = utf8_decode($resultado['saida_hora']);
		$saida_data_hora = utf8_encode($resultado['saida_data_hora']);
		$saida_data = substr($saida_data_hora, 0, 10);
		$saida_hora = substr($saida_data_hora, 11, 5);
		
		$saida_odo = utf8_encode($resultado['saida_odo']);
		$chegada_data_hora = utf8_encode($resultado['chegada_data_hora']);
		$chegada_data = substr($chegada_data_hora, 0, 10);
		$chegada_hora = substr($chegada_data_hora, 11, 5);
		$chegada_odo = utf8_encode($resultado['chegada_odo']);
		$situacao_ficha = utf8_encode($resultado['situacao_ficha']);
		$observacao = utf8_encode($resultado['observacao']);
		
	$sql1 = "SELECT * FROM 2becmb_material WHERE id LIKE '$id_mat'";
	$query1 = mysqli_query($link, $sql1);
	$resultado1 = mysqli_fetch_assoc($query1);
	
		$chassis_sn = utf8_encode($resultado1['chassis_sn']);
		$marca = utf8_encode($resultado1['marca']);
		$modelo = utf8_encode($resultado1['modelo']);
		$material = utf8_encode($resultado1['material']);
		$ppeb = utf8_encode($resultado1['ppeb']);
?>

<form class="jotform-form" action="2becmb_balterar_ficha.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="60" height="75"></td>
		<td colspan="2"><font color='#000000' size="5" face="verdana">Batalhão Cidade de Campinas </font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Controle do Material Classe VI e IX</font></td>
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
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/status_faixa.png" width="80%" height="40" border="0"></font></legend>

			<table align="center" cellpadding="4">
			
			<tr><td><font color='#000000' face="verdana" size=2>id:</font></td><td><input name="id_ficha" type="varchar" size="40" value="<?php echo $a1;?>"/><input name="id_mat" type="hidden" id="id_mat" value="<?php echo $id_mat;?>"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Material:</font></td><td><input name="material" type="varchar" size="40" id="material" value="<?php echo $material.' - '.$marca.' - '.$modelo;?>" readonly /></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Placa/Prefixo/EB:</font></td><td><input name="ppeb" type="varchar" size="40" id="ppeb" value="<?php echo $ppeb;?>" readonly /></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td align="center "colspan="2"><font color='#000000' face="verdana" size=2><b>Preenchido pela 4ª Seção/ Esc Mnt<b></font></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Motorista/Operador</td><td><select name='motorista'><?php
			$motoristas1 = "SELECT DISTINCT usuario, posto_grad, nome_guerra, cnh FROM usu WHERE usuario LIKE '$motorista' ORDER by usuario ASC";
			$sql1 = mysqli_query($link, $motoristas1);
			$resultado1 = mysqli_fetch_array($sql1);
			$motorista1 = utf8_encode($resultado1['usuario']);
			$posto_grad1 = utf8_encode($resultado1['posto_grad']);
			$nome_guerra1 = utf8_encode($resultado1['nome_guerra']);
			if ($nivel_2becmb > 1)
				// Editável
				{$motoristas = "SELECT DISTINCT usuario, posto_grad, posto_grad_ord, nome_guerra, cnh FROM usu WHERE cnh > 0 ORDER by posto_grad_ord ASC";}
				// Travado
			else{$motoristas = "SELECT DISTINCT usuario, posto_grad, nome_guerra, cnh FROM usu WHERE usuario LIKE '$motorista' ORDER by usuario ASC";}
			$sql = mysqli_query($link, $motoristas);
			echo "<option value='$motorista1'>$posto_grad1 $nome_guerra1</option>";
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$motorista = utf8_encode($resultado2['usuario']);
			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);
			$cnh = utf8_encode($resultado2['cnh']);
			switch ($cnh) {
    case 0:
        $cnh1 = "Sem Habilitação";
        break;
    case 1:
        $cnh1 = "Cat A";
        break;
    case 2:
        $cnh1 = "Cat B";
		break;
	case 3:
        $cnh1 = "Cat AB";
		break;
	case 4:
        $cnh1 = "Cat C";
		break;
	case 5:
        $cnh1 = "Cat D";
		break;
	case 3:
        $cnh1 = "Cat B";
        break;
}
			echo "<option value='$motorista'>$posto_grad $nome_guerra ($cnh1)</option>";
			}
			?>
			</select></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Ch Vtr</td><td><select name='ch_vtr'><?php
			$ch_vtrs1 = "SELECT usuario, posto_grad, nome_guerra, cnh FROM usu WHERE usuario LIKE '$ch_vtr' ORDER by usuario ASC";
			$sql1 = mysqli_query($link, $ch_vtrs1);
			$resultado1 = mysqli_fetch_array($sql1);
			$ch_vtr1 = utf8_encode($resultado1['usuario']);
			$posto_grad1 = utf8_encode($resultado1['posto_grad']);
			$nome_guerra1 = utf8_encode($resultado1['nome_guerra']);
			echo "<option value='$ch_vtr1'>$posto_grad1 $nome_guerra1</option>";
			if ($nivel_2becmb > 1)
				//Editável
			{$ch_vtrs = "SELECT * FROM usu ORDER by posto_grad_ord DESC";}
				//Travado
			else{$ch_vtrs = "SELECT usuario, posto_grad, nome_guerra, cnh FROM usu WHERE usuario LIKE '$ch_vtr' ORDER by usuario ASC";}
			$sql = mysqli_query($link, $ch_vtrs);
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$ch_vtr = utf8_encode($resultado2['usuario']);
			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);
			echo "<option value='$ch_vtr'>$posto_grad $nome_guerra</option>";
			}
			?>
			</select></font></td></tr>

			<tr><td><font color='#000000' face="verdana" size=2>Local de Apresentação:</font></td><td><input name="local_apresenta" type="varchar" id="local_apresenta" maxlength="30" value="<?php echo $local_apresenta;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Data-Hora Apresentação:</font></td><td><input name="data_apresenta" type="date" value="<?php echo $data_apresenta;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/><input name="hora_apresenta" type="time" value="<?php echo $hora_apresenta;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Ordenou:</font></td><td><input name="ordenou" type="varchar" id="ordenou" maxlength="30" value="<?php echo $ordenou;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Destino:</font></td><td><input name="destino" type="varchar" id="destino" maxlength="30" size="40" value="<?php echo $destino;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Missão:</font></td><td><input name="missao" type="varchar" id="missao" maxlength="100" size="40" value="<?php echo $missao;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Itinerário:</font></td><td><input name="itinerario" type="varchar" id="itinerario" size="40" maxlength="50" value="<?php echo $itinerario;?>" <?php if ($nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Cmt SU</td><td><select name='cmt_su'><?php
			$cmt_sus1 = "SELECT DISTINCT usuario, posto_grad, nome_guerra, su FROM usu WHERE usuario LIKE '$cmt_su' ORDER by usuario ASC";
				$sql1 = mysqli_query($link, $cmt_sus1);
				$resultado1 = mysqli_fetch_array($sql1);
				$cmt_su1 = utf8_encode($resultado1['usuario']);
				$su1 = utf8_encode($resultado1['su']);
				echo "<option value='$cmt_su1'>Cmt $su1</option>";
				if ($nivel_2becmb > 1)
				//Editável
				{$cmt_sus = "SELECT DISTINCT usuario, funcao, posto_grad, nome_guerra, su FROM usu WHERE funcao LIKE 'Cmt SU' ORDER by usuario ASC";}
				//Travado
				else{$cmt_sus = "SELECT DISTINCT usuario, posto_grad, nome_guerra, su FROM usu WHERE usuario LIKE '$cmt_su' ORDER by usuario ASC";}
				$sql = mysqli_query($link, $cmt_sus);
				while ($resultado2 = mysqli_fetch_array($sql)) {
				$usuario = utf8_encode($resultado2['usuario']);
				$su = utf8_encode($resultado2['su']);			
				echo "<option value='$usuario'>Cmt $su</option>";
				}
			?>
			</select></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Enc Mnt</td><td><select name='enc_mnt'><?php
			$enc_mnts1 = "SELECT DISTINCT usuario, posto_grad, nome_guerra, su FROM usu WHERE usuario LIKE '$enc_mnt' ORDER by usuario ASC";
				$sql1 = mysqli_query($link, $enc_mnts1);
				$resultado1 = mysqli_fetch_array($sql1);
				$enc_mnt1 = utf8_encode($resultado1['usuario']);
				$posto_grad1 = utf8_encode($resultado1['posto_grad']);
				$nome_guerra1 = utf8_encode($resultado1['nome_guerra']);
				echo "<option value='$enc_mnt1'>$posto_grad1 $nome_guerra1</option>";
				if ($nivel_2becmb > 1)
				//Editável
				{$enc_mnts = "SELECT DISTINCT usuario, funcao, su, posto_grad, nome_guerra FROM usu WHERE funcao LIKE 'Enc Mnt%' ORDER by usuario ASC";}
				//Travado
				else{$enc_mnts = "SELECT DISTINCT usuario, posto_grad, nome_guerra, su FROM usu WHERE usuario LIKE '$enc_mnt' ORDER by usuario ASC";}
				$sql = mysqli_query($link, $enc_mnts);
				while ($resultado2 = mysqli_fetch_array($sql)) {
				$usuario = utf8_encode($resultado2['usuario']);
				$su = utf8_encode($resultado2['su']);
				$posto_grad = utf8_encode($resultado2['posto_grad']);
				$nome_guerra = utf8_encode($resultado2['nome_guerra']);
				echo "<option value='$usuario'>Enc Mnt $su ($posto_grad $nome_guerra)</option>";
				}
			?>
			</select></font></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td align="center "colspan="2"><font color='#000000' face="verdana" size=2><b>Preenchido pelo Cmt Gda 2º BECmb/ Permanencia Pel Eqp<b></font></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Data-Hora Saída:</font></td><td><input name="saida_data" type="date" value="<?php echo $saida_data;?>" <?php if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo 'readonly';}?>/><input name="saida_hora" type="time" value="<?php echo $saida_hora;?>" <?php if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Odômetro Saída:</font></td><td><input name="saida_odo" type="varchar" id="saida_odo" maxlength="7" value="<?php echo $saida_odo;?>" <?php if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo 'readonly';}?>/></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Data-Hora Chegada: *</font></td><td><input name="chegada_data" type="<?php if ($saida_data != '0001-01-01'){echo 'date';}else{echo 'hidden';}?>" value="<?php echo $chegada_data;?>" <?php if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo 'readonly';}?> /> <input name="chegada_hora" type="<?php if ($saida_data != '0001-01-01'){echo 'time';}else{echo 'hidden';}?>" value="<?php echo $chegada_hora;?>" <?php if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo 'readonly';}?> /> </td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Odômetro Chegada: *</font></td><td><input name="chegada_odo" type="<?php if ($saida_data != '0001-01-01'){echo 'varchar';}else{echo 'hidden';}?>" id="chegada_odo" maxlength="7" value="<?php echo $chegada_odo; ?>" <?php if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo 'readonly';}?> /> </td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Situação</td><td><select name='situacao_ficha'><?php
			echo "<option value='$situacao_ficha'>$situacao_ficha</option>";
			if ($hoje < $data_apresenta && $nivel_2becmb < 2){echo "";}else
				{
				if ($situacao_ficha == 'preparando' && $nivel_2becmb < 2){echo "<option value='Aberta'>Aberta</option>";}else{echo "<option value='Aberta'>Aberta</option>";}
				if ($situacao_ficha == 'aberta' && $nivel_2becmb < 2){echo "<option value='Fechada'>Fechada</option>";}else{echo "<option value='Fechada'>Fechada</option>";}
				echo "<option value='Preparando'>Preparando</option>";
				if ($nivel_2becmb > 1){echo "<option value='Cancelada'>Cancelada</option>";}}
			?>
			</select></font></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td align="center "colspan="2"><font color='#000000' face="verdana" size=2><b>Preenchido pelo Cmt Gda 2º B Log L<b></font></td></tr>
			
			<tr><td align="center" colspan="2"><font color='#000000' face="verdana" size=2><hr></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Observação:</font></td><td><textarea name="observacao" cols="40" rows="3" <?php if ($nivel_2becmb < 2 && $chegada_data < $hoje){echo 'readonly';}?>><?php echo $observacao;?></textarea></td></tr>
			
			
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