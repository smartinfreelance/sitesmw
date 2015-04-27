<?php

class Roles extends CI_Controller
{
    function Roles()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('rolesCRUD');
    }

    function index()
    {
        $roles = $this->rolesCRUD->getRoles();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'roles',
                "pagina" => 'panel',
                "roles" => $roles
            )
        );
    }

    function addRol(){

        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'roles',
                            "pagina" => 'add'
                        ));

    }

    function confirmAddRol(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'is_unique[roles.nombre]');
        if (($this->form_validation->run() == FALSE)){
            $this->addRol();            
        }else{
            $this->rolesCRUD->addRol($_POST['nombre']);

            $this->index();

        }

    }

    function editRol($idRol){
        $rol = $this->rolesCRUD->getRol($idRol);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'roles',
                            "pagina" => 'edit',
                            "idRol" => $idRol,
                            "rol" => $rol[0]
                        ));        
    }

    function confirmEditRol(){
        $idRol = $_POST['id'];
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');

        if (($this->form_validation->run() == FALSE)){

            $this->load->view(
                        'main',
                        array(
                            "modulo" => 'roles',
                            "pagina" => 'edit',
                            "idRol" => $idRol
                        ));


        }else{
            $this->rolesCRUD->editRol($idRol,$_POST['nombre']);

            $this->index();

        }
        
    }

    function eliminarRol($idRol){
        $rol = $this->rolesCRUD->getRol($idRol);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'roles',
                            "pagina" => 'delete',
                            "rol" => $rol[0],
                            "idRol" => $idRol
                        ));        
    }

    function confirmEliminarRol(){
        $idRol = $_POST['id'];
        $this->rolesCRUD->eliminarRol($idRol);
        $this->index();        
    }

    function intenta_desloggear()
    {
        $datos=array("idusuario"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }
    
}