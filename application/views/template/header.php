
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tagihan | <?= $title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/morris.js/morris.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TAG</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Net</b>Bills</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/default.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user['nama']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/default.png" class="img-circle " alt="User Image">

                <!-- <i class="ion ion-person"></i> -->
                <p>
                  <?=$user['nama']?>
                  <small><?=$options[$user['role']]?> since <?= date('Y')?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="text-center">
                  <a href="<?=base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/default.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$user['nama']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php if ($user['role'] == 1) : ?>
        
        <li class="header">MAIN NAVIGATION</li>

        <li class="
            <?php if ($title == 'Dashboard') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('admin')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="
            <?php if ($title == 'User') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('admin/user')?>">
            <i class="fa fa-users"></i> <span>Data Pelanggan</span>
          </a>
        </li>

        <li class="
            <?php if ($title == 'Paket Internet') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('admin/paket')?>">
            <i class="fa fa-rss"></i> <span>Data Paket Internet</span>
          </a>
        </li>

        <li class="
            <?php if ($title == 'Area') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('admin/area')?>">
            <i class="fa fa-area-chart"></i> <span>Data Lokasi</span>
          </a>
        </li>


        <li class="header">Menu Tagihan</li>

        <li class="
            <?php if ($subtitle == 'Tagihan Belum Lunas') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('admin/pending')?>">
            <i class="fa fa-clock-o"></i> <span>Tagihan Belum Lunas</span>
          </a>
        </li>
        <li class="
            <?php if ($subtitle == 'Tagihan Lunas') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('admin/Lunas')?>">
            <i class="fa fa-check"></i> <span>Tagihan Lunas</span>
          </a>
        </li>

        <?php else: ?>

        
        <li class="header">MAIN NAVIGATION</li>

        <li class="
            <?php if ($title == 'Dashboard') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('user')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="
            <?php if ($title == 'Data Pribadi') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('user/pribadi')?>">
            <i class="fa fa-user"></i> <span>Data Pribadi</span>
          </a>
        </li>

        <li class="
            <?php if ($title == 'Data Tagihan Pending') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('user/pending')?>">
            <i class="fa fa-clock-o"></i> <span>Data Tagihan</span>
            <?php $tg  = $this->db->get_where('tagihan',[ 'kode' => $user['kode'],'status' => 'Belum Lunas'])->num_rows(); ?>
            <?php if ($tg): ?>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?= $tg ?></small>
            </span>
              
            <?php endif ?>
          </a>
        </li>

        <li class="
            <?php if ($title == 'History Pembayaran') : ?>
              <?= 'active'; ?>
            <?php endif; ?>">
          <a href="<?=base_url('user/history')?>">
            <i class="fa fa-money"></i> <span>History Pembayaran</span>
          </a>
        </li>


        <?php endif; ?> 

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>