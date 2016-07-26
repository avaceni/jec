<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please Sign In</h3>
				</div>
				<div class="panel-body">
					<?php echo form_open('',array('class'=>''));?>
					<fieldset>
						<div class="form-group">
							<?php //echo form_label('Username','identity');?>
							<?php echo form_error('identity');?>
							<?php echo form_input('identity','','class="form-control" autofocus placeholder="E-mail"');?>
						</div>
						<div class="form-group">
							<?php //echo form_label('Password','password');?>
							<?php echo form_error('password');?>
							<?php echo form_password('password','','class="form-control" placeholder="Password"');?>
						</div>
						<div class="checkbox">
							<label>
								<?php echo form_checkbox('remember','1',FALSE);?> Remember Me
							</label>
						</div>
						<?php echo form_submit('submit', 'Login', 'class="btn btn-success btn-lg btn-block"');?>
					</fieldset>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>