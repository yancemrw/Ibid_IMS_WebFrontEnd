  <body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(https://sera.astra.co.id/uploads/contents/1487930089_9j8r7v6bXZ.png);" data-overlay="7">

  	<div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
  		<h5 class="text-uppercase"><?php echo @$title; ?></h5>
  		<br>
  		<?php echo @$message; ?>

  		<div class="register-box-body">
  			<form action="<?php echo site_url('auth/register'); ?>" method="post">
  				<div class="form-group has-feedback">
  					<input type="text" value="" id="first_name" class="form-control" name="first_name" placeholder="first_name" required="">
  					<span class="glyphicon glyphicon-user form-control-feedback"></span>
  				</div>
  				<div class="form-group has-feedback">
  					<input type="text" value="" id="last_name" class="form-control" name="last_name" placeholder="last_name" required="">
  					<span class="glyphicon glyphicon-user form-control-feedback"></span>
  				</div>
  				<div class="form-group has-feedback">
  					<input type="text" value="" id="username" class="form-control" name="username" placeholder="username" required="">
  					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  				</div>
  				<div class="form-group has-feedback">
  					<input type="email" value="" id="email" class="form-control" name="email" placeholder="email" required="">
  					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  				</div>
  				<div class="form-group has-feedback">
  					<input type="password" id="password" class="form-control" name="password" placeholder="password" data-provide="pwstrength maxlength"  maxlength="8" data-threshold="4" required="">
  					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
  				</div>
  				<div class="form-group has-feedback">
  					<input type="password" class="form-control" name="repassword" placeholder="Retype password" data-provide="pwstrength maxlength"  maxlength="8" data-threshold="4" required="">
  					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
  				</div>
  				<div class="form-group has-feedback">
  					<input type="text" value="" class="form-control" name="memberid" placeholder="Member Id (not mandatory)">
  				</div>
  				<div class="form-group has-feedback">
  					<button type="submit" class="btn btn-success btn-block">Register</button>
  				</div>
  				  
  			</form> 

  			<a href="<?php echo site_url('auth/loginCustomer') ?>" class="text-center btn btn-purple btn-block">Login</a>
  		</div><!-- /.form-box --> 
  	</div>


  </div><!-- /.register-box -->

</div>

</body>
</html>
