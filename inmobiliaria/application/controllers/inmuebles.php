<?php

class Inmuebles extends CI_Controller
{
    function Inmuebles()
    {
        parent::__construct();
        $this->load->model('inmueblesCRUD');
        $this->load->model('tinmueblesCRUD');
    }

    function index()
    {
        $inmuebles = $this->inmueblesCRUD->getInmuebles();
        $this->load->view("main", array(
                                    "modulo"=> "inmuebles", 
                                    "pagina"=> "principal",
                                    "inmuebles" => $inmuebles
                                    )
                        );
    }

    function getInmueble($id_inmueble = 0){
        $inmueble = $this->inmueblesCRUD->getInmueble($id_inmueble);
        if(count($inmueble) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
                                        "pagina"=> "ver_inmueble",
                                        "inmuebles" => $inmuebles
                                        )
                            );
        }else{
            // No hay inmuebles con id = $id_inmueble
        }

    }

    function searchInmueble($id_barrio, $cant_ambientes, $rango_precio){

        $inmuebles = $this->inmueblesCRUD->getInmueblesSearch($id_barrio, $cant_ambientes, $rango_precio);

        if(count($inmuebles) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
                                        "pagina"=> "resultado_busqueda",
                                        "inmuebles" => $inmuebles
                                        )
                            );
        }else{
            // No hay inmuebles con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
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


    function formAddInmueble(){
        $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
        $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
                                        "pagina"=> "form_add",
                                        "tinmuebles" => $tinmuebles
                                        )
                            );

    }

    function formDeleteInmueble($id_inmueble = 0){
        $inmueble = $this->inmueblesCRUD->getInmueble($id_inmueble);    
        if(count($inmueble) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "inmuebles", 
                                            "pagina"=> "form_delete",
                                            "inmueble" => $inmueble[0]
                                            )
                                );
        }else{
            //no hay inmueble con ese id
        }

    }

    function formEditInmueble($id_inmueble = 0){
        $inmueble = $this->inmueblesCRUD->getInmueble($id_inmueble);        
        $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
        if(count($inmueble) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "inmuebles", 
                                            "pagina"=> "form_edit",
                                            "inmueble" => $inmueble[0],
                                            "tinmuebles" => $tinmuebles
                                            )
                                );
        }else{
            // no hay inmueble con ese id
        }
        
    }

    function addInmueble(){

        $this->index();
    }

    function deleteInmueble(){

        $id_inmueble = $_POST['id_inmueble'];

        $this->inmueblesCRUD->deleteInmueble($id_inmueble);

        $this->index();

    }

    function editInmueble(){

        $this->index();
        
    }

}