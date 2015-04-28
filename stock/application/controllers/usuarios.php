<?php

class Usuarios extends CI_Controller
{
    function Usuarios()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('usuariosCRUD');
        $this->load->model('rolesCRUD');
    }

    function index()
    {
        $usuarios = $this->usuariosCRUD->getUsuarios();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'usuarios',
                "pagina" => 'panel',
                "usuarios" => $usuarios
            )
        );
    }

    function addUsuario(){
        $roles = $this->rolesCRUD->getRoles();

        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'usuarios',
                            "pagina" => 'add',
                            "roles" => $roles
                        ));

    }

    function confirmAddUsuario(){
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('mail', 'Mail', 'required');
        $this->form_validation->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required');
        $this->form_validation->set_rules('id_rol', 'Rol', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required');

        $this->form_validation->set_rules('usuario', 'Usuario', 'is_unique[usuarios.usuario]');
        if (($this->form_validation->run() == FALSE)){
            $this->addUsuario();            
        }else{
            $this->usuariosCRUD->addUsuario($_POST['usuario'], $_POST['nombre'],$_POST['apellido'],$_POST['password'], $_POST['mail'],$_POST['fecha_nac'],$_POST['id_rol'],$_POST['dni']);
            $this->index();

        }

    }

    function editUsuario($idUsuario){
        $usuario = $this->usuariosCRUD->getUsuario($idUsuario);
        $roles = $this->rolesCRUD->getRoles();
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'usuarios',
                            "pagina" => 'edit',
                            "usuario" => $usuario[0],
                            "roles" => $roles,
                            "idUsuario" => $idUsuario
                        ));        
    }

    function confirmEditUsuario(){
        $idUsuario = $_POST['id'];
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('mail', 'Mail', 'required');
        $this->form_validation->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required');
        $this->form_validation->set_rules('id_rol', 'Rol', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required');

        if (($this->form_validation->run() == FALSE)){
            $usuario = $this->usuariosCRUD->getUsuario($idUsuario);
            $roles = $this->rolesCRUD->getRoles();

            $this->load->view(
                        'main',
                        array(
                            "modulo" => 'usuarios',
                            "pagina" => 'edit',
                            "usuario" => $usuario[0],
                            "roles" => $roles,
                            "idUsuario" => $idUsuario
                        ));


        }else{
            $this->usuariosCRUD->editUsuario($_POST['id'], $_POST['usuario'], $_POST['nombre'],$_POST['apellido'], $_POST['mail'],$_POST['fecha_nac'],$_POST['id_rol'],$_POST['dni']);

            $this->index();

        }
        
    }

    function eliminarUsuario($idUsuario){
        $usuario = $this->usuariosCRUD->getUsuario($idUsuario);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'usuarios',
                            "pagina" => 'delete',
                            "usuario" => $usuario[0],
                            "idUsuario" => $idUsuario
                        ));        
    }

    function confirmEliminarUsuario(){
        $idUsuario = $_POST['id'];
        $this->usuariosCRUD->eliminarUsuario($idUsuario);
        $this->index();        
    }

    function intenta_desloggear()
    {
        $datos=array("idusuario"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }
    
}