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
<title>2° B Log L</title>
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
        background: black;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:500px;
        background: black;
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

<form class="jotform-form" action="2becmb_lr_cadastrar_ficha.php" method="post" name="teste" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="50" height="75"></td>
		<td><font color='#000000' size="5" face="verdana">Batalhão Cidade de Campinas</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Controle do Material Classe IX</font>
		</td>
		</tr>
	</tbody></table>
	
	<ul class="form-section">
     
      <p align="right"><font size="2" face="arial">Campinas-SP,
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
document.write("<FONT COLOR='#ffffff' FACE=Arial SIZE=2>"+DiaHoje+" - "+DiaHora+"</FONT>");
// --></script><font color="#ffffff" face="Arial" size="2"></font></font></p>
		
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
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/cadastro_ficha_faixa.png" width="100%" height="40" border="0"></font></legend>

			<table align="center" cellpadding="4">
			
			<tr><td><font color='#000000' face="verdana" size=2>Material:</font></td><td><input name="material" type="varchar" id="material" value="<?php echo $material.' - '.$marca.' - '.$modelo;?>" readonly /><input name="id_mat" type="hidden" id="id_mat" value="<?php echo $id_mat;?>"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Placa/Prefixo/EB:</font></td><td><input name="ppeb" type="varchar" id="ppeb" value="<?php echo $ppeb;?>" readonly /></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Motorista/Operador</td><td><select name='motorista'><?php
			$motoristas = "SELECT usuario, posto_grad, posto_grad_ord, nome_guerra, cnh FROM usu WHERE cnh > 0 ORDER by cnh DESC, posto_grad_ord DESC";
			$sql = mysqli_query($link, $motoristas);
			echo "<option value=''>Listar</option>";
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
	case 6:
        $cnh1 = "Cat E";
        break;
}
			echo "<option value='$motorista'>$posto_grad $nome_guerra ($cnh1)</option>";
			}
			?>
			</select></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Ch Vtr</td><td><select name='ch_vtr'><?php
			$ch_vtrs = "SELECT * FROM usu WHERE om LIKE '%E Cmb%' ORDER by posto_grad_ord DESC";
			$sql = mysqli_query($link, $ch_vtrs);
			echo "<option value=''>Listar</option>";
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$ch_vtr = utf8_encode($resultado2['usuario']);
			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);
			echo "<option value='$ch_vtr'>$posto_grad $nome_guerra</option>";
			}
			?>
			</select></font></td></tr>

			<tr><td><font color='#000000' face="verdana" size=2>Local de Apresentação:</font></td><td><input name="local_apresenta" type="varchar" id="local_apresenta" maxlength="30"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>DataHora Apresentação:</font></td><td>aaaa-mm-dd<input name="data_apresenta" type="date" id="data_apresenta"/><br>hh:mm<input name="hora_apresenta" type="time" id="hora_apresenta"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Ordenou:</font></td><td><input name="ordenou" type="varchar" id="ordenou" maxlength="30"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Destino:</font></td><td><select name='destino1'><?php
			$destinos = "SELECT DISTINCT destino FROM 2becmb_lr_ficha ORDER by destino ASC";
			$sql = mysqli_query($link, $destinos);
			echo "<option value=''>Escolha um destino existente</option>";
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$destino = utf8_encode($resultado2['destino']);		
			echo "<option value='$destino'>$destino</option>";
			}
			?>
			</select></font></td></tr>
			<tr><td></td><td><input name="destino" type="varchar" id="destino" maxlength="30" size="40" placeholder="ou digite novo destino aqui"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Missão:</font></td><td><input name="missao" type="varchar" id="missao" maxlength="100" size="40"/></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Itinerário:</font></td><td><input name="itinerario" type="varchar" id="itinerario" maxlength="50" size="40"/></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Cmt SU</td><td><select name='cmt_su'><?php
			$cmt_sus = "SELECT DISTINCT usuario, funcao, posto_grad, nome_guerra, su FROM usu WHERE funcao LIKE 'Cmt SU' ORDER by usuario ASC";
			$sql = mysqli_query($link, $cmt_sus);
			echo "<option value=''>Listar</option>";
			echo "<option value='-'>-</option>";
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$usuario = utf8_encode($resultado2['usuario']);
			$su = utf8_encode($resultado2['su']);			
			echo "<option value='$usuario'>Cmt $su</option>";
			}
			?>
			</select></font></td></tr>
			
			<tr><td width="60" ><font size=2 color="#000000" face="arial">Enc Mnt</td><td><select name='enc_mnt'><?php
			$enc_mnts = "SELECT DISTINCT usuario, funcao, su, posto_grad, nome_guerra FROM usu WHERE funcao LIKE 'Enc Mnt%' ORDER by usuario ASC";
			$sql = mysqli_query($link, $enc_mnts);
			echo "<option value=''>Listar</option>";
			echo "<option value='-'>-</option>";
			while ($resultado2 = mysqli_fetch_array($sql)) {
			$usuario = utf8_encode($resultado2['usuario']);
			$su = utf8_encode($resultado2['su']);
			$posto_grad = utf8_encode($resultado2['posto_grad']);
			$nome_guerra = utf8_encode($resultado2['nome_guerra']);
			echo "<option value='$usuario'>Enc Mnt $su ($posto_grad $nome_guerra)</option>";
			}
			?>
			</select></font></td></tr>
			
			</table>

				<p align="center"><input type="image" src="imagens/cadastrar.png" width="31%" height="50" value="submit"></p>

				
				</fieldset>
			
		  </div>
        </div>
      </li>
    </ul>
  </div>
</form>

</body></html>