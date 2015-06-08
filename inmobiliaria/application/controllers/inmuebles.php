<?php

class Inmuebles extends CI_Controller
{
    function Inmuebles()
    {
        parent::__construct();
        $this->load->model('inmueblesCRUD');
        $this->load->model('tinmueblesCRUD');

        $this->load->model('contactosCRUD');
        $this->load->model('provinciasCRUD');
        $this->load->model('departamentosCRUD');
        $this->load->model('localidadesCRUD');
        $this->load->model('operacionesCRUD');
    }

    function index($pagina_nro = 0)
    {
        $cant_rows = 10;
        $controller = "inmuebles";
        $total_rows = $this->inmueblesCRUD->getCantInmuebles();

        $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

        $desde_row = $pagina_nro * $cant_rows;
        $inmuebles = $this->inmueblesCRUD->getXInmuebles($desde_row,$cant_rows);
        $this->load->view("main", array(
                                    "modulo"=> "inmuebles", 
                                    "pagina"=> "principal",
                                    "inmuebles" => $inmuebles,
                                    "links" => $linksPaginacion
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
        //$tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
        $contactos = $this->contactosCRUD->getContactos();
        $provincias = $this->provinciasCRUD->getProvincias();
        $operaciones = $this->operacionesCRUD->getOperaciones();
        $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
        $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
                                        "pagina"=> "form_add",
                                        "contactos" => $contactos,
                                        "provincias" => $provincias, 
                                        "operaciones" => $operaciones,
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
        $contactos = $this->contactosCRUD->getContactos();
        $provincias = $this->provinciasCRUD->getProvincias();
        $operaciones = $this->operacionesCRUD->getOperaciones();
        $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
        if(count($inmueble) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "inmuebles", 
                                            "pagina"=> "form_edit",
                                            "inmueble" => $inmueble[0],
                                            "contactos" => $contactos,
                                            "provincias" => $provincias, 
                                            "operaciones" => $operaciones,
                                            "tinmuebles" => $tinmuebles 
                                            )
                                );
        }else{
            // no hay inmueble con ese id
        }
        
    }

    function addInmueble(){
        $this->form_validation->set_rules('id_tinmueble','tipo','required');
        $this->form_validation->set_rules('id_operacion','operacion','required');
        $this->form_validation->set_rules('id_provincia','provincia','required');
        $this->form_validation->set_rules('id_departamento','departamento','required');
        $this->form_validation->set_rules('id_localidad','localidad','required');
        $this->form_validation->set_rules('calle','calle','required|max_length[50]|trim|min_length[3]');
        $this->form_validation->set_rules('altura','altura','required|max_length[6]|trim');
        $this->form_validation->set_rules('depto','departamento', 'max_length[2]|trim');
        $this->form_validation->set_rules('descripcion','descripcion','required|max_length[2000]|min_length[20]|trim');
        $this->form_validation->set_rules('moneda','moneda', 'required');
        $this->form_validation->set_rules('precio','precio', 'required|max_length[8]|min_length[2]|trim|is_numeric');
        $this->form_validation->set_rules('id_contacto','contacto', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddInmueble();
        }else{
            $loc = $_POST['provincia_text']." ".$_POST['departamento_text']." ".$_POST['localidad_text']." ".$_POST['calle']." ".$_POST['altura'];
            $coord = $this->get_geo_loc($loc);

            $id_provincia = $_POST['id_provincia']; 
            $id_departamento = $_POST['id_departamento'];
            $id_localidad = $_POST['id_localidad'];
            $direccion = htmlentities($_POST['calle']." ".$_POST['altura']);
            $piso = $_POST['piso']; 
            $depto = $_POST['depto'];
            $descripcion = htmlentities($_POST['descripcion']);
            $moneda = $_POST['moneda'];
            $precio = $_POST['precio'];
            $lat = $coord['lat'];
            $lng = $coord['lng'];
            $id_tinmueble = $_POST['id_tinmueble'];
            $id_operacion = $_POST['id_operacion'];
            $id_contacto = $_POST['id_contacto'];
            
            $this->inmueblesCRUD->addInmueble($id_provincia,$id_departamento,$id_localidad,$direccion,$piso, $depto,$descripcion,$moneda,$precio,$lat, $lng, $id_tinmueble, $id_operacion, $id_contacto);
            $this->index();
        }
    }

