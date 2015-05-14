<?php

class Login extends CI_Controller
{
    function Login()
    {
        parent::__construct();
        $this->load->model('loginCRUD');
    }

    function index()
    {
        if($this->session->userdata('idusuario')){
            $this->load->view('main', 
                                array(
                                    "modulo" => 'menu',
                                    "pagina" => 'panel'
                                    ));
        }else{
            $this->load->view('login');
        }
    }
    function intenta_loggear()
    {
        $usuario = array();
        if(isset($_POST['usuario'])) $usuario = $this->loginCRUD->intentaLoggear($_POST['usuario'],$_POST['pass']);
            if(count($usuario) > 0){
                $datos=array("idusuario"=> $usuario[0]->id,"nombre"=> $usuario[0]->nombre,"usuario"=> $usuario[0]->usuario,"rol"=> $usuario[0]->id_rol);
                $this->session->set_userdata($datos);
                
                $this->load->view(
                    'main', 
                    array(
                        "modulo" => 'menu',
                        "pagina" => 'panel'
                    )
                );
            }else{
                $this->load->view(
                'main', 
                array(
                    "modulo" => 'login',
                    "pagina" => 'login'
                )
            );
        }
    }

    function intenta_desloggear()
    {
        $datos=array("idusuario"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }
    
}