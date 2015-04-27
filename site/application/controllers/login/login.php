<?php

class Login extends CI_Controller
{
    function Login()
    {
        parent::Controller();
        $this->load->model('login_model');
                    
    }

    function index()
    {
		
        $this->load->view(
			'backend/main', 
			array(
				"modulo" => 'productos/login',
				"pagina" => 'login',
                "producto" => ''
			)
		);
    }
    function intenta_loggear()
    {
        $usuario = array();
        if(isset($_POST['usuario'])) $usuario = $this->loginCRUD->intentaLoggear($_POST['usuario'],$_POST['pass']);
        


        if(count($usuario)>0){
            //echo "llega hasta aca!";
            $datos=array("idusuario"=> $usuario[0]->id,"nombre"=> $usuario[0]->nombre,"usuario"=> $usuario[0]->usuario,"rol"=> $usuario[0]->rol);
            $this->session->set_userdata($datos);
			//$pedidos->index();
            //$pedidos = $this->PedidosCRUD->getPedidos();

            $linksPaginacion = $this->getLinksPaginacion(10);
            $pedidos = $this->PedidosCRUD->getPedidos(0,10);
            $pdvs = $this->PdvsCRUD->getPdvs();
            $estadosp = $this->EstadospCRUD->getEstadosp();
            //$pagos_registrados = $this->PedidosCRUD->getSaldoPagosPedidos();
            $this->load->view(
    			'backend/main', 
    			array(
    				"modulo" => 'pedidos',
    				"pagina" => 'abm_pedidos', 
                    "pdvs" => $pdvs,
                    "estadosp" => $estadosp,
                    "pedidos" => $pedidos,
                    "links" => $linksPaginacion
    			)
    		);
        }else{
            $this->load->view(
			'backend/main', 
    			array(
    				"modulo" => 'login',
    				"pagina" => 'login',
    			)
    		);
        }
    }
	function getLinksPaginacion($cantResPP){
        $links = "";

        $cantRows = $this->PedidosCRUD->getCantPedidos();
        if($cantRows > $cantResPP){
            $cantPages = $cantRows / $cantResPP;
            if(($cantRows % $cantResPP) > 0 ){
                $s = 1;
            }else if(($cantRows % $cantResPP) == 0 ){
                $s = 0;
            }
            $s = $s + $cantPages;
        }

        $links = $links."<div class='pagination'><ul>";



        for($x = 1 ; $x <= $cantPages ; $x++){


            $links = $links."<li><a href='".base_url()."index.php/backend/pedidos/".$x."' style= 'strong'>".$x."</a></li>&nbsp;&nbsp;  &nbsp;&nbsp;";
    
        }
        $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";

        return $links;
    }
    function intenta_desloggear()
    {
        $datos=array("idusuario"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        if ($this->agent->is_mobile())
        {
            $this->load->view(
				'mobile/main',
                array(
                    "modulo" => 'login',
                    "pagina" =>'login'  
                )
            );
        }elseif ($this->agent->is_browser()) {
            $this->load->view(
    			'mobile/main', 
    			array(
    				"modulo" => 'login',
    				"pagina" => 'login'
    			)
    		);
        } else {
            $agent = 'No identificado.';
        }
    }
    
}