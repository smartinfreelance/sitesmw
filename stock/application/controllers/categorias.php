<?php

class Categorias extends CI_Controller
{
    function Categorias()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('categoriasCRUD');
    }

    function index()
    {
        //$categorias = $this->categoriasCRUD->getCategorias();
        $categorias = $this->categoriasCRUD->getDiezCategorias();
        $linksPaginacion = $this->getLinksPaginacion(0,10); 
        $this->load->view(
            'main', 
            array(
                "modulo" => 'categorias',
                "pagina" => 'panel',
                "categorias" => $categorias,
                "links" => $linksPaginacion
            )
        );
    }

    function addCategoria(){
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'add'
                        ));

    }

    function confirmAddCategoria(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'is_unique[categorias.nombre]');
        if (($this->form_validation->run() == FALSE)){
            $this->addCategoria();            
        }else{
            $this->categoriasCRUD->addCategoria($_POST['nombre']);

            $this->index();

        }

    }

    function editCategoria($idCategoria){
        $categoria = $this->categoriasCRUD->getCategoria($idCategoria);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'edit',
                            "categoria" => $categoria[0],
                            "idCategoria" => $idCategoria
                        ));        
    }

    function confirmEditCategoria(){
        $idCategoria = $_POST['id'];
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');

        if (($this->form_validation->run() == FALSE)){
            $categoria = $this->productosCRUD->getProducto($idCategoria);

            $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'edit',
                            "categoria" => $categoria[0],
                            "idCategoria" => $idCategoria
                        ));


        }else{
            $this->categoriasCRUD->editCategoria($idCategoria,$_POST['nombre']);

            $this->index();

        }
        
    }

    function eliminarCategoria($idCategoria){
        $categoria = $this->categoriasCRUD->getCategoria($idCategoria);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'delete',
                            "categoria" => $categoria[0],
                            "idCategoria" => $idCategoria
                        ));        
    }

    function confirmEliminarCategoria(){
        $idCategoria = $_POST['id'];
        $this->categoriasCRUD->eliminarCategoria($idCategoria);
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

        $cantRows = $this->categoriasCRUD->getCantCategorias();
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
                $links = $links."<li ".$str."><a href='".base_url()."index.php/categorias/paginado/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
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
                    $links = $links."<li ".$str."><a href='".base_url()."index.php/categorias/paginado/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
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
        $categorias = $this->categoriasCRUD->getDiezCategorias($aPartirDe); //nro: es a partir de que posicion empieza a traer
        $linksPaginacion = $this->getLinksPaginacion($nroPagina, 10);
        //$pagos_registrados = $this->PedidosCRUD->getSaldoPagosPedidos();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'categorias',
                "pagina" => 'panel', 
                "categorias" => $categorias,
                "links" => $linksPaginacion
            )
        );



    }

    /*PAGINATION FUNCTIONS*/
    
}