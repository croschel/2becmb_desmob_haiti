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
    $nivel = $_SESSION['nivel'];
	$su = $_SESSION['su'];
	$posto_grad = utf8_encode($_SESSION['posto_grad']);
	$nome_guerra =  utf8_encode($_SESSION['nome_guerra']);
	$funcao = utf8_encode($_SESSION['funcao']);

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
 .backcolor {
 /* Firefox 3.6+ */
 background-image: -moz-linear-gradient(top,#EEE9E9, #000000);
 /* Safari 5.1+ e Chrome 10+ */
 background-image: -webkit-linear-gradient(top,#EEE9E9, #000000);
 /* Opera 11.10+ */
 background-image: -o-linear-gradient(top,#EEE9E9, #000000);
 /* Para IE 8 */
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#EEE9E9, endColorstr=#cccccc,GradientType=0);
  }
  
   .backcolor1 {
 /* Firefox 3.6+ */
 background-image: -moz-linear-gradient(top,#EEE9E9, #cccccc);
 /* Safari 5.1+ e Chrome 10+ */
 background-image: -webkit-linear-gradient(top,#EEE9E9, #cccccc);
 /* Opera 11.10+ */
 background-image: -o-linear-gradient(top,#EEE9E9, #cccccc);
 /* Para IE 8 */
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#EEE9E9, endColorstr=#cccccc,GradientType=0);
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
        width:500px;
        background: #ffffff;
        color:#555 !important;
        font-family:'Lucida Grande',' Lucida Sans Unicode',' Lucida Sans',' Verdana',' Tahoma',' sans-serif';
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: #555;
    }

</style>

	<script language="JavaScript">
	function mascara(t, mask){
	var i = t.value.length;
	var saida = mask.substring(1,0);
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida){
	t.value += texto.substring(0,1);
	}
	}
	</script>

</head>
<body>

<form class="jotform-form" action="2becmb_lr_cadastrar_os.php" method="post" name="teste" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2becmb.png" width="50" height="75"></td>
		<td><font color='#000000' size="5" face="verdana">Batalhão Borba Gato </font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Controle do Material Classe VI e IX</font>
		</td>
		</tr>
	</tbody></table>
	
	<ul class="form-section">
     
      <p align="right"><font size="2" face="arial">Pindamonhangaba-SP,
<script language="JavaScript"> <!--
var agora = new Date();
var hora = agora.getHours()
var minuto = agora.getMinutes()
var aNome = agora.getYear()
var mNome = agora.getMonth() + 1;
var dNome = agora.getDay() + 1;
var diaNr = ((agora.getDate()<10) ? "0" : "")+ agora.getDate();
var hora = ((hora<10) ? "0" : "")+ hora;
var minuto = ((minuto<10) ? "0" : "")+ minuto;
if (aNome < 2000) { aNome = agora.getYear() + 1900; }
if(dNome==1) dia = "Domingo";
if(dNome==2) dia = "Segunda";
if(dNome==3) dia = "Terça-feira";
if(dNome==4) dia = "Quarta-feira";
if(dNome==5) dia = "Quinta-feira";
if(dNome==6) dia = "Sexta-feira";
if(dNome==7) dia = "Sábado";
if(mNome==1) mes="Janeiro";
if(mNome==2) mes="Fevereiro";
if(mNome==3) mes="Março";
if(mNome==4) mes="Abril";
if(mNome==5) mes="Maio";
if(mNome==6) mes="Junho";
if(mNome==7) mes="Julho";
if(mNome==8) mes="Agosto";
if(mNome==9) mes="Setembro";
if(mNome==10) mes="Outubro";
if(mNome==11) mes="Novembro";
if(mNome==12) mes="Dezembro";
var DiaHoje =(" "+diaNr+" de "+mes+" de "+aNome);
var DiaHora =(" "+dia+" - "+hora+":"+minuto);
document.write("<FONT COLOR='#000000' FACE=Arial SIZE=2>"+DiaHoje+" - "+DiaHora+"</FONT>");
// --></script><font color="#000000" face="Arial" size="2"></font></font></p>
		
<?php

$id_mat = $_GET['id_mat'];

// consulta
	$sql = "SELECT * FROM 2becmb_material WHERE id LIKE '$id_mat'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
		//$id_ficha = utf8_encode($resultado['id_ficha']);
		$material = utf8_encode($resultado['material']);
		$marca =  utf8_encode($resultado['marca']);
		$modelo =  utf8_encode($resultado['modelo']);
		$ppeb = utf8_encode($resultado['ppeb']);
		$classe = utf8_encode($resultado['classe']);
		
?>

<hr align="center">
	  <li class="backcolor1" data-type="control_text" id="id_56">
        <div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
			
			<fieldset align='center'>
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/cadastro_os_faixa.png" width="100%" height="40" border="0"></font></legend>

			<table align="center" cellpadding="4">
			
			<tr><td><font color='#000000' face="verdana" size=2>Material:</font></td><td><input name="material" type="varchar" id="material" value="<?php echo $material.' - '.$marca.' - '.$modelo;?>" readonly /><input name="id_mat" type="hidden" id="id_mat" value="<?php echo $id_mat;?>"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Placa/Prefixo/EB:</font></td><td><input name="ppeb" type="varchar" id="ppeb" value="<?php echo $ppeb;?>" readonly /></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Tipo Mnt</td><td><select name='tipo_mnt'>
			<option value="">Listar</option>
			<option value="Corretiva">Corretiva</option>
			<option value="Preventiva">Preventiva</option>
			<option value="Revisão">Revisão</option>
			</select></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Disponibilidade</td><td><select name='disponibilidade'>
			<option value="">Listar</option>
			<option value="Disponível">Disponível</option>
			<option value="Indisponível">Indisponível</option>
			</select></font></td></tr>

			<tr><td><font color='#000000' face="verdana" size=2>Odômetro Horímetro:</font></td><td><input name="odometro" type="varchar" id="odometro" value="0" size="8"/></td></tr>
			
			<tr><td colspan="2"><font color='#000000' face="verdana" size=2><hr></td><td></tr>
			
			<tr><td colspan="2" align="center"><font color='#000000' face="verdana" size=2>PROBLEMAS APRESENTADOS</font></td><td></tr>
			
			<tr><td colspan="2"><font color='#000000' face="verdana" size=2><hr></td><td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Painel:</font></td><td><textarea rows="3" cols="30" name="xpainel" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Dispositivos de Segurança:</font></td><td><textarea rows="3" cols="30" name="xdisp_seg" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Motor:</font></td><td><textarea rows="3" cols="30" name="xmotor" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Sistema Elétrico:</font></td><td><textarea rows="3" cols="30" name="xeletrica" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Suspensão:</font></td><td><textarea rows="3" cols="30" name="xsuspensao" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Freio:</font></td><td><textarea rows="3" cols="30" name="xfreio" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Direção:</font></td><td><textarea rows="3" cols="30" name="xdirecao" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Transmissão:</font></td><td><textarea rows="3" cols="30" name="xtransmissao" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Bateria:</font></td><td><textarea rows="3" cols="30" name="xbateria" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Visão:</font></td><td><textarea rows="3" cols="30" name="xvisao" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Cabine:</font></td><td><textarea rows="3" cols="30" name="xcabine" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Reboque:</font></td><td><textarea rows="3" cols="30" name="xreboque" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Hidráulica:</font></td><td><textarea rows="3" cols="30" name="xhidraulica" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Guincho:</font></td><td><textarea rows="3" cols="30" name="xguincho" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Anfíbio:</font></td><td><textarea rows="3" cols="30" name="xanfibio" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Lubrificação:</font></td><td><textarea rows="3" cols="30" name="xlubrificacao" value="OK">OK</textarea></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Pneus:</font></td><td><textarea rows="3" cols="30" name="xpneus" value="OK">OK</textarea></td></tr>
			
			<tr><td colspan="2"><font color='#000000' face="verdana" size=2><hr></td><td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Data-Hora Entrada:</font></td><td><input name="data_entrada" type="date" id="data_entrada" value="0001-01-01"/><input name="hora_entrada" type="time" id="hora_entrada" value="00:00"/></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Verificador</td><td><input name="verificador" type="varchar" id="verificador" maxlength="100" size="10" value="<?php echo $posto_grad.' '.$nome_guerra;?>" readonly /></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Observação:</font></td><td><textarea rows="2" cols="30" name="observacao">S/A</textarea></td></tr>
			
			<tr><td colspan="2"><hr></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Status</td><td><select name='status'>
			<option value="Em manutenção">Em manutenção</option>
			</select></font>*</td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Data-Hora Pronto:</font></td><td><input name="data_pronto" type="date" id="data_pronto" value="0001-01-01" readonly /><input name="hora_pronto" type="time" id="hora_pronto" value="00:00" readonly />*</td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Liberação:</font></td><td><input name="liberacao" type="varchar" id="liberacao" maxlength="100" size="10" value="-" readonly />*</td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Data-Hora Liberado:</font></td><td><input name="data_liberado" type="date" id="data_liberado" value="0001-01-01" readonly /><input name="hora_liberado" type="time" id="hora_liberado" value="00:00" readonly />*</td></tr>
			
			</table>

				<p align="center"><input type="image" src="imagens/cadastrar.png" width="31%" height="50" value="submit"></p>

				
				</fieldset>
			
			<font color='#000000' face="verdana" size=1>* Campos preenchidos automaticamente e bloqueados</font>
			
		  </div>
        </div>
      </li>
    </ul>
  </div>
</form>

</body></html>