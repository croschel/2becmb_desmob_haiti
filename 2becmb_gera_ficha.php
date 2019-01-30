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
<link rel="shortcut icon" href="http://10.12.125.45/imagens/fav.png">
<link type="text/css" media="print" rel="stylesheet" href="./index1_files/printForm.css">

 


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>#</title>
  
  

</head>	

<body>
<?php
$id_ficha = $_GET['id_ficha'];

// consulta
	$sql = "SELECT * FROM 2becmb_lr_ficha WHERE id_ficha LIKE '$id_ficha'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
		
		$ch_vtr = utf8_encode($resultado['ch_vtr']);
		$motorista = utf8_encode($resultado['motorista']);
		$destino = utf8_encode($resultado['destino']);
		$id_mat = utf8_encode($resultado['id_mat']);
		$saida_data_hora = utf8_encode($resultado['saida_data_hora']);
		$data_saida = substr($saida_data_hora, 0, 10);
		$data_saida1 = substr($data_saida, 0, 4);
		$data_saida2 = substr($data_saida, 5, 2);
		$data_saida3 = substr($data_saida, 8, 2);
		$data_saida = $data_saida3.'-'.$data_saida2.'-'.$data_saida1;
		$hora_saida = substr($saida_data_hora, 11, 8); 
		$saida_odo= utf8_encode($resultado['saida_odo']);
		if ($saida_odo == 0){$saida_odo = '';}else{$saida_odo = $saida_odo;}
		$chegada_data_hora = utf8_encode($resultado['chegada_data_hora']);
		$chegada_odo= utf8_encode($resultado['chegada_odo']);
		if ($chegada_odo == 0){$chegada_odo = '';}else{$chegada_odo = $chegada_odo;}
		$situacao_ficha= utf8_encode($resultado['situacao_ficha']);
		$data_hora_apresenta = utf8_encode($resultado['data_hora_apresenta']);
		$data = substr($data_hora_apresenta, 0, 10);
		$data1 = substr($data, 0, 4);
		$data2 = substr($data, 5, 2);
		$data3 = substr($data, 8, 2);
		$data = $data3.'-'.$data2.'-'.$data1;
		$hora = substr($data_hora_apresenta, 11, 8); 
		$local_apresenta = utf8_encode($resultado['local_apresenta']);
		$ordenou = utf8_encode($resultado['ordenou']);
		$destino = utf8_encode($resultado['destino']);
		$missao = utf8_encode($resultado['missao']);
		$itinerario = utf8_encode($resultado['itinerario']);
		$enc_mnt = utf8_encode($resultado['enc_mnt']);
		
		//Diferenca entre datas
		$saida_data_hora1 = new DateTime($saida_data_hora);
		$chegada_data_hora1 = new DateTime($chegada_data_hora);
		$dif_data  = $saida_data_hora1->diff($chegada_data_hora1);
		
		//Diferenca entre odometros
		if($chegada_odo == "" || $saida_odo == ""){
			$dif_odo = "";
		}else{
			$dif_odo = $chegada_odo - $saida_odo;
		}
		
		
	$sql1 = "SELECT * FROM 2becmb_material WHERE id LIKE '$id_mat'";
	$query1 = mysqli_query($link, $sql1);
	$resultado1 = mysqli_fetch_assoc($query1);

			$ppeb = utf8_encode($resultado1['ppeb']);
			$marca = utf8_encode($resultado1['marca']);
			$modelo = utf8_encode($resultado1['modelo']);
			$classe = utf8_encode($resultado1['classe']);
			if ($classe == 'Cl IX'){$x = 'VIATURA';}else{$x = 'EQUIPAMENTO';}
			
	$sql2 = "SELECT * FROM usu WHERE usuario LIKE '$motorista'";
	$query2 = mysqli_query($link, $sql2);
	$resultado2 = mysqli_fetch_assoc($query2);

			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);
	
	$sql3 = "SELECT * FROM usu WHERE usuario LIKE '$ch_vtr'";
	$query3 = mysqli_query($link, $sql3);
	$resultado3 = mysqli_fetch_assoc($query3);

			$posto_grad1 = utf8_encode($resultado3['posto_grad']);
			$nome_guerra1 = utf8_encode($resultado3['nome_guerra']);
			
	$sql4 = "SELECT * FROM usu WHERE usuario LIKE '$enc_mnt'";
	$query4 = mysqli_query($link, $sql4);
	$resultado4 = mysqli_fetch_assoc($query4);

			$posto_grad2 = utf8_encode($resultado4['posto_grad']);
			$nome_guerra2 = utf8_encode($resultado4['nome_guerra']);

