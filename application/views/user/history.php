<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-check" aria-hidden="true"></i> <?= $title;?>
            <!-- <small>Tambah, Edit, Delete</small> -->
        </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('user')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$title?></li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php

                    $error = $this->session->flashdata('error');
                if($error)
                {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
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
            <div class="col-xs-12 text-right">
                <div class="form-group"><!-- 
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/adduser"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pelanggan Baru</a> -->
                </div>
            </div>
            <div class="col-md-8 mb-2">
                <form method="post" class="form-inline" action="<?= base_url('user/history') ?>">

                  <input type="date" id="min" name="min" class="form-control mr-3" reuired>
                  <input type="date" id="max" name="max" class="form-control mr-3" reuired>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>  Cari </button>
                </form>
            </div>

        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List <?= $title;?> </h3>


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
                        <th>Kode Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Area</th>
                        <th>Paket</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                      
                    </thead>
                <tbody>
                  <?php $i =1; ?>
                  <?php foreach ($tagihan  as $pk): ?>
                  <?php if($pk['status'] == 'Lunas'): ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $pk['kode']; ?></td>
                      <td><?= $pk['nama']; ?></td>
                      <td><?= $pk['area']; ?></td>
                      <td><?= $pk['paket']; ?></td>
                      <td><?= date_format(new DateTime($pk['tagihan']),'d-m-Y'); ?></td>
                      <td>Rp. <?= number_format($pk['harga'],0,',','.'); ?>,-</td>
                      <td><small class="label bg-green"><?= $pk['status']; ?></small></td>
                      <td class="text-center">
                        <a href="<?=base_url('user/cetak/'). $pk['id_tagihan'];?>" target="blank"><button class="btn btn-primary btn-sm">
                        <i class="fa fa-print"></i></button></a>
                        
                      </td>
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
