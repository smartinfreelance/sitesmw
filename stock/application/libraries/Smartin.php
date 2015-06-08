<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Smartin {

    public function getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller){
        $links = "";
        $cont = 0;
        $cantPages = 0;
        $aparece = 0;

        if($total_rows > $cant_rows){
            $cantPages = ceil($total_rows / $cant_rows);
            if(($total_rows % $cant_rows) > 0 ){
                $s = 1;
            }else if(($total_rows % $cant_rows) == 0 ){
                $s = 0;


            }
            $s = $s + $cantPages;
            $links = $links."<div class='pagination'><ul>";



	        for($x = 0 ; $x < $cantPages ; $x++){
	            if($cantPages < 11){
	                $cont++;
	                $aparece = $x + 1;

	                if($pagina_nro == $x){
	                    $str = " class ='active'";

	                }else{
	                    $str ="";                
	                }
	                $links = $links."<li ".$str."><a href='".base_url()."index.php/".$controller."/index/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
	                if($cont == 10){
	                    $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";
	                    $links = $links."<div class='pagination'><ul>";

	                }
	            }else{
	                $cont++;
	                $aparece = $x + 1;

	                if($pagina_nro == $x){
	                    $str = " class ='active'";

	                }else{
	                    $str ="";                
	                }
	                
	                if(($aparece==1)||($aparece==2)||($aparece==3)||//q aparezcan los primeros 3
	                    ($aparece==($pagina_nro-1))||($aparece==$pagina_nro)||
	                    ($aparece==($pagina_nro+1))||($aparece==($pagina_nro+2))||($aparece==($pagina_nro+3))||
	                    ($aparece==($cantPages-1))||($aparece==$cantPages)||($aparece==($cantPages-2))//q aparezcan los ultimos 3
	                    )
	                {
	                    $links = $links."<li ".$str."><a href='".base_url()."index.php/".$controller."/index/".$x."' style= 'strong'>".$aparece."</a></li>&nbsp;&nbsp;&nbsp;&nbsp;";
	                    if(($aparece == 3)||($aparece == ($pagina_nro+3))||($aparece == ($pagina_nro-3))
	                        ){
	                        if(($aparece!=1)&&($aparece!=2)){
	                            $links = $links.". . .  ";
	                        }

	                    }

	                }
	                

	            }
	    
	        }
	        $links = $links."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul></div>";
        }else{
        	$links = "";
        }

        
        

        return $links;
    }
}