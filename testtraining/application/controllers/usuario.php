<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('usuarioCRUD');
    }

	public function index()
	{

		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'menu',
									"pagina" => 'panel'
									));
		}else{
			$this->load->view('login');
		}

	}
	public function verMiCuenta()
	{

		if($this->session->userdata('idusuario_tt')){
			$cursosCreados = $this->usuarioCRUD->getMyCourses($this->session->userdata('idusuario_tt'));
			$this->load->view('main', 
								array(
									"modulo" => 'usuario',
									"pagina" => 'cuenta',
									"cursos" => $cursosCreados
									));
		}else{
			$this->load->view('login');
		}

	}
	public function verMiPerfil()
	{

		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'usuario',
									"pagina" => 'perfil'
									));
		}else{
			$this->load->view('login');
		}

	}
	public function editarMiPerfil()
	{

		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'usuario',
									"pagina" => 'editar_perfil'
									));
		}else{
			$this->load->view('login');
		}

	}
	public function confirmaEditarMiPerfil()
	{

		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'usuario',
									"pagina" => 'editar_perfil'
									));
		}else{
			$this->load->view('login');
		}

	}		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */