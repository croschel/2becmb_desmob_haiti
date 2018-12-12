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

//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT);

	// Recupera os dados dos campos
date_default_timezone_set('America/Sao_Paulo');
		
		$id_mat = trim($_POST['id_mat']); echo $id_mat.'<br>';
		$id_ficha = utf8_decode(trim($_POST['id_ficha']));echo $id_ficha.'<br>';
		$combustivel = utf8_decode(trim($_POST['combustivel']));echo $combustivel.'<br>';
		$bomba_i = utf8_decode(trim($_POST['bomba_i']));echo $bomba_i.'<br>';
		$bomba_f = utf8_decode(trim($_POST['bomba_f']));echo $bomba_f.'<br>';
		$cadastrador = $posto_grad.' '.$nome_guerra; echo $cadastrador.'<br>';
		$datahora = trim($_POST['data']).' '.trim($_POST['hora']).':00'; echo $datahora.'<br>';
				
	
		//exit();	

		if (!$bomba_i || !$bomba_f || !$datahora || !$combustivel){
		echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_cadastra_abast.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Todos os campos devem ser preenchidos.\");
                           </script>
                           "; exit;
		}
			// Se os dados forem inseridos com sucesso
			$sql = mysqli_query($link, "INSERT INTO 2becmb_abast (id_abast, id_mat, id_ficha, combustivel, bomba_i, bomba_f, datahora, cadastrador)
														VALUES (NULL, '{$id_mat}', '{$id_ficha}', '{$combustivel}', '{$bomba_i}', '{$bomba_f}', '{$datahora}', '{$cadastrador}')");
						
			            
				
			
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_cadastra_abast.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro ao cadastrar o abastecimento.\");
                           </script>
                           ";
							}
                    
					
				
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
			$comando = 'INSERT INTO 2becmb_abast (id_abast, id_mat, id_ficha, combustivel, bomba_i, bomba_f, cadastrador, datatahora) VALUES (NULL, '.$id_mat.', '.$id_ficha.', '.$combustivel.', '.$bomba_i.', '.$bomba_f.', '.$cadastrador.', '.$datahora.')';
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
					echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_comb.php?id_ficha='.$id_ficha'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"O abastecimento foi cadastrado com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>