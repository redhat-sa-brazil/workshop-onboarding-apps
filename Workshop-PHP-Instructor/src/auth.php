<?php
if($_POST['usuario'] == "admin" and $_POST['senha'] == "redhat") {
	$_SESSION['sessao'] = "sessao";
}
header("Location: index.php");
?>
