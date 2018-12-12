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
		
		$posto_grad1 = trim($_POST['posto_grad']);
		$posto_grad = utf8_decode(trim($_POST['posto_grad']));
		$nome_guerra = utf8_decode(trim($_POST['nome_guerra']));
		$om = utf8_decode(trim($_POST['om']));
		$su = utf8_decode(trim($_POST['su']));
		$funcao = utf8_decode(trim($_POST['funcao']));
		$tel_movel = trim($_POST['tel_movel']);
		$nivel = utf8_decode(trim($_POST['nivel']));
		$nivel_adm = utf8_decode(trim($_POST['nivel_adm']));
		$nivel_2becmb = utf8_decode(trim($_POST['nivel_2becmb']));
		
		switch ($posto_grad1) {
    case "Gen Ex":
        $posto_grad_ord = 53;
        break;
    case "Gen Div":
        $posto_grad_ord = 52;
        break;
    case "Gen Bda":
        $posto_grad_ord = 51;
        break;
    case "Gen Bda":
        $posto_grad_ord = 51;
        break;
    case "Cel":
        $posto_grad_ord = 43;
        break;
    case "Ten Cel":
        $posto_grad_ord = 42;
        break;
    case "Maj":
        $posto_grad_ord = 41;
        break;
    case "Cap":
        $posto_grad_ord = 33;
        break;
    case "1º Ten":
        $posto_grad_ord = 32;
        break;
    case "2º Ten":
        $posto_grad_ord = 31;
        break;
    case "Asp Of":
        $posto_grad_ord = 20;
        break;
    case "S Ten":
        $posto_grad_ord = 14;
        break;
    case "1º Sgt":
        $posto_grad_ord = 13;
        break;
    case "2º Sgt":
        $posto_grad_ord = 12;
        break;
    case "3º Sgt":
        $posto_grad_ord = 11;
        break;
    case "Cb":
        $posto_grad_ord = 2;
        break;
    case "Sd":
        $posto_grad_ord = 1;
        break;
}
		
		//echo 'Mot_Militar:'.$mot_militar.' mopp:'.$mopp.' coletivo:'.$coletivo.' operador:'.$operador.' Eqp_Opera:'.$eqp_opera;
		//echo '<br>';
		//exit();
	
			// ALtera os dados no banco de dados
			
			$sql = mysqli_query($link, "UPDATE usu SET posto_grad='$posto_grad', posto_grad_ord='$posto_grad_ord', nome_guerra='$nome_guerra', om='$om', su='$su', funcao='$funcao', tel_movel='$tel_movel', nivel_adm='$nivel_adm', nivel='$nivel', nivel_2becmb='$nivel_2becmb' WHERE id_usu = '$id'");
            

			            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=usu_altera.php'>
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
			$comando = 'UPDATE usu SET posto_grad='.$posto_grad.', nome_guerra='.$nome_guerra.', om='.$om.', su='.$su.', funcao='.$funcao.', tel_movel='.$tel_movel.', nivel_adm='.$nivel_adm.', nivel_2becmb='.$nivel_2becmb.', nivel='.$nivel.' WHERE id_usu = '.$id;
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=controle_usuarios.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"O(s) dado(s) referente(s) ao usuário foi(ram) alterado(s) com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>