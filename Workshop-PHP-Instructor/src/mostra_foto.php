<?php
$id_imagem = intval($_GET['id_imagem']);
$id = mysql_connect("localhost", "root", "");
mysql_select_db("demo", $id);
$qr = "select * from demo_images where id_image = '$id_imagem'";
$rs = mysql_query($qr, $id);
$tipo = mysql_result($rs, 0, 'tipo');
$base64 = mysql_result($rs, 0, 'imagem');
header('Content-type: '.$tipo);
echo base64_decode($base64);
mysql_close($id);
?>
