<?php

class Roles extends CI_Controller
{
    function Roles()
    {
        parent::__construct();
        $this->load->model('rolesCRUD');
    }

    function index()
    {
        $roles = $this->rolesCRUD->getRoles();
        $this->load->view("main", array(
                                    "modulo"=> "roles", 
                                    "pagina"=> "principal",
                                    "roles" => $roles
                                    )
                        );
    }

    function getRol($id_rol = 0){
        $rol = $this->rolesCRUD->getRol($id_rol);
        if(count($rol) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "ver_rol",
                                        "rol" => $rol[0]
                                        )
                            );
        }else{
            // No hay roles con id = $id_rol
        }

    }

    function searchRol($search){

        $roles = $this->rolesCRUD->getRolesSearch($search);

        if(count($roles) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "resultado_busqueda",
                                        "roles" => $roles
                                        )
                            );
        }else{
            // No hay roles con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "form_add"
                                        )
                            );
    }

    function envioConsulta(){
        //PARA EL ENVIO DE MAILS INICIO
        $this->load->library('email');

        $this->email->from($datos_remitente[0]->mail, $datos_remitente[0]->nombre);
        $this->email->to($datos_destinatario[0]->mail); 
        //$this->email->cc('saint.tripper@gmail.com'); 
        $this->email->bcc('smartinmedina@hotmail.com'); 

        $this->email->subject($asunto);
        $this->email->message($mensaje);  

        $this->email->send();
        //PARA EL ENVIO DE MAILS FIN
    }


    function formAddRol(){
        $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteRol($id_rol = 0){
        $rol = $this->rolesCRUD->getRol($id_rol);    
        if(count($rol) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "form_delete",
                                            "rol" => $rol[0]
                                            )
                                );
        }else{
            //no hay rol con ese id
        }

    }

    function formEditRol($id_rol = 0){
        $rol = $this->rolesCRUD->getRol($id_rol);        
        
        if(count($rol) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "form_edit",
                                            "rol" => $rol[0]
                                            )
                                );
        }else{
            // no hay rol con ese id
        }
        
    }

    function addRol(){
        $nombre = $_POST['nombre'];

        $this->rolesCRUD->addRol($nombre);

        $this->index();
    }

    function deleteRol(){
        $id_rol = $_POST['id_rol'];

        $this->rolesCRUD->deleteRol($id_rol);

        $this->index();

    }

    function editRol(){
        $id_rol =  $_POST['id_rol'];
        $nombre = $_POST['nombre'];

        $this->rolesCRUD->editRol($id_rol,$nombre);
        $this->index();
        
    }

}