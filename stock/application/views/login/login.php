<?php echo form_open('login/login/intenta_loggear'); ?>
<input type = "hidden" id = "rescue_text" name = "rescue_text" value = "rescatado" />
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="text" placeholder="Username or Email" name="usuario" class="login-input user-name">
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
					<input type="password" placeholder="Password" name="pass" class="login-input user-pass">
				</div>
			</div>
		</div>
		<div>
			<?php
				echo anchor("login/login/intenta_desloggear", 'desloguearse');
			?>
		</div>
		<div class="clearfix">
            <?php 
        		echo form_submit(array(
        			'id'=>'cmdSiguiente', 
        			'value'=>'Conectarse',
        			'class'=>'btn btn-inverse login-btn'
        		)); 
        	?>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>