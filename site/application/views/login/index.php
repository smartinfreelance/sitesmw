
<div class="full-width-container block-2">
	<div class="container">
		<div class="row">
			<div class="grid_5">
				<?php echo form_open('login/login/intenta_loggear',"id = 'contact-form'"); ?>
				<div class="contact-form-loader"></div>
					<header>
						<h2><span>Contact Form</span></h2>
					</header>
					<fieldset>
							<label class="name">
								<span class="text">Your Name:</span>
								<input type="text" name="name" placeholder="" value="" data-constraints="@Required @JustLetters" />
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid name.</span>
							</label>
							<label class="email">
								<span class="text">Your E-mail:</span>
								<input type="text" name="email" placeholder="" value="" data-constraints="@Required @Email" />
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*This is not a valid email.</span>
							</label>
							<label class="phone">
								<span class="text">Subject:</span>
								<input type="text" name="phone" placeholder="" value="" data-constraints="@Required @JustNumbers" />
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*This is not a valid phone.</span>
							</label>
							<label class="message">
								<span class="text">Message:</span>
								<textarea name="message" placeholder="" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*The message is too short.</span>
							</label>
						<div class="cont_btn">
							<a href="#" data-type="reset" class="btn">Clear</a>
							<a href="#" data-type="submit" class="btn">Send</a>
						</div>
				</fieldset> 
            <?php 
        		echo form_submit(array(
        			'id'=>'cmdSiguiente', 
        			'value'=>'Login',
        			'class'=>'btn btn-inverse login-btn'
        		)); 
        	?>
			</div>
		</div>
		<!--<div class="remember-me">
			<input class="rem_me" type="checkbox" value=""> Remeber Me
		</div>-->
	</div>
</div>