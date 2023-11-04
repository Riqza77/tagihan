<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-area-chart" aria-hidden="true"></i> Area 
            <small>Tambah, Edit, Delete</small>
        </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Area</li>
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>  Tambah Area Baru</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Area </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive ">
                    <table id="example1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Area</th>
                        <th class="text-center">Actions</th>
                      </tr>
                      
                    </thead>
                <tbody>
                  <?php $i =1; ?>
                  <?php foreach ($area as $ar): ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $ar['area']; ?></td>

                      <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $ar['id_area'];?>">
                        <i class="fa fa-fw fa-pencil"></i></button>
                        <a href="<?=base_url('admin/hps_area/'). $ar['id_area'];?>" onclick="return confirm('Data akan terhapus, Apakah Anda yakin?')"><button class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" ></i></button></a>
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


<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content--> 
        <div class="modal-content">
            <form method="post" action="<?= base_url().'admin/area' ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Area Baru</h4>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="area">Area Baru:</label>
                        <textarea class="form-control" id="area" name="area" required autofocus></textarea> 
                    </div>            
                </div>
                <div class="modal-footer">
                    <input type="Submit" value="Submit" class="btn btn-primary pull-right" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php foreach ($area as $ar): ?>
    <div id="edit<?= $ar['id_area'];?>" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="<?= base_url().'admin/editarea' ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Area</h4>
                    </div>
                    <div class="modal-body">                        
                        <div class="form-group">
                            <label for="area1">Area:</label>
                            <input type="text" class="form-control hidden" id="id" name="id" value="<?= $ar['id_area'];?>" required>
                            <textarea type="text" class="form-control" id="area1" name="area1" required autofocus><?=$ar['area']?></textarea>
                        </div>                      
                    </div>
                    <div class="modal-footer">
                        <input type="Submit" value="Submit" class="btn btn-primary pull-right" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    endforeach;
?>
