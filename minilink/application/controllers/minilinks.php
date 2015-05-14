<?php

class Minilinks extends CI_Controller
{
    function Minilinks()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('minilinkCRUD');
    }

    function index()
    {
        $this->load->view('main', array("pagina" => "mlink"));
    }

    function buildMinilink(){
        require_once('php/recaptchalib.php');
        $publickey = "6LfE1gYTAAAAANmW62gDy51aXK3jQBoVLAyoNyMz";
        $privatekey = "6LfE1gYTAAAAAOOKVf_aorh9J7iGc1Pyw240ZBBD";
        if(isset($_POST['recaptcha_response_field'])){
            if ($_POST["recaptcha_response_field"]) {
                    $resp = recaptcha_check_answer ($privatekey,
                                                    $_SERVER["REMOTE_ADDR"],
                                                    $_POST["recaptcha_challenge_field"],
                                                    $_POST["recaptcha_response_field"]);

                    if ($resp->is_valid) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $str = '';
                        for ($i = 0; $i < 6; $i++) {
                            $str .= $characters[rand(0, $charactersLength - 1)];
                        }
                        $url = $this->validate_url($_POST['url']);
                        if($url){
                            $this->minilinkCRUD->addMiniLink($_POST['url'],$str);
                            $this->load->view(
                                'main', 
                                array(
                                    "pagina" => 'get_mlink',
                                    "mlink" => "http://localhost/sitesmw/minilink/index.php/minilinks/getMLink/".$str,
                                    "link" => $_POST['url']
                                )
                            );
                        }else{
                            $this->index();
                        }
                    } else {
                        # set the error code so that we can display it
                        $this->index();
                    }
            }
        }

    }

    function getMLink($str){
        $row = $this->minilinkCRUD->getMinilink($str);
        $this->load->view(
                        'main', 
                        array(
                            "pagina" => 'redir',
                            "mlink" => "http://localhost/sitesmw/minilink/index.php/minilinks/getMLink/".$str,
                            "link" => $row[0]->link
                        )
                    );


    }


    function validate_url($url)
    {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }

}
?>