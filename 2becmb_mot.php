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

	if ($nivel_2becmb < 2 ) { echo "
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
<link rel="shortcut icon" href="http://localhost/imagens/fav.png">
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

    ?>
<form class="jotform-form" action="" enctype="multipart/form-data" method="post" name="busca" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor1">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2blogl-logo.png" width="50" height="65"></td>
		<td colspan="3"><font color='#000000' size="5" face="arial">Batalhão Cidade de Campinas </font><hr width="100%" align="left"></td>
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
			<legend><img src="imagens/controle_motop_faixa.png" width="600" height="40" border="0"></legend>
	

<?php

//$link = mysqli_connect("localhost","root","","2becmb");
	
	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_posto_grad = utf8_decode($_POST['f_posto_grad']);
	$f_nome_guerra = utf8_decode($_POST['f_nome_guerra']);
    $f_cnh = utf8_decode($_POST['f_cnh']);
	$f_cnh_val = utf8_decode($_POST['f_cnh_val']);
	$f_especial = utf8_decode($_POST['f_especial']);
	$f_mot_militar = utf8_decode($_POST['f_mot_militar']);
	$f_operador = utf8_decode($_POST['f_operador']);
	$f_eqp_opera = utf8_decode($_POST['f_eqp_opera']);
	$f_eqp_opera1 = utf8_decode($_POST['f_eqp_opera1']);
	
	//if($f_classe == ''){

		//			echo "
        //                   <META HTTP-EQUIV=REFRESH CONTENT='0; URL=mapa_controle.php'>
        //                   <script type=\"text/javascript\" charset=UTF-8>
        //                   alert(\"Favor selecionar a(s) classe(s).\");
        //                   </script>
        //                   ";
		//					}
	
	//if ($f_classe == '1'){$f_classe = 'Cl%';} else {if ($f_classe == ''){$f_classe = '';}else{$f_classe = '%'.$f_classe;}}
	
	
	//echo $f_prio;
	
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'om';}
	if ($ord2 == ''){$ord2 = 'posto_grad_ord DESC';}
	if ($ord3 == ''){$ord3 = 'cnh ASC';}
	if ($ord4 == ''){$ord4 = 'cnh ASC';}
	
	
	// consulta com filtros
	$sql1 = "SELECT * FROM usu WHERE posto_grad LIKE '%$f_posto_grad' AND nome_guerra LIKE '%$f_nome_guerra' AND cnh LIKE '%' AND cnh LIKE '%$f_cnh' AND cnh_val LIKE '%$f_cnh_val' AND especial LIKE '%$f_especial' AND mot_militar LIKE '%$f_mot_militar%' AND operador LIKE '%$f_operador%' AND eqp_opera LIKE '%$f_eqp_opera' AND eqp_opera LIKE '%$f_eqp_opera1%' ORDER BY $ord1, $ord2, $ord3, $ord4";
	$query1 = mysqli_query($link, $sql1);
	
	
	// contador de registros
	$encontrados = mysqli_num_rows($query1); //registros encontrados
    
	$sql_listar_total = mysqli_query($link, "SELECT * FROM usu"); //total de registros na tabela material
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
			<option value="posto_grad_ord ASC">Posto Grad Asc</option>
			<option value="posto_grad_ord DESC">Posto Grad Desc</option>
			<option value="nome_guerra ASC">Nome Guerra Asc</option>
			<option value="nome_guerra DESC">Nome Guerra Desc</option>
			<option value="cnh ASC">CNH Asc</option>
			<option value="cnh DESC">CNH Desc</option>
			<option value="cnh_val ASC">CNH Validade Asc</option>
			<option value="cnh_val DESC">CNH Validade Desc</option>
			<option value="especial ASC">Hab Especial Asc</option>
			<option value="especial DESC">Hab Especial Desc</option>
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
			
<input type="submit" name="consulta" value="Filtrar e Ordenar">
</font>
</p>

<BR>
 
<table id="tab1" bordercolor="#EE7942" border="4" cellpadding="2" cellspacing="3" width="60%" align="center" FRAME="hsides" RULES="rows">
	
