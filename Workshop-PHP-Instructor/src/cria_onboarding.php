<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Red Hat Cloud Demo </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->

	
        <div class="right_col" role="main">
	<?php
	require_once "config.php";
	$nome_aluno = $_POST['user'];
	$email_aluno = $_POST['email_aluno'];
	$empresa = $_POST['empresa'];
	$id_area = $_POST['id_area'];

	if (filter_var($email_aluno, FILTER_VALIDATE_EMAIL)) {
	$Sub = explode("@", $email_aluno);
	$prefixo = strtolower($Sub[0]);
	$Subdominio = explode(".", $Sub[1]);
	$sufixo = strtolower($Subdominio[0]);
	$user = $prefixo."-".$sufixo;
	$Student = new Student;
	$Student->nome = $nome_aluno;
	$Student->empresa = $empresa;
	$Student->email = $email_aluno;
	$Student->id_area = $id_area;
	$Instructor = new Instructor;
	// Circuit breaker!
	if($Instructor->VerificaTotalAlunos() > 50) {
		exit;
	}


	if(!$Instructor->VerificaSeAlunoJaExiste($Student)) {
	$Instructor->CadastraAluno($Student);
	$user = str_replace(".", "-", $user);
	$user = str_replace("_", "-", $user);

// =================================
// Carrega configuracoes salvas
// =================================
// =================================
// Variaveis de arquivo
// =================================
$config_yaml = "/etc/ansible/playbooks/workshop-onboarding/config.yml";
$arquivo_json = "/etc/ansible/playbooks/gce.json";
$chave_ssh = "/etc/ansible/playbooks/ssh_gce";


$Matriz = file("$config_yaml");
$Vars = array();
for($x=0;$x<sizeof($Matriz);$x++) {
        $linha = $Matriz[$x];
        if(ereg(":", $linha)) {
        	$Sub = explode(": ", $linha);
        	$chave = $Sub[0];
        	$valor = $Sub[1];
        	$Vars[$chave] = $valor;
	}
}


	if(intval($Vars['tipo_workshop']) == "1") {
	$comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_student_instance_openshift.yml -e \"nome_aluno=$nome_aluno user=$user email_aluno=$email_aluno\"";
	}
	if(intval($Vars['tipo_workshop']) == "2") {
	$comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_student_instance_ansible.yml -e \"nome_aluno=$nome_aluno user=$user email_aluno=$email_aluno\"";
	}

	$outputfile = "/tmp/$user-log.txt";
	$pidfile = "/tmp/$user-pid.txt";
	$commandfile = "/tmp/$user-cmd.txt";
	$fp = fopen($commandfile, "w+");
	fputs($fp, $comando);
	fclose($fp);
	exec(sprintf("%s > %s 2>&1 & echo $! >> %s", $comando, $outputfile, $pidfile));
		$msg = "Voce recebera um email com detalhes para conexao";
	?>
	<?php
	} else {
		$msg = "Erro ao solicitar instancia... verifique seu email...";
	?>
	<?php
	}
	} else {
		$msg = "Sua instancia ja foi solicitada...";
	}
	?>
  <div class="col-md-6">
              <div class="x_panel">
<div class="x_content bs-example-popovers">

                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <strong><?php echo $msg;?></strong>
                  <button type="button" class="btn btn-primary" onclick="window.close();">Fechar Janela</button>
                  </div>
		
                </div>


</div>

</div>
</div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
