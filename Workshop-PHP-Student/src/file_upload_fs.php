<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}









// Conecta ao Banco e seleciona db

$id = mysql_connect("localhost", "root", "");
mysql_select_db("demo", $id);


$time_start = microtime_float();

$uploaddir = '/var/www/html/uploads/';

$path = $_FILES['file']['tmp_name'];
$tipo = mime_content_type($path); 
$hash = md5_file($path);

$time_end = microtime_float();
$time = $time_end - $time_start;
$qr = "insert into demo_images set
nome_imagem = '$uploadfile',
hash_imagem = '$hash',
imagem = '',
tipo = '$tipo',
tempo_ms = '$time'
";
$rs = mysql_query($qr, $id);
$Sub = explode("/", $tipo);
$tipo_arquivo = $Sub[1];

$uploadfile = $uploaddir."/".$hash.".$tipo_arquivo";
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

// Fecha conexao com o banco...
mysql_close($id);


?>
