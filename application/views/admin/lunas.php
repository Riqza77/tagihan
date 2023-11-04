<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-check" aria-hidden="true"></i> <?= $title;?>
            <!-- <small>Tambah, Edit, Delete</small> -->
        </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin')?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <div class="col-md-8" style="margin-bottom: 30px">
                <form method="post" class="form-inline" action="<?= base_url('admin/lunas') ?>">
                  <select class="form-control" style="margin-right: 5px" id="min" name="min">
                    <option value="">-Pilih Bulan-</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                  <select class="form-control" style="margin-right: 5px" id="max" name="max">
                    <option value="">-Pilih Tahun-</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                  </select>
                          <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i>  Filter </button>
                </form>
            </div>


        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List <?= $title;?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table id="example3" class="table table-hover">
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
                        <th class="text-center">Actions</th>
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
                        <a href="<?=base_url('admin/hps_tagihan/'). $pk['id_tagihan'];?>" onclick="return confirm('Apakah Anda yakin Ingin Menghapus Data Tagihan ini?')"><button class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" ></i></button></a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
                <?php if ($tag['total']!= 0): ?>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Tagihan Lunas</th>
                        <th>Rp. <?= number_format($tag['total'],0,',','.'); ?>,-</th>
                        <th></th>
                        <th></th>
                      </tr>
                      
                    </tfoot>
                  
                <?php endif ?>
                  </table>
                  
            </div>
        </div>
    </section>
</div>
