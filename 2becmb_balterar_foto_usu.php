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

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT);

	// Recupera os dados dos campos
date_default_timezone_set('America/Sao_Paulo');
					
		$usu = trim($_POST['usu']);
		
		
		// #############  Inserção do arquivo  ##############
	if (isset($_FILES["arquivo"]["name"])) {
	// Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = 'foto_usu/';
	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 1024 * 1024 * 4; // 1Mb
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('jpg');
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
	echo "Por favor, envie Foto no formato 'jpg'";
	exit;
	}
	// Faz a verificação do tamanho do arquivo
	if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
	echo "O arquivo enviado é muito grande, envie foto de até 4Mb.";
	exit;
	}
	// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	// Primeiro verifica se deve trocar o nome do arquivo
	if ($_UP['renomeia'] == true) {
	// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
	$nome_final = $usu.'.jpg';
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
	
	
	
	
	if(($_FILES['arquivo']['error'] != 0)&&($_FILES['arquivo']['error'] != 4)){

		echo  "
          <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_baltera_foto_usu.php'>
          <script type=\"text/javascript\" charset=UTF-8>
          alert(\"Ocorreu algum erro ao carregar a foto.\");
          </script>
          "; exit();
	}
	
					
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=controle_usuarios.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"A foto foi carregada com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";



?>