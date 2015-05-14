<?php

class Movimientos extends CI_Controller
{
    function Movimientos()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('movimientosCRUD');
        $this->load->model('categoriasCRUD');
        $this->load->model('productosCRUD');
    }

    function index()
    {
        //$movimientos = $this->movimientosCRUD->getMovimientos();
        $movimientos = $this->movimientosCRUD->getDiezMovimientos();
        $linksPaginacion = $this->getLinksPaginacion(0,10); 
        $this->load->view(
            'main', 
            array(
                "modulo" => 'movimientos',
                "pagina" => 'panel',
                "movimientos" => $movimientos,
                "links" => $linksPaginacion
            )
        );
    }

    function buildDropDownProd(){
        echo $idCategoria = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $productos = $this->productosCRUD->getProdByCat($idCategoria);  
        $output = null;  
        foreach ($productos as $p)  
        {  
        //here we build a dropdown item line for each  query result  
            $output .= "<option value='".$p->id."'>".$p->nombre."</option>";  
        }  
        echo $output;  
    }

    function addMovimiento(){
        $categorias = $this->categoriasCRUD->getCategorias();  
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'movimientos',
                            "pagina" => 'add',
                            "categorias" => $categorias
                        ));

    }

    function confirmAddMovimiento(){
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        if (($this->form_validation->run() == FALSE)){
            $this->addMovimiento();            
        }else{
            $producto = $this->productosCRUD->getProducto($_POST['id_producto']);

            $stock_actual = $producto[0]->stock;
            if($_POST['tipo'] == "Entrada"){
                $stock_nuevo = $stock_actual + $_POST['cantidad'];
                $cant = "+".$_POST['cantidad'];
            }else if($_POST['tipo'] == "Salida"){
                $stock_nuevo = $stock_actual - $_POST['cantidad'];
                $cant = "-".$_POST['cantidad'];
            }

            $idNewMov = $this->movimientosCRUD->addMovimiento($_POST['tipo'],$_POST['descripcion']);

            $this->movimientosCRUD->addMovProd($idNewMov,$_POST['id_producto'], $cant);            
            
            $this->productosCRUD->actualizarStockProd($stock_nuevo, $_POST['id_producto']);

            $this->index();

        }

    }

    function editMovimiento($idMovimiento){
        $movimiento = $this->movimientosCRUD->getMovimiento($idMovimiento);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'movimientos',
                            "pagina" => 'edit',
                            "movimiento" => $movimiento[0],
                            "idMovimiento" => $idMovimiento
                        ));        
    }

    function confirmEditMovimiento(){
        $idMovimiento = $_POST['id'];
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');

        if (($this->form_validation->run() == FALSE)){
            $movimiento = $this->productosCRUD->getProducto($idMovimiento);

            $this->load->view(
                        'main',
                        array(
                            "modulo" => 'movimientos',
                            "pagina" => 'edit',
                            "movimiento" => $movimiento[0],
                            "idMovimiento" => $idMovimiento
                        ));


        }else{
            $this->movimientosCRUD->editMovimiento($idMovimiento,$_POST['nombre']);

            $this->index();

        }
        
    }

    function eliminarMovimiento($idMovimiento){
        $movimiento = $this->movimientosCRUD->getMovimiento($idMovimiento);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'movimientos',
                            "pagina" => 'delete',
                            "movimiento" => $movimiento[0],
                            "idMovimiento" => $idMovimiento
                        ));        
    }

    function confirmEliminarMovimiento(){
        $idMovimiento = $_POST['id'];
        $this->movimientosCRUD->eliminarMovimiento($idMovimiento);
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

        $cantRows = $this->movimientosCRUD->getCantMovimientos();
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
                $links = $links."<li ".$str."><a href='".base_url()."index.php/movimientos/paginado/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
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
                    $links = $links."<li ".$str."><a href='".base_url()."index.php/movimientos/paginado/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
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
        $movimientos = $this->movimientosCRUD->getDiezMovimientos($aPartirDe); //nro: es a partir de que posicion empieza a traer
        $linksPaginacion = $this->getLinksPaginacion($nroPagina, 10);
        //$pagos_registrados = $this->PedidosCRUD->getSaldoPagosPedidos();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'movimientos',
                "pagina" => 'panel', 
                "movimientos" => $movimientos,
                "links" => $linksPaginacion
            )
        );



    }

    /*PAGINATION FUNCTIONS*/
    
}