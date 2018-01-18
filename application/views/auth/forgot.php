 <body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(https://sera.astra.co.id/uploads/contents/1487930089_9j8r7v6bXZ.png);" data-overlay="7">

    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
      <h5 class="text-uppercase"><?php echo @$title; ?></h5>
      <br>
      <?php echo @$message; ?>
        <form action="<?php echo site_url('auth/forgot/'); ?>" id="loginForm" method='POST' class="form-type">
        <div class="form-group">
          <label for="username">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
          <?php echo form_error('email'); ?>
        </div> 

        <div class="form-group">
            <button class="btn btn-success">Submit</button>
            <a href="<?php echo site_url('auth/login') ?>" class="btn btn-default ">Cancel</a>
        </div>
      </form> 
    </div>
<!-- 



<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Front End IBID </h3>
                <small><?php echo @$title; ?></small>
                <?php echo @$message; ?>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo site_url('auth/forgot/'); ?>" id="loginForm" method='POST'>
                        <div class="form-group">
                            <label class="control-label" for="username">Email</label>

                            <input type="email" name="email" id="email" placeholder="Email Address" class="form-control" value="<?php echo set_value('email'); ?>" required>
                            <?php echo form_error('email'); ?> 
                        </div> 

                        
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
