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
<link type="text/css" rel="stylesheet" href="./index1_files/nova.css">
<link rel="shortcut icon" href="http://10.12.125.45/imagens/fav.png">
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
$a1 = $_GET['id_mat'];

// consulta
	$sql = "SELECT * FROM 2becmb_material WHERE id LIKE '$a1'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
		$chassis_sn = utf8_encode($resultado['chassis_sn']);
		$material = utf8_encode($resultado['material']);
		$marca = utf8_encode($resultado['marca']);
		$modelo = utf8_encode($resultado['modelo']);
		$ano = utf8_encode($resultado['ano']);
		$sit_doc = utf8_encode($resultado['sit_doc']);
		if ($sit_doc == 0){$sit_doc1 = 'Irregular';}else{if ($sit_doc == 1){$sit_doc1 = 'Regular';}else{$sit_doc1 = 'Providenciando';}}
		$doc_validade = utf8_encode($resultado['doc_validade']);
				
		$ppeb = utf8_encode($resultado['ppeb']);
?>

<form class="jotform-form" action="2becmb_lr_cadastrar_man.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="60" height="75"></td>
		<td colspan="2"><font color='#000000' size="5" face="verdana">Batalhão Cidade de Campinas</font><hr width="100%" align="left"></td>
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
			
			<tr><td><font color='#000000' face="verdana" size=2>Id:</font></td><td><input name="id" type="text" id="id" value="<?php echo $a1;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Chassis_SN:</font></td><td><input name="chassis_sn" type="text" id="chassis_sn" value="<?php echo $chassis_sn;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Placa/Prefixo/EB:</font></td><td><input name="ppeb" type="text" id="chassis_sn" value="<?php echo $ppeb;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Material:</font></td><td><input name="material" type="text" id="material" size="30" value="<?php echo $material.'-'.$marca.'-'.$modelo.'-'.$ano;?>" readonly ></td></tr>
			
			<tr><td colspan="2"><hr></td></tr>
			
			<tr><td><?php echo '<font color="#000000" face="verdana" size=2><b>Anexar Manual: &nbsp </b></font></td><td><input type="file" name="arquivo" />';?></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Título: &nbsp </b></font></td><td><input name="titulo_man" type="varchar" size="30" value="<?php ?>"></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2><b>Observação: &nbsp </b></font></td><td><input name="obs_man" type="varchar" size="30" value="<?php ?>"></td></tr>
			
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