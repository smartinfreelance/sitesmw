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
        $productos = $this->productosCRUD->getProductos();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'productos',
                "pagina" => 'panel',
                "productos" => $productos
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
        $this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
        $this->form_validation->set_rules('stock_max', 'Stock Maximo', 'required|numeric');
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
        $this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
        $this->form_validation->set_rules('stock_max', 'Stock Maximo', 'required|numeric');
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
    
}