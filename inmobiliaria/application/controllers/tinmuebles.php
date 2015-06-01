<?php

class TInmuebles extends CI_Controller
{
    function TInmuebles()
    {
        parent::__construct();
        $this->load->model('tinmueblesCRUD');
    }

    function index()
    {
        $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
        $this->load->view("main", array(
                                    "modulo"=> "tinmuebles", 
                                    "pagina"=> "principal",
                                    "tinmuebles" => $tinmuebles
                                    )
                        );
    }

    function getTInmueble($id_tinmueble = 0){
        $tinmueble = $this->tinmueblesCRUD->getTInmueble($id_tinmueble);
        if(count($tinmueble) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
                                        "pagina"=> "ver_tinmueble",
                                        "tinmuebles" => $tinmuebles
                                        )
                            );
        }else{
            // No hay tinmuebles con id = $id_tinmueble
        }

    }

    function searchTInmueble($search){

        $tinmuebles = $this->tinmueblesCRUD->getTInmueblesSearch($search);

        if(count($tinmuebles) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
                                        "pagina"=> "resultado_busqueda",
                                        "tinmuebles" => $tinmuebles
                                        )
                            );
        }else{
            // No hay tinmuebles con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
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


    function formAddTInmueble(){
        $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteTInmueble($id_tinmueble = 0){
        $tinmueble = $this->tinmueblesCRUD->getTInmueble($id_tinmueble);    
        if(count($tinmueble) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "tinmuebles", 
                                            "pagina"=> "form_delete",
                                            "tinmueble" => $tinmueble
                                            )
                                );
        }else{
            //no hay tinmueble con ese id
        }

    }

    function formEditTInmueble($id_tinmueble = 0){
        $tinmueble = $this->tinmueblesCRUD->getTInmueble($id_tinmueble);        
        
        if(count($tinmueble) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "tinmuebles", 
                                            "pagina"=> "form_edit",
                                            "tinmueble" => $tinmueble
                                            )
                                );
        }else{
            // no hay tinmueble con ese id
        }
        
    }


    function addTInmueble(){
        $nombre = $_POST['nombre'];

        $this->tinmueblesCRUD->addTInmueble($nombre);

        $this->index();
    }

    function deleteTInmueble(){
        $id_tinmueble = $_POST['id_tinmueble'];

        $this->tinmueblesCRUD->deleteTInmueble($id_tinmueble);

        $this->index();

    }

    function editTInmueble(){
        $id_tinmueble =  $_POST['id_tinmueble'];
        $nombre = $_POST['nombre'];

        $this->tinmueblesCRUD->editTInmueble($id_tinmueble,$nombre);
        $this->index();
        
    }

}