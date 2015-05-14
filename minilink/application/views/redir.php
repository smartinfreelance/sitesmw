<head>
    <meta http-equiv="refresh" content="1;url=<?php echo $link; ?>" />
</head>

<div id = "main-content">
    <div class = "container">
        <div class="widget-content">
            <div class="widget-box">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">URL Original</label>
                        <?php
                            echo $link;
                        ?>
                    </div>
                    <div class="controls">
                        <label class="control-label">Mini URL</label>
                        <?php
                            echo $mlink;
                        ?>
                    </div>
                </div>  
                <div class="clearfix">
                    <?php 
                        echo anchor("minilinks/index", 'Cancelar', array("class"=>'btn-inverse')); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
