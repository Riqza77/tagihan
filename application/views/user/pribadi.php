

      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-user" aria-hidden="true"></i> <?= $title;?>
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
        <div class="row" style="margin-top: 20px">
            <div class="col-xs-12">

            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?=$title ?></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" >
                    <i class="fa fa-minus"></i></button>
                 <!--  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button> -->
                </div>
              </div>
              <div class="box-body">
                <table style="font-size : 20px; margin-left: 20px">
                  <tr>            
                      <td>Nama Lengkap</td>
                      <td style="padding-left: 10px;">: </td>
                      <td style="padding-left: 10px;"> <?= $user['nama']?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Kode Pelanggan</td>
                      <td style="padding-left: 10px;padding-top: 10px">: </td>
                      <td style="padding-left: 10px;padding-top: 10px"> <?= $user['kode']?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Nomor Handphone/WA</td>
                      <td style="padding-left: 10px;padding-top: 10px">: </td>
                      <td style="padding-left: 10px;padding-top: 10px"> <?= $user['no_hp']?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Alamat</td>
                      <td style="padding-left: 10px;padding-top: 10px">: </td>
                      <td style="padding-left: 10px;padding-top: 10px"> <?= $user['alamat']?></td>
                      
                  </tr>

                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                        <button class="btn btn-warning " data-toggle="modal" data-target="#edit<?= $user['id'];?>">
                        Edit Profil</button>
              </div>
              <!-- /.box-footer-->
            </div>

    </section>
</div>

    <div id="edit<?= $user['id'];?>" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="<?= base_url().'user/edit' ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Pribadi</h4>
                    </div>
                    <div class="modal-body">  
                    <div class="form-group">
                        <label for="kode">Kode Pelanggan :</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $user['kode'];?>" readonly>
                    </div>     
                    <div class="form-group">
                        <label for="nama">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'];?>" required autofocus>                 
                        <input type="text" class="form-control hidden" id="id" name="id" value="<?= $user['id'];?>" required>
                    </div> 


                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone/WA:</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp'];?>" required>
                    </div> 

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required><?= $user['alamat'];?></textarea> 
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

