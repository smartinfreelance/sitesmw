<?php

class Operaciones extends CI_Controller
{
    function Operaciones()
    {
        parent::__construct();
        $this->load->model('operacionesCRUD');
    }

    function index()
    {
        $operaciones = $this->operacionesCRUD->getOperaciones();
        $this->load->view("main", array(
                                    "modulo"=> "operaciones", 
                                    "pagina"=> "principal",
                                    "operaciones" => $operaciones
                                    )
                        );
    }

    function getOperacion($id_operacion = 0){
        $operacion = $this->operacionesCRUD->getOperacion($id_operacion);
        if(count($operacion) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
                                        "pagina"=> "ver_operacion",
                                        "operaciones" => $operaciones
                                        )
                            );
        }else{
            // No hay operaciones con id = $id_operacion
        }

    }

    function searchOperacion($search){

        $operaciones = $this->operacionesCRUD->getOperacionesSearch($search);

        if(count($operaciones) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
                                        "pagina"=> "resultado_busqueda",
                                        "operaciones" => $operaciones
                                        )
                            );
        }else{
            // No hay operaciones con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
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


    function formAddOperacion(){
        $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteOperacion($id_operacion = 0){
        $operacion = $this->operacionesCRUD->getOperacion($id_operacion);    
        if(count($operacion) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "operaciones", 
                                            "pagina"=> "form_delete",
                                            "operacion" => $operacion
                                            )
                                );
        }else{
            //no hay operacion con ese id
        }

    }

    function formEditOperacion($id_operacion = 0){
        $operacion = $this->operacionesCRUD->getOperacion($id_operacion);        
        
        if(count($operacion) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "operaciones", 
                                            "pagina"=> "form_edit",
                                            "operacion" => $operacion
                                            )
                                );
        }else{
            // no hay operacion con ese id
        }
        
    }

    function addOperacion(){
        $nombre = $_POST['nombre'];

        $this->operacionesCRUD->addOperacion($nombre);

        $this->index();
    }

    function deleteOperacion(){
        $id_operacion = $_POST['id_operacion'];

        $this->operacionesCRUD->deleteOperacion($id_operacion);

        $this->index();

    }

    function editOperacion(){
        $id_operacion =  $_POST['id_operacion'];
        $nombre = $_POST['nombre'];

        $this->operacionesCRUD->editOperacion($id_operacion,$nombre);
        $this->index();
        
    }

}