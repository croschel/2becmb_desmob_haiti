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
		
		$id_mat = utf8_decode(trim($_POST['id_mat'])); echo $id_mat.'<br>';
		$motorista = utf8_decode(trim($_POST['motorista']));echo $motorista.'<br>';
		$ch_vtr = utf8_decode(trim($_POST['ch_vtr']));echo $ch_vtr.'<br>';
		$local_apresenta = utf8_decode(trim($_POST['local_apresenta']));echo $local_apresenta.'<br>';
		$data_apresenta = trim($_POST['data_apresenta']);
		$hora_apresenta = trim($_POST['hora_apresenta']);
		$data_hora_apresenta = $data_apresenta.' '.$hora_apresenta.':00'; echo $data_hora_apresenta.'<br>';
		$ordenou = utf8_decode(trim($_POST['ordenou']));echo $ordenou.'<br>';
		$destino = utf8_decode(trim($_POST['destino1'])).utf8_decode(trim($_POST['destino']));echo $destino.'<br>';
		$missao = utf8_decode(trim($_POST['missao']));echo $missao.'<br>';
		$itinerario = utf8_decode(trim($_POST['itinerario'])); echo $itinerario.'<br>';
		$cmt_su = utf8_decode(trim($_POST['cmt_su']));echo $cmt_su.'<br>';
		$enc_mnt = utf8_decode(trim($_POST['enc_mnt']));echo $enc_mnt.'<br>';
		$saida_data_hora = utf8_decode('0001-01-01 00:00:00'); echo $saida_data_hora.'<br>';
		$saida_odo = '0';echo $saida_odo.'<br>';
		$chegada_data_hora = utf8_decode('0001-01-01 00:00:00'); echo $chegada_data_hora.'<br>';
		$chegada_odo = '0';echo $chegada_odo.'<br>';
		
		$situacao_ficha = 'Preparando';
		$observacao = '';		
		$now = date('Y-m-d H:i:s');
		
		//$comando = 'INSERT INTO 2becmb_lr_ficha (id_ficha, id_mat, motorista, ch_vtr, local_apresenta, data_hora_apresenta, ordenou, destino, missao, itinerario, cmt_su, enc_mnt, saida_data_hora, saida_odo, chegada_data_hora, chegada_odo, situacao_ficha, cadastrador, datahora_atualizado) VALUES (NULL, '.$id_mat.', '.$motorista.', '.$ch_vtr.', '.$local_apresenta.', '.$data_hora_apresenta.', '.$ordenou.', '.$destino.', '.$missao.', '.$itinerario.', '.$cmt_su.', '.$enc_mnt.', '.$saida_data_hora.', '.$saida_odo.', '.$chegada_data_hora.', '.$chegada_odo.', '.$situacao_ficha.', '.$cadastrador.', '.$now.')';
			
		//echo $comando;
	
		//exit();	

		if (!$id_mat || !$motorista || !$ch_vtr || !$local_apresenta || !$data_hora_apresenta || !$ordenou || !$destino || !$missao || !$itinerario || !$cmt_su || !$enc_mnt || !$saida_data_hora){
		echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_cadastra_ficha.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Todos os campos devem ser preenchidos.\");
                           </script>
                           "; exit;
		}
			// Se os dados forem inseridos com sucesso
			$sql = mysqli_query($link, "INSERT INTO 2becmb_lr_ficha (id_ficha, id_mat, motorista, ch_vtr, local_apresenta, data_hora_apresenta, data_apresenta, ordenou, destino, missao, itinerario, cmt_su, enc_mnt, saida_data_hora, saida_odo, chegada_data_hora, chegada_odo, situacao_ficha, observacao, cadastrador, data_hora_cadastro)
VALUES (NULL, '{$id_mat}', '{$motorista}', '{$ch_vtr}', '{$local_apresenta}', '{$data_hora_apresenta}', '{$data_apresenta}', '{$ordenou}', '{$destino}', '{$missao}', '{$itinerario}', '{$cmt_su}', '{$enc_mnt}', '{$saida_data_hora}', '{$saida_odo}', '{$chegada_data_hora}', '{$chegada_odo}', '{$situacao_ficha}', '{$observacao}', '{$cadastrador}', '{$now}')");
						
			            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_cadastra_ficha.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro cadastrar a ficha.\");
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
			$comando = 'INSERT INTO 2becmb_lr_ficha (id_ficha, id_mat, motorista, ch_vtr, local_apresenta, data_hora_apresenta, data_apresenta, ordenou, destino, missao, itinerario, cmt_su, enc_mnt, saida_data_hora, saida_odo, chegada_data_hora, chegada_odo, situacao_ficha, observacao, cadastrador, datahora_atualizado) VALUES (NULL, '.$id_mat.', '.$motorista.', '.$ch_vtr.', '.$local_apresenta.', '.$data_hora_apresenta.', '.$data_apresenta.', '.$ordenou.', '.$destino.', '.$missao.', '.$itinerario.', '.$cmt_su.', '.$enc_mnt.', '.$saida_data_hora.', '.$saida_odo.', '.$chegada_data_hora.', '.$chegada_odo.', '.$situacao_ficha.', '.$observacao.', '.$cadastrador.', '.$now.')';
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
					echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_ficha.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"A ficha foi cadastrada com sucesso! \");
                               </script>
							    <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>