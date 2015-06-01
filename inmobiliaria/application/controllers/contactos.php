<?php

class Contactos extends CI_Controller
{
    function Contactos()
    {
        parent::__construct();
        $this->load->model('contactosCRUD');
        $this->load->model('tcontactosCRUD');
    }

    function index()
    {
        $contactos = $this->contactosCRUD->getContactos();
        $this->load->view("main", array(
                                    "modulo"=> "contactos", 
                                    "pagina"=> "principal",
                                    "contactos" => $contactos
                                    )
                        );
    }

    function getContacto($id_contacto = 0){
        $contacto = $this->contactosCRUD->getContacto($id_contacto);
        if(count($contacto) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "contactos", 
                                        "pagina"=> "ver_contacto",
                                        "contactos" => $contactos
                                        )
                            );
        }else{
            // No hay contactos con id = $id_contacto
        }

    }

    function searchContacto($search){

        $contactos = $this->contactosCRUD->getContactosSearch($search);

        if(count($contactos) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "contactos", 
                                        "pagina"=> "resultado_busqueda",
                                        "contactos" => $contactos
                                        )
                            );
        }else{
            // No hay contactos con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "contactos", 
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


    function formAddContacto(){
        $tcontactos = $this->tcontactosCRUD->getTContactos();
        $this->load->view("main", array(
                                        "modulo"=> "contactos", 
                                        "pagina"=> "form_add",
                                        "tcontactos" => $tcontactos
                                        )
                            );

    }

    function formDeleteContacto($id_contacto = 0){
        $contacto = $this->contactosCRUD->getContacto($id_contacto);    
        if(count($contacto) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "contactos", 
                                            "pagina"=> "form_delete",
                                            "contacto" => $contacto
                                            )
                                );
        }else{
            //no hay contacto con ese id
        }

    }

    function formEditContacto($id_contacto = 0){
        $contacto = $this->contactosCRUD->getContacto($id_contacto);        
        
        if(count($contacto) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "contactos", 
                                            "pagina"=> "form_edit",
                                            "contacto" => $contacto
                                            )
                                );
        }else{
            // no hay contacto con ese id
        }
        
    }

    function addContacto(){
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $id_tipo = $_POST['id_tipo'];
        $mail = $_POST['mail'];

        $this->contactosCRUD->addContacto($nombre,$telefono,$id_tipo,$mail);

        $this->index();
    }

    function deleteContacto(){
        $id_contacto = $_POST['id_contacto'];

        $this->contactosCRUD->deleteContacto($id_contacto);

        $this->index();

    }

    function editContacto(){
        $nombre = $_POST['id_contacto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $id_tipo = $_POST['id_tipo'];
        $mail = $_POST['mail'];

        $this->contactosCRUD->editContacto($id_contacto,$nombre,$telefono,$id_tipo,$mail);

        $this->index();
        
    }

}