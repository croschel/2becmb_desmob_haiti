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
<link rel="shortcut icon" href="http://10.12.125.10/imagens/fav.png">
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
$a1 = $_GET['id'];

// consulta
	$sql = "SELECT * FROM 2becmb_material WHERE id LIKE '$a1'";
	$query = mysqli_query($link, $sql);
	$resultado = mysqli_fetch_assoc($query);
		
		$chassis_sn = utf8_encode($resultado['chassis_sn']);
		$material = utf8_encode($resultado['material']);
		$sit_doc = utf8_encode($resultado['sit_doc']);
		$ppeb = utf8_encode($resultado['ppeb']);
		$marca = utf8_encode($resultado['marca']);
		$modelo = utf8_encode($resultado['modelo']);
		$ano = utf8_encode($resultado['ano']);
?>

<form class="jotform-form" action="2becmb_balterar_sit_doc.php" method="post" name="teste"  enctype="multipart/form-data" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="60" height="75"></td>
		<td colspan="2"><font color='#000000' size="5" face="verdana">Batalhão Cidade de Campinas </font><hr width="100%" align="left"></td>
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
			<legend><img src="imagens/catalogo_faixa.png" width="80%" height="40" border="0"></legend>

			<table align="center" cellpadding="4">			
			
			<tr><td rowspan="7"><img src="./2becmb_foto/<?php echo $a1.'.jpg';?>" width="300" height="200"></td><td><font color='#000000' face="verdana" size=2>Id:</font></td><td><input name="id" type="text" id="id" value="<?php echo $a1;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Chassis_SN:</font></td><td><input name="chassis_sn" type="text" id="chassis_sn" value="<?php echo $chassis_sn;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Placa/Prefixo/EB:</font></td><td><input name="ppeb" type="text" id="chassis_sn" value="<?php echo $ppeb;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Material:</font></td><td><input name="material" type="text" id="material" value="<?php echo $material;?>" readonly ></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Marca:</font></td><td><input name="marca" type="text" id="marca" value="<?php echo $marca;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Modelo:</font></td><td><input name="modelo" type="text" id="modelo" value="<?php echo $modelo;?>" readonly></td></tr>
			
			<tr><td><font color='#000000' face="verdana" size=2>Ano:</font></td><td><input name="ano" type="text" id="ano" value="<?php echo $ano;?>" readonly ></td></tr>
			
			<tr><td colspan="3"><hr></td></tr>
				
			</table>
			
			<table align="center" cellpadding="4">
			
			<tr>			
			<td><p align="center"><font size=2 color="#000000" face="arial">Ord</font></td>
			<td><p align="center"><font size=2 color="#000000" face="arial">Catálogo</font></td>
			<td><p align="center"><font size=2 color="#000000" face="arial">Observações</font></td>
			<td><p align="center"><font size=2 color="#000000" face="arial">Cadastrador</font></td>
			<td colspan="4" align="center">
				<?php echo '<a href="2becmb_lr_cadastra_cat.php?id_mat='.$a1.'" target="blank"><img src="./imagens/cad_cat.png" width="40" height="40" title="Adicionar Catálogo de Peças"></a>&nbsp&nbsp&nbsp&nbsp';?>
				</td>
			</tr>
			
			
			<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#F5DEB3";

// consulta com filtros
	$sql1 = "SELECT * FROM 2becmb_lr_cat WHERE id_mat LIKE '$a1' ORDER BY titulo_cat";
	$query1 = mysqli_query($link, $sql1);	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_mat = $resultado['id_mat'];
  $titulo_cat = utf8_encode($resultado['titulo_cat']);
  $link_cat = utf8_encode($resultado['link_cat']);
  $obs_cat = utf8_encode($resultado['obs_cat']);
  $cadastrador = utf8_encode($resultado['cadastrador']);
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#F5DEB3") {
	$cor="white";
} else {
	$cor="#F5DEB3";
	//$cor="#87CEFF";
}
 if ($cor=="#F5DEB3"){$cor1="white";}else{$cor1="#F5DEB3";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php echo $cadastrador;?>"><?php echo $cont; ?></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial"><a href="<?php echo $link_cat; ?>"><?php echo $titulo_cat;?></a></font></p></td>
    
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $obs_cat;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $cadastrador;?></font></p></td>
  
</tr>

<?php

}

?>
			
			</table>
			
				</fieldset>
			
		  </div>
        </div>
      </li>
    </ul>
  </div>
</form>

</body></html>