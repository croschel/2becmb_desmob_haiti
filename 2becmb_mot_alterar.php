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
		$id = trim($_POST['id']);
		
		$posto_grad = utf8_decode(trim($_POST['posto_grad']));
		$nome_guerra = utf8_decode(trim($_POST['nome_guerra']));
		$cnh = utf8_decode(trim($_POST['cnh']));
		$cnh_val = utf8_decode(trim($_POST['cnh_val']));
		$mot_militar = utf8_decode(trim($_POST['mot_militar']));
		$especial = utf8_decode(trim($_POST['especial']));
		$operador = utf8_decode(trim($_POST['operador']));
		$eqp_opera = trim($_POST['eqp_opera']);
		$usuario = trim($_POST['usuario']);
		$email = trim($_POST['email']);
		$tel_movel = trim($_POST['tel_movel']);
		
		//echo 'Mot_Militar:'.$mot_militar.' mopp:'.$mopp.' coletivo:'.$coletivo.' operador:'.$operador.' Eqp_Opera:'.$eqp_opera;
		//echo '<br>';
		//exit();
	
			// ALtera os dados no banco de dados
			
			$sql = mysqli_query($link, "UPDATE usu SET posto_grad='$posto_grad', nome_guerra='$nome_guerra', tel_movel='$tel_movel', email='$email', cnh='$cnh', cnh_val='$cnh_val', mot_militar='$mot_militar', especial='$especial', operador='$operador', eqp_opera='$eqp_opera' WHERE id_usu = '$id'");
            

			            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_mot_altera.php'>
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
				//$posto_grad = $resultado_i['posto_grad'];
				//$nome_guerra = $resultado_i['nome_guerra'];
				
				$sql_m = "SELECT * FROM 2becmb_material WHERE id LIKE '$id'";
				$query_m = mysqli_query($link, $sql_m);	
				$resultado_m = mysqli_fetch_assoc($query_m);
				
				
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$comando = 'UPDATE usu SET posto_grad='.$posto_grad.', nome_guerra='.$nome_guerra.', tel_movel='.$tel_movel.', email='.$email.', cnh='.$cnh.', cnh_val='.$cnh_val.', mot_militar='.$mot_militar.', especial='.$especial.', operador='.$operador.', eqp_opera='.$eqp_opera.' WHERE id_usu = '.$id;
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_mot.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"O(s) dado(s) referente(s) ao MOTORISTA/OPERADOR foi(ram) alterado(s) com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>