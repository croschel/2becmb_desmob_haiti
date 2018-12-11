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
		$id_ficha = utf8_decode(trim($_POST['id_ficha'])); echo 'id ficha: '.$id_ficha.'<br>';
			
		$id_mat = utf8_decode(trim($_POST['id_mat'])); echo $id_mat.'<br>';
		$motorista = utf8_decode(trim($_POST['motorista']));echo $motorista.'<br>';
		$ch_vtr = utf8_decode(trim($_POST['ch_vtr']));echo $ch_vtr.'<br>';
		$local_apresenta = utf8_decode(trim($_POST['local_apresenta']));echo $local_apresenta.'<br>';
		$data_apresenta = utf8_decode(trim($_POST['data_apresenta']));echo $data_apresenta.'<br>';
		$hora_apresenta = utf8_decode(trim($_POST['hora_apresenta']));
		$data_hora_apresenta = $data_apresenta.' '.$hora_apresenta.':00';echo $data_hora_apresenta.'<br>';
		
		$ordenou = utf8_decode(trim($_POST['ordenou']));echo $ordenou.'<br>';
		$destino = utf8_decode(trim($_POST['destino']));echo $destino.'<br>';
		$missao = utf8_decode(trim($_POST['missao']));echo $missao.'<br>';
		$itinerario = utf8_decode(trim($_POST['itinerario'])); echo $itinerario.'<br>';
		$cmt_su = utf8_decode(trim($_POST['cmt_su']));echo $cmt_su.'<br>';
		$enc_mnt = utf8_decode(trim($_POST['enc_mnt']));echo $enc_mnt.'<br>';
		$saida_data = utf8_decode(trim($_POST['saida_data']));
		$saida_hora = utf8_decode(trim($_POST['saida_hora']));
		$saida_data_hora = $saida_data.' '.$saida_hora.':00';echo $saida_data_hora.'<br>';
		
		$saida_odo = utf8_decode(trim($_POST['saida_odo']));echo $saida_odo.'<br>';
		$chegada_data = utf8_decode(trim($_POST['chegada_data']));
		$chegada_hora = utf8_decode(trim($_POST['chegada_hora']));
		$chegada_data_hora = $chegada_data.' '.$chegada_hora.':00';echo $chegada_data_hora.'<br>';
		$chegada_odo = utf8_decode(trim($_POST['chegada_odo']));echo $chegada_odo.'<br>';
		$situacao_ficha = utf8_decode(trim($_POST['situacao_ficha']));echo $situacao_ficha.'<br>';
		
		$observacao = utf8_decode(trim($_POST['observacao']));echo $observacao.'<br>';

		//exit();
	
			// ALtera os dados no banco de dados
			
			$sql = mysqli_query($link, "UPDATE 2becmb_lr_ficha SET motorista='$motorista', ch_vtr='$ch_vtr', local_apresenta='$local_apresenta', data_hora_apresenta='$data_hora_apresenta', data_apresenta='$data_apresenta', ordenou='$ordenou', destino='$destino',
			missao='$missao', itinerario='$itinerario', cmt_su='$cmt_su', enc_mnt='$enc_mnt', saida_data_hora='$saida_data_hora', saida_odo='$saida_odo', 
			chegada_data_hora='$chegada_data_hora', chegada_odo='$chegada_odo', situacao_ficha='$situacao_ficha', observacao = '$observacao' WHERE id_ficha LIKE '$id_ficha'");
            
			
			            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_baltera_ficha.php'>
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
				$ficha = $resultado_m['ficha'];
				
				//$x = $doc_saida;
				//if ($x == 0){$x = 'Irregular';}else{if ($x == 1){$x = 'Regular';}else{$x = 'Providenciando';}}
				
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$comando = 'UPDATE 2becmb_lr_ficha SET motorista='.$motorista.', ch_vtr='.$ch_vtr.', local_apresenta='.$local_apresenta.', data_hora_apresenta='.$data_hora_apresenta.', data_apresenta='.$data_apresenta.', ordenou='.$ordenou.', destino='.$destino.',
			missao='.$missao.', itinerario='.$itinerario.', cmt_su='.$cmt_su.', enc_mnt='.$enc_mnt.', saida_data_hora='.$saida_data_hora.', saida_odo='.$saida_odo.', 
			chegada_data_hora='.$chegada_data_hora.', chegada_odo='.$chegada_odo.', situacao_ficha='.$situacao_ficha.' WHERE id_ficha LIKE '.$id_ficha;
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_ficha.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"Os dados da FICHA foram alterados com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>