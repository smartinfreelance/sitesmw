<?php

class Usuarios extends CI_Controller
{
    function Usuarios()
    {
        parent::__construct();
        $this->load->model('usuariosCRUD');
    }

    function index()
    {
        $usuarios = $this->usuariosCRUD->getUsuarios();
        $this->load->view("main", array(
                                    "modulo"=> "usuarios", 
                                    "pagina"=> "principal",
                                    "usuarios" => $usuarios
                                    )
                        );
    }

    function getUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);
        if(count($usuario) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "ver_usuario",
                                        "usuario" => $usuario[0]
                                        )
                            );
        }else{
            // No hay usuarios con id = $id_usuario
        }

    }

    function searchUsuario($search){

        $usuarios = $this->usuariosCRUD->getUsuariosSearch($search);

        if(count($usuarios) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "resultado_busqueda",
                                        "usuarios" => $usuarios
                                        )
                            );
        }else{
            // No hay usuarios con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
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


    function formAddUsuario(){

        $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);    
        if(count($usuario) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "usuarios", 
                                            "pagina"=> "form_delete",
                                            "usuario" => $usuario[0]
                                            )
                                );
        }else{
            //no hay usuario con ese id
        }

    }

    function formEditUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);        
        
        if(count($usuario) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "usuarios", 
                                            "pagina"=> "form_edit",
                                            "usuario" => $usuario[0]
                                            )
                                );
        }else{
            // no hay usuario con ese id
        }
        
    }

    function addUsuario(){
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_rol = $_POST['id_rol'];
        $mail = $_POST['mail'];

        $this->usuariosCRUD->addUsuario($usuario, $nombre,$apellido,$id_rol,$mail);

        $this->index();
    }

    function deleteUsuario(){
        $id_usuario = $_POST['id_usuario'];

        $this->usuariosCRUD->deleteUsuario($id_usuario);

        $this->index();

    }

    function editUsuario(){
        $id_usuario = $_POST['id_usuario'];
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_rol = $_POST['id_rol'];
        $mail = $_POST['mail'];

        $this->usuariosCRUD->editUsuario($id_usuario,$usuario,$nombre,$apellido,$id_rol,$mail);

        $this->index();
        
    }

}