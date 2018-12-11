<?php
  header('Content-Type: text/html; charset=UTF-8');
  session_start();

  unset($_SESSION['login']);
  unset($_SESSION['senha']);

        session_destroy();

  echo "
                           <script type=\"text/javascript\">
                           alert(\"Desculpe! Sua sessão foi finalizada! \");
                           </script>
                           <script language=\"Javascript\">
                           window.top.location.href = 'index.php';
                           </script>

                           ";

     exit();
        


?>