?>

<form class="jotform-form" action="2becmb_balterar_sit_doc.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    
	
	<ul class="form-section">
	  <li class="backcolor" data-type="control_text" id="id_56">
        <div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
			
			

			<table align="center" cellspacing="0" cellpadding="3" style="border-collapse: collapse; border:solid;" >

			<tr><td align="left" style="border-collapse: collapse; border:solid; border-right:hidden; border-bottom:hidden" border="1"><img src="<?php echo './imagens/eb.png';?>" width="40" height="70"><font color='#ffffff' face="arial" size=2></font></td><td align="center" colspan="2"><font color='#FFFFFF' face="arial" size=3><b>MINISTÉRIO DA DEFESA<BR>EXÉRCITO BRASILEIRO</b></font><BR><font color='#FFFFFF' face="arial" size=2>FICHA DE SERVIÇO DE <?php echo $x;?></font><BR><BR></td><td></td></tr>
			
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Nº:</b> <?php echo $id_ficha;?></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>OM:</b> 2º Batalhão Logistico Leve</font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Motorista:</b><?php echo ' '.$posto_grad.' '.$nome_guerra;?></font></td></tr>
			
			<tr><td align="left" colspan="3"><font color='#FFFFFF' face="arial" size=2><b>Viatura:</b><?php echo ' '.$marca.' '.$modelo;?><b>&nbsp&nbsp Placa/Prefixo/EB:</b><?php echo ' '.$ppeb;?></font></td><td align="right" colspan="1"><font color='#FFFFFF' face="arial" size=2><b>Data:</b><?php echo ' '.$data;?></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Apresentar-se a:</b><?php echo ' '.$posto_grad1.' '.$nome_guerra1;?></font></td></tr>
			
			<tr><td align="left" colspan="3"><font color='#FFFFFF' face="arial" size=2><b>Local:</b><?php echo ' '.$local_apresenta;?></font></td><td align="right" colspan="1"><font color='#FFFFFF' face="arial" size=2><b>Hora:</b><?php echo ' '.$hora;?></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Por ordem de:</b><?php echo ' '.$ordenou;?></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Natureza do Serviço:</b><?php echo ' '.$missao.'('.$destino.')';?></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Itinerário:</b><?php echo ' '.$itinerario;?></font></td></tr>
			
			<tr><td align="center" colspan="4" style="border-collapse: collapse; border:solid; border-top:hidden;" border="1"><font color='#FFFFFF' face="arial" size=2><br><br>__________________________<br>Cmt <?php echo ' SU';?></font><font face="arial" size=1><br></font></td></tr>
			
			<tr><td align="CENTER" colspan="4"><font color='#FFFFFF' face="arial" size=1><br><b>A VIATURA ESTÁ EM CONDIÇÕES DE SER UTILIZADA NO SERVIÇO E ITINERÁRIOS RELACIONADOS ACIMA</b></font></td></tr>
			
			<tr><td align="center" colspan="4" style="border-collapse: collapse; border:solid; border-top:hidden;" border="1"><font color='#FFFFFF' face="arial" size=2><br>__________________________<br>Encarregado da manutenção<br></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><br>Liberei o veículo às<?php echo '_______h e _______min do dia _______/_______/____________ <br><br>com o seguinte odômetro: ______________Km</b>';?></font></td></tr>
			
			<tr><td align="center" colspan="4" style="border-collapse: collapse; border:solid; border-top:hidden;" border="1"><font color='#FFFFFF' face="arial" size=2><br>__________________________<br><?php echo $posto_grad1.' '.$nome_guerra1;?><br></font></td></tr>
			
			<tr><td align="CENTER" colspan="4"><font color='#FFFFFF' face="arial" size=3><b>MOTORISTA: EXECUTE AS MANUTENÇÕES PREVISTAS NO VERSO!</b><br><br><br></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:solid; border-top:hidden;" border="1"><font color='#FFFFFF' face="arial" size=2>Dados para o Livro<br>Registro da Viatura</font></td><td align="center" style="border-collapse: collapse; border:solid;" border="1"><font color='#ffffff' face="arial" size=2></font><font color='#FFFFFF' face="arial" size=2><b>...DATA HORA.. </b></font></td><td align="left"  style="border-collapse: collapse; border:solid;" border="1"><font color='#ffffff' face="arial" size=2>.....</font><font color='#FFFFFF' face="arial" size=2><b>ODÔMETRO</b></font><font color='#ffffff' face="arial" size=2></font></td><td align="left" style="border-collapse: collapse; border:solid;" border="1"><font color='#ffffff' face="arial" size=2>.....</font><font color='#FFFFFF' face="arial" size=2><b>COMBUSTÍVEL</b></font></td></tr>
			
			<tr><td align="left"  style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><b>REGRESSO</b></font><font color='#FFFFFF' face="arial" size=2>...........</font></td><td align="center" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><?php if ($chegada_odo > 0){echo $chegada_data_hora;}?></font></td><td align="center" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><?php echo $chegada_odo;?></font></td><td rowspan="3" align="center" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><b></b></font></td></tr>
			
			<tr><td align="left" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><b>SAÍDA</b></font></td><td align="center"  style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><?php if ($saida_data_hora == '0001-01-01 00:00:00'){echo '';}else {echo $saida_data_hora;}?></font></td><td align="center" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><?php echo $saida_odo;?></font></td></tr>
			
			<tr><td align="left" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><b>DIFERENÇA</b></font></td><td align="center"  style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><?php if ($chegada_odo > 0){echo $dif_data->format("%H:%I:%S");}?></font></td><td align="center" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><?php if ($chegada_odo > 0){echo $dif_odo;}?></font></td></tr>
			
			<tr><td align="CENTER" colspan="4"><font color='#FFFFFF' face="arial" size=2><br><br><br><b>APÓS TRABALHO, ESTA FICHA DEVE SER ENTREGUE AO ENCARREGADO DE MANUTENÇÃO.</b></font></td></tr>
			
			<tr><td align="left"  colspan="4" style="border-collapse: collapse; border:solid; border-left:hidden; border-right:hidden;" border="1"><font color='#FFFFFF' face="arial" size=1><br>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></font></td></tr>
			
			<tr><td align="left" colspan="3"><font color='#FFFFFF' face="arial" size=2><b>Nº:</b> <?php echo $id_ficha;?></font></td><td align="center" rowspan="4" style="border-collapse: collapse; border:solid;" border="1"><font color='#FFFFFF' face="arial" size=2><br>______________<br>Ch 4ª Seção<br></font></td></tr>
			
			<tr><td align="left" colspan="3"><font color='#FFFFFF' face="arial" size=2><b>OM: </b>2º B Log L </font></td></tr>
			
			<tr><td align="left" colspan="3"><font color='#FFFFFF' face="arial" size=2><b>Viatura:</b><?php echo ' '.$marca.' '.$modelo;?><b>&nbsp&nbsp&nbsp&nbsp Placa/Prefixo/EB:</b><?php echo ' '.$ppeb;?></font></td></tr>
			
			<tr><td align="left" colspan="3"><font color='#FFFFFF' face="arial" size=2><b>Data:</b> <?php echo '_____________';?><b>Hora Saída:</b> <?php echo '________';?><b>Odômetro:__________</b><br><br></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Data:</b> <?php echo '_____________';?><b>Hora Chegada:</b> <?php echo '________';?><b>Odômetro:__________</b></font></td></tr>
			
			<tr><td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2><b>Motorista:</b><?php echo ' '.$posto_grad.' '.$nome_guerra;?></font></td></tr>
			
			<tr><td align="CENTER" colspan="4"><font color='#FFFFFF' face="arial" size=2><br><b>ESTE TALÃO DEVE SER CONFERIDO PELO COMANDANTE DA<BR>GUARDA E ENCAMINHADO À FISCALIZAÇÃO ADMINISTRATIVA </b></font></td></tr>
			
			</table>
			
			<font face="arial" size=1><br><br><br></font>
			
			<table align="center" cellspacing="0" cellpadding="1" style="border-collapse: collapse; border:solid;" >

			<tr><td align="center" style="border-collapse: collapse;" border="1"><img src="<?php echo './imagens/eb.png';?>" width="40" height="70"><font color='#ffffff' face="arial" size=2></font></td><td align="center" colspan="5"><font color='#FFFFFF' face="arial" size=2><b>MANUTENÇÃO PREVENTIVA DE 1º ESCALÃO</b></font></td></tr>
			
			<tr><td align="center" colspan="1"><font color='#FFFFFF' face="arial" size=2></font></td><td align="left" colspan="1"><font color='#FFFFFF' face="arial" size=2>A - Antes da Partida<br>P - Nos altos e pós-operação<br>+ - Comunicar as alterações encontradas</font></td>	<td align="left" colspan="4"><font color='#FFFFFF' face="arial" size=2>D - Durante o movimento<br>H/Q - Após determinado número de<br>&nbsp&nbsp horas de trabalho / Quinzenalmente.</font><BR></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Nº</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Item.........................................................................................................</b></font></td>							<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>.....A.........</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;" border="1"><font face="arial" size=1><b>.....D.........</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;" border="1"><font face="arial" size=1><b>.....P.........</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;" border="1"><font face="arial" size=1><b>.....H/Q.....</b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>01</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Visão Geral da Viatura</b></font></td>		<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>02</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Vazamentos</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>03</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Pneus, lagartas e suspensão</b></font></td>	<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>04</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Combustível</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>05</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Água</b></font></td>							<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>06</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Níveis de óleo</b></font></td>				<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>07</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Instrumentos de painel</b></font></td>		<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>08</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Motor</b></font></td>							<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>09</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Luzes e refletores</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>10</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Equipamento de segurança e visão</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>11</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Ligações para reboque</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>12</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Portas e escotilhas</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>13</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Documentação</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>14</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Sistema hidráulico</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>15</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Outros equipamentos</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>16</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Particulares dos anfíbios</b></font></td>		<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>17</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Embreagem</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>18</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Freios</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>19</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Direção</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>20</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Caixa de mudança e transmissão múltipla</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>21</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Ruídos anormais</b></font></td>				<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>22</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Cúpula do Comandante</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>23</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Baterias</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>24</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Filtro de ar</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>25</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Filtro de combustível</b></font></td>			<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>26</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Respiradouros</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>27</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Radiador de óleo</b></font></td>				<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>28</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Ferramentas e acessórios</b></font></td>		<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>29</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Conjunto de aquecimento</b></font></td>		<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>30</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Gerador auxiliar</b></font></td>				<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>31</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Assentos</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>32</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Reapertos</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>33</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Exaustores</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>34</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Limpeza</b></font></td>						<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>35</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Lubrificação</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="center" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>36</b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b>Carroceria</b></font></td>					<td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td><td align="left" style="border-collapse: collapse; border:1px solid;"><font face="arial" size=1><b></b></font></td></tr>
			
			<tr><td align="left" colspan="6"><font color='#FFFFFF' face="arial" size=2><BR>&nbsp&nbsp&nbsp&nbsp<b>IRREGULARIDADES OU ACIDENTES:</b>_______________________________________________<BR><BR>&nbsp&nbsp&nbsp&nbsp_______________________________________________________________________________<BR><BR>&nbsp&nbsp&nbsp&nbsp_______________________________________________________________________________<BR><BR></font></td></tr>
			
			<tr><td align="left"><font color='#FFFFFF' face="arial" size=2><b></b></font></td><td align="center" colspan="4"><font color='#FFFFFF' face="arial" size=2>__________________________<br><?php echo ' '.$posto_grad.' '.$nome_guerra;?><br></font></td><td align="left"><font color='#FFFFFF' face="arial" size=2><b></b></font></td></tr>
			
			<tr><td align="left"  colspan="6" style="border-collapse: collapse; border:solid; border-left:hidden; border-right:hidden;" border="1"><font color='#FFFFFF' face="arial" size=1><br>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></font></td></tr>
			
			<tr><td align="left" colspan="6"><font color='#FFFFFF' face="arial" size=2><BR><b>Tomei conhecimento das irregularidades encontradas e providenciarei à respeito das mesmas.</b><BR><BR><BR><BR><BR><BR></font></td></tr>
			
			<tr><td align="right" colspan="6"><font color='#FFFFFF' face="arial" size=2>Campinas-SP, ______ de _____________________ de _____________<BR><BR></font><font color='#FFFFFF' face="arial" size=1><BR></font></td></tr>
			
			<tr><td align="right" colspan="5" style="border-collapse: collapse; border:solid; border-top:hidden; border-right:hidden;" border="1"><font color='#FFFFFF' face="arial" size=2><br>________________________<br>Encarregado da manutenção<br></font></td><td align="right" colspan="1" style="border-collapse: collapse; border:solid; border-top:hidden; border-left:hidden;"></td></tr>
			
			</table>
			
		  </div>
		  
        </div>
      </li>
    </ul>
  </div>
</form>

</body></html>