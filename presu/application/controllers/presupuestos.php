<?php

    class Presupuestos extends CI_Controller
    {
        function Presupuestos()
        {
            parent::__construct();
            //$this->load->model('loginCRUD');
            //$this->load->model('minilinkCRUD');
        }

        function index()
        {
            //if is not logged in
            $this->panelPresupuestos();
            //else
        }
        function panelPresupuestos()
        {
            $presupuestos = $this->presupuestosCRUD->getAllPresupuestos();
            $this->load->view("main", array("modulo" => "presupuestos", "pagina" =>"panel", "presupuestos" => $presupuestos);
            
        }

        function formAddPresupuesto($id=0){
            if($id == 0){
                $id = $_POST['id_presupuesto'];
            }
            $presupuesto = $this->presupuestosCRUD->getPresupuesto($id);
            $this->load->view("main", array("modulo" => "presupuestos", "pagina" =>"add", "presupuesto" => $presupuesto);
        }

        function addPresupuesto(){
            /*FORM Validation (nombre, monto_estimado, monto_real, fecha_inicio, fecha_fin, actual)*/

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            $this->form_validation->set_rules('monto_estimado', 'Monto Estimado', 'required|min_length[1]|max_length[10]|numeric');
            $this->form_validation->set_rules('monto_real', 'Monto Real', 'required|min_length[1]|max_length[10]|numeric');
            $this->form_validation->set_rules('fecha_inicio', 'Fecha Inicio', 'required|min_length[2]|max_length[50]|callback_es_fecha');
            $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            $this->form_validation->set_rules('actual', 'Actual', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
        }

        function formEditPresupuesto($id=0){
            if($id == 0){
                $id = $_POST['id_presupuesto'];
            }
            $presupuesto = $this->presupuestosCRUD->getPresupuesto($id);
            $this->load->view("main", array("modulo" => "presupuestos", "pagina" =>"edit", "presupuesto" => $presupuesto);
        }

        function editPresupuesto(){
            /*FORM Validation (nombre, monto_estimado, monto_real, fecha_inicio, fecha_fin, actual)*/
        }

        function formDeletePresupuesto($id=0){
            if($id == 0){
                $id = $_POST['id_presupuesto'];
            }
            $presupuesto = $this->presupuestosCRUD->getPresupuesto($id);
            $this->load->view("main", array("modulo" => "presupuestos", "pagina" =>"delete", "presupuesto" => $presupuesto);
        }

        function deletePresupuesto(){
            
        }

        //FUNCIONES DE VALIDACION//
        function existe_en_bbdd($str){
            if($this->session->userdata('idusuario_presu')){ 
                $presupuesto = $this->presupuestosCRUD->existeNombre($str);
                if(count($presupuesto) > 0){
                    $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
                    return FALSE;
                }else{
                    return TRUE;
                }
            }else{
                $this->load->view('login/login');
            }
        }

        function es_fecha($str){

            $fecha = $this->traducirFecha($str);

        }

        function traducirFechaToEsp($fechaIng){
            $fechaEsp = "";
            $arr = explode("-", $fechaIng);
            $i = 0;
            if(is_array($arr)){
                foreach($arr as $a){
                    if($i==0){
                        $dia = $a[$i];
                    }
                    if($i==1){
                        $mes = $a[$i];
                    }
                    if($i==2){
                        $anio = $a[$i];
                    }
                    $i++;
                }

                if($i != 3){
                    $fechaEsp = "";

                }else{
                    $fechaEsp = $dia."/".$mes."/".$anio;
                }
            }else{
                $fechaEsp = "";
            }
            return $fechaEsp;
        }

        function traducirFechaToIng($fechaEsp){

            $fechaIng = 
            return $fechaIng;
        }

    }
?>