

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            <i class="fa fa-dashboard"></i> 
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->db->get_where('user',['role' => '2'])->num_rows()?></h3>

              <p>Data Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?=base_url('admin/user')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$this->db->get_where('tagihan',['status' => 'lunas'])->num_rows()?></h3>

              <p>Tagihan Lunas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=base_url('admin/lunas')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->db->get_where('tagihan',['status' => 'pending'])->num_rows()?></h3>

              <p>Tagihan Pending</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="<?=base_url('admin/pending')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->db->get('paket')->num_rows()?></h3>

              <p>Data Paket Internet</p>
            </div>
            <div class="icon">
              <i class="fa fa-rss"></i>
            </div>
            <a href="<?=base_url('admin/paket')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->