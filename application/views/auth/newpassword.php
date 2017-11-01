  <body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(https://sera.astra.co.id/uploads/contents/1487930089_9j8r7v6bXZ.png);" data-overlay="7">

    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
        <h5 class="text-uppercase"><?php echo @$title; ?></h5>
        <br>
        <?php echo @$message; ?>

        <div class="register-box-body">
             <form action="" id="loginForm" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Password</label>
                                <input type="password" placeholder="Masukan password kamu yang baru" title="Masukan password kamu yang baru" required="" name="password" name="newpassword" id="username" class="form-control">
                                <?php echo form_error('password'); ?> 
                            </div> 
                            <div class="form-group">
                                <label class="control-label" for="username">Password Confirm</label>
                                <input type="password" placeholder="Masukan kembali password kamu yang baru" title="Masukan kembali password kamu yang baru" required="" name="confirmpassword" value="" name="newpasswordconfirm" id="username" class="form-control">
                                <?php echo form_error('confirmpassword'); ?> 
                            </div> 

                            <!--  -->
                            <input type="hidden" value="<?php echo @$this->input->get('email'); ?>" name="email">
                            <input type="hidden" value="<?php echo @$this->input->get('changepassword'); ?>" name="changepassword">
                            <!--  -->
                             
                            <button class="btn btn-success btn-block">Confirm</button>
                        </form>
                         
            </form> 

            <a href="<?php echo site_url('auth/loginCustomer') ?>" class="text-center btn btn-default btn-block">I already have a membership</a>
        </div><!-- /.form-box --> 
    </div>


  </div><!-- /.register-box -->

</div>

</body>
</html>
<!-- 

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Ganti Password Baru </h3>
                <small><?php echo @$title; ?></small>

                <?php echo @$message; ?>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                       
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
