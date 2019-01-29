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

	if ($nivel_2becmb < 5 ) { echo "
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
<link rel="shortcut icon" href="http://10.12.125.45/imagens/fav.png">
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

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>#</title>
  
  

</head>	

<body>
<?php

$a1 = $_GET['id_usu'];

// consulta
	$sql = "SELECT * FROM usu WHERE id_usu LIKE '$a1'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
	$usuario = $resultado['usuario'];
	$posto_grad = utf8_encode($resultado['posto_grad']);
	$nome_guerra = utf8_encode($resultado['nome_guerra']);
	$tel_movel = $resultado['tel_movel'];
	$email = $resultado['email'];
	$cnh = utf8_encode($resultado['cnh']);
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
	$cnh_val = utf8_encode($resultado['cnh_val']);
	$mot_militar = utf8_encode($resultado['mot_militar']);
  switch ($mot_militar) {
    case 0:
        $mot_militar1 = "Não";
        break;
    case 1:
        $mot_militar1 = "Sim";
        break;
}
	$especial = utf8_encode($resultado['especial']);
  
	$operador = utf8_encode($resultado['operador']);
   switch ($operador) {
    case 0:
        $operador1 = "Não";
        break;
    case 1:
        $operador1 = "Sim";
        break;
}
	$eqp_opera = utf8_encode($resultado['eqp_opera']);
?>

<form class="jotform-form" action="2becmb_mot_alterar.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="60" height="75"></td>
		<td colspan="2"><font color='#000000' size="5" face="verdana">Batalhão Cidade de Campinas</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Controle do Material Classe IX</font></td>
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
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/altera.png" width="80%" height="40" border="0"></font></legend>

			<table align="center" cellpadding="4">			
			
			<tr><td><font color='#000000' face="verdana" size=2>Id:</font></td><td><input name="id" type="text" id="id" value="<?php echo $a1;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>CPF:</font></td><td><input name="usuario" type="text" id="usuario" value="<?php echo $usuario;?>" readonly></td></tr>
			
			<tr><td colspan="2"><hr></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Posto/Grad:</b></font></td><td><input name="posto_grad" type="text" id="posto_grad" value="<?php echo $posto_grad;?>"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Nome Guerra:</b></font></td><td><input name="nome_guerra" type="text" id="nome_guerra" value="<?php echo $nome_guerra;?>"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Tel:</b></font></td><td><input name="tel_movel" type="text" id="tel_movel" value="<?php echo $tel_movel;?>" onkeypress="mascara(this, '## #########')" maxlength="12"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Email:</b></font></td><td><input name="email" type="text" id="email" value="<?php echo $email;?>"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>CNH Cat: </b></font></td><td><select name='cnh'><?php
			echo "<option value='$cnh'>".$cnh1."</option>";
			echo "<option value='0'>Não Possui</option>";
			echo "<option value='1'>Cat A</option>";
			echo "<option value='2'>Cat B</option>";
			echo "<option value='3'>Cat AB</option>";
			echo "<option value='4'>Cat C</option>";
			echo "<option value='5'>Cat D</option>";
			echo "<option value='6'>Cat E</option>";
			?>
			</select></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>CNH Validade:</b></font></td><td><input name="cnh_val" type="text" id="cnh_val" value="<?php echo $cnh_val;?>"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Mot Militar: </b></font></td><td><select name='mot_militar'><?php
			echo "<option value='$mot_militar'>".$mot_militar1."</option>";
			echo "<option value='0'>Não</option>";
			echo "<option value='1'>Sim</option>";
			?>
			</select></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Especial: </b></font></td><td><input type="varchar" name='especial' value="<?php echo $especial;?>"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Operador: </b></font></td><td><select name='operador'><?php
			echo "<option value='$operador'>".$operador1."</option>";
			echo "<option value='0'>Não</option>";
			echo "<option value='1'>Sim</option>";
			?>
			</select></td></tr>
			
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Equipamentos que opera:</b></font></td><td><input name="eqp_opera" type="text" id="eqp_opera" value="<?php echo $eqp_opera;?>"></td></tr>
			
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