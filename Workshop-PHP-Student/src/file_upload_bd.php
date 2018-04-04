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
$uploadfile = basename($_FILES['file']['name']);
$path = $_FILES['file']['tmp_name'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$tipo = mime_content_type($path); 
$data = file_get_contents($path);
//$base64 = 'data:' . $tipo . ';base64,' . base64_encode($data);
$base64 = base64_encode($data);
$hash = md5($base64);

$time_end = microtime_float();
$time = $time_end - $time_start;
$qr = "insert into demo_images set
nome_imagem = '$uploadfile',
hash_imagem = '$hash',
imagem = '$base64',
tipo = '$tipo',
tempo_ms = '$time'
";
$rs = mysql_query($qr, $id);

/*

| id_image    | int(11)      | NO   | PRI | NULL    | auto_increment |
| nome_imagem | varchar(255) | YES  |     | NULL    |                |
| hash_imagem | varchar(255) | YES  |     | NULL    |                |
| imagem      | text         | YES  |     | NULL    |                |
| tipo        | varchar(4)   | YES  |     | NULL    |                |

echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";
*/
// Fecha conexao com o banco...
mysql_close($id);


?>
