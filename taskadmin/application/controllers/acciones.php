<?php

class Acciones extends CI_Controller
{
    function Acciones()
    {
        parent::__construct();
        $this->load->model('accionesCRUD');
    }

    function index()
    {
        $acciones = $this->accionesCRUD->getAcciones();
        $this->load->view("main", array(
                                    "modulo"=> "acciones", 
                                    "pagina"=> "principal",
                                    "acciones" => $acciones
                                    )
                        );
    }

    function getAccion($id_accion = 0){
        $accion = $this->accionesCRUD->getAccion($id_accion);
        if(count($accion) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "acciones", 
                                        "pagina"=> "ver_accion",
                                        "acciones" => $acciones
                                        )
                            );
        }else{
            // No hay acciones con id = $id_accion
        }

    }

    function searchAccion($search){

        $acciones = $this->accionesCRUD->getAccionesSearch($search);

        if(count($acciones) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "acciones", 
                                        "pagina"=> "resultado_busqueda",
                                        "acciones" => $acciones
                                        )
                            );
        }else{
            // No hay acciones con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "acciones", 
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


    function formAddAccion(){
        $tacciones = $this->taccionesCRUD->getTAcciones();
        $this->load->view("main", array(
                                        "modulo"=> "acciones", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteAccion($id_accion = 0){
        $accion = $this->accionesCRUD->getAccion($id_accion);    
        if(count($accion) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "acciones", 
                                            "pagina"=> "form_delete",
                                            "accion" => $accion
                                            )
                                );
        }else{
            //no hay accion con ese id
        }

    }

    function formEditAccion($id_accion = 0){
        $accion = $this->accionesCRUD->getAccion($id_accion);        
        
        if(count($accion) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "acciones", 
                                            "pagina"=> "form_edit",
                                            "accion" => $accion
                                            )
                                );
        }else{
            // no hay accion con ese id
        }
        
    }

    function addAccion(){
        $nombre = $_POST['nombre'];

        $this->accionesCRUD->addAccion($nombre);

        $this->index();
    }

    function deleteAccion(){
        $id_accion = $_POST['id_accion'];

        $this->accionesCRUD->deleteAccion($id_accion);

        $this->index();

    }

    function editAccion(){
        $id_accion = $_POST['id_accion'];
        $nombre = $_POST['nombre'];

        $this->accionesCRUD->editAccion($id_accion,$nombre);

        $this->index();
        
    }

}