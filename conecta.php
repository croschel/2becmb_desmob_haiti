<?php
    header('Content-Type: text/html; charset=UTF-8');

    if(!isset($_SESSION['usuario']) AND !isset($_SESSION['senha'])) {
   header("Location: index.php");
   exit;
  }

    if($_SESSION['final'] < time()){
   header("Location: session_destroy.php");
   exit;
   }
    
	$link = mysqli_connect("localhost","root","","2becmb") or die("Banco de Dados incorreto" . mysqli_error($link));

    $usuario = $_SESSION['usuario'];
    $nivel = $_SESSION['nivel'];
	

?>