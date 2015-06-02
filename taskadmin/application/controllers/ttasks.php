<?php

class TTasks extends CI_Controller
{
    function TTasks()
    {
        parent::__construct();
        $this->load->model('ttasksCRUD');
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
                                        "ttasks" => $ttasks[0]
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

        $this->load->view("main", array(
                                        "modulo"=> "ttasks", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteTTask($id_ttask = 0){
        $ttask = $this->ttasksCRUD->getTTask($id_ttask);    
        if(count($ttask) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "ttasks", 
                                            "pagina"=> "form_delete",
                                            "ttask" => $ttask[0]
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
                                            "ttask" => $ttask[0]
                                            )
                                );
        }else{
            // no hay ttask con ese id
        }
        
    }

    function addTTask(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddTTask();
        }
        else
        {
             $nombre = $_POST['nombre'];

            $this->ttasksCRUD->addTTask($nombre);

            $this->index();
        }
    }

    function deleteTTask(){
        $id_ttask = $_POST['id_ttask'];

        $this->ttasksCRUD->deleteTTask($id_ttask);

        $this->index();

    }

    function editTTask(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        if($_POST['nombre']!=$_POST['nombre_check']){
            $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        }        

        if ($this->form_validation->run() == FALSE)
        {
            $this->formEditTTask($_POST['id_ttask']);
        }else{
            $id_ttask = $_POST['id_ttask'];
            $nombre = $_POST['nombre'];

            $this->ttasksCRUD->editTTask($id_ttask,$nombre);

            $this->index();
        }
        
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $ttask = $this->ttasksCRUD->existeNombre($str);
        if(count($ttask) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}