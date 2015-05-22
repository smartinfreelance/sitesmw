<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preguntas extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('preguntascrud');
        $this->load->model('topicscrud');
        $this->load->model('logincrud');
    }

	public function index()
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		if($this->session->userdata('idusuario_tt')){
			$all_topics = $this->topicscrud->getAllTopics();

			$li_content = array();

			foreach($all_topics as $at){
				$vidas_mp = 0;				
				$vidas_ms = 0;
				$cant_jug_mp = $this->topicscrud->getCantTries($at->id, $this->session->userdata('idusuario_tt'), 1 ,date("Y-m-d"));
				$cant_jug_ms = $this->topicscrud->getCantTries($at->id, $this->session->userdata('idusuario_tt'), 2 ,date("Y-m-d"));

				$vidas_mp = 3 - $cant_jug_mp;
				$vidas_ms = 3 - $cant_jug_ms;
				$ml = $vidas_ms + $vidas_mp;

				if($ml>0){
					$ver_ml = false;
				}else{
					$ver_ml = true;
				}


				$li_content[] = array("id_topic" => $at->id, "vidas_mp" => $vidas_mp, "vidas_ms" => $vidas_ms, "ver_ml" => $ver_ml);
			}
			
			$this->load->view('main', 
								array(
									"modulo" => 'menu',
									"pagina" => 'panel',
									"topics" => $all_topics,
									"li_content" => $li_content
									));
		}else{
			$this->load->view('login');
		}

	}

	public function modoLectura($id=0)
	{
		if($this->session->userdata('idusuario_tt')){
			$preguntas = $this->preguntascrud->getAllPreguntasByTopic($id);
			$this->load->view('main', 
								array(
									"modulo" => 'preguntas',
									"pagina" => 'lectura',
									"preguntas" => $preguntas
									));
		}else{
			$this->load->view('login');
		}
	}

	public function modoSimulador($id=0){
		if($this->session->userdata('idusuario_tt')){
			
			$cant_tries = $this->topicscrud->getCantTries($id,$this->session->userdata('idusuario_tt'),2,date("Y-m-d"));

			if($cant_tries < 3){
				$id_try = $this->topicscrud->addTry($id,$this->session->userdata('idusuario_tt'),2);
				$preguntas = $this->preguntascrud->getPreguntasByTopic($id);
				$filtro = "";
				foreach($preguntas as $p){
					if($filtro == ""){
						$filtro = " and respuestas.id_pregunta in (".$p->id;
					}else{
						$filtro = $filtro.", ".$p->id;
					}
				}

				$filtro = $filtro.") ";
				$respuestas = $this->preguntascrud->getAllRespuestas($filtro);

				$this->load->view('main', 
									array(
										"modulo" => 'preguntas',
										"pagina" => 'simulador',
										"preguntas" => $preguntas,
										"respuestas" => $respuestas,
										"id_topic" => $id,
										"id_try" => $id_try
										));
			}else{
				$my_scores_hoy = $this->topicscrud->getMisScoresHoy($id,2,$this->session->userdata('idusuario_tt'));
				$vidas_mp = 0;				
				$vidas_ms = 0;
				$cant_jug_mp = $this->topicscrud->getCantTries($id, $this->session->userdata('idusuario_tt'), 1 ,date("Y-m-d"));
				$cant_jug_ms = $this->topicscrud->getCantTries($id, $this->session->userdata('idusuario_tt'), 2 ,date("Y-m-d"));

				$vidas_mp = 3 - $cant_jug_mp;
				$vidas_ms = 3 - $cant_jug_ms;
				$ml = $vidas_ms + $vidas_mp;

				$attributos = $this->topicscrud->get_attributos($id);

				$this->load->view('main', 
										array(
											"modulo" => 'preguntas',
											"pagina" => 'back_tomorrow',
											"scores" => $my_scores_hoy,
											"vidas_mp" => $vidas_mp,
											"vidas_ms" => $vidas_ms,
											"topic" => $attributos[0]->topic,
											"descripcion" => $attributos[0]->descripcion,
											"id_modo" => 1
											));
			}
		}else{
			$this->load->view('login');
		}
	}
	function finalizarSimulador($id=0){
		if($this->session->userdata('idusuario_tt')){
			$this->logincrud->setLog($this->session->userdata('idusuario_tt'),'Finaliza MSimulador');
			$correctas = 0;
			$c = 0;
			$total = 0;
			$pregResCorr = array();
			$pregResIncorr = array();
			if(isset($_POST["id_topic"])){
				$id_topic = $_POST["id_topic"];
			}else{
				$id_topic = $id;
			}

			$cant_preguntas = $this->preguntascrud->getCantPreguntasByTopic($id_topic);

			for($i = 1 ; $i <= $cant_preguntas ; $i++){
				$total++;
				$pregres = $_POST["pregunta".$i];
				$pyr = explode("-", $pregres);
				$c = $this->preguntascrud->comprobarRespuesta($pyr[0],$pyr[1]);
				$correctas = $correctas + $c;
				if($c == 1){
					$pregResCorr[] = $this->preguntascrud->getPregResCorr($pyr[0],$pyr[1]);
				}else{
					$pregResIncorr[] = $this->preguntascrud->getPregResIncorr($pyr[0],$pyr[1]);
				}
			}

			$cant_preguntas_id_topic = $this->preguntascrud->getCantPreguntasByTopic($id_topic);
			$pts_parcial = round(($correctas * 100)/$cant_preguntas_id_topic ,2);
			$this->topicscrud->updatePtsParcial($pts_parcial,$_POST['id_try']);

			$this->imprimirResultado($total,$correctas,$id_topic,"modoSimulador",$pts_parcial,$pregResCorr, $pregResIncorr);
		}else{
			$this->load->view('login');
		}
	}	

	public function unaPregunta($id=0)
	{
		if($this->session->userdata('idusuario_tt')){

			if(isset($_POST["id_topic"])){
				$id_topic = $_POST["id_topic"];
			}else{
				$id_topic = $id;
			}

			$cant_tries = $this->topicscrud->getCantTries($id_topic,$this->session->userdata('idusuario_tt'),1,date("Y-m-d"));
			if(($cant_tries < 3) || ((isset($_POST["id_topic"])) && ($cant_tries == 3))){

				if(isset($_POST["id_try"])){
					$id_try = $_POST["id_try"];
				}else{
					$id_try = $this->topicscrud->addTry($id_topic,$this->session->userdata('idusuario_tt'),1);
				}

				if(isset($_POST["id_pregunta"])){
					$id_pregunta = $_POST['id_pregunta'];
				}else{
					$id_pregunta = "";
				}

				if(isset($_POST["filtro"])){
					$filtro = $_POST['filtro'];
				}else{
					$filtro = "";
				}

				if(isset($_POST["correctas"])){
					$correctas = $_POST["correctas"];
				}else{
					$correctas = "0";
				}

				if(isset($_POST["total"])){
					$total = $_POST["total"] + 1;
				}else{
					$total = "1";
				}

				$filtro_edited = "";
				if($filtro!=""){
					$filtro_edited = str_replace("-",",",$filtro);
					$filtro_edited = "and preguntas.id not in (".$filtro_edited.") ";

				}

				if(isset($_POST['id_respuesta'])){
					$resultado = $this->preguntascrud->comprobarRespuesta($id_pregunta,$_POST['id_respuesta']);
					$correctas = $correctas + $resultado;

					$cant_preguntas_id_topic = $this->preguntascrud->getCantPreguntasByTopic($id_topic);
					$pts_parcial = round(($correctas * 100)/$cant_preguntas_id_topic ,2);
					$this->topicscrud->updatePtsParcial($pts_parcial,$id_try);
				}

				$filtro_edited = $filtro_edited." and preguntas.id_topic = ".$id_topic;
				
				$pregunta = $this->preguntascrud->getPregunta($filtro_edited);

				$attributos = $this->topicscrud->get_attributos($id_topic);

				if(!empty($pregunta)){
					$respuestas = $this->preguntascrud->getRespuestasById($pregunta[0]->id);

					if($filtro == ""){
						$filtro = $pregunta[0]->id;
					}else{
						$filtro = $filtro."-".$pregunta[0]->id;
					}	
					$this->load->view('main', 
										array(
											"modulo" => 'preguntas',
											"pagina" => 'individual',
											"pregunta" => $pregunta[0],
											"respuestas" => $respuestas,
											"filtro" => $filtro,
											"total" => $total,
											"correctas" => $correctas,
											"id_topic" => $id_topic,
											"id_try" => $id_try,
											"titulo" => $attributos[0]->topic,
											"descripcion" => $attributos[0]->descripcion
											));
				}else{
					$this->imprimirResultado($total-1,$correctas,$id_topic,"unaPregunta",$pts_parcial);
				}
			}else{

				$my_scores_hoy = $this->topicscrud->getMisScoresHoy($id_topic,1,$this->session->userdata('idusuario_tt'));
				$vidas_mp = 0;				
				$vidas_ms = 0;
				$cant_jug_mp = $this->topicscrud->getCantTries($id_topic, $this->session->userdata('idusuario_tt'), 1 ,date("Y-m-d"));
				$cant_jug_ms = $this->topicscrud->getCantTries($id_topic, $this->session->userdata('idusuario_tt'), 2 ,date("Y-m-d"));

				$vidas_mp = 3 - $cant_jug_mp;
				$vidas_ms = 3 - $cant_jug_ms;
				$ml = $vidas_ms + $vidas_mp;

				$attributos = $this->topicscrud->get_attributos($id_topic);

				$this->load->view('main', 
										array(
											"modulo" => 'preguntas',
											"pagina" => 'back_tomorrow',
											"scores" => $my_scores_hoy,
											"vidas_mp" => $vidas_mp,
											"vidas_ms" => $vidas_ms,
											"topic" => $attributos[0]->topic,
											"descripcion" => $attributos[0]->descripcion,
											"id_modo" => 1
											));
			}
		}else{
			$this->load->view('login');
		}
	}

	function finalizarPreguntados($id=0){
		/*if(isset($_POST["id_pregunta_f"])){
			$id_pregunta = $_POST['id_pregunta_f'];
		}else{
			$id_pregunta = "";
		}

		if(isset($_POST["filtro_f"])){
			$filtro = $_POST['filtro_f'];
		}else{
			$filtro = "";
		}*/
		if($this->session->userdata('idusuario_tt')){
			if(isset($_POST["id_topic"])){
				$id_topic = $_POST["id_topic"];
			}else{
				$id_topic = $id;
			}

			if(isset($_POST["id_try"])){
				$id_try = $_POST["id_try"];
			}

			if(isset($_POST["correctas_f"])){
				$correctas = $_POST["correctas_f"];
			}else{
				$correctas = "0";
			}

			if(isset($_POST["total_f"])){
				$total = $_POST["total_f"]-1;
			}else{
				$total = "1";
			}

			$cant_preguntas_id_topic = $this->preguntascrud->getCantPreguntasByTopic($id_topic);
			$pts_parcial = round(($correctas * 100)/$cant_preguntas_id_topic ,2);
			$this->topicscrud->updatePtsParcial($pts_parcial,$id_try);


			$this->imprimirResultado($total,$correctas,$id_topic,"unaPregunta",$pts_parcial);
		}else{
			$this->load->view('login');
		}

	}

	function imprimirResultado($total,$correctas,$id_topic,$modo,$pts_parcial,$pregResCorr = array(), $pregResIncorr = array()){
		if($this->session->userdata('idusuario_tt')){
			if($total != 0){
				$porcentaje = round(($correctas * 100)/$total ,2);
			}else{
				$porcentaje = round(0 ,2);
			}
			$this->logincrud->setLog($this->session->userdata('idusuario_tt'),'Finaliza MPreguntados'.$porcentaje);

			$vidas_mp = 0;				
			$vidas_ms = 0;

			if($modo == "unaPregunta"){
				$cant_jug = $this->topicscrud->getCantTries($id_topic, $this->session->userdata('idusuario_tt'), 1 ,date("Y-m-d"));
			}else if($modo == "modoSimulador"){
				$cant_jug = $this->topicscrud->getCantTries($id_topic, $this->session->userdata('idusuario_tt'), 2 ,date("Y-m-d"));
			}
			$vidas = 3 - $cant_jug;

			$attributos = $this->topicscrud->get_attributos($id_topic);
			$calificacion = $this->topicscrud->getCalificacionXTopic($id_topic,$this->session->userdata('idusuario_tt'));
			if(count($calificacion) > 0){
				$cal = $calificacion[0]->calificacion;
			}else{
				$cal = 0;
			}
			$this->load->view('main', 
								array(
									"modulo" => 'preguntas',
									"pagina" => 'resultado',
									"total" => $total,
									"correctas" => $correctas,
									"porcentaje" => $porcentaje,
									"modo" => $modo,
									"vidas" => $vidas,
									"pregCorr" => $pregResCorr,
									"pregIncorr" => $pregResIncorr,
									"id_topic" => $id_topic,
									"titulo" => $attributos[0]->topic,
									"descripcion" => $attributos[0]->descripcion,
									"puntos" => $pts_parcial,
									"calificacion" => $cal
									));
		}else{
			$this->load->view('login');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
