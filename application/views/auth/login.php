
 <div class="row no-gutters min-h-fullscreen bg-white">
      <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block bg-img" style="background-image: url(https://sera.astra.co.id/uploads/contents/1487930089_9j8r7v6bXZ.png)" data-overlay="5">

        <div class="row h-100 pl-50">
          <div class="col-md-10 col-lg-8 align-self-end">
            <h1 class="text-white"> IBID ADMS </h1>
            <br> 
            <h4 class="text-white">The admin is the best admin framework available online.</h4>
            <p class="text-white">Credibly transition sticky users after backward-compatible web services. Compellingly strategize team building interfaces.</p>
            <br><br>
          </div>
        </div>

      </div>



      <div class="col-md-6 col-lg-5 col-xl-4 align-self-center">
        <div class="px-80 py-30">
          <h4>Login</h4>
          <p><small>Sign into your account</small></p> 
          <form class="form-type"  action="<?php echo site_url('auth/login'); ?>" id="loginForm" method="post">
            <div class="form-group">
              <label for="username">Email</label>
              <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username">
              <?php echo form_error('username'); ?>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi" name="password">
              <?php echo form_error('password'); ?>
            </div>

            <div class="form-group flexbox">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Remember me</span>
              </label>
 
            </div>

            <div class="form-group">
              <button class="btn btn-bold btn-block btn-purple" type="submit">Login</button>
            </div>
          </form> 
        </div>
      </div>
    </div>

<!-- <div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>ADMS </h3>
                <small>Login</small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
					<form>
						<div class="form-group">
							<label class="control-label" for="username">Email</label>
							<input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="username" id="username" class="form-control">
							<span class="help-block small">Your unique email to app</span>
							<?php echo form_error('username'); ?>
						</div>
						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
							<?php echo form_error('password'); ?>
						</div>
						<button class="btn btn-success btn-block">Login</button>
					</form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
        &copy; CIST - <?php echo date('Y'); ?>
        </div>
    </div>
</div> -->
