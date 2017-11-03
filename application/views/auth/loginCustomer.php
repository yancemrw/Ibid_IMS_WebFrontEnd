 <body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(https://sera.astra.co.id/uploads/contents/1487930089_9j8r7v6bXZ.png);" data-overlay="7">

    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
      <h5 class="text-uppercase">Sign in</h5>
      <br>
      <?php echo @$message; ?>
      <form class="form-type" action="<?php echo site_url('auth/loginCustomer'); ?>" method="post">
        <div class="form-group">
          <label for="username required">Email</label>
          <input type="text" class="form-control" id="username" name="username" required="">
          <?php echo form_error('username'); ?>
        </div>

        <div class="form-group">
          <label for="password required">Password</label>
          <input type="password" class="form-control" id="password" name="password" required="">
          <?php echo form_error('password'); ?>
        </div>

        <div class="form-group flexbox">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" checked>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Ingat saya</span>
          </label>

          <a class="text-muted hover-primary fs-13" href="<?php echo site_url('auth/forgot/') ?>">Lupa Password ?</a>
        </div>

        <div class="form-group">
          <button class="btn btn-bold btn-block btn-purple" type="submit">Login</button>
        </div>
      </form>

      <div class="divider">atau login dengan</div>
      <div class="text-center">
        <a class="btn btn-square btn-facebook" href="<?php echo facebook(); ?>"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-square btn-google" href="<?php echo google(); ?>"><i class="fa fa-google"></i></a>
        <a class="btn btn-square btn-twitter" href="<?php echo site_url('omni/twitter/twitter') ?>"><i class="fa fa-twitter"></i></a>
        <a class="btn btn-square btn-info" href="<?php echo linkedin(); ?>"><i class="fa fa-linkedin"></i></a>
      </div>

      <hr class="w-30px">

      <p class="text-center text-muted fs-13 mt-20">Belum punya akun ? <a class="text-primary fw-500" href="<?php echo site_url('auth/register') ?>">Daftar</a></p>
    </div>