    function deleteInmueble(){

        $id_inmueble = $_POST['id_inmueble'];

        $this->inmueblesCRUD->deleteInmueble($id_inmueble);

        $this->index();

    }

    function editInmueble(){
        $this->form_validation->set_rules('id_tinmueble','tipo','required');
        $this->form_validation->set_rules('id_operacion','operacion','required');
        $this->form_validation->set_rules('id_provincia','provincia','required');
        $this->form_validation->set_rules('id_departamento','departamento','required');
        $this->form_validation->set_rules('id_localidad','localidad','required');
        $this->form_validation->set_rules('calle','calle','required|max_length[50]|trim|min_length[3]');
        $this->form_validation->set_rules('altura','altura','required|max_length[6]|trim');
        $this->form_validation->set_rules('depto','departamento', 'max_length[2]|trim');
        $this->form_validation->set_rules('descripcion','descripcion','required|max_length[2000]|min_length[20]|trim');
        $this->form_validation->set_rules('moneda','moneda', 'required');
        $this->form_validation->set_rules('precio','precio', 'required|max_length[8]|min_length[2]|trim|is_numeric');
        $this->form_validation->set_rules('id_contacto','contacto', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->formEditInmueble($_POST['id_inmueble']);
        }else{
            $loc = $_POST['provincia_text']." ".$_POST['departamento_text']." ".$_POST['localidad_text']." ".$_POST['calle']." ".$_POST['altura'];
            $coord = $this->get_geo_loc($loc);

            $id_inmueble = $_POST['id_inmueble'];
            $id_provincia = $_POST['id_provincia']; 
            $id_departamento = $_POST['id_departamento'];
            $id_localidad = $_POST['id_localidad'];
            $direccion = htmlentities($_POST['calle']." ".$_POST['altura']);
            $piso = $_POST['piso']; 
            $depto = $_POST['depto'];
            $descripcion = htmlentities($_POST['descripcion']);
            $moneda = $_POST['moneda'];
            $precio = $_POST['precio'];
            $lat = $coord['lat'];
            $lng = $coord['lng'];
            $id_tinmueble = $_POST['id_tinmueble'];
            $id_operacion = $_POST['id_operacion'];
            $id_contacto = $_POST['id_contacto'];
            
            $this->inmueblesCRUD->editInmueble($id_inmueble,$id_provincia,$id_departamento,$id_localidad,$direccion,$piso, $depto,$descripcion,$moneda,$precio,$lat, $lng, $id_tinmueble, $id_operacion, $id_contacto);
            $this->index();
        }
        
    }

    function buildDeptos(){
        echo $id_provincia = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $departamentos = $this->departamentosCRUD->getProdByProvincia($id_provincia);  
        $output = "<option value=''>Departamento</option>";  
        foreach ($departamentos as $d)  
        {  
            $output .= "<option value='".$d->id."'>".$d->nombre."</option>";  
        }
        echo $output;  
    }

    function buildLocalidades(){
        echo $id_departamento = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $localidades = $this->localidadesCRUD->getProdByDepto($id_departamento);  
        $output = "<option value=''>Localidad/Barrio</option>";
        foreach ($localidades as $l)  
        {  
            $output .= "<option value='".$l->id."'>".$l->nombre."</option>";  
        }
        
        echo $output;  
    }

    function get_geo_loc($loc) {
        $address = $loc; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
         
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        //$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=ASDASDASD+ADASDAS+ADAS&sensor=false');
        //$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=Buenos+Aires+Capital+Federal+XasasdwS+623&sensor=false');
        //$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=&sensor=false');

        //var_dump($geocode);
        
        $output= json_decode($geocode);
        if(sizeof($output->results) > 0){
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;
            return array("lat"=>$lat, "lng"=> $long);
        }else{
            return array("lat"=>"-34.6036844", "lng"=> "-58.3815591");//OBELISCO
        }

         
        
   }

}