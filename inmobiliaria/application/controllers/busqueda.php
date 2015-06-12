<?php

class Busqueda extends CI_Controller
{
    function Busqueda()
    {
        parent::__construct();
        $this->load->model('inmueblesCRUD');
        $this->load->model('tinmueblesCRUD');

        $this->load->model('einmueblesCRUD');
        $this->load->model('contactosCRUD');
        $this->load->model('provinciasCRUD');
        $this->load->model('departamentosCRUD');
        $this->load->model('localidadesCRUD');
        $this->load->model('operacionesCRUD');

        $this->load->model('tcontactosCRUD');
        $this->load->model('fotosCRUD');

        $this->load->model('ambientesCRUD');
        $this->load->model('instalacionesCRUD');
        $this->load->model('serviciosCRUD');

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
        
    }

    function buildDeptosToSearch(){
        echo $id_provincia = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $departamentos = $this->departamentosCRUD->getDeptosByProvinciaToSearch($id_provincia);  
        $output = "<option value=''>Todos los Departamentos</option>";  
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
        $output = "<option value=''>Todos los Localidades/Barrios</option>";
        foreach ($localidades as $l)  
        {  
            $output .= "<option value='".$l->id."'>".$l->nombre."</option>";  
        }
        
        echo $output;  
    }

    function buscar($id_tinmueble = 0,$id_operacion=0,$id_provincia=0,$id_departamento=0,$id_localidad=0,$pagina_nro=0){
        $filtra = false;
        $search = "";
        $filtro_aplicado = "";

        $fotos_thumb[] = array();
        $instalaciones[] = array();
        $ambientes[] = array();
        $servicios[] = array();

        if($id_tinmueble!=0){
            $filtra = true;
            $search = $search." and tipos_inmuebles.id = ".$id_tinmueble;
        }else{
            if(isset($_POST['id_tinmueble'])){
                if($_POST['id_tinmueble']!=""){ 
                    $filtra = true;
                    $search = $search." and tipos_inmuebles.id = ".$_POST['id_tinmueble'];
                    $id_tinmueble = $_POST['id_tinmueble'];
                }
            }
        }

        if($id_operacion!=0){
            $filtra = true;
            $search = $search." and tipos_inmuebles.id = ".$id_tinmueble;
        }else{
            if(isset($_POST['id_operacion'])){
                if($_POST['id_operacion']!=""){
                    $filtra = true;
                    $search = $search." and operaciones.id = ".$_POST['id_operacion'];
                    $id_operacion = $_POST['id_operacion'];
                }
            }
        }

        if($id_provincia!=0){
            $filtra=true;
            $search = $search." and provincias.id = ".$id_provincia;
        }else{
            if(isset($_POST['id_provincia'])){
                if($_POST['id_provincia']!=""){ 
                    $filtra = true;
                    $search = $search." and provincias.id = ".$_POST['id_provincia'];
                    $id_provincia = $_POST['id_provincia'];
                }
            }
        }

        if($id_departamento!=0){
            $filtra=true;
            $search = $search." and departamentos.id = ".$id_departamento;
        }else{
            if(isset($_POST['id_departamento'])){
                if($_POST['id_departamento']!=""){ 
                    $filtra = true;
                    $search = $search." and departamentos.id = ".$_POST['id_departamento'];
                    $id_departamento = $_POST['id_departamento'];
                }
            }
        }

        if($id_localidad!=0){
            $filtra=true;
            $search = $search." and departamentos.id = ".$id_localidad;
        }else{
            if(isset($_POST['id_localidad'])){
                if($_POST['id_localidad']!=""){ 
                    $filtra = true;
                    $search = $search." and localidades.id = ".$_POST['id_localidad'];
                    $id_localidad = $_POST['id_localidad'];
                }
            }
        }

        if($filtra){
            $inmuebles = $this->inmueblesCRUD->getInmueblesFEFiltro($search);

            foreach($inmuebles as $i){
                $fotos_thumb[$i->id] = $this->fotosCRUD->getFotosByInmoGrilla($i->id);
                $instalaciones[$i->id] = $this->instalacionesCRUD->getInsByInmo($i->id);
                $ambientes[$i->id] = $this->ambientesCRUD->getAmbByInmo($i->id);
                $servicios[$i->id] = $this->serviciosCRUD->getSerByInmo($i->id);
            }

            $cant_rows = 10;
            $controller = "busqueda";
            $total_rows = $this->inmueblesCRUD->getCantInmueblesFEFiltro($search);
            $linksPaginacion = $this->getPagBusqueda($pagina_nro,$cant_rows,$total_rows,$id_tinmueble,$id_operacion,$id_provincia,$id_departamento,$id_localidad); 

            $desde_row = $pagina_nro * $cant_rows;
            $inmuebles = $this->inmueblesCRUD->getXInmueblesBusqueda($desde_row,$cant_rows,$search);
            $provincias = $this->provinciasCRUD->getProvinciasToSearch();
                
            if($id_provincia!=0){
                $departamentos = $this->departamentosCRUD->getDeptosByProvinciaToSearch($id_provincia);
            }else{
                $departamentos = array();
            }
            if($id_departamento!=0){
                $localidades = $this->localidadesCRUD->getLocalidadesByDeptoToSearch($id_departamento);
            }else{
                $localidades = array();
            }

            $operaciones = $this->operacionesCRUD->getOperacionesToSearch();
            $tinmuebles = $this->tinmueblesCRUD->getTInmueblesToSearch();
            $filtros = array(
                            "id_tinmueble" => $id_tinmueble,
                            "id_operacion" => $id_operacion,
                            "id_provincia" => $id_provincia,
                            "id_departamento" => $id_departamento,
                            "id_localidad" => $id_localidad

                            );
        }else{
            
            $cant_rows = 10;
            $controller = "inmuebles";
            $total_rows = $this->inmueblesCRUD->getCantInmuebles();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $provincias = $this->provinciasCRUD->getProvinciasToSearch();
            $departamentos = array();
            $localidades = array();
            $operaciones = $this->operacionesCRUD->getOperacionesToSearch();
            $tinmuebles = $this->tinmueblesCRUD->getTInmueblesToSearch();

            $desde_row = $pagina_nro * $cant_rows;
            $inmuebles = $this->inmueblesCRUD->getXInmuebles($desde_row,$cant_rows);

            foreach($inmuebles as $i){
                $fotos_thumb[$i->id] = $this->fotosCRUD->getFotosByInmoGrilla($i->id);
                $instalaciones[$i->id] = $this->instalacionesCRUD->getInsByInmo($i->id);
                $ambientes[$i->id] = $this->ambientesCRUD->getAmbByInmo($i->id);
                $servicios[$i->id] = $this->serviciosCRUD->getSerByInmo($i->id);
            }
            $filtros = array(
                "id_tinmueble" => "",
                "id_operacion" => "",
                "id_provincia" => "",
                "id_departamento" => "",
                "id_localidad" => ""

                );
        }

        $this->load->view("main", array(
                                    "modulo"=> "grilla", 
                                    "pagina"=> "principal",
                                    "inmuebles" => $inmuebles,
                                    "links" => $linksPaginacion,
                                    "filtros" => $filtros,
                                    "provincias" => $provincias,
                                    "departamentos" => $departamentos,
                                    "localidades" => $localidades,
                                    "operaciones" => $operaciones,
                                    "tinmuebles" => $tinmuebles,
                                    "inmuebles" => $inmuebles,
                                    "instalaciones" => $instalaciones,
                                    "ambientes" => $ambientes,
                                    "servicios" => $servicios,
                                    "fotos_thumb" => $fotos_thumb
                                    ));


    }

