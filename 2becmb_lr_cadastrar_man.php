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
	$posto_grad = $_SESSION['posto_grad'];
    $nivel_2becmb = $_SESSION['nivel_2becmb'];

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT);

	// Recupera os dados dos campos
date_default_timezone_set('America/Sao_Paulo');
		$id_mat = trim($_POST['id']);
			
		$titulo_man = trim($_POST['titulo_man']);
		$link_man = '2becmb_manuais/manual_'.$titulo.'_'.$id_mat.'.pdf';
		$obs_man = trim($_POST['obs_man']);
		$cadastrador = $posto_grad.' '.$nome_guerra;
		
			// #############  Inserção do arquivo  ##############
	if (isset($_FILES["arquivo"]["name"])) {
	// Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = '2becmb_manuais/';
	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 1024 * 1024 * 8; // 1Mb
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('pdf');
	// Renomeia o arquivo? (Se true, o arquivo será salvo como .pdf e um nome único)
	$_UP['renomeia'] = true;
	// Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	if (($_FILES['arquivo']['error'] != 0)&&($_FILES['arquivo']['error'] != 4)) {
	die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
	exit; // Para a execução do script
	}
	// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
	// Faz a verificação da extensão do arquivo
	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if ((array_search($extensao, $_UP['extensoes']) === false)&&($_FILES['arquivo']['error'] != 4)) {
	echo "Por favor, envie Documento no formato 'pdf'";
	exit;
	}
	// Faz a verificação do tamanho do arquivo
	if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
	echo "O arquivo enviado é muito grande, envie arquivos de até 8Mb.";
	exit;
	}
	// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	// Primeiro verifica se deve trocar o nome do arquivo
	if ($_UP['renomeia'] == true) {
	// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
	$nome_final = 'manual_'.$titulo.'_'.$id_mat.'.pdf';
	} else {
	// Mantém o nome original do arquivo
	$nome_final = $_FILES['arquivo']['name'];
	}
  
	// Depois verifica se é possível mover o arquivo para a pasta escolhida
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
	// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
	echo "Documento carregado com sucesso!";
	//} else {
	// Não foi possível fazer o upload, provavelmente a pasta está incorreta
	//echo "Não foi possível enviar o arquivo, tente novamente";
	//}
	}}
	//##### Fim da inserção do arquivo ######
	
	
	
	
	if(($_FILES['arquivo']['error'] != 0)){

		echo  "
           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=index2.php'>
           <script type=\"text/javascript\" charset=UTF-8>
           alert(\"Houve algum problema ao tentar carregar o arquivo0.\");
           </script>
           "; exit();
	}
	
	
			 
			// Se os dados forem inseridos com sucesso
			if(($_FILES['arquivo']['error'] != 0)){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_baltera_sit_doc.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro ao carregar o Documento1.\");
                           </script>
                           ";
							}
	
			// ALtera os dados no banco de dados
			
			$sql = mysqli_query($link, "INSERT INTO 2becmb_lr_man (id_man, id_mat, titulo_man, link_man, obs_man, cadastrador) VALUES(NULL, '{$id_mat}', '{$titulo_man}', '{$link_man}', '{$obs_man}', '{$cadastrador}')");
			//echo $id.'a'.$sit_doc.'b'.$doc; exit();            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_cadastra_man.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro ao alterar o campo.\");
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
				
				$sql_m = "SELECT * FROM 2becmb_material WHERE id LIKE '$id'";
				$query_m = mysqli_query($link, $sql_m);	
				$resultado_m = mysqli_fetch_assoc($query_m);
				$ppeb = $resultado_m['ppeb'];
				
				$x = $doc_saida;
				if ($x == 0){$x = 'Irregular';}else{if ($x == 1){$x = 'Regular';}else{$x = 'Providenciando';}}
				
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$comando = 'INSERT INTO 2becmb_lr_man (id_man, id_mat, titulo_man, link_man, obs_man, cadastrador) VALUES(NULL, '.$id_mat.', '.$titulo_man.', '.$link_man.', '.$obs_man.', '.$cadastrador.')';
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_man.php?id=$id_mat'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"O manual foi carregado com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>