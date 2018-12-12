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
		$id_os = trim($_POST['id']);
		$datahora_item = date('Y-m-d H:i:s');	
		$item_tipo = utf8_decode(trim($_POST['item_tipo']));
		$item_descricao = utf8_decode(trim($_POST['item_descricao']));
		$item_cadastrador = utf8_decode(trim($_POST['item_cadastrador']));
		$item_cod = trim($_POST['item_cod']);
		$item_valor_unit = trim($_POST['item_valor_unit']);
		$item_qtde = trim($_POST['item_qtde']);
		$item_valor_total = $item_qtde*$item_valor_unit;
		$ne = trim($_POST['ne']);
		$obs = utf8_decode(trim($_POST['obs']));
		
			// Altera os dados no banco de dados
			
			$sql = mysqli_query($link, "INSERT INTO 2becmb_mnt (id_mnt, id_os, datahora_item, item_tipo, item_descricao, item_cadastrador, item_cod, item_valor_unit, item_qtde, item_valor_total, ne, obs) VALUES
			(NULL, '{$id_os}', '{$datahora_item}', '{$item_tipo}', '{$item_descricao}', '{$item_cadastrador}', '{$item_cod}', '{$item_valor_unit}', '{$item_qtde}', '{$item_valor_total}', '{$ne}', '{$obs}')");
			//echo $id.'a'.$sit_doc.'b'.$doc; exit();            
			// Se os dados forem inseridos com sucesso
			if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_cadastra_mnt.php'>
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
			$comando = 'INSERT INTO 2becmb_mnt (id_mnt, id_os, datahora_item, item_tipo, item_descricao, item_cadastrador, item_cod, item_valor_unit, item_qtde, item_valor_total, ne, status_mnt, datahora_status, alterou_status, obs) VALUES (NULL, '.$id_os.', '.$datahora_item.', '.$item_tipo.', '.$item_descricao.', '.item_cadastrador.', '.$item_cod.', '.$item_valor_unit.', '.$item_qtde.', '.$item_valor_total.', '.$ne.', '.$status_mnt.', '.$datahora_status.', '.$alterou_status.', '.$obs.')';
			$sql_aud = mysqli_query($link, "INSERT INTO 2becmb_auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, '{$comando}', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)
					
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=2becmb_lr_mnt.php?id_os=$id_os'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"O cadastro foi realizado com sucesso! \");
                               </script>
							   <script>
								window.opener.location.reload();
								window.close();
								</script>
                                ";
					
					
				}



?>