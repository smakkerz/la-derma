<!DOCTYPE html>
<?php $informasi = $this->informasi->web(); ?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HOME | SIM</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/select2/css/select2.min.css">
            <script src="<?php echo base_url() ?>template/vendors/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/select2/js/select2.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>
    <link rel="shortcut icon" href="<?= base_url($informasi['fav']) ?>" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>template/build/css/custom.min.css" rel="stylesheet">
        
     <script src="<?php echo base_url('\assets\tinymce\js\tinymce\tinymce.min.js') ?>"></script>

<script src="<?= base_url() ?>assets/highcharts/code/highcharts.js"></script>
 <script src="<?= base_url() ?>assets/highcharts/code/modules/exporting.js"></script>
 

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url() ?>" class="site_title">
              <span>Klinik</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <h2 class="pull-right">
                 Hai, Selamat datang <?php $user = $this->ion_auth->user()->row();
                     echo $user->first_name." ".$user->last_name; ?>
      
    </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php
              if ($this->ion_auth->in_group(3)) {
                $this->load->view('Menu/menu_owner');
              }elseif ($this->ion_auth->in_group(4)){
                $this->load->view('Menu/menu_dokter');
              }else{
                $this->load->view('Menu/menu_pasien');
              }
            ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('auth/logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="false"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php 
                      if ($this->ion_auth->is_admin())
                        {
                         echo "Administrator";
                        }elseif ($this->ion_auth->in_group("Dokter")) {
                          echo "Dokter";
                        }elseif ($this->ion_auth->in_group("Pasien")){
                          echo "Pasien";
                        }else{
                          echo "Owner";
                        }
                     ?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li> <a href="<?= base_url('auth/change_password') ?>"><i class="fa fa-key pull-right"></i> Ubah Password</a></li>
                    <li> <a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown"><a href="javascript:;" class="dropdown-toggle info-number">
                    <b><?php date_default_timezone_set("Asia/Jakarta"); echo date("H:s"); ?></b> WIB
                  </a></li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          <div class="clearfix"></div>
          <!-- top tiles -->

                <?php
                echo $contents;
                ?>
              
                <!-- end of weather widget -->
                </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?= $informasi['name']; ?> ©<?= date("Y"); ?> All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>template/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>template/build/js/custom.min.js"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>


  </body>

</html>
