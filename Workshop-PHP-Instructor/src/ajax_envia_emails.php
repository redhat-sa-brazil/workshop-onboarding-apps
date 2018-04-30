<?php
require_once "config.php";
if(!isset($_SESSION['sessao'])) {
        header("Location: login.html");
        exit;
}
$Instructor = new Instructor();
if(isset($_GET['id_student'])) {
    $id_student = intval($_GET['id_student']);
    $Instructor->EnviaEmailFinalAluno($id_student);
}
if(isset($_GET['envia_email_todos'])) {
    $Instructor->EnviaEmailFinalTodosAlunos();
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>