<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['message']="Saiste da conta com sucesso.";
    header("location:index.php");
?>