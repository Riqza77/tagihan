<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users" aria-hidden="true"></i> User Management
        <small><?= $sub_title?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$sub_title?></li>
      </ol>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Masukkan Data Pelanggan</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>admin/adduser" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" maxlength="225" autofocus  required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode">Kode Pelanggan</label>
                                        <input type="text" class="form-control" id="kode"  name="kode" maxlength="128"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <select class="form-control" id="area" name="area" required>
                                            <option value="">-Pilih Area-</option>
                                            <?php
                                            if(!empty($area))
                                            {
                                                foreach ($area as $ar)
                                                {
                                                    ?>
                                                    <option value="<?php echo $ar['id_area'] ?>"><?php echo $ar['area'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>     
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat"  name="alamat" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Nomor Handphone</label>
                                        <input type="number" class="form-control" id="no_hp" name="no_hp" maxlength="13" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paket">Paket</label>
                                        <select class="form-control" id="paket" name="paket" required>
                                            <option value="">-Pilih Paket-</option>
                                            <?php
                                            if(!empty($paket))
                                            {
                                                foreach ($paket as $pk)
                                                {
                                                    ?>
                                                    <option value="<?php echo $pk['id_paket'] ?>"><?php echo $pk['paket'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>     
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="aktifasi">Aktifasi</label>
                                        <input type="date" class="form-control" id="aktifasi" name="aktifasi" maxlength="225"   required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tagihan">Tagihan</label>
                                        <input type="date" class="form-control" id="tagihan"  name="tagihan" maxlength="128"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="">-Pilih Status-</option>                                             
                                            <option value="1">Aktif</option>                                             
                                            <option value="0">Non-Aktif</option>                                             
                                        </select>
                                    </div>
                                </div>    
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
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
        </div>    
    </section>
    
</div>
