<?php

class THistoriales extends CI_Controller
{
    function THistoriales()
    {
        parent::__construct();
        $this->load->model('thistorialesCRUD');
        $this->load->model('accionesCRUD');
        $this->load->model('estadosCRUD');
        $this->load->model('usuariosCRUD');
        $this->load->model('tasksCRUD');
    }

    function index()
    {
        $thistoriales = $this->thistorialesCRUD->getTHistoriales();
        $this->load->view("main", array(
                                    "modulo"=> "thistoriales", 
                                    "pagina"=> "principal",
                                    "thistoriales" => $thistoriales
                                    )
                        );
    }

    function getTHistorial($id_thistorial = 0){
        $thistorial = $this->thistorialesCRUD->getTHistorial($id_thistorial);
        if(count($thistorial) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "thistoriales", 
                                        "pagina"=> "ver_thistorial",
                                        "thistorial" => $thistorial[0]
                                        )
                            );
        }else{
            // No hay thistoriales con id = $id_thistorial
        }

    }

    function searchTHistorial($search){

        $thistoriales = $this->thistorialesCRUD->getTHistorialesSearch($search);

        if(count($thistoriales) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "thistoriales", 
                                        "pagina"=> "resultado_busqueda",
                                        "thistoriales" => $thistoriales
                                        )
                            );
        }else{
            // No hay thistoriales con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "thistoriales", 
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


    function formAddTHistorial(){

        $acciones = $this->accionesCRUD->getAcciones();
        $usuarios = $this->usuariosCRUD->getUsuarios();
        $estados = $this->estadosCRUD->getEstados();
        $tasks = $this->tasksCRUD->getTasks();
        $this->load->view("main", array(
                                        "modulo"=> "thistoriales", 
                                        "pagina"=> "form_add",
                                        "acciones" => $acciones,
                                        "usuarios" => $usuarios,
                                        "estados" => $estados,
                                        "tasks" => $tasks
                                        )
                            );

    }

    function formDeleteTHistorial($id_thistorial = 0){
        $thistorial = $this->thistorialesCRUD->getTHistorial($id_thistorial);    
        if(count($thistorial) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "thistoriales", 
                                            "pagina"=> "form_delete",
                                            "thistorial" => $thistorial[0]
                                            )
                                );
        }else{
            //no hay thistorial con ese id
        }

    }

    function formEditTHistorial($id_thistorial = 0){
        $thistorial = $this->thistorialesCRUD->getTHistorial($id_thistorial);        
        
        if(count($thistorial) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "thistoriales", 
                                            "pagina"=> "form_edit",
                                            "thistorial" => $thistorial[0]
                                            )
                                );
        }else{
            // no hay thistorial con ese id
        }
        
    }

    function addTHistorial(){

        $this->form_validation->set_rules('log','log','trim|max_length[150]|min_length[2]|required');
        $this->form_validation->set_rules('id_task','task','required');
        $this->form_validation->set_rules('id_accion','accion','required');
        $this->form_validation->set_rules('id_usuario','usuario','required');
        $this->form_validation->set_rules('id_estado','estado','required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddTHistorial();
        }else{
            $log = $_POST['log'];
            $id_task = $_POST['id_task'];
            $id_accion = $_POST['id_accion'];
            $id_usuario = $_POST['id_usuario'];
            $id_estado = $_POST['id_estado'];
                    
            $this->thistorialesCRUD->addTHistorial($log,$id_task,$id_accion,$id_usuario,$id_estado);

            $this->index();

        }

        
    }

    function deleteTHistorial(){
        $id_thistorial = $_POST['id_thistorial'];

        $this->thistorialesCRUD->deleteTHistorial($id_thistorial);

        $this->index();

    }

    function editTHistorial(){
        $id_thistorial = $_POST['id_thistorial'];
        $log = "";
        $id_task = $_POST['id_task'];
        $id_accion = $_POST['id_accion'];
        $id_usuario = $_POST['id_usuario'];
        $id_estado = $_POST['id_estado'];

        $this->thistorialesCRUD->editTHistorial($id_thistorial,$log,$id_task,$id_accion,$id_usuario,$id_estado);

        $this->index();
        
    }

}