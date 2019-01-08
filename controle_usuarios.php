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
	$nivel_adm = $_SESSION['nivel_adm'];

	if ($nivel_adm < 10 ) { echo "
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=admin.php'>
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
        background:#000;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:100%;
        background: #000;
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
		<td colspan="3"><font color='#000000' size="5" face="arial">2º Batalhão Logístico Leve</font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="arial">Controle de Usuários</font></td>
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
			<legend><img src="imagens/controle_usu.png" width="600" height="40" border="0"></legend>
	

<?php

//$link = mysqli_connect("localhost","root","","2becmb");
	
	// mostrar os dados com a aplicação dos filtros definidos
   if ($_POST['consulta']) {
    $f_posto_grad = utf8_decode($_POST['f_posto_grad']);
	$f_nome_guerra = utf8_decode($_POST['f_nome_guerra']);
    $f_om = $_POST['f_om'];
	$f_su = utf8_decode($_POST['f_su']);
	$f_funcao = utf8_decode($_POST['f_funcao']);
	$f_nivel = utf8_decode($_POST['f_nivel']);
	if($nivel == ''){$nivel = '%';}else{$nivel = $nivel;}
	$f_nivel_2becmb = utf8_decode($_POST['f_nivel_2becmb']);
	if($nivel_2becmb == ''){$nivel_2becmb = '%';}else{$nivel_2becmb = $nivel_2becmb;}
	$f_nivel_adm = utf8_decode($_POST['f_nivel_adm']);
	if($nivel_adm == ''){$nivel_adm = '%';}else{$nivel_adm = $nivel_adm;}
	
	// Ordenar por
	$ord1 = $_POST['ord1'];
	$ord2 = $_POST['ord2'];
	$ord3 = $_POST['ord3'];
	$ord4 = $_POST['ord4'];
	}
	
	// Critérios de ordenamento inicial
	if ($ord1 == ''){$ord1 = 'OM ASC';}
	if ($ord2 == ''){$ord2 = 'posto_grad_ord ASC';}
	if ($ord3 == ''){$ord3 = 'nome_guerra ASC';}
	if ($ord4 == ''){$ord4 = 'funcao ASC';}
	
	
	// consulta com filtros
	$sql1 = "SELECT * FROM usu WHERE posto_grad LIKE '%$f_posto_grad' AND nome_guerra LIKE '%$f_nome_guerra' AND om LIKE '%$f_om' AND su LIKE '%$f_su' AND funcao LIKE '%$f_funcao' AND nivel LIKE '%$f_nivel' AND nivel_2becmb LIKE '%$f_nivel_2becmb' AND nivel_adm LIKE '%$f_nivel_adm' ORDER BY $ord1, $ord2, $ord3, $ord4";
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
			<option value="om">OM Asc</option>
			<option value="om DESC">OM Desc</option>
			<option value="su ASC">SU Asc</option>
			<option value="su DESC">SU Desc</option>
			<option value="funcao ASC">Função Asc</option>
			<option value="funcao DESC">Função Desc</option>
			<option value="nivel_adm ASC">Nível Adm Asc</option>
			<option value="nivel_adm DESC">Nível Adm Desc</option>
			<option value="nivel ASC">Nível Mad Max Asc</option>
			<option value="nivel DESC">Nível Mad Max Desc</option>
			<option value="nivel_2becmb ASC">Nível 2ºBECmb Asc</option>
			<option value="nivel_2becmb DESC">Nível 2ºBECmb Desc</option>
			<option value="tel_movel ASC">Tel Móvel Asc</option>'
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
  
   
  <td width="40" ><font size=2 color="#000000" face="arial"><b>OM</b><BR><select name='f_om'><?php
  $oms = "SELECT DISTINCT om FROM usu ORDER by om ASC";
  $sql = mysqli_query($link, $oms);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $om = utf8_encode($resultado2['om']);
  echo "<option value='$om'>$om</option>";
  }
  ?>
  </select></font></td>
  
  <td width="40" ><font size=2 color="#000000" face="arial"><b>SU</b><BR><select name='f_su'><?php
  $sus = "SELECT DISTINCT su FROM usu ORDER by su ASC";
  $sql = mysqli_query($link, $sus);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $su = utf8_encode($resultado2['su']);
  echo "<option value='$su'>$su</option>";
  }
  ?>
  </select></font></td>
  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Função</b><BR><select name='f_funcao'><?php
  $funcaos = "SELECT DISTINCT funcao FROM usu ORDER by funcao ASC";
  $sql = mysqli_query($link, $funcaos);
  echo "<option value=''>Listar</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $funcao = utf8_encode($resultado2['funcao']);
  echo "<option value='$funcao'>$funcao</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Adm</b><BR><select name="f_nivel_adm"><?php
  $nivel_adms = "SELECT DISTINCT nivel_adm FROM usu ORDER by nivel_adm ASC";
  $sql = mysqli_query($link, $nivel_adms);
  echo "<option value=''>Nível</option>";
  echo "<option value='%'>Todos</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $nivel_adm = utf8_encode($resultado2['nivel_adm']);
  echo "<option value='$nivel_adm'>$nivel_adm</option>";
  }
  ?>
  </select></font></td>  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>MadMax</b><BR><select name="f_nivel"><?php
  $nivels = "SELECT DISTINCT nivel FROM usu ORDER by nivel ASC";
  $sql = mysqli_query($link, $nivels);
  echo "<option value=''>Nível</option>";
  echo "<option value='%'>Todos</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $nivel = utf8_encode($resultado2['nivel']);
  echo "<option value='$nivel'>$nivel</option>";
  }
  ?>
  </select></font></td>  
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>2ºBECmb</b><BR><select name='f_nivel_2becmb'><?php
  $nivel_2becmbs = "SELECT DISTINCT nivel_2becmb FROM usu ORDER by nivel_2becmb ASC";
  $sql = mysqli_query($link, $nivel_2becmbs);
  echo "<option value=''>Nível</option>";
  echo "<option value='%'>Todos</option>";
  while ($resultado2 = mysqli_fetch_array($sql)) {
  $nivel_2becmb = $resultado2['nivel_2becmb'];
  echo "<option value='$nivel_2becmb'>$nivel_2becmb</option>";
  }
  ?>
  </select></font></td>
  
  <td width="100" ><font size=2 color="#000000" face="arial"><b>Alterar</b></font></td>
  
  </tr>
  
