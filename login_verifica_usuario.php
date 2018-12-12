<?php
header('Content-Type: text/html; charset=UTF-8');

session_cache_expire(1);

session_start();  // Inicia a session

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
date_default_timezone_set('America/Sao_Paulo');

$link = mysqli_connect("localhost","root","","2becmb") or die("Erro de Banco de Dados" . mysqli_error($link));

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
//echo $usuario;
//echo $senha;

$nivel_0 = 0;
$senha = md5($senha);
$senhanula = 'd41d8cd98f00b204e9800998ecf8427e';

$sql1 = "SELECT * FROM usu WHERE usuario = '$usuario' AND senha = '$senha'";
$sql = mysqli_query ($link, $sql1);

$sql3 = "SELECT * FROM usu WHERE usuario = '$usuario' ";
$sql2 = mysqli_query ($link, $sql1);
$dados = mysqli_fetch_array($sql,mysqli_assoc);
$niv1 = $dados["nivel"];
$niv2 = $dados["nivel_2becmb"];
$niv3 = $dados["nivel_adm"];
//echo $niv;
$login_check = mysqli_num_rows($sql);
echo $login_check;




if((!$usuario) || ($senha == $senhanula)){
        
	echo "
    <META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
    <script type=\"text/javascript\"  charset=UTF-8>
    alert(\"Por favor, todos campos devem ser preenchidos!\");
    </script>
    "; exit();
}


if($login_check > 0){

		while($row = mysqli_fetch_array($sql)){

			foreach( $row AS $key => $val ){
				$$key = stripslashes( $val );
			}
			$_SESSION['id_usu'] = $id_usu;
			$_SESSION['nome'] = $nome;
			$_SESSION['nome_guerra'] = $nome_guerra;
			$_SESSION['posto_grad'] = $posto_grad;
			$_SESSION['om'] = $om;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			$_SESSION['nivel'] = $nivel;
			$_SESSION['nivel_adm'] = $nivel_adm;
			$_SESSION['nivel_2becmb'] = $nivel_2becmb;
			$_SESSION['funcao'] = $funcao;
			$_SESSION['su'] = $su;
			$_SESSION['tel_movel'] = $tel_movel;
			$_SESSION['email'] = $email;
			
			$_SESSION['inicio'] = time();
			// Configuração de tempo para encerrar a SESSÃO (x * Quantidade de segundos). Para 1 minuto  (1 * 60)
			// Para 1 hora (60 * 60). Para 1 dia (24 * 60 * 60).
			$_SESSION['final'] = $_SESSION['inicio'] + (2*60*60);
			
			// Gravar na tabela auditoria
			$cpf = $_SESSION['usuario'];
				$sql_i = "SELECT * FROM usu WHERE usuario LIKE '$cpf'";
				$query_i = mysqli_query($link, $sql_i);	
				$resultado_i = mysqli_fetch_assoc($query_i);
				$posto_grad = $resultado_i['posto_grad'];
				$nome_guerra = $resultado_i['nome_guerra'];
			$om = $_SESSION['om'];
			$now = date('Y-m-d H:i:s');
			$sql = mysqli_query($link, "INSERT INTO auditoria (id_auditoria, comando, posto_grad, nome_guerra, usuario, om, datahora_comando)VALUES (NULL, 'Entrou no Sistema', '{$posto_grad}', '{$nome_guerra}', '{$cpf}', '{$om}', '{$now}')");
			// Gravar na tabela auditoria (FIM)

			header("Location: index0.php");

			}
 


 if (($niv1 < 1)&&($niv2 < 1)&&($niv3 < 1)) { echo "
    <META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
    <script type=\"text/javascript\"  charset=UTF-8>
    alert(\"Conta não ativada!\");
    </script>
    "; exit();
			} 
} else {
		
		echo "
             <META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
             <script type=\"text/javascript\"  charset=UTF-8>
             alert(\"Login falhou. Verifique se usuário e senha estão corretos! Primeira vez: contate o Adm Sistema\");
             </script>
             ";

include "index.php";}
?>