<tr bgcolor="#87CEFF" class="backcolor" align="center" height="40">
  
  <td width="30" ><font size=2 color="#000000" face="arial"><b>Ord</b><BR></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Foto</b><BR>
  </font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Posto/Grad</b><BR><select name='f_posto_grad'><?php
  $posto_grads = "SELECT DISTINCT posto_grad, posto_grad_ord FROM usu ORDER by posto_grad_ord DESC";
  $sql = mysqli_query($link, $posto_grads);
  echo "<option value=''>Listar</option>";
  echo "<option value=''>Todas</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $posto_grad = utf8_encode($resultado2['posto_grad']);
  echo "<option value='$posto_grad'>$posto_grad</option>";
  }
  ?>
  </select></font></td>
  
  <td width="60" ><font size=2 color="#000000" face="arial"><b>Nome Guerra</b><BR><select name='f_nome_guerra'><?php
  $nome_guerras = "SELECT DISTINCT nome_guerra FROM usu ORDER by nome_guerra ASC";
  $sql = mysqli_query($link, $nome_guerras);
  echo "<option value=''>Listar</option>";
  echo "<option value='1'>Todas</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $nome_guerra = utf8_encode($resultado2['nome_guerra']);
  echo "<option value='$nome_guerra'>$nome_guerra</option>";
  }
  ?>
  </select></font></td>
  
   
  <td width="40" ><font size=2 color="#000000" face="arial"><b>CNH Cat</b><BR><select name='f_cnh'><?php
  $cnhs = "SELECT DISTINCT cnh FROM usu WHERE cnh > '0' ORDER by cnh ASC";
  $sql = mysqli_query($link, $cnhs);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
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
  echo "<option value='$cnh'>$cnh1</option>";
  }
  ?>
  </select></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>Validade</b><BR><select name='f_cnh_val'><?php
  $cnh_vals = "SELECT DISTINCT cnh_val FROM usu WHERE cnh > '0' ORDER by cnh_val ASC";
  $sql = mysqli_query($link, $cnh_vals);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $cnh_val = utf8_encode($resultado2['cnh_val']);
  echo "<option value='$cnh_val'>$cnh_val</option>";
  }
  ?>
  </select></font></td>
  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Mot Mil</b><BR><select name='f_mot_militar'><?php
  $mot_militars = "SELECT DISTINCT mot_militar FROM usu WHERE mot_militar LIKE '%' ORDER by mot_militar ASC";
  $sql = mysqli_query($link, $mot_militars);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $mot_militar = utf8_encode($resultado2['mot_militar']);
  switch ($mot_militar) {
    case 0:
        $mot_militar1 = "Não";
        break;
    case 1:
        $mot_militar1 = "Sim";
        break;
}
  echo "<option value='$mot_militar'>$mot_militar1</option>";
  }
  ?>
  </select></font></td>
    
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Hab Especial</b><BR><select name="f_especial"><?php
  $especials = "SELECT DISTINCT especial FROM usu ORDER by especial ASC";
  $sql = mysqli_query($link, $especials);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $especial = utf8_encode($resultado2['especial']);
  echo "<option value='$especial'>$especial</option>";
  }
  ?>
  </select></font></td>  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Op Eqp</b><BR><select name='f_operador'><?php
  $operadors = "SELECT DISTINCT operador FROM usu ORDER by operador ASC";
  $sql = mysqli_query($link, $operadors);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $operador = $resultado2['operador'];
  switch ($operador) {
    case 0:
        $operador1 = "Não";
        break;
    case 1:
        $operador1 = "Sim";
        break;
}
  echo "<option value='$operador'>$operador1</option>";
  }
  ?>
  </select></font></td>
 
<td width="100" ><font size=2 color="#000000" face="arial"><b>Eqp(Seleção)</b><BR><select name='f_eqp_opera'><?php
  $eqp_operas = "SELECT DISTINCT eqp_opera FROM usu WHERE operador LIKE '1' ORDER by eqp_opera ASC";
  $sql = mysqli_query($link, $eqp_operas);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $eqp_opera = utf8_encode($resultado2['eqp_opera']);
  echo "<option value='$eqp_opera'>$eqp_opera</option>";
  }
  ?>
  </select></font></td> 
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Eqp(Texto)</b><BR><input type="varchar" size="8" name='f_eqp_opera1'></font></td> 
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Alterar</b></font></td>
  
  </tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#F5DEB3";

	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_usu = $resultado['id_usu'];
  $usuario = $resultado['usuario'];
  $posto_grad = utf8_encode($resultado['posto_grad']);
  $nome_guerra = utf8_encode($resultado['nome_guerra']);
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
  $mopp = utf8_encode($resultado['mopp']);
  switch ($mopp) {
    case 0:
        $mopp1 = "Não";
        break;
    case 1:
        $mopp1 = "Sim";
        break;
}
   $especial = utf8_encode($resultado['especial']);
   
   $eqp_opera = utf8_encode($resultado['eqp_opera']);
 
  
  $data = date("Y_m_d");
  
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

  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php echo $id_usu;?>"><?php echo $cont; ?></font></p></td>

  <td width="30" ><font size=2 color="#000000" face="arial"><?php if ($foto == 'sem_foto'){echo '<a href="2becmb_baltera_foto.php?id='.$id.'" target="blank">';}else{echo '<a href="./foto_usu/'.$usuario.'.jpg" target="blank">';}?><img src="<?php echo './foto_usu/'.$usuario.'.jpg';?>" width="50" height="60"></a></font></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $posto_grad;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $nome_guerra;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $cnh1; ?></font></p></td>
    
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo $cnh_val; ?></a></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $mot_militar1;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $especial; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $operador1; ?></font></p></td> 
  
  <td colspan="2"><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $eqp_opera; ?></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><a href="2becmb_mot_altera.php?id_usu=<?php echo $id_usu; ?>" target="_blank"><img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar dados dos Motoristas e Operadores"></a></font></p></td>

<?php

}

?>

<tr>
  <td colspan="11" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] cadastrados. </p></font></td>
  
  
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
			$comando = utf8_decode('Visualizou o Painel de Controle de Motoristas e Operadores');
			$sql = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
			?>

 
    </ul>
  </div>


</body></html>