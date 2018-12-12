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
		$tipo_mnt = utf8_decode(trim($_POST['tipo_mnt']));echo $tipo_mnt.'<br>';
		$disponibilidade = utf8_decode(trim($_POST['disponibilidade']));echo $disponibilidade.'<br>';
		$odometro = utf8_decode(trim($_POST['odometro']));echo $odometro.'<br>';
		$xpainel = utf8_decode(trim($_POST['xpainel']));echo $xpainel.'<br>';
		$xdisp_seg = utf8_decode(trim($_POST['xdisp_seg']));echo $xdisp_seg.'<br>';
		$xmotor = utf8_decode(trim($_POST['xmotor']));echo $xmotor.'<br>';
		$xeletrica = utf8_decode(trim($_POST['xeletrica']));echo $xeletrica.'<br>';
		$xsuspensao = utf8_decode(trim($_POST['xsuspensao']));echo $xsuspensao.'<br>';
		$xfreio = utf8_decode(trim($_POST['xfreio']));echo $xfreio.'<br>';
		$xdirecao = utf8_decode(trim($_POST['xdirecao']));echo $xdirecao.'<br>';
		$xtransmissao = utf8_decode(trim($_POST['xtransmissao']));echo $xtransmissao.'<br>';
		$xbateria = utf8_decode(trim($_POST['xbateria']));echo $xbateria.'<br>';
		$xvisao = utf8_decode(trim($_POST['xvisao']));echo $xvisao.'<br>';
		$xcabine = utf8_decode(trim($_POST['xcabine']));echo $xcabine.'<br>';
		$xreboque = utf8_decode(trim($_POST['xreboque']));echo $xreboque.'<br>';
		$xhidraulica = utf8_decode(trim($_POST['xhidraulica']));echo $xhidraulica.'<br>';
		$xguincho = utf8_decode(trim($_POST['xguincho']));echo $xguincho.'<br>';
		$xanfibio = utf8_decode(trim($_POST['xanfibio']));echo $xanfibio.'<br>';
		$xlubrificacao = utf8_decode(trim($_POST['xlubrificacao']));echo $xlubrificacao.'<br>';
		$xpneus = utf8_decode(trim($_POST['xpneus']));echo $xpneus.'<br>';
		$cadastrador = $posto_grad.' '.$nome_guerra; echo $cadastrador.'<br>';
		$now = date('Y-m-d H:i:s'); echo $now.'<br>';
		$datahora_entrada = trim($_POST['data_entrada']).' '.trim($_POST['hora_entrada']).':00'; echo $datahora_entrada.'<br>';
		$verificador = utf8_decode(trim($_POST['verificador']));echo $verificador.'<br>';
		$status = utf8_decode('Processando');echo $status.'<br>';
		$datahora_pronto =trim($_POST['data_pronto']).' '.trim($_POST['hora_pronto']).':00';echo $datahora_pronto.'<br>';
		$liberacao = utf8_decode(trim($_POST['liberacao'])); echo $liberacao.'<br>';
		$datahora_liberado = trim($_POST['data_liberado']).' '.trim($_POST['hora_liberado']).':00';echo $datahora_liberado.'<br>';
		$observacao = utf8_decode(trim($_POST['observacao']));echo $observacao.'<br>';
		
		//exit();		
		
		
		//$comando = 'INSERT INTO 2becmb_lr_ficha (id_ficha, id_mat, motorista, ch_vtr, local_apresenta, data_hora_apresenta, ordenou, destino, missao, itinerario, cmt_su, enc_mnt, saida_data_hora, saida_odo, chegada_data_hora, chegada_odo, situacao_ficha, cadastrador, datahora_atualizado) VALUES (NULL, '.$id_mat.', '.$motorista.', '.$ch_vtr.', '.$local_apresenta.', '.$data_hora_apresenta.', '.$ordenou.', '.$destino.', '.$missao.', '.$itinerario.', '.$cmt_su.', '.$enc_mnt.', '.$saida_data_hora.', '.$saida_odo.', '.$chegada_data_hora.', '.$chegada_odo.', '.$situacao_ficha.', '.$cadastrador.', '.$now.')';
			
		//echo $comando;
	
		// exit();	

		if (!$id_mat || !$tipo_mnt || !$disponibilidade || !$cadastrador){
		echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_cadastra_os.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Todos os campos devem ser preenchidos.\");
                           </script>
                           "; exit;
		}
			// Se os dados forem inseridos com sucesso
			$sql = mysqli_query($link, "INSERT INTO 2becmb_os (id_os, id_mat, tipo_mnt, disponibilidade, odometro, xpainel, xdisp_seg, xmotor, xeletrica, xsuspensao, xfreio, xdirecao, xtransmissao, xbateria, xvisao, xcabine, xreboque, xhidraulica, xguincho, xanfibio, xlubrificacao, xpneus, cadastrador, datahora_cadastro, datahora_entrada, verificador, status, datahora_pronto, liberacao, datahora_liberado, observacao)
														VALUES (NULL, '{$id_mat}', '{$tipo_mnt}', '{$disponibilidade}', '{$odometro}', '{$xpainel}', '{$xdisp_seg}', '{$xmotor}', '{$xeletrica}', '{$xsuspensao}', '{$xfreio}', '{$xdirecao}', '{$xtransmissao}', '{$xbateria}', '{$xvisao}', '{$xcabine}', '{$xreboque}', '{$xhidraulica}', '{$xguincho}', '{$xanfibio}', '{$xlubrificacao}', '{$xpneus}', '{$cadastrador}', '{$now}', '{$datahora_entrada}', '{$verificador}', '{$status}', '{$datahora_pronto}', '{$liberacao}', '{$datahora_liberado}', '{$observacao}')");
						
			            
				
			
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_cadastra_os.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro ao cadastrar a Ordem de Serviço.\");
                           </script>
                           ";
							}
                    
					
				
				else {
			// 1. Atualização da Sit Mnt na tabela 2becmb_material
				$sql_mnt = "SELECT * FROM 2becmb_os WHERE id_mat LIKE '$id_mat' AND disponibilidade LIKE 'Indispon%'";
				$query_mnt = mysqli_query($link, $sql_mnt);
		
				// contador de registros de material indisponível
				$sit_mnts = mysqli_num_rows($query_mnt);
				if ($sit_mnts > 0){$sit=0;}else{$sit=1;}
				$sql = mysqli_query($link, "UPDATE 2becmb_material SET sit_mnt='$sit' WHERE id LIKE '$id_mat'");
					
            // 2. Gravar na tabela auditoria
			$cpf = $_SESSION['usuario'];
				$sql_i = "SELECT * FROM usu WHERE usuario LIKE '$cpf'";
				$query_i = mysqli_query($link, $sql_i);	
				$resultado_i = mysqli_fetch_assoc($query_i);
				$posto_grad = $resultado_i['posto_grad'];
				$nome_guerra = $resultado_i['nome_guerra'];
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$comando = 'INSERT INTO 2becmb_lr_os (id_os, id_mat, tipo_mnt, disponibilidade, odometro, xpainel, xdisp_seg, xmotor, xeletrica, xsuspensao, xfreio, xdirecao, xtransmissao, xbateria, xvisao, xcabine, xreboque, xhidraulica, xguincho, xanfibio, xlubrificacao, xpneus, cadastrador, datahora_cadastro, datahora_entrada, verificador, status, datahora_pronto, liberacao, datahora_liberado, observacao)VALUES (NULL, '.$id_mat.', '.$tipo_mnt.', '.$disponibilidade.', '.$odometro.', '.$xpainel.', '.$xdisp_seg.', '.$xmotor.', '.$xeletrica.', '.$xsuspensao.', '.$xfreio.', '.$xdirecao.', '.$xtransmissao.', '.$xbateria.', '.$xvisao.', '.$xcabine.', '.$xreboque.', '.$xhidraulica.', '.$xguincho.', '.$xanfibio.', '.$xlubrificacao.', '.$xpneus.', '.$cadastrador.', '.$now.', '.$datahora_entrada.', '.$verificador.', '.$status.', '.$datahora_pronto.', '.$liberacao.', '.$datahora_liberado.', '.$observacao.') e mudou a Sit Mnt para:'.$sit;
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
					echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_os.php?id=$id_mat'>
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