</form>


<?php
$cont=0;
//$cor="#F5DEB3";
$cor="#B0C4DE";

	

while ($resultado = mysqli_fetch_assoc($query1)) {
  $id_usu = $resultado['id_usu'];
  $usuario = $resultado['usuario'];
  $posto_grad = utf8_encode($resultado['posto_grad']);
  $posto_grad_ord = utf8_encode($resultado['posto_grad_ord']);
  $nome_guerra = utf8_encode($resultado['nome_guerra']);
  $om = utf8_encode($resultado['om']);
  $su = utf8_encode($resultado['su']);
  $funcao = utf8_encode($resultado['funcao']);
  if ($om == 'z'){$om = '-'; $su = '-'; $funcao = '-';}
  $niv = utf8_encode($resultado['nivel']);
  $niv_2becmb = utf8_encode($resultado['nivel_2becmb']);
  $niv_adm = utf8_encode($resultado['nivel_adm']);
  $tel_movel = utf8_encode($resultado['tel_movel']);
  
  $data = date("Y_m_d");
  
 $cont++; #incremento do contador
#cor sim e corNÃO 87CEFF
if($cor=="#B0C4DE") {
	$cor="white";
} else {
	$cor="#B0C4DE";
	//$cor="#87CEFF";
}
 if ($cor=="#B0C4DE"){$cor1="white";}else{$cor1="#B0C4DE";}
 
 
 
?>

<tr bgcolor="<?php print $cor;?>" >

  <td><p align="center"><font size=2 color="#000000" face="arial" title="<?php echo $id_usu;?>"><?php echo $cont; ?></font></p></td>

  <td width="30" ><font size=2 color="#000000" face="arial"><?php echo '<a href="2becmb_baltera_foto_usu.php?usuario='.$usuario.'" target="blank">';?><img src="<?php echo './foto_usu/'.$usuario.'.jpg';?>" width="50" height="60"></a></font></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $posto_grad;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" title="" face="arial"><?php echo $nome_guerra; echo '<br><br>'.$tel_movel?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $om; ?></font></p></td>
    
  <td><p align="center"><font size=2 color="#000000" face="arial" ><?php echo $su; ?></a></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial"><?php echo $funcao;?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $niv_adm; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $niv; ?></font></p></td>
  
  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><?php echo $niv_2becmb; ?></font></p></td>

  <td><p align="center"><font size=2 color="#000000" face="arial" title=""><a href="usu_altera.php?id_usu=<?php echo $id_usu; ?>" target="_blank"><img src="./imagens/altera_material.png" width="30" height="30" title="Clique para alterar dados dos usuários" target="_blank"></a></font></p></td>

<?php

}

?>

<tr>
  <td colspan="10" bgcolor="<?php echo $cor1;?>"><font size=2 color="#000000" face="arial"><p align="center">A pesquisa retornou: [ <?php echo $encontrados; ?> ] resultado(s) em [ <?php echo $total ?> ] cadastrados. </p></font></td>
  
  
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