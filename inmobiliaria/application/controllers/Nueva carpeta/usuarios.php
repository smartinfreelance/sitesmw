<?php

class Usuarios extends CI_Controller
{
    function Usuarios()
    {
        parent::__construct();
        $this->load->model('usuariosCRUD');
    }

    function index($pagina_nro = 0)
    {
        $cant_rows = 2;
        $controller = "usuarios";
        $total_rows = $this->usuariosCRUD->getCantUsuarios();

        $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

        $desde_row = $pagina_nro * $cant_rows;
        $usuarios = $this->usuariosCRUD->getXUsuarios($desde_row,$cant_rows);
        $this->load->view("main", array(
                                    "modulo"=> "usuarios", 
                                    "pagina"=> "principal",
                                    "usuarios" => $usuarios,
                                    "links" => $linksPaginacion
                                    )
                        );
    }

    function getUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);
        if(count($usuario) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "ver_usuario",
                                        "usuario" => $usuario[0]
                                        )
                            );
        }else{
            // No hay usuarios con id = $id_usuario
        }

    }

    function searchUsuario($id_barrio, $cant_ambientes, $rango_precio){

        $usuarios = $this->usuariosCRUD->getUsuariosSearch($id_barrio, $cant_ambientes, $rango_precio);

        if(count($usuarios) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "resultado_busqueda",
                                        "usuarios" => $usuarios
                                        )
                            );
        }else{
            // No hay usuarios con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
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


    function formAddUsuario(){
        $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);    
        if(count($usuario) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "usuarios", 
                                            "pagina"=> "form_delete",
                                            "usuario" => $usuario[0]
                                            )
                                );
        }else{
            //no hay usuario con ese id
        }

    }

    function formEditUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);        
        
        if(count($usuario) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "usuarios", 
                                            "pagina"=> "form_edit",
                                            "usuario" => $usuario[0]
                                            )
                                );
        }else{
            // no hay usuario con ese id
        }
        
    }

    function addUsuario(){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_rol = $_POST['id_rol'];
        $mail = $_POST['mail'];
        $fecha_nac = $_POST['fecha_nac'];

        $this->usuariosCRUD->addUsuario($usuario, $nombre,$apellido,$password, $mail,$fecha_nac,$id_rol);

        $this->index();
    }

    function deleteUsuario(){
        $id_usuario = $_POST['id_usuario'];

        $this->usuariosCRUD->deleteUsuario($id_usuario);

        $this->index();

    }

    function editUsuario(){
        $id_usuario =  $_POST['id_usuario'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_rol = $_POST['id_rol'];
        $mail = $_POST['mail'];
        $fecha_nac = $_POST['fecha_nac'];

        $this->usuariosCRUD->editUsuario($id_usuario, $usuario, $nombre, $apellido, $mail, $fecha_nac, $id_rol);
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