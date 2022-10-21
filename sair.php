<?php
session_start();
ob_start();
unset($_SESSION['id'], $_SESSION['usuario']);
$_SESSION['msg'] = "<p style='color: green'> Deslogado com sucesso!";
?>

<meta http-equiv="refresh" content="3, url=http://localhost/senac/concessionar/index.php"/>