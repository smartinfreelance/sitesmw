<?php

class Tasks extends CI_Controller
{
    function Tasks()
    {
        parent::__construct();
        $this->load->model('tasksCRUD');
        $this->load->model('ttasksCRUD');
        $this->load->model('proyectosCRUD');
        $this->load->model('estadosCRUD');
        $this->load->model('usuariosCRUD');
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
                                        "task" => $task[0]
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
        $proyectos = $this->proyectosCRUD->getProyectos();
        $estados = $this->estadosCRUD->getEstados();
        $ttasks = $this->ttasksCRUD->getTTasks();
        $usuarios = $this->usuariosCRUD->getUsuarios();
        $this->load->view("main", array(
                                        "modulo"=> "tasks", 
                                        "pagina"=> "form_add",
                                        "proyectos" => $proyectos,
                                        "estados" => $estados,
                                        "ttasks" => $ttasks,
                                        "usuarios" => $usuarios
                                        )
                            );

    }

    function formDeleteTask($id_task = 0){
        $task = $this->tasksCRUD->getTask($id_task);    
        if(count($task) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "tasks", 
                                            "pagina"=> "form_delete",
                                            "task" => $task[0]
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
                                            "task" => $task[0]
                                            )
                                );
        }else{
            // no hay task con ese id
        }
        
    }

    function addTask(){
        
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|max_length[50]|min_length[2]|required');
        $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|max_length[2000]|min_length[5]|required');
        $this->form_validation->set_rules('demora','demora','trim|max_length[10]|min_length[2]|required');
        $this->form_validation->set_rules('demora_actual','demora actual','trim|max_length[10]|min_length[2]');
        $this->form_validation->set_rules('id_proyecto','proyecto','required');
        $this->form_validation->set_rules('id_ttask','tipo','required');
        $this->form_validation->set_rules('id_estado','estado','required');
        $this->form_validation->set_rules('id_usuario','usuario asignado','required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddTask();
        }else{
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $demora = $_POST['demora'];
            if($_POST['demora_actual'] == ""){
                $demora_actual = "0h";
            }else{
                $demora_actual = $_POST['demora_actual'];
            }
            $id_proyecto = $_POST['id_proyecto'];
            $id_tipo = $_POST['id_ttask'];
            $id_estado = $_POST['id_estado'];

            $this->tasksCRUD->addTask($nombre,$descripcion,$demora,$demora_actual,$id_proyecto,$id_tipo,$id_estado);
            $this->index();
        }        
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
        $id_tipo = $_POST['id_ttask'];
        $id_estado = $_POST['id_estado'];

        $this->tasksCRUD->editTask($id_task,$nombre,$descripcion,$demora,$demora_actual,$id_proyecto,$id_tipo,$id_estado);

        $this->index();
        
    }

}