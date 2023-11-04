<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users" aria-hidden="true"></i> Data Pelanggan
        <small>Add, Edit, Delete</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pelanggan</li>
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
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/adduser"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pelanggan Baru</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Pelanggan</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Nomor Hp</th>
                        <th class="text-center">Actions</th>
                      </tr>
                      
                    </thead>
                <tbody>
                  <?php $i =1; ?>
                  <?php foreach ($us as $u): ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $u['nama']; ?></td>
                      <td><?= $u['username']; ?></td>
                      <td>+62 <?= $u['no_hp']; ?></td>

                      <td class="text-center">
                        <a href="<?=base_url('admin/detailuser/'). $u['id'];?>"><button class="btn btn-info btn-sm">
                        <i class="fa fa-fw fa-eye"></i></button></a>
                        <a href="<?=base_url('admin/edituser/'). $u['id'];?>"><button class="btn btn-warning btn-sm">
                        <i class="fa fa-fw fa-pencil"></i></button></a>
                        <a href="<?=base_url('admin/hps_user/'). $u['id'];?>" onclick="return confirm('Data Tagihan juga akan terhapus, Apakah Anda yakin?')"><button class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" ></i></button></a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
                  </table>
                  
            </div>
        </div>
    </section>
</div>