    function getPagBusqueda($pagina_nro,$cant_rows,$total_rows,$id_tinmueble,$id_operacion,$id_provincia,$id_departamento,$id_localidad,$controller=0){
        $links = "";
        $cont = 0;
        $cantPages = 0;
        $aparece = 0;

        if($total_rows > $cant_rows){
            $cantPages = ceil($total_rows / $cant_rows);
            if(($total_rows % $cant_rows) > 0 ){
                $s = 1;
            }else if(($total_rows % $cant_rows) == 0 ){
                $s = 0;


            }
            $s = $s + $cantPages;
            $links = $links."<div class='pagination'><ul>";



            for($x = 0 ; $x < $cantPages ; $x++){
                if($cantPages < 11){
                    $cont++;
                    $aparece = $x + 1;

                    if($pagina_nro == $x){
                        $str = " class ='active'";

                    }else{
                        $str ="";                
                    }
                    $links = $links."<li ".$str."><a href='".base_url()."index.php/busqueda/buscar/".$id_tinmueble."/".$id_operacion."/".$id_provincia."/".$id_departamento."/".$id_localidad."/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
                    if($cont == 10){
                        $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";
                        $links = $links."<div class='pagination'><ul>";

                    }
                }else{
                    $cont++;
                    $aparece = $x + 1;

                    if($pagina_nro == $x){
                        $str = " class ='active'";

                    }else{
                        $str ="";                
                    }
                    
                    if(($aparece==1)||($aparece==2)||($aparece==3)||//q aparezcan los primeros 3
                        ($aparece==($pagina_nro-1))||($aparece==$pagina_nro)||
                        ($aparece==($pagina_nro+1))||($aparece==($pagina_nro+2))||($aparece==($pagina_nro+3))||
                        ($aparece==($cantPages-1))||($aparece==$cantPages)||($aparece==($cantPages-2))//q aparezcan los ultimos 3
                        )
                    {
                        $links = $links."<li ".$str."><a href='".base_url()."index.php/busqueda/buscar/".$id_tinmueble."/".$id_operacion."/".$id_provincia."/".$id_departamento."/".$id_localidad."/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
                        if(($aparece == 3)||($aparece == ($pagina_nro+3))||($aparece == ($pagina_nro-3))
                            ){
                            if(($aparece!=1)&&($aparece!=2)){
                                $links = $links.". . .  ";
                            }

                        }

                    }
                    

                }
        
            }
            $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";
        }else{
            $links = "";
        }
        return $links;
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