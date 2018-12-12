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
    $nivel_adm = $_SESSION['nivel_adm'];
	$su = $_SESSION['su'];
	$posto_grad = utf8_encode($_SESSION['posto_grad']);
	$nome_guerra =  utf8_encode($_SESSION['nome_guerra']);
	$funcao = utf8_encode($_SESSION['funcao']);
	
	if ($nivel_adm < 6 ) { echo "
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
<title>2° BE Cmb - Desmob Haiti</title>
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

<form class="jotform-form" action="cadastrar_usuarios.php" method="post" name="teste" id="" accept-charset="utf-8" novalidate="true">
  <input type="hidden" name="formID" value="43456321500646">
  <div class="form-all">
    <table align="center" border="0" width="100%" class="backcolor">
		<tbody><tr>
		<td rowspan="2" width="10%" align="center" height="80"><img src="./imagens/2becmb.png" width="50" height="75"></td>
		<td><font color='#000000' size="5" face="verdana">Batalhão Borba Gato </font><hr width="100%" align="left"></td>
		</tr>
		<tr>
		<td><font color="#EEE9E9" size="4" face="verdana">Desmobilização Mat Cl VI e IX do Haiti</font>&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href="/2becmb_desmob_haiti/index0.php" title="Página Inicial" > <img src="./imagens/home.png" width="40" height="40"></a> 
		
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
		

<hr align="center">
	  <li class="backcolor1" data-type="control_text" id="id_56">
        <div id="cid_56" class="form-input-wide">
          <div id="text_56" class="form-html">
			
			<fieldset align='center'>
			<legend><font color='#000000' face="verdana" size=2><img src="imagens/cadastro_usuarios_faixa.png" width="100%" height="40" border="0"></font></legend>

			<table align="center" cellpadding="4">
			<tr><td><font color='#000000' face="verdana" size=2>Usuário (CPF):</font></td><td><input name="usuario" type="text" id="usuario"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Nome Completo:</font></td><td><input name="nome" type="text" id="nome"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Nome Guerra:</font></td><td><input name="nome_guerra" type="text" id="nome_guerra"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Posto/Graduação:</font></td><td>
			<select name="posto_grad" >
			<option value="">Selecionar Posto/Grad</option>
			<option value="Gen Ex">Gen Ex</option>
			<option value="Gen Div">Gen Div</option>
			<option value="Gen Bda">Gen Bda</option>
			<option value="Cel">Cel</option>
			<option value="Ten Cel">Ten Cel</option>
			<option value="Maj">Maj</option>
			<option value="Cap">Cap</option>
			<option value="1º Ten">1º Ten</option>
			<option value="2º Ten">2º Ten</option>
			<option value="Asp Of">Asp Of</option>
			<option value="S Ten">S Ten</option>
			<option value="1º Sgt">1º Sgt</option>
			<option value="2º Sgt">2º Sgt</option>
			<option value="3º Sgt">3º Sgt</option>
			<option value="Cb">Cb</option>
			<option value="Taifeiro">Taifeiro</option>
			<option value="Sd">Sd</option>		
			</font></select></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>OM:</font></td><td><input name="om" type="text" id="om" value="2º BE Cmb"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>SU:</font></td><td>
			<select name="su" >
			<option value="">Selecionar ............. SU</option>
			<option value="EM">EM</option>
			<option value="B Adm">B Adm</option>
			<option value="Cia C Ap">Cia C Ap</option>
			<option value="Cia E Pnt">Cia E Pnt</option>
			<option value="Cia E Cmb">Cia E Cmb</option>		
			</font></select></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Possui CNH?</font></td><td>
			<select name="cnh" >
			<option value="0">Não Possui</option>
			<option value="1">Categoria A</option>
			<option value="2">Categoria B</option>
			<option value="3">Categoria AB</option>
			<option value="4">Categoria C</option>
			<option value="5">Categoria D</option>		
			<option value="6">Categoria E</option>		
			</font></select></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Mot Mil</font></td><td>
			<select name="mot_militar" >
			<option value="">Selecionar</option>
			<option value="1">Sim</option>
			<option value="0">Não</option>	
			</font></select></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Hab Especial</font></td><td>
			<select name="especial" >
			<option value="-">Não Possui</option>
			<option value="Emergência">Emergência</option>
			<option value="Carga Indivisível">Carga Indivisível</option>
			<option value="Coletivo">Transp Coletivo</option>
			<option value="MOPP">MOPP</option>		
			</font></select></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Função:</font></td><td><input name="funcao" type="text" id="funcao" value=""/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Tel Móvel:</font></td><td><input name="tel_movel" type="text" id="tel_movel"  onkeypress="mascara(this, '## #########')" maxlength="12"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Email:</font></td><td><input name="email" type="text" id="email"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Senha:</font></td><td><input name="senha" type="password" id="senha"/></td></tr>
			<tr><td><font color='#000000' face="verdana" size=2>Confirma Senha:</font></td><td><input name="senha1" type="password" id="senha1"/></td></tr>
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