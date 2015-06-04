<?php

class TContactos extends CI_Controller
{
    function TContactos()
    {
        parent::__construct();
        $this->load->model('tcontactosCRUD');
    }

    function index()
    {
        $tcontactos = $this->tcontactosCRUD->getTContactos();
        $this->load->view("main", array(
                                    "modulo"=> "tcontactos", 
                                    "pagina"=> "principal",
                                    "tcontactos" => $tcontactos
                                    )
                        );
    }

    function getTContacto($id_tcontacto = 0){
        $tcontacto = $this->tcontactosCRUD->getTContacto($id_tcontacto);
        if(count($tcontacto) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
                                        "pagina"=> "ver_tcontacto",
                                        "tcontacto" => $tcontacto[0]
                                        )
                            );
        }else{
            // No hay tcontactos con id = $id_tcontacto
        }

    }

    function searchTContacto($search){

        $tcontactos = $this->tcontactosCRUD->getTContactosSearch($search);

        if(count($tcontactos) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
                                        "pagina"=> "resultado_busqueda",
                                        "tcontactos" => $tcontactos
                                        )
                            );
        }else{
            // No hay tcontactos con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
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


    function formAddTContacto(){
        $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteTContacto($id_tcontacto = 0){
        $tcontacto = $this->tcontactosCRUD->getTContacto($id_tcontacto);    
        if(count($tcontacto) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "tcontactos", 
                                            "pagina"=> "form_delete",
                                            "tcontacto" => $tcontacto[0]
                                            )
                                );
        }else{
            //no hay tcontacto con ese id
        }

    }

    function formEditTContacto($id_tcontacto = 0){
        $tcontacto = $this->tcontactosCRUD->getTContacto($id_tcontacto);        
        
        if(count($tcontacto) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "tcontactos", 
                                            "pagina"=> "form_edit",
                                            "tcontacto" => $tcontacto[0]
                                            )
                                );
        }else{
            // no hay tcontacto con ese id
        }
        
    }

    function addTContacto(){
        $nombre = $_POST['nombre'];

        $this->tcontactosCRUD->addTContacto($nombre);

        $this->index();
    }

    function deleteTContacto(){
        $id_tcontacto = $_POST['id_tcontacto'];

        $this->tcontactosCRUD->deleteTContacto($id_tcontacto);

        $this->index();

    }

    function editTContacto(){
        $id_tcontacto =  $_POST['id_tcontacto'];
        $nombre = $_POST['nombre'];

        $this->tcontactosCRUD->editTContacto($id_tcontacto,$nombre);
        $this->index();
        
    }

}