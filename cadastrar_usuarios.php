<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 <link rel="shortcut icon" href="http://10.12.125.10/imagens/fav.png">
 <TITLE>Cadastro de usuários</TITLE>
</HEAD>

<BODY>

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
    $nivel_adm = $_SESSION['nivel_adm'];
	$posto_grad = $_SESSION['posto_grad'];
	$nome_guerra = $_SESSION['nome_guerra'];
	$cadastrador = $posto_grad.' '.$nome_guerra;

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT);

	// Recupera os dados dos campos

date_default_timezone_set('America/Sao_Paulo');

$posto_grad1 = trim($_POST['posto_grad']);
$posto_grad = utf8_decode(trim($_POST['posto_grad'])); echo $posto_grad.'<br>';
$nome_guerra = utf8_decode(trim($_POST['nome_guerra'])); echo $nome_guerra.'<br>';
$usuario = trim($_POST['usuario']); echo $usuario.'<br>';
$email = trim($_POST['email']); echo $email.'<br>';
$tel_movel = trim($_POST['tel_movel']); echo $tel_movel.'<br>';
$su = utf8_decode(trim($_POST['su'])); echo $su.'<br>';
$funcao = utf8_decode(trim($_POST['funcao'])); echo $funcao.'<br>';
$nome = utf8_decode(trim($_POST['nome'])); echo $nome.'<br>';
$nivel = 0; echo $nivel.'<br>';
$nivel_2becmb = 0; echo $nivel_2becmb.'<br>';
$nivel_adm = 0; echo $nivel_adm.'<br>';
$om = utf8_decode(trim($_POST['om'])); echo $om.'<br>';
$senha = $usuario;//trim($_POST['senha']); echo $senha.'<br>';
$senha1 = $usuario;//trim($_POST['senha1']); echo $senha1.'<br>';
$cnh = trim($_POST['cnh']); echo $cnh.'c<br>';
$especial = utf8_decode(trim($_POST['especial']));echo $especial.'e<br>';
$mot_militar = utf8_decode(trim($_POST['mot_militar']));echo $mot_militar.'m<br>';

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
echo $posto_grad_ord;
//exit();

if ((!$posto_grad)|| (!$posto_grad_ord) || (!$nome_guerra) || (!$email) || (!$usuario) || (!$tel_movel) || (!$su) || (!$funcao) || (!$nome) || (!$om) || (!$senha) || (!$senha1)){

	echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"ERRO: Por favor, preencha todos os campos!\");
                           </script>
                           "; exit();


}
else{

	/* Vamos checar se o nome de Usuário escolhido e/ou Email já existem no banco de dados */

	$sql_email_ = "SELECT COUNT(id_usu) FROM usu WHERE email='{$email}'";
	$sql_email_check = mysqli_query($link, $sql_email_);
	$sql_usuario_ = "SELECT COUNT(id_usu) FROM usu WHERE usuario='{$usuario}'";
	$sql_usuario_check = mysqli_query($link, $sql_usuario_);

	$eReg = mysqli_fetch_array($sql_email_check);
	$uReg = mysqli_fetch_array($sql_usuario_check);

	$email_check = $eReg[0];
	$usuario_check = $uReg[0];

	if (($email_check > 0) || ($usuario_check > 0)){

//		echo "<strong>ERRO </strong>- Por favor corrija os seguintes erros abaixo: <br /> <br />";

		if ($email_check > 0){

		    echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.html'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Este email:(".$email.") já está sendo utilizado. Por favor utilize outra conta de email!\");
                           </script>
                           ";
            // "Este email ( <strong>".$email."</strong> ) já está sendo utilizado.<br />Por favor utilize outra conta de email! <br />";

		    unset($email);

		}

		if ($usuario_check > 0){

			echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.html'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Este CPF:(".$usuario.") já está cadastrado!\");
                           </script>
                           ";
            // "Este nome de usuário ( <strong>".$usuario."</strong> ) já está sendo utilizado.<br />Por favor utilize outro nome de usuário!<br />";

			unset($usuario);

		}

		echo "<br />";

	}
	else
	{

		$email2 = strtolower($email);
		$char = "@";
		$pos = strpos($email2, $char);

        if ($pos === false){

			echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.html'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"O endereço de email: (".$email."), que está tentando utilizar, não é válido. Por favor, utilize um email válido.\");
                           </script>
                           ";

        }else{

            //$v_mail = verifica_email($email);

            if ($email){

                /* Se passarmos por esta verificação ilesos é hora de finalmente cadastrar
	    	    os dados. Primeiro a senha */

				if ($senha === $senha1){$senha = md5($senha);}else{
					
				echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"As senhas digitadas não conferem. Por favor, digite as mesmas senhas.\");
                           </script>
                           "; exit();	
					
				}

				
				
//exit($senha.'-'.$usuario.'-'.$email.'-'.$posto_grad.'-'.$nome.'-'.$nome_guerra.'-'.$nivel.'-'.$su.'-'.$funcao.'-'.$tel_movel);
				// Inserindo os dados no banco de dados

				$cnh_val = '';
				$coletivo = 0;
				$operador = 0;
				$qm = '';
				$eqp_opera = '';
				
				 $info = htmlspecialchars($info);
	//$link = mysqli_connect("10.12.125.10","root","","2becmb");
    $sql = "INSERT INTO usu (id_usu, posto_grad, posto_grad_ord, nome, nome_guerra, email, usuario, tel_movel, senha, om, su, funcao, nivel, nivel_2becmb, nivel_adm, cnh, cnh_val, especial, coletivo, mot_militar, operador, qm, eqp_opera) 
	VALUES(NULL, '{$posto_grad}', '{$posto_grad_ord}', '{$nome}', '{$nome_guerra}', '{$email}', '{$usuario}', '{$tel_movel}', '{$senha}', '{$om}', '{$su}', '{$funcao}', '{$nivel}', '{$nivel_2becmb}', '{$nivel_adm}', '{$cnh}', '{$cnh_val}', '{$especial}', '{$coletivo}', '{$mot_militar}', '{$operador}', '{$qm}', '{$eqp_opera}')";
	mysqli_query ($link, $sql);

				if (!$sql){

					echo "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"Ocorreu algum erro.\");
                           </script>
                           "; 
							}
                    //"Ocorreu algum erro ao criar sua conta, por favor entre em contato com o Webmaster.";
				
				else {
                    echo "
								<META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.php'>
								<script type=\"text/javascript\" charset=UTF-8>
								alert(\"Anote os dados para acesso ao Sistema: Usuário->( {$usuario} ) Senha-> ( {$senha1} ) \");
                               </script>
                                ";
					
					
				}

            }else{  "
                           <META HTTP-EQUIV=REFRESH CONTENT='0; URL=cadastra_usuarios.php'>
                           <script type=\"text/javascript\" charset=UTF-8>
                           alert(\"O endereço de email: (".$email."), que está tentando utilizar, não é válido. Por favor, utilize um email válido.\");
                           </script>
                           ";

            }

        }

    }

}

?>
</BODY>
</html>
