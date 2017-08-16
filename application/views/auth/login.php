<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | SIM</title>
      <link rel="shortcut icon" href="<?= base_url($informasi['fav']) ?>" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="<?php echo base_url() ?>template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>template/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>template/build/css/custom.min.css" rel="stylesheet">
    </head>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php echo form_open("auth/login");?>
            <h1>Form Login</h1>
              <div>
                <?php echo $message <> '' ? $message : ''; ?>
              </div>
              <div>
                <input type="text" class="form-control" name="identity" placeholder="Username" id="identity" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password"  placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-primary submit">
                <i class="fa fa-sign-in"></i> <?php echo lang('login_submit_btn');?></button>
              </div>
              <?php echo form_close();?>
              <div class="clearfix"></div>
            <div class="separator">
              <br />
            <div>
              <h1>SIM <?= $informasi['name']; ?></h1>
                <p>©<?= date("Y").' '.$informasi['ijin']; ?></p>
            </div>
            </div>
          </section>
        </div>
      </div> 
    </div>
  </body>
</html>