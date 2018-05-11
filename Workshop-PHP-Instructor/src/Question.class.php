<?php
	require_once "config.php";
	class Question {
             public $id_pergunta;
             public $pergunta;
             public $Mopcoes;
             
             public function CadastraPergunta($pergunta, $Mopcoes) {
                 echo "Pergunta: $pergunta<br>";
                 print_r($Mopcoes);
             }
             
             public function BuscaPerguntas() {
                 $json = '{
    "_embedded": {
        "question": [
            {
                "id": 1,
                "description": "Qual sua cor favorita?",
                "options": [
                    {
                        "id": 2,
                        "description": "Vermelho"
                    },
                    {
                        "id": 3,
                        "description": "Azul"
                    },
                    {
                        "id": 4,
                        "description": "Amarelo"
                    }
                ],
                "enabled": true,
                "_links": {
                    "self": {
                        "href": "http://localhost:8080/rest/question/1"
                    },
                    "question": {
                        "href": "http://localhost:8080/rest/question/1"
                    }
                }
            },
            {
                "id": 5,
                "description": "Você conhece docker?",
                "options": [
                    {
                        "id": 6,
                        "description": "Sim"
                    },
                    {
                        "id": 7,
                        "description": "Não"
                    }
                ],
                "enabled": false,
                "_links": {
                    "self": {
                        "href": "http://localhost:8080/rest/question/5"
                    },
                    "question": {
                        "href": "http://localhost:8080/rest/question/5"
                    }
                }
            }
        ]
    },
    "_links": {
        "self": {
            "href": "http://localhost:8080/rest/question{?page,size,sort}",
            "templated": true
        },
        "profile": {
            "href": "http://localhost:8080/rest/profile/question"
        }
    },
    "page": {
        "size": 20,
        "totalElements": 2,
        "totalPages": 1,
        "number": 0
    }
}';
                 $ObjetoJson = json_decode($json);
                 $MatrizPerguntas = $ObjetoJson->_embedded->question;
                 $MatrizFinal = array();
                 $cont=0;
                 //print_r($MatrizPerguntas);
                 for($x=0;$x<sizeof($MatrizPerguntas);$x++) {
                     $Objeto = $MatrizPerguntas[$x];
                     $MatrizFinal[$cont]['id_pergunta'] = $Objeto->id;
                     $MatrizFinal[$cont]['pergunta'] = $Objeto->description;
                     $MatrizFinal[$cont++]['Mopcoes'] = json_decode($Objeto->options, true);
                 }
                // print_r($MatrizFinal);
                 return $MatrizFinal;
                 
                 
             }
             
             public function AlteraPergunta($id_pergunta, $pergunta, $Mopcoes) {
                 echo "alterada!";
             }
             
             public function DeletaPergunta($id_pergunta) {
                 echo "excluida!";
             }
	}
?>
