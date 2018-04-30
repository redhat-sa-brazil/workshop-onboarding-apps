<?php
	require_once "config.php";
	class Instructor {
            
                public $email_remetente;
                
		public function ObtemAreas () {
			$Db = new Db;
			$qr = "select * from area";
			$rs = $Db->m_query($qr);
			$Mareas = array();
			$cont=0;
			while($x=$Db->m_fetch_array($rs)) {
				$Mareas[$cont]['id_area'] = $x['id_area'];
				$Mareas[$cont++]['area'] = $x['area'];
			}
			$Db->m_close();
			return $Mareas;
		}

		public function CadastraAluno($Student) {
			$Db = new Db;
			$nome = $Student->nome;
			$empresa = $Student->empresa;
			$id_area = $Student->id_area;
			$email = $Student->email;
			$qr = "insert into student set nome = '$nome', id_area = '$id_area', empresa = '$empresa', email = '$email', dthr_registro = now()";
			$rs = $Db->m_query($qr);
			$Db->m_close();
		}

		public function VerificaSeAlunoJaExiste($Student) {
			$Db = new Db;
			$email = $Student->email;
			$qr = "select id_student from student where email = '$email'";
			$rs = $Db->m_query($qr);
			if($Db->m_num_rows($rs) > 0) {
				$Db->m_close();
				return true;
			} else {
				$Db->m_close();
				return false;
			}
		}

		public function VerificaTotalAlunos() {
 			$Db = new Db;
                        $email = $Student->email;
                        $qr = "select count(id_student) as contagem from student";
                        $rs = $Db->m_query($qr);
			return $Db->m_result($rs, 'contagem');
		}
                
                public function EnviaEmailFinalAluno($id_student) {
 			$Db = new Db;
                        $qr = "select email from student where id_student = '$id_student'";
                        $rs = $Db->m_query($qr);
			$email = $Db->m_result($rs, 'email');
                        $this->ObtemConfiguracoes();
                        
                        
                        
                        
                      
                        
		}
                
                 public function EnviaEmailFinalTodosAlunos() {
 			$Db = new Db;
                        $qr = "select email from student";
                        $rs = $Db->m_query($qr);
                        $this->ObtemConfiguracoes();
                        while($x=$Db->m_fetch_array($rs)) {
                            $email = $x['email'];


                            $to = $email;

                            $subject = 'Workshop/Test-Drive Finalizado';

                            $headers = "From: " . $this->email_remetente . "\r\n";
                            $headers .= "Reply-To: ". $this->email_remetente . "\r\n";
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                            $message = file_get_contents("/var/www/html/template_email_final.html");


                            mail($to, $subject, $message, $headers);
                        }
                        
		}
                
                public function ObtemConfiguracoes() { 
                    
                    // =================================
                    // Variaveis de arquivo
                    // =================================
                    $config_yaml = "/etc/ansible/playbooks/workshop-onboarding/config.yml";
                    $config_yaml_pv = "/workshop-pv/config.yml";
                    $arquivo_json = "/etc/ansible/playbooks/gce.json";
                    $arquivo_json_pv = "/workshop-pv/gce.json";
                    $chave_ssh = "/etc/ansible/playbooks/ssh_gce";
                    $chave_ssh_pv = "/workshop-pv/ssh_gce";
                    
                    // =================================
                    // Carrega configuracoes salvas
                    // =================================
                    if(file_exists($config_yaml_pv)) {
                            $Matriz = file("$config_yaml_pv");
                    } else {
                            $Matriz = file("$config_yaml");
                    }
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
                    if(file_exists($chave_ssh_pv)) {
                            $conteudo_chave_ssh = file_get_contents("$chave_ssh_pv");
                    } else {
                            $conteudo_chave_ssh = file_get_contents("$chave_ssh");
                    }
                    if(file_exists($arquivo_json_pv)) {
                            $conteudo_json_gce = file_get_contents("$arquivo_json_pv");
                    } else {
                            $conteudo_json_gce = file_get_contents("$arquivo_json");
                    }

                    if(file_exists($arquivo_json_pv)) {
                            $JsonGCE = json_decode(file_get_contents("$arquivo_json_pv"));
                    } else { 
                            $JsonGCE = json_decode(file_get_contents("/etc/ansible/workshop-stuff/conteudo_json_gce.json"));
                    }
                    
                    $this->email_remetente = $Vars['email_remetente'];

                }
                
                public function EnviaEmailFinalAnsible($email_aluno) {
                    /*
                    if(intval($Vars['tipo_workshop']) == "1") {
                        $comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_student_instance_openshift.yml -e \"nome_aluno=$nome_aluno user=$user email_aluno=$email_aluno\"";
                    }
                    if(intval($Vars['tipo_workshop']) == "2") {
                        $comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_student_instance_ansible.yml -e \"nome_aluno=$nome_aluno user=$user email_aluno=$email_aluno\"";
                    }
                     * 
                     */
                    $comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_email.yml -e \"email_aluno=$email_aluno\"";
                    $rand = rand();
                    $outputfile = "/tmp/$rand-log.txt";
                    $pidfile = "/tmp/$rand-pid.txt";
                    $commandfile = "/tmp/$rand-cmd.txt";
                    exec(sprintf("%s > %s 2>&1 & echo $! >> %s", $comando, $outputfile, $pidfile));
                }
                
	}
?>
