<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
    <!-- Notification.css -->
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/notification.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url('site/login'); ?>" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
            </form>

              <div class="clearfix"></div>
                <div class="clearfix"></div>
                <br />

                <div>
                  <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                  <p>Copyright © 2018. Sentra Usahatama Jaya</p>
                </div>
              </div>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>

