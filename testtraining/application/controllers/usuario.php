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
			$puntos = $this->usuarioCRUD->getMisPuntos($this->session->userdata('idusuario_tt'));
			$this->load->view('main', 
								array(
									"modulo" => 'usuario',
									"pagina" => 'cuenta',
									"cursos" => $cursosCreados,
									"puntos" => $puntos[0]->sum_puntos
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

	public function confirmaAddUser(){
		if($this->session->userdata('idusuario_tt')){
			if($this->session->userdata('rol')==1){
				$validador_personal = 0;
				$this->form_validation->set_rules('usuario', 'usuario', 'trim|max_length[50]|min_length[6]|required');
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|max_length[50]|min_length[2]|required');
				$this->form_validation->set_rules('apellido', 'apellido', 'trim|max_length[50]|min_length[2]|required');
				$this->form_validation->set_rules('email', 'email', 'trim|max_length[35]|min_length[8]|valid_email|required');
				$this->form_validation->set_rules('pass', 'pass', 'trim|max_length[20]|min_length[4]|required');

				if ($this->form_validation->run() == FALSE)
				{
					$roles = $this->usuarioCRUD->getRoles();
					$this->load->view('main', 
										array(
											"modulo" => 'usuario',
											"pagina" => 'add',
											"roles" => $roles
											));
				}
				else
				{
					$this->usuarioCRUD->addUser($_POST['usuario'],$_POST['nombre'],$_POST['apellido'],$_POST['id_rol'],$_POST['pass'],$_POST['fecha_nac']);
					$this->addUsuario();
				}
			}
		}else{
			$this->load->view('login');
		}
	}

	public function addUsuario()
	{

		if($this->session->userdata('idusuario_tt')){
			if($this->session->userdata('rol')==1){
				$roles = $this->usuarioCRUD->getRoles();
				$this->load->view('main', 
									array(
										"modulo" => 'usuario',
										"pagina" => 'add',
										"roles" => $roles
										));
			}else{

			}
		}else{
			$this->load->view('login');
		}

	}

	//FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){
            $usuario = $this->usuariosCRUD->existeNombre($str);
            if(count($usuario) > 0){
                $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            $this->load->view('login/login');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */