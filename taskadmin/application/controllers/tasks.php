<?php

class Tasks extends CI_Controller
{
    function Tasks()
    {
        parent::__construct();
        $this->load->model('tasksCRUD');
        $this->load->model('ttasksCRUD');
    }

    function index()
    {
        $tasks = $this->tasksCRUD->getTasks();
        $this->load->view("main", array(
                                    "modulo"=> "tasks", 
                                    "pagina"=> "principal",
                                    "tasks" => $tasks
                                    )
                        );
    }

    function getTask($id_task = 0){
        $task = $this->tasksCRUD->getTask($id_task);
        if(count($task) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tasks", 
                                        "pagina"=> "ver_task",
                                        "tasks" => $tasks
                                        )
                            );
        }else{
            // No hay tasks con id = $id_task
        }

    }

    function searchTask($search){

        $tasks = $this->tasksCRUD->getTasksSearch($search);

        if(count($tasks) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tasks", 
                                        "pagina"=> "resultado_busqueda",
                                        "tasks" => $tasks
                                        )
                            );
        }else{
            // No hay tasks con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "tasks", 
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


    function formAddTask(){
        $ttasks = $this->ttasksCRUD->getTTasks();
        $this->load->view("main", array(
                                        "modulo"=> "tasks", 
                                        "pagina"=> "form_add",
                                        "ttasks" => $ttasks
                                        )
                            );

    }

    function formDeleteTask($id_task = 0){
        $task = $this->tasksCRUD->getTask($id_task);    
        if(count($task) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "tasks", 
                                            "pagina"=> "form_delete",
                                            "task" => $task
                                            )
                                );
        }else{
            //no hay task con ese id
        }

    }

    function formEditTask($id_task = 0){
        $task = $this->tasksCRUD->getTask($id_task);        
        
        if(count($task) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "tasks", 
                                            "pagina"=> "form_edit",
                                            "task" => $task
                                            )
                                );
        }else{
            // no hay task con ese id
        }
        
    }

    function addTask(){
        
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $demora = $_POST['demora'];
        $demora_actual = $_POST['demora_actual'];
        $id_proyecto = $_POST['id_proyecto'];
        $id_tipo = $_POST['id_tipo'];
        $id_estado = $_POST['id_estado'];

        $this->tasksCRUD->addTask($nombre,$descripcion,$demora,$demora_actual,$id_proyecto,$id_tipo,$id_estado);

        $this->index();
    }

    function deleteTask(){
        $id_task = $_POST['id_task'];

        $this->tasksCRUD->deleteTask($id_task);

        $this->index();

    }

    function editTask(){
        $id_task = $_POST['id_task'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $demora = $_POST['demora'];
        $demora_actual = $_POST['demora_actual'];
        $id_proyecto = $_POST['id_proyecto'];
        $id_tipo = $_POST['id_tipo'];
        $id_estado = $_POST['id_estado'];

        $this->tasksCRUD->editTask($id_task,$nombre,$descripcion,$demora,$demora_actual,$id_proyecto,$id_tipo,$id_estado);

        $this->index();
        
    }

}