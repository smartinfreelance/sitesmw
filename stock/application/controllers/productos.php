<?php

class Productos extends CI_Controller
{
    function Productos()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('productosCRUD');
        $this->load->model('categoriasCRUD');
    }

    function index()
    {
        //$productos = $this->productosCRUD->getProductos();
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
    }

    function addProducto(){
        $categorias = $this->categoriasCRUD->getCategorias();

        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'productos',
                            "pagina" => 'add',
                            "categorias" => $categorias
                        ));

    }

    function confirmAddProducto(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|decimal');
        $this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('stock_max', 'Stock Maximo', 'required|numeric|greater_than['.$_POST["stock_min"].']');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('nombre', 'Nombre', 'is_unique[productos.nombre]');
        if (($this->form_validation->run() == FALSE)){
            $this->addProducto();            
        }else{
            $this->productosCRUD->addProducto($_POST['nombre'], $_POST['precio'], $_POST['id_categoria'], $_POST['stock'], $_POST['stock_min'], $_POST['stock_max']);

            $this->index();

        }

    }

    function editProducto($idProducto){
        $producto = $this->productosCRUD->getProducto($idProducto);
        $categorias = $this->categoriasCRUD->getCategorias();
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'productos',
                            "pagina" => 'edit',
                            "producto" => $producto[0],
                            "categorias" => $categorias,
                            "idProducto" => $idProducto
                        ));        
    }

    function confirmEditProducto(){
        $idProducto = $_POST['id'];
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('stock_max', 'Stock Maximo', 'required|numeric|greater_than['.$_POST["stock_min"].']');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

        if (($this->form_validation->run() == FALSE)){
            $producto = $this->productosCRUD->getProducto($idProducto);
            $categorias = $this->categoriasCRUD->getCategorias();

            $this->load->view(
                        'main',
                        array(
                            "modulo" => 'productos',
                            "pagina" => 'edit',
                            "producto" => $producto[0],
                            "categorias" => $categorias,
                            "idProducto" => $idProducto
                        ));


        }else{
            $this->productosCRUD->editProducto($idProducto,$_POST['nombre'], $_POST['precio'], $_POST['id_categoria'], $_POST['stock'], $_POST['stock_min'], $_POST['stock_max']);

            $this->index();

        }
        
    }

    function eliminarProducto($idProducto){
        $producto = $this->productosCRUD->getProducto($idProducto);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'productos',
                            "pagina" => 'delete',
                            "producto" => $producto[0],
                            "idProducto" => $idProducto
                        ));        
    }

    function confirmEliminarProducto(){
        $idProducto = $_POST['id'];
        $this->productosCRUD->eliminarProducto($idProducto);
        $this->index();        
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