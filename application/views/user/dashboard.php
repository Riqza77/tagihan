<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard" aria-hidden="true"></i> <?= $title;?>
            <!-- <small>Tambah, Edit, Delete</small> -->
        </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('user')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?> 
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>

        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-smile-o"></i>

              <h3 class="box-title">Selamat Datang...</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p>Selamat Datang, Harap cek data tagihan anda <i class="fa fa-smile-o"></i> <br> Untuk mencetak invoice, silahkan lunasi terlebuh dahulu tagihan anda</p>
                <small>Ehe <!-- <cite title="Source Title">Source Title</cite> --></small>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tagihan yang belum dibayar </h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                          <i class="fa fa-minus"></i></button>
                      </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table id="example1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th><!-- 
                        <th>Nama Pelanggan</th>
                        <th>Area</th>
                        <th>Paket</th>-->
                        <th>Tanggal Pembayaran</th> 
                        <th>Jumlah Tagihan</th>
                        <th class="text-center">Status</th>
                      </tr>
                      
                    </thead>
                <tbody>
                  <?php $i =1; ?>
                  <?php foreach ($tagihan  as $pk): ?>
                  <?php if($pk['status'] == 'Belum Lunas'): ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $pk['kode']; ?></td>
                      <td><?= date_format(new DateTime($pk['tagihan']),'d-m-Y'); ?></td>
                      <td>Rp. <?= number_format($pk['harga'],0,',','.'); ?>,-</td>
                      <td class="text-center"><small class="label bg-yellow"><?= $pk['status']; ?></small></td>
                    </tr>
                    <?php $i++; ?>
                <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
                  </table>
                  
            </div>
        </div>
    </section>
</div>


