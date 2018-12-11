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

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$usuario = $_POST['usuario']; echo $usuario;
$senha1 = $_POST['senha_ant']; echo '1-'.$senha1;
$senha2 = $_POST['nova_senha1']; echo '; 2-'.$senha2;
$senha3 = $_POST['nova_senha2']; echo '; 3-'.$senha3;

//exit();



if (!$usuario || !$senha1 || !$senha2 || !$senha3){

	echo "
           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=altera_senha.php'>
           <script type=\"text/javascript\">
           alert(\"ERRO: Por favor, preencha todos os campos!\");
           </script>
           ";

	}

	// Checando se o usuario informado está cadastrado
		
	$sql = "SELECT * FROM usu WHERE usuario='{$usuario}'";
	$sql_check = mysqli_query($link, $sql);
	$sql_check_num = mysqli_num_rows($sql_check);

	if($sql_check_num == 0){

		echo  "
           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=altera_senha.php'>
           <script type=\"text/javascript\">
           alert(\"Usuário não cadastrado.\");
           </script>
           ";



		exit();

	}
	
	// Checando se a senha antiga digitada está correta
		
	$senha1m = md5($senha1); echo $senha1m; //exit();
	
	$sql = "SELECT * FROM usu WHERE senha='{$senha1m}'";
	$sql_check = mysqli_query($link, $sql);
	$sql_check_num = mysqli_num_rows($sql_check);

	if($sql_check_num == 0){

		echo  "
           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=altera_senha.php'>
           <script type=\"text/javascript\">
           alert(\"Senha antiga não confere.\");
           </script>
           ";



		exit();

	}
	
	// Checando se as novas senhas digitadas são iguais
		
	if ($senha2 != $senha3){

		echo  "
           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=altera_senha.php'>
           <script type=\"text/javascript\">
           alert(\"A novas senhas digitadas não são iguais.\");
           </script>
           ";



		exit();

	}
	
	//Se deu tudo certo, agora vamos alterar o banco de dados
	$senha2m = md5($senha2);
	$sql = mysqli_query($link, "UPDATE usu SET senha='$senha2m' WHERE usuario LIKE '$usuario'");
	
	
	if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=altera_senha.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro ao alterar senha.\");
                           </script>
                           ";
							} else {

	echo "
             <META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
             <script type=\"text/javascript\">
             alert(\"Sua senha foi alterada com sucesso!\");
             </script>
							";}





?>
