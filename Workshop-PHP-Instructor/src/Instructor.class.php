<?php
	require_once "config.php";
	class Instructor {
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
	}
?>
