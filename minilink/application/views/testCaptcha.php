<?php
    echo form_open('minilinks/confirmAddMinilink'); 
    require_once('php/recaptchalib.php');

    // Get a key from https://www.google.com/recaptcha/admin/create
    $publickey = "6LfE1gYTAAAAANmW62gDy51aXK3jQBoVLAyoNyMz";
    $privatekey = "6LfE1gYTAAAAAOOKVf_aorh9J7iGc1Pyw240ZBBD";

    # the response from reCAPTCHA
    $resp = null;
    # the error code from reCAPTCHA, if any
    $error = null;
?>

<br/>
<div class="widget-content">
    <div class="widget-box">
        <div class="control-group">
            <div class="controls">
                <label class="control-label">URL</label>
                <input type="text" name="url" id = "url" value="">
            </div>
        </div>  
        <div class="control-group">
            <div class="controls">
            <?php
                echo recaptcha_get_html($publickey, $error);
            ?>
            </div>
        </div>  
        <div class="clearfix">
            <?php 
                echo anchor("categorias/index", 'Cancelar', array("class"=>'btn')); 
                echo "&nbsp;";
                echo form_submit(array(
                    'value'=>'Agregar',
                    'class'=>'btn btn-inverse'
            )); 
            ?>
        </div>
    </div>
</div>
</body>
</html>
