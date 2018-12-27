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
$id_os = $_GET['id_os'];

    // consulta tabela 2becmb_os
	$sql = "SELECT * FROM 2becmb_os WHERE id_os LIKE '$id_os'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
		$id_mat = utf8_encode($resultado['id_mat']);
		$tipo_mnt = utf8_encode($resultado['tipo_mnt']);
		$disponibilidade = utf8_encode($resultado['disponibilidade']);
		$odometro = utf8_encode($resultado['odometro']);
		
		$cadastrador = utf8_encode($resultado['cadastrador']);
		$datahora_cadastro = utf8_encode($resultado['datahora_cadastro']);
		$datahora_entrada = utf8_encode($resultado['datahora_entrada']);
		$data_entrada = substr($datahora_entrada, 0, 10);
		$hora_entrada = substr($datahora_entrada, 11, 5);
		$verificador = utf8_encode($resultado['verificador']);
		$status = utf8_encode($resultado['status']);
		$datahora_pronto = utf8_encode($resultado['datahora_pronto']);
		$data_pronto = substr($datahora_pronto, 0, 10);
		$hora_pronto = substr($datahora_pronto, 11, 5);
		$liberacao = utf8_encode($resultado['liberacao']);
		$datahora_liberado = utf8_encode($resultado['datahora_liberado']);
		$data_liberado = substr($datahora_liberado, 0, 10);
		$hora_liberado = substr($datahora_liberado, 11, 5);
		$observacao = utf8_encode($resultado['observacao']);
		$xpainel = utf8_encode($resultado['xpainel']);
		$xdisp_seg = utf8_encode($resultado['xdisp_seg']);
		$xtransmissao = utf8_encode($resultado['xtransmissao']);
		$xhidraulica = utf8_encode($resultado['xhidraulica']);
		$xsuspensao = utf8_encode($resultado['xsuspensao']);
		$xguincho = utf8_encode($resultado['xguincho']);
		$xanfibio = utf8_encode($resultado['xanfibio']);
		$xcabine = utf8_encode($resultado['xcabine']);
		$xfreio = utf8_encode($resultado['xfreio']);
		$xeletrica = utf8_encode($resultado['xeletrica']);
		$xmotor = utf8_encode($resultado['xmotor']);
		$xvisao = utf8_encode($resultado['xvisao']);
		$xdirecao = utf8_encode($resultado['xdirecao']);
		$xbateria = utf8_encode($resultado['xbateria']);
		$xlubrificacao = utf8_encode($resultado['xlubrificacao']);
		$xreboque = utf8_encode($resultado['xreboque']);
		$xpneus = utf8_encode($resultado['xpneus']);
		
		
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

