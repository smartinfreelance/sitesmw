<?php

class TTasks extends CI_Controller
{
    function TTasks()
    {
        parent::__construct();
        $this->load->model('ttasksCRUD');
        $this->load->model('tttasksCRUD');
    }

    function index()
    {
        $ttasks = $this->ttasksCRUD->getTTasks();
        $this->load->view("main", array(
                                    "modulo"=> "ttasks", 
                                    "pagina"=> "principal",
                                    "ttasks" => $ttasks
                                    )
                        );
    }

    function getTTask($id_ttask = 0){
        $ttask = $this->ttasksCRUD->getTTask($id_ttask);
        if(count($ttask) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "ttasks", 
                                        "pagina"=> "ver_ttask",
                                        "ttasks" => $ttasks
                                        )
                            );
        }else{
            // No hay ttasks con id = $id_ttask
        }

    }

    function searchTTask($search){

        $ttasks = $this->ttasksCRUD->getTTasksSearch($search);

        if(count($ttasks) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "ttasks", 
                                        "pagina"=> "resultado_busqueda",
                                        "ttasks" => $ttasks
                                        )
                            );
        }else{
            // No hay ttasks con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "ttasks", 
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


    function formAddTTask(){
        $tttasks = $this->tttasksCRUD->getTTTasks();
        $this->load->view("main", array(
                                        "modulo"=> "ttasks", 
                                        "pagina"=> "form_add",
                                        "tttasks" => $tttasks
                                        )
                            );

    }

    function formDeleteTTask($id_ttask = 0){
        $ttask = $this->ttasksCRUD->getTTask($id_ttask);    
        if(count($ttask) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "ttasks", 
                                            "pagina"=> "form_delete",
                                            "ttask" => $ttask
                                            )
                                );
        }else{
            //no hay ttask con ese id
        }

    }

    function formEditTTask($id_ttask = 0){
        $ttask = $this->ttasksCRUD->getTTask($id_ttask);        
        
        if(count($ttask) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "ttasks", 
                                            "pagina"=> "form_edit",
                                            "ttask" => $ttask
                                            )
                                );
        }else{
            // no hay ttask con ese id
        }
        
    }

    function addTTask(){
        $nombre = $_POST['nombre'];

        $this->ttasksCRUD->addTTask($nombre);

        $this->index();
    }

    function deleteTTask(){
        $id_ttask = $_POST['id_ttask'];

        $this->ttasksCRUD->deleteTTask($id_ttask);

        $this->index();

    }

    function editTTask(){
        $id_ttask = $_POST['id_ttask'];
        $nombre = $_POST['nombre'];

        $this->ttasksCRUD->editTTask($id_ttask,$nombre);

        $this->index();
        
    }

}