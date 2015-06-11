<?php

class Busqueda extends CI_Controller
{
    function Busqueda()
    {
        parent::__construct();
        $this->load->model('inmueblesCRUD');

        $this->load->model('provinciasCRUD');
        $this->load->model('operacionesCRUD');
        $this->load->model('tinmueblesCRUD');
        $this->load->model('departamentosCRUD');
        $this->load->model('localidadesCRUD');
    }

    function index($pagina_nro = 0)
    {
        $provincias = $this->provinciasCRUD->getProvinciasToSearch();
        $operaciones = $this->operacionesCRUD->getOperacionesToSearch();
        $tinmuebles = $this->tinmueblesCRUD->getTInmueblesToSearch();

        $this->load->view("main", array(
                                        "modulo"=> "busqueda", 
                                        "pagina"=> "busqueda",
                                        "provincias" => $provincias,
                                        "operaciones" => $operaciones,
                                        "tinmuebles" => $tinmuebles
                                        )
                            );
        /*
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "ambientes";
            $total_rows = $this->ambientesCRUD->getCantAmbientes();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $ambientes = $this->ambientesCRUD->getXAmbientes($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "ambientes", 
                                        "pagina"=> "principal",
                                        "ambientes" => $ambientes,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }*/
    }

    function buildDeptosToSearch(){
        echo $id_provincia = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $departamentos = $this->departamentosCRUD->getDeptosByProvinciaToSearch($id_provincia);  
        $output = "<option value=''>Departamento</option>";  
        foreach ($departamentos as $d)  
        {  
            $output .= "<option value='".$d->id."'>".$d->nombre."</option>";  
        }
        echo $output;  
    }

    function buildLocalidadesToSearch(){
        echo $id_departamento = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $localidades = $this->localidadesCRUD->getLocalidadesByDeptoToSearch($id_departamento);  
        $output = "<option value=''>Localidad/Barrio</option>";
        foreach ($localidades as $l)  
        {  
            $output .= "<option value='".$l->id."'>".$l->nombre."</option>";  
        }
        
        echo $output;  
    }

    function buscar(){
        $filtra = false;
        $search = "";
        if($_POST['id_tinmueble']!=""){
            $filtra = true;
            $search = $search." and tipos_inmuebles.id = ".$_POST['id_tinmueble'];
        }
        if($_POST['id_operacion']!=""){
            $filtra = true;
            $search = $search." and operaciones.id = ".$_POST['id_operacion'];
        }
        if($_POST['id_provincia']!=""){
            $filtra = true;
            $search = $search." and provincias.id = ".$_POST['id_provincia'];
        }
        if($_POST['id_departamento']!=""){
            $filtra = true;
            $search = $search." and departamentos.id = ".$_POST['id_departamento'];
        }
        if($_POST['id_localidad']!=""){
            $filtra = true;
            $search = $search." and localidades.id = ".$_POST['id_localidad'];
        }

        if($filtra){
            $inmuebles = $this->inmueblesCRUD->getInmueblesFEFiltro($search);
        }else{
            $inmuebles = $this->inmueblesCRUD->getInmuebles();
        }

        /*$cant_rows = 10;
        $controller = "inmuebles";
        $total_rows = $this->inmueblesCRUD->getCantInmuebles();

        $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

        $desde_row = $pagina_nro * $cant_rows;
        $inmuebles = $this->inmueblesCRUD->getXInmuebles($desde_row,$cant_rows);*/
        $this->load->view("main", array(
                                    "modulo"=> "busqueda", 
                                    "pagina"=> "resultado",
                                    "inmuebles" => $inmuebles/*,
                                    "links" => $linksPaginacion*/
                                    ));


    }

    function getAmbiente($id_ambiente = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $ambiente = $this->ambientesCRUD->getAmbiente($id_ambiente);
            if(count($ambiente) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "ambientes", 
                                            "pagina"=> "ver_ambiente",
                                            "ambiente" => $ambiente[0]
                                            )
                                );
            }else{
                // No hay ambientes con id = $id_ambiente
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchAmbiente($search){

        if($this->session->userdata('idusuario_inmo')){ 

            $ambientes = $this->ambientesCRUD->getAmbientesSearch($search);

            if(count($ambientes) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "ambientes", 
                                            "pagina"=> "resultado_busqueda",
                                            "ambientes" => $ambientes
                                            )
                                );
            }else{
                // No hay ambientes con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "ambientes", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }
    }

    function envioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
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
        }else{
            $this->load->view('login/login');
        }
    }


    function formAddAmbiente(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "ambientes", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteAmbiente($id_ambiente = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $ambiente = $this->ambientesCRUD->getAmbiente($id_ambiente);    
            if(count($ambiente) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "ambientes", 
                                                "pagina"=> "form_delete",
                                                "ambiente" => $ambiente[0]
                                                )
                                    );
            }else{
                //no hay ambiente con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditAmbiente($id_ambiente = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $ambiente = $this->ambientesCRUD->getAmbiente($id_ambiente);        
            
            if(count($ambiente) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "ambientes", 
                                                "pagina"=> "form_edit",
                                                "ambiente" => $ambiente[0]
                                                )
                                    );
            }else{
                // no hay ambiente con ese id
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function addAmbiente(){

        if($this->session->userdata('idusuario_inmo')){ 

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddAmbiente();
            }
            else
            {        
                $nombre = htmlentities($_POST['nombre']);

                $this->ambientesCRUD->addAmbiente($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteAmbiente(){

        if($this->session->userdata('idusuario_inmo')){ 
            $id_ambiente = $_POST['id_ambiente'];

            $this->ambientesCRUD->deleteAmbiente($id_ambiente);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editAmbiente(){

        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditAmbiente($_POST['id_ambiente']);
            }
            else
            {
                $id_ambiente =  $_POST['id_ambiente'];
                $nombre = htmlentities($_POST['nombre']);

                $this->ambientesCRUD->editAmbiente($id_ambiente,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){ 
            $ambiente = $this->ambientesCRUD->existeNombre($str);
            if(count($ambiente) > 0){
                $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            $this->load->view('login/login');
        }
    }



}