<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('topicscrud');
        $this->load->model('usuariocrud');
        $this->load->model('preguntascrud');
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

	public function setNewCourse()
	{
		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'add'
									));
		}else{
			$this->load->view('login');
		}
	}

	public function confirmAddTopic(){
		if($this->session->userdata('idusuario_tt')){

			$id_topic = $this->topicscrud->add_topic(htmlentities($_POST['titulo'], ENT_QUOTES),htmlentities($_POST['descripcion'], ENT_QUOTES), $this->session->userdata('idusuario_tt'));

			for($i = 1; $i<=10; $i++){
				$sub_p = "preg".$i;
				$id_pregunta = $this->topicscrud->add_pregunta($id_topic, htmlentities($_POST[$sub_p], ENT_QUOTES));
				for($j = 1; $j<=4; $j++){
					$sub_r_text = "respuesta".$i."-".$j;
					if($j == "1"){
						$this->topicscrud->add_respuesta($id_pregunta, htmlentities($_POST[$sub_r_text], ENT_QUOTES),1);
					}else{
						$this->topicscrud->add_respuesta($id_pregunta, htmlentities($_POST[$sub_r_text], ENT_QUOTES),0);
					}
				}
			}

			if(isset($_POST['mas_preguntas'])){
				$this->addPreguntaToTopic($id_topic,$_POST['titulo'],$_POST['descripcion']);
			}else{
				$this->verMiTest($id_topic);
			}
		}else{
			$this->load->view('login');
		}

	}

	public function addPreguntaToTopic($id_topic = 0, $topic = "", $descripcion = ""){
		if($this->session->userdata('idusuario_tt')){
			if(($topic =="") || ($descripcion =="")){
				$attributos = $this->topicscrud->get_attributos($id_topic);
				$topic = $attributos[0]->topic;
				$descripcion = $attributos[0]->descripcion;
			}
			$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'add_pregunta',
									"id_topic" => $id_topic,
									"topic" => $topic,
									"descripcion" => $descripcion
									));

		}else{
			$this->load->view('login');
		}


	}	

	public function confirmAddPreguntaToTopic(){
		if($this->session->userdata('idusuario_tt')){

			$id_topic = $_POST['id_topic'];
			
			$id_pregunta = $this->topicscrud->add_pregunta($id_topic, htmlentities($_POST['pregunta'], ENT_QUOTES));
			for($j = 1; $j <= 4; $j++){
				$sub_r_text = "respuesta-".$j;
				if($j == "1"){
					$this->topicscrud->add_respuesta($id_pregunta,htmlentities($_POST[$sub_r_text], ENT_QUOTES),1);
				}else{
					$this->topicscrud->add_respuesta($id_pregunta,htmlentities($_POST[$sub_r_text], ENT_QUOTES),0);
				}
			}
			
			if(isset($_POST['mas_preguntas'])){
				$this->addPreguntaToTopic($id_topic,$_POST['topic'],$_POST['descripcion']);
			}else{
				$this->verMiTest($id_topic);
			}
		}else{
			$this->load->view('login');
		}

	}

	public function verMiTest($id_topic){
		if($this->session->userdata('idusuario_tt')){
			$preguntas = $this->preguntascrud->getAllPreguntasByTopic($id_topic);
			$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'verMiTest',
									"preguntas" => $preguntas
									));
		}else{
			$this->load->view('login');
		}
	}

	public function calificar(){
		if($this->session->userdata('idusuario_tt')){
			$id_topic = $_POST['id_topic'];
			$this->topicscrud->setCalificacionXTopic($id_topic,$this->session->userdata('idusuario_tt'),$_POST['calificacion']);
			$calculo_calif = $this->topicscrud->getDataCalif($id_topic);
			if($calculo_calif[0]->c != 0){
				$promedio = round(($calculo_calif[0]->sum_c / $calculo_calif[0]->c),2);
			}
			$this->topicscrud->updateCalificacion($id_topic,$promedio);
			$this->index();
		}else{
			$this->load->view('login');
		}
	}

	public function verRanking($id_topic){
		$ranking_pts = $this->topicscrud->getRankingPts($id_topic);
		$ranking_pts_hoy = $this->topicscrud->getRankingPtsHoy($id_topic,date('Y-m-d'));

		$ranking_avg = $this->topicscrud->getRankingAvg($id_topic);
		$ranking_avg_hoy = $this->topicscrud->getRankingAvgHoy($id_topic,date('Y-m-d'));

		$attributos = $this->topicscrud->get_attributos($id_topic);

		$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'ver_ranking',
									"titulo" => $attributos[0]->topic,
									"descripcion" => $attributos[0]->descripcion,
									"ranking_pts" => $ranking_pts,
									"ranking_pts_hoy" => $ranking_pts_hoy,
									"ranking_avg" => $ranking_avg,
									"ranking_avg_hoy" => $ranking_avg_hoy
									));


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */