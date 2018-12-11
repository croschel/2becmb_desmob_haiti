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
	$posto_grad = $_SESSION['posto_grad'];
	$nome_guerra = $_SESSION['nome_guerra'];
	$cadastrador = $posto_grad.' '.$nome_guerra;

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT);

	// Recupera os dados dos campos
date_default_timezone_set('America/Sao_Paulo');
		$emprego = trim($_POST['emprego']);echo $emprego.'<br>';
		$classe = trim($_POST['classe']);echo $emprego.'<br>';
		$tipo = trim($_POST['tipo']);echo $emprego.'<br>';
		$material = utf8_decode(trim($_POST['material']));echo $emprego.'<br>';
		$marca = utf8_decode(trim($_POST['marca']));echo $emprego.'<br>';
		$modelo = utf8_decode(trim($_POST['modelo']));echo $emprego.'<br>';
		$serie = utf8_decode(trim($_POST['serie']));echo $emprego.'<br>';
		$versao = utf8_decode(trim($_POST['versao']));echo $emprego.'<br>';
		$capacidade = trim($_POST['capacidade']);echo $emprego.'<br>';
		$chassis_sn = trim($_POST['chassis_sn']);echo $emprego.'<br>';
		$ano = trim($_POST['ano']);echo $emprego.'<br>';
		$foto = 'sem_foto';echo $emprego.'<br>';
		//if ($ano == ''){$ano = '-';}else{$ano = $ano;}
		$ppeb = trim($_POST['ppeb']);echo $emprego.'<br>';
		$sit_doc = utf8_decode(trim($_POST['sit_doc']));echo $emprego.'<br>';
		$doc_validade = trim($_POST['doc_validade']);echo $emprego.'<br>';
		$sit_mnt = utf8_decode(trim($_POST['sit_mnt']));echo $emprego.'<br>';
		$doc = 0; echo $doc.'<br>';
		$now = date('Y-m-d H:i:s');echo $emprego.'<br>';
		
	
			

		if (!$emprego || !$classe || !$tipo || !$material){
		echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_material.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Os dados referentes aos campos Emprego, Classe, Tipo ou Material não podem estar em branco.\");
                           </script>
                           "; exit;
		}
			// Se os dados forem inseridos com sucesso
			$sql = mysqli_query($link, "INSERT INTO 2becmb_material (id, emprego, foto, classe, tipo, material, marca, modelo, serie, versao, capacidade, chassis_sn, ano, ppeb, sit_doc, doc_validade, doc, sit_mnt, cadastrador, datahora_atualizado)
VALUES (NULL, '{$emprego}', '{$foto}', '{$classe}', '{$tipo}', '{$material}', '{$marca}', '{$modelo}', '{$versao}', '{$serie}', '{$capacidade}', '{$chassis_sn}', '{$ano}', '{$ppeb}', '{$sit_doc}', '{$doc_validade}', '{$doc}', '{$sit_mnt}', '{$cadastrador}', '{$now}')");
						
			            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_cadastra_material.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro cadastrar o material.\");
                           </script>
                           ";
							}
                    //"Ocorreu algum erro ao criar sua conta, por favor entre em contato com o Webmaster.";
				
				else {
            // Gravar na tabela auditoria
			$cpf = $_SESSION['usuario'];
				$sql_i = "SELECT * FROM usu WHERE usuario LIKE '$cpf'";
				$query_i = mysqli_query($link, $sql_i);	
				$resultado_i = mysqli_fetch_assoc($query_i);
				$posto_grad = $resultado_i['posto_grad'];
				$nome_guerra = $resultado_i['nome_guerra'];
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$comando = 'INSERT INTO 2becmb_material (id, emprego, foto, classe, tipo, material, marca, modelo, versao, serie, capacidade, chassis_sn, ano, ppeb, sit_doc, doc_validade, doc, sit_mnt, cadastrador, datahora_atualizado) VALUES (NULL, '.$emprego.', '.$foto.', '.$classe.', '.$tipo.', '.$material.', '.$marca.', '.$modelo.', '.$versao.', '.$serie.', '.$capacidade.', '.$chassis_sn.', '.$ano.', '.$ppeb.', '.$sit_doc.', '.$doc_validade.', '.$doc.', '.$sit_mnt.', '.$cadastrador.', '.$now.')';
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
					echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_controle.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"O material foi cadastrado com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>