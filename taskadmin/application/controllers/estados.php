<?php

class Estados extends CI_Controller
{
    function Estados()
    {
        parent::__construct();
        $this->load->model('estadosCRUD');

    }

    function index()
    {
        $estados = $this->estadosCRUD->getEstados();
        $this->load->view("main", array(
                                    "modulo"=> "estados", 
                                    "pagina"=> "principal",
                                    "estados" => $estados
                                    )
                        );
    }

    function getEstado($id_estado = 0){
        $estado = $this->estadosCRUD->getEstado($id_estado);
        if(count($estado) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "estados", 
                                        "pagina"=> "ver_estado",
                                        "estados" => $estados
                                        )
                            );
        }else{
            // No hay estados con id = $id_estado
        }

    }

    function searchEstado($search){

        $estados = $this->estadosCRUD->getEstadosSearch($search);

        if(count($estados) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "estados", 
                                        "pagina"=> "resultado_busqueda",
                                        "estados" => $estados
                                        )
                            );
        }else{
            // No hay estados con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "estados", 
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


    function formAddEstado(){

        $this->load->view("main", array(
                                        "modulo"=> "estados", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteEstado($id_estado = 0){
        $estado = $this->estadosCRUD->getEstado($id_estado);    
        if(count($estado) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "estados", 
                                            "pagina"=> "form_delete",
                                            "estado" => $estado[0]
                                            )
                                );
        }else{
            //no hay estado con ese id
        }

    }

    function formEditEstado($id_estado = 0){
        $estado = $this->estadosCRUD->getEstado($id_estado);        
        
        if(count($estado) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "estados", 
                                            "pagina"=> "form_edit",
                                            "estado" => $estado[0]
                                            )
                                );
        }else{
            // no hay estado con ese id
        }
        
    }

    function addEstado(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddEstado();
        }
        else
        {
            $nombre = $_POST['nombre'];
            $this->estadosCRUD->addEstado($nombre);
            $this->index();
        }
    }

    function deleteEstado(){
        $id_estado = $_POST['id_estado'];

        $this->estadosCRUD->deleteEstado($id_estado);

        $this->index();

    }

    function editEstado(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        if($_POST['nombre']!=$_POST['nombre_check']){
            $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        }        

        if ($this->form_validation->run() == FALSE)
        {
            $this->formEditEstado($_POST['id_estado']);
        }else{
            $id_estado = $_POST['id_estado'];
            $nombre = $_POST['nombre'];
            $this->estadosCRUD->editEstado($id_estado,$nombre);
            $this->index();
        }
        
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $estado = $this->estadosCRUD->existeNombre($str);
        if(count($estado) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}