<form class="jotform-form" action="2becmb_lr_aterar_os.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2becmb.png" width="60" height="75"></td>
		<td colspan="2"><font color='#000000' size="5" face="verdana">Batalhão Borba Gato </font><hr width="100%" align="left"></td>
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
			
			<tr><td rowspan="6" colspan="2" align="center"><img src="<?php echo './2becmb_foto/'.$id_mat.'.jpg';?>" width="120" height="180"></td><td><font color='#000000' face="verdana" size=2><b>Material:</b></font></td><td><input name="material" type="varchar" id="material" size="33" value="<?php echo $material.' - '.$marca.' - '.$modelo;?>" readonly /><input name="id_os" type="hidden" id="id_os" value="<?php echo $id_os;?>"/><input name="id_mat" type="hidden" id="id_mat" value="<?php echo $id_mat;?>"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Placa/Prefixo/EB:</b></font></td><td><input name="ppeb" type="varchar" id="ppeb" value="<?php echo $ppeb;?>" readonly /></td></tr>
			
			<tr><td colspan="2"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="verdana">Tipo Mnt:</td><td><select name='tipo_mnt'>
			<option value="<?php echo $tipo_mnt;?>"><?php echo $tipo_mnt;?></option>
			<option value="Corretiva">Corretiva</option>
			<option value="Preventiva">Preventiva</option>
			<option value="Revisão">Revisão</option>
			</select></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="verdana">Disponibilidade:</td><td><select name='disponibilidade'>
			<option value="<?php echo $disponibilidade;?>"><?php echo $disponibilidade;?></option>
			<option value="Disponível">Disponível</option>
			<option value="Indisponível">Indisponível</option>
			</select></font></td></tr>

			<tr><td><font color='#000000' face="verdana" size=2>Odômetro Horímetro:</font></td><td><input name="odometro" type="varchar" id="odometro" value="<?php echo $odometro;?>" size="8"/></td></tr>
			
			<tr><td colspan="4"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td colspan="4" align="center"><font color='#000000' face="verdana" size=2><b>VERIFICAÇÃO</b></font></td></tr>
			
			<tr><td colspan="4"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Painel:</font></td><td><textarea rows="3" cols="30" name="xpainel" value=""><?php echo $xpainel;?></textarea></td><td><font color='#000000' face="verdana" size=2>Dispositivos de Segurança:</font></td><td><textarea rows="3" cols="30" name="xdisp_seg" value=""><?php echo $xdisp_seg;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Motor:</font></td><td><textarea rows="3" cols="30" name="xmotor" value=""><?php echo $xmotor;?></textarea></td><td><font color='#000000' face="verdana" size=2>Sistema Elétrico:</font></td><td><textarea rows="3" cols="30" name="xeletrica" value=""><?php echo $xeletrica;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Suspensão:</font></td><td><textarea rows="3" cols="30" name="xsuspensao" value=""><?php echo $xsuspensao;?></textarea></td><td><font color='#000000' face="verdana" size=2>Freio:</font></td><td><textarea rows="3" cols="30" name="xfreio" value=""><?php echo $xfreio;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Direção:</font></td><td><textarea rows="3" cols="30" name="xdirecao" value=""><?php echo $xdirecao;?></textarea></td><td><font color='#000000' face="verdana" size=2>Transmissão:</font></td><td><textarea rows="3" cols="30" name="xtransmissao" value=""><?php echo $xtransmissao;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Bateria:</font></td><td><textarea rows="3" cols="30" name="xbateria" value=""><?php echo $xbateria;?></textarea></td><td><font color='#000000' face="verdana" size=2>Visão:</font></td><td><textarea rows="3" cols="30" name="xvisao" value=""><?php echo $xvisao;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Cabine:</font></td><td><textarea rows="3" cols="30" name="xcabine" value=""><?php echo $xcabine;?></textarea></td><td><font color='#000000' face="verdana" size=2>Reboque:</font></td><td><textarea rows="3" cols="30" name="xreboque" value=""><?php echo $xreboque;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Hidráulica:</font></td><td><textarea rows="3" cols="30" name="xhidraulica" value=""><?php echo $xhidraulica;?></textarea></td><td><font color='#000000' face="verdana" size=2>Guincho:</font></td><td><textarea rows="3" cols="30" name="xguincho" value=""><?php echo $xguincho;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Anfíbio:</font></td><td><textarea rows="3" cols="30" name="xanfibio" value=""><?php echo $xanfibio;?></textarea></td><td><font color='#000000' face="verdana" size=2>Lubrificação:</font></td><td><textarea rows="3" cols="30" name="xlubrificacao" value=""><?php echo $xlubrificacao;?></textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Pneus:</font></td><td><textarea rows="3" cols="30" name="xpneus" value=""><?php echo $xpneus;?></textarea></td>
			
			<td><font color='#000000' face="verdana" size=2>Data-Hora Entrada:</font></td><td><input name="data_entrada" type="date" id="data_entrada" value="<?php echo $data_entrada;?>"/><input name="hora_entrada" type="time" id="hora_entrada" value="<?php echo $hora_entrada;?>"/></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="verdana">Verificador:</td><td><select name='verificador'><?php
			$verificadors = "SELECT DISTINCT usuario, funcao, posto_grad, nome_guerra, su FROM usu ORDER by posto_grad ASC, nome_guerra ASC";
			$sql = mysqli_query($link, $verificadors);
			echo "<option value='$verificador'>$verificador</option>";
			echo "<option value='-'>-</option>";
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);			
			echo "<option value='$posto_grad $nome_guerra'>$posto_grad $nome_guerra</option>";
			}
			?>
			</select></font></td></tr>
			
			<tr><td colspan="4"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td colspan="4" align="center"><font color='#000000' face="verdana" size=2><b>MANUTENÇÃO</b></font></td></tr>
			
			<tr><td colspan="4"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="verdana">Status:</td><td><select name='status'>
			<option value="<?php echo $status;?>"><?php echo $status;?></option>
			<option value="Mnt Realizada">Mnt Realizada</option>
			<option value="Em manutenção">Em manutenção</option>
			</select></font></td>
			
			<td><font color='#000000' face="verdana" size=2>Data-Hora Pronto:</font></td><td><input name="data_pronto" type="date" id="data_pronto" value="<?php echo $data_pronto;?>"/><input name="hora_pronto" type="time" id="hora_pronto" value="<?php echo $hora_pronto;?>"/></td></tr>
			
			<tr><td colspan="4"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td colspan="4" align="center"><font color='#000000' face="verdana" size=2><b>LIBERAÇÃO</b></font></td></tr>
			
			<tr><td colspan="4"><font color='#000000' face="verdana" size=2><hr></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="verdana">Liberação</td><td><select name='liberacao'>
			<option value="<?php echo $liberacao;?>"><?php echo $liberacao;?></option>
			<option value="-">-</option>
			<option value="OK">OK</option>
			</select></font></td>
			
			<td><font color='#000000' face="verdana" size=2>Data-Hora Liberado:</font></td><td><input name="data_liberado" type="date" id="data_liberado" value="<?php echo $data_liberado;?>"/><input name="hora_liberado" type="time" id="hora_liberado" value="<?php echo $hora_liberado;?>"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Observação:</font></td><td colspan="3"><textarea rows="2" cols="70" name="observacao"><?php echo $observacao;?></textarea></td></tr>
			
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