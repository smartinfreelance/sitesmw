<?php

class Login extends CI_Controller
{
    function Login()
    {
        parent::__construct();
        $this->load->model('loginCRUD');
        $this->load->model('productosCRUD');
    }

    function index()
    {
        $this->load->view(
            'login/login'
        );
    }
    function intenta_loggear()
    {
        $usuario = array();
        if(isset($_POST['usuario'])) $usuario = $this->loginCRUD->intentaLoggear($_POST['usuario'],$_POST['pass']);
        if(count($usuario) > 0){
            $datos=array("idusuario_inmo"=> $usuario[0]->id,"nombre"=> $usuario[0]->nombre,"usuario"=> $usuario[0]->usuario,"rol"=> $usuario[0]->id_rol);
            $this->session->set_userdata($datos);
            $productos = $this->productosCRUD->getDiezProductos();
            $linksPaginacion = $this->getLinksPaginacion(0,10); 
            $this->load->view(
                'main', 
                array(
                    "modulo" => 'productos',
                    "pagina" => 'panel',
                    "productos" => $productos,
                    "links" => $linksPaginacion
                )
            );
        }else{
            $this->load->view('login/login');
        }
    }

    function intenta_desloggear()
    {
        $datos=array("idusuario"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }

    /*PAGINATION FUNCTIONS*/

    function getLinksPaginacion($nroPagina = 0,$cantResPP = 10){
        $links = "";
        $cont = 0;
        $cantPages = 0;
        $aparece = 0;

        $cantRows = $this->productosCRUD->getCantProductos();
        if($cantRows > $cantResPP){
            $cantPages = round($cantRows / $cantResPP);
            if(($cantRows % $cantResPP) > 0 ){
                $s = 1;
            }else if(($cantRows % $cantResPP) == 0 ){
                $s = 0;


            }
            $s = $s + $cantPages;
        }

        $links = $links."<div class='pagination'><ul>";



        for($x = 0 ; $x < $cantPages ; $x++){
            if($cantPages < 11){
                $cont++;
                $aparece = $x + 1;

                if($nroPagina == $x){
                    $str = " class ='active'";

                }else{
                    $str ="";                
                }
                $links = $links."<li ".$str."><a href='".base_url()."index.php/productos/paginado/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
                if($cont == 10){
                    $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";
                    $links = $links."<div class='pagination'><ul>";

                }
            }else{
                $cont++;
                $aparece = $x + 1;

                if($nroPagina == $x){
                    $str = " class ='active'";

                }else{
                    $str ="";                
                }
                
                if(($aparece==1)||($aparece==2)||($aparece==3)||//q aparezcan los primeros 3
                    ($aparece==($nroPagina-1))||($aparece==$nroPagina)||
                    ($aparece==($nroPagina+1))||($aparece==($nroPagina+2))||($aparece==($nroPagina+3))||
                    ($aparece==($cantPages-1))||($aparece==$cantPages)||($aparece==($cantPages-2))//q aparezcan los ultimos 3
                    )
                {
                    $links = $links."<li ".$str."><a href='".base_url()."index.php/productos/paginado/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
                    if(($aparece == 3)||($aparece == ($nroPagina+3))||($aparece == ($nroPagina-3))
                        ){
                        if(($aparece!=1)&&($aparece!=2)){
                            $links = $links.". . .  ";
                        }

                    }

                }
                

            }
    
        }
        $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";
        

        return $links;
    }
    function paginado($nroPagina){

        $aPartirDe = $nroPagina * 10;        
        $productos = $this->productosCRUD->getDiezProductos($aPartirDe); //nro: es a partir de que posicion empieza a traer
        $linksPaginacion = $this->getLinksPaginacion($nroPagina, 10);
        //$pagos_registrados = $this->PedidosCRUD->getSaldoPagosPedidos();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'productos',
                "pagina" => 'panel', 
                "productos" => $productos,
                "links" => $linksPaginacion
            )
        );



    }

    /*PAGINATION FUNCTIONS*/
    
}