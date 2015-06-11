<?php

class Inmuebles extends CI_Controller
{
    function Inmuebles()
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

        if($this->session->userdata('idusuario_inmo')){ 
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
        }else{
            $this->load->view('login/login');
        }
    }

    function getInmueble($id_inmueble = 0){
        
        if($this->session->userdata('idusuario_inmo')){ 
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
        }else{
            $this->load->view('login/login');
        }
    }

    function searchInmueble($id_barrio, $cant_ambientes, $rango_precio){

        if($this->session->userdata('idusuario_inmo')){ 

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
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){
        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "inmuebles", 
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


    function formAddInmueble($fix = false,$id_provincia = 0 , $id_departamento = 0, $id_localidad = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            //$tinmuebles = $this->tinmueblesCRUD->getTInmuebles();
            $contactos = $this->contactosCRUD->getContactos();

            $provincias = $this->provinciasCRUD->getProvincias();
            $departamentos = $this->departamentosCRUD->getDeptosByProvincia($id_provincia);
            $localidades = $this->localidadesCRUD->getLocalidadesByDepto($id_departamento);
            
            $operaciones = $this->operacionesCRUD->getOperaciones();
            $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();

            $estados_inmueble = $this->einmueblesCRUD->getEInmuebles();

            $tcontactos = $this->tcontactosCRUD->getTContactos(); 

            $ambientes = $this->ambientesCRUD->getAmbientes();
            $instalaciones = $this->instalacionesCRUD->getInstalaciones();
            $servicios = $this->serviciosCRUD->getServicios();

            if($fix){
                $pagina = "fix_add";
            }else{
                $pagina = "form_add";
            }
            $this->load->view("main", array(
                                            "modulo"=> "inmuebles", 
                                            "pagina"=> $pagina,
                                            "contactos" => $contactos,
                                            "provincias" => $provincias,
                                            "departamentos" => $departamentos,
                                            "localidades" => $localidades,
                                            "operaciones" => $operaciones,
                                            "tinmuebles" => $tinmuebles,
                                            "tcontactos" => $tcontactos,
                                            "estados_inmueble" => $estados_inmueble,
                                            "ambientes" => $ambientes,
                                            "instalaciones" => $instalaciones,
                                            "servicios" => $servicios
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteInmueble($id_inmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
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
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditInmueble($id_inmueble = 0,$fix = false, $id_provincia=0,$id_departamento=0,$id_localidad=0){
        
        if($this->session->userdata('idusuario_inmo')){ 

            $inmueble = $this->inmueblesCRUD->getInmueble($id_inmueble);
            if($fix){
                $pagina = "fix_edit";
            }else{
                $id_provincia = $inmueble[0]->id_provincia;
                $id_departamento = $inmueble[0]->id_departamento;
                $id_localidad = $inmueble[0]->id_localidad;
                $pagina = "form_edit";
            }
            
            $contactos = $this->contactosCRUD->getContactos();
            $provincias = $this->provinciasCRUD->getProvincias();
            $departamentos = $this->departamentosCRUD->getDeptosByProvincia($id_provincia);
            $localidades = $this->localidadesCRUD->getLocalidadesByDepto($id_departamento);
            $operaciones = $this->operacionesCRUD->getOperaciones();
            $tinmuebles = $this->tinmueblesCRUD->getTInmuebles();

            $estados_inmueble = $this->einmueblesCRUD->getEInmuebles();

            $fotos = $this->fotosCRUD->getFotosByInmo($id_inmueble);

            $ambientes = $this->ambientesCRUD->getAmbientes();
            $ambientes_seleccionados = $this->ambientesCRUD->getAmbByInmo($id_inmueble);
            $instalaciones = $this->instalacionesCRUD->getInstalaciones();
            $instalaciones_seleccionadas = $this->instalacionesCRUD->getInsByInmo($id_inmueble);
            $servicios = $this->serviciosCRUD->getServicios();
            $servicios_seleccionados = $this->serviciosCRUD->getSerByInmo($id_inmueble);

            if(count($inmueble) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "inmuebles", 
                                                "pagina"=> $pagina,
                                                "inmueble" => $inmueble[0],
                                                "contactos" => $contactos,
                                                "provincias" => $provincias, 
                                                "departamentos" => $departamentos, 
                                                "localidades" => $localidades, 
                                                "operaciones" => $operaciones,
                                                "tinmuebles" => $tinmuebles,
                                                "estados_inmueble" => $estados_inmueble,
                                                "fotos" => $fotos,
                                                "ambientes" => $ambientes,
                                                "instalaciones" => $instalaciones,
                                                "servicios" => $servicios,
                                                "amb_sel" => $ambientes_seleccionados,
                                                "ins_sel" => $instalaciones_seleccionadas,
                                                "ser_sel" => $servicios_seleccionados
                                                )
                                    );
            }else{
                // no hay inmueble con ese id
            }
        }else{
            $this->load->view('login/login');
        }
        
    }

    function addInmueble(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->form_validation->set_rules('id_tinmueble','tipo','required');
            $this->form_validation->set_rules('id_operacion','operacion','required');
            $this->form_validation->set_rules('id_provincia','provincia','required');
            $this->form_validation->set_rules('id_departamento','departamento','required');
            $this->form_validation->set_rules('id_localidad','localidad','required');
            $this->form_validation->set_rules('calle','calle','required|max_length[50]|trim|min_length[3]');
            $this->form_validation->set_rules('altura','altura','required|max_length[6]|is_numeric|trim');
            $this->form_validation->set_rules('piso','piso', 'required|max_length[2]|trim');
            $this->form_validation->set_rules('depto','departamento', 'max_length[2]|trim');
            $this->form_validation->set_rules('descripcion','descripcion','required|max_length[2000]|min_length[20]|trim');
            $this->form_validation->set_rules('moneda','moneda', 'required');
            $this->form_validation->set_rules('precio','precio', 'required|max_length[8]|min_length[2]|trim|is_numeric');

            $this->form_validation->set_rules('estado_inmueble','estado del inmueble', 'required');
            $this->form_validation->set_rules('antiguedad','antiguedad', 'trim|is_numeric|max_length[3]');
            $this->form_validation->set_rules('superficie_cubierta','superficie cubierta', 'trim|is_numeric');
            $this->form_validation->set_rules('superficie_descubierta','superficie descubierta', 'trim|is_numeric');

            $this->form_validation->set_rules('contact_exist','radio button contacto', 'required');

            $this->form_validation->set_rules('ambientes[]', 'Ambientes', '');
            $this->form_validation->set_rules('instalaciones[]', 'Instalaciones', '');
            $this->form_validation->set_rules('servicios[]', 'Servicios', '');
            
            if($_POST['contact_exist'] == "contacto_nuevo"){
                $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
                $this->form_validation->set_rules('telefono', 'telefono', 'required|min_length[7]|max_length[14]|is_numeric');
                $this->form_validation->set_rules('id_tipo', 'tipo contacto', 'required');
                $this->form_validation->set_rules('mail', 'e-mail', 'required|valid_email');
            }else if($_POST['contact_exist'] == "contacto_existente"){
                $this->form_validation->set_rules('id_contacto','contacto', 'required');
            }

            if ($this->form_validation->run() == FALSE)
            {
                if($_POST['id_provincia'] == ""){ $id_provincia = 0; }else{ $id_provincia = $_POST['id_provincia']; }
                if($_POST['id_departamento'] == ""){ $id_departamento = 0; }else{ $id_departamento = $_POST['id_departamento']; }
                if($_POST['id_localidad'] == ""){ $id_localidad = 0; }else{ $id_localidad = $_POST['id_localidad']; }
                $this->formAddInmueble(true,$id_provincia,$id_departamento,$id_localidad);
            }else{
                if($_POST['contact_exist'] == "contacto_nuevo"){
                    $nombre = htmlentities($_POST['nombre']);
                    $telefono = $_POST['telefono'];
                    $id_tipo = $_POST['id_tipo'];
                    $mail = $_POST['mail'];
                    $id_contacto = $this->contactosCRUD->addContacto($nombre,$telefono,$id_tipo,$mail);
                }else if($_POST['contact_exist'] == "contacto_existente"){
                    $id_contacto = $_POST['id_contacto'];
                }


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
                
                $id_inmueble = $this->inmueblesCRUD->addInmueble($id_provincia,$id_departamento,$id_localidad,$direccion,$piso, $depto,$descripcion,$moneda,$precio,$lat, $lng, $id_tinmueble, $id_operacion, $id_contacto);

                $ambientes = $_POST['ambientes'];
                if(isset($_POST['ambientes'])) {
                    foreach ($ambientes as $id_ambiente){
                        $this->ambientesCRUD->addInmoAmb($id_inmueble,$id_ambiente);
                    }
                }
                
                $instalaciones = $_POST['instalaciones'];
                if(isset($_POST['instalaciones'])) {
                    foreach ($instalaciones as $id_instalacion){
                        $this->instalacionesCRUD->addInmoInst($id_inmueble,$id_instalacion);
                    }
                }
                $servicios = $_POST['servicios'];
                if(isset($_POST['servicios'])) {
                    foreach ($servicios as $id_servicio){
                        $this->serviciosCRUD->addInmoServ($id_inmueble,$id_servicio);
                    }
                }



                $inmueble = $this->inmueblesCRUD->getInmueble($id_inmueble);
                //$this->cargar_imagen($id_inmueble);
                $fotos = $this->fotosCRUD->getFotosByInmo($id_inmueble);
                $this->load->view("main", array(
                                            "modulo"=> "inmuebles", 
                                            "pagina"=> "form_add_foto",
                                            "inmueble" => $inmueble[0],
                                            "fotos" => $fotos
                                            )
                                );

                //$this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function form_cargar_foto($id_inmueble = 0){
        $inmueble = $this->inmueblesCRUD->getInmueble($id_inmueble);
        $fotos = $this->fotosCRUD->getFotosByInmo($id_inmueble);
                    //$this->cargar_imagen($id_inmueble);
                    $this->load->view("main", array(
                                                "modulo"=> "inmuebles", 
                                                "pagina"=> "form_add_foto",
                                                "inmueble" => $inmueble[0],
                                                "fotos" => $fotos
                                                )
                                    );
    }

    function cargar_foto($id_inmueble = 0)
    {
        //echo base_url().'uploads/';
        $id_inmueble = $_POST['id_inmueble'];

        $date = date("dmY_His"); 
        $config['file_name'] = $id_inmueble."_".$date;
        $config['upload_path'] = './uploads/fotos_inmuebles/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $inmueble = $this->inmueblesCRUD->getInmueble($_POST['id_inmueble']);
            $fotos = $this->fotosCRUD->getFotosByInmo($_POST['id_inmueble']);

            $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
                                        "pagina"=> "form_add_foto",
                                        "inmueble" => $inmueble[0],
                                        "fotos" => $fotos,
                                        "error" => $error
                                        )
                            );
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $datos = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $datos['full_path'];//base_url().'uploads/fotos_inmuebles/'.$datos['raw_name'].$datos['file_ext'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']    = 100;
            $config['height']   = 75;

            $this->load->library('image_lib', $config); 

            $this->image_lib->resize();


            $path = 'uploads/fotos_inmuebles/'.$datos['raw_name'].$datos['file_ext'];
            $path_thumb = 'uploads/fotos_inmuebles/'.$datos['raw_name']."_thumb".$datos['file_ext'];

            $this->fotosCRUD->addFoto($path,$path_thumb,$id_inmueble);

            $inmueble = $this->inmueblesCRUD->getInmueble($_POST['id_inmueble']);
            $fotos = $this->fotosCRUD->getFotosByInmo($_POST['id_inmueble']);

            $this->load->view("main", array(
                                        "modulo"=> "inmuebles", 
                                        "pagina"=> "form_add_foto",
                                        "inmueble" => $inmueble[0],
                                        "fotos" => $fotos
                                        )
                            );
            
        }
    }

    function eliminarFoto($id_inmueble, $id_foto){

        $this->fotosCRUD->deleteFoto($id_foto);
        $this->form_cargar_foto($id_inmueble);

    }

    function deleteInmueble(){

        if($this->session->userdata('idusuario_inmo')){ 

            $id_inmueble = $_POST['id_inmueble'];

            $this->inmueblesCRUD->deleteInmueble($id_inmueble);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editInmueble(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->form_validation->set_rules('id_inmueble','id inmueble','required');
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
            
            $this->form_validation->set_rules('estado_inmueble','estado del inmueble', 'required');
            $this->form_validation->set_rules('antiguedad','antiguedad', 'trim|is_numeric|max_length[3]');
            $this->form_validation->set_rules('superficie_cubierta','superficie_cubierta', 'trim|is_numeric');
            $this->form_validation->set_rules('superficie_descubierta','superficie descubierta', 'trim|is_numeric');

            $this->form_validation->set_rules('ambientes[]', 'Ambientes', '');
            $this->form_validation->set_rules('instalaciones[]', 'Instalaciones', '');
            $this->form_validation->set_rules('servicios[]', 'Servicios', '');

            if ($this->form_validation->run() == FALSE)
            {
                if($_POST['id_provincia'] == ""){ $id_provincia = 0; }else{ $id_provincia = $_POST['id_provincia']; }
                if($_POST['id_departamento'] == ""){ $id_departamento = 0; }else{ $id_departamento = $_POST['id_departamento']; }
                if($_POST['id_localidad'] == ""){ $id_localidad = 0; }else{ $id_localidad = $_POST['id_localidad']; }
                $this->formEditInmueble($_POST['id_inmueble'],true,$id_provincia,$id_departamento,$id_localidad);
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

                $this->ambientesCRUD->removeAmbByInmo($id_inmueble);
                if(isset($_POST['ambientes'])) {
                    $ambientes = $_POST['ambientes'];
                    foreach ($ambientes as $id_ambiente){
                        $this->ambientesCRUD->addInmoAmb($id_inmueble,$id_ambiente);
                    }
                }
                
                $this->instalacionesCRUD->removeInsByInmo($id_inmueble);
                if(isset($_POST['instalaciones'])) {
                    $instalaciones = $_POST['instalaciones'];
                    foreach ($instalaciones as $id_instalacion){
                        $this->instalacionesCRUD->addInmoInst($id_inmueble,$id_instalacion);
                    }
                }
                
                $this->serviciosCRUD->removeSerByInmo($id_inmueble);
                if(isset($_POST['servicios'])) {
                    $servicios = $_POST['servicios'];
                    foreach ($servicios as $id_servicio){
                        $this->serviciosCRUD->addInmoServ($id_inmueble,$id_servicio);
                    }
                }
                
                $this->inmueblesCRUD->editInmueble($id_inmueble,$id_provincia,$id_departamento,$id_localidad,$direccion,$piso, $depto,$descripcion,$moneda,$precio,$lat, $lng, $id_tinmueble, $id_operacion, $id_contacto);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }

    function buildDeptos(){
        echo $id_provincia = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $departamentos = $this->departamentosCRUD->getDeptosByProvincia($id_provincia);  
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
        $localidades = $this->localidadesCRUD->getLocalidadesByDepto($id_departamento);  
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