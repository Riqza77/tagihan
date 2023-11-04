

      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" aria-hidden="true"></i> Pembayaran
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
                <div class="alert alert-danger alert-dismissable">
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
                <h3 class="box-title">Pembayaran</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" >
                    <i class="fa fa-minus"></i></button>
                 <!--  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button> -->
                </div>
              </div>
              <div class="box-body">
                    <h5>Kode Pelanggan : <?= $tagihan['kode']?></h5>
                    <br>
                    <p>Silahkan lakukan pembayaran untuk bisa kami proses selanjutnya dengan cara:</p>
                    <ol>
                        <li>Lakukan pembayaran pada rekening <strong>BCA 123901249421</strong> atau via dana <img width="76" height="80" src="<?=base_url()?>/assets/dana/100.jpeg"> a/n NetBills </li>
                        <li>Total tagihan : <strong>Rp.<?= number_format($tagihan['harga'], 0, ',', '.') ?>,-</strong></li>
                        <li>Setelah Melakukan Pembayaran, Silahkan Upload Bukti</li>
                    </ol>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#edit<?= $tagihan['id_tagihan'];?>">
                        Upload Bukti</button>
              </div>
              <!-- /.box-footer-->
            </div>

    </section>
</div>

    <div id="edit<?= $tagihan['id_tagihan'];?>" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="<?=base_url('user/bukti')?>" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload Bukti Bayar</h4>
                    </div>
                    <div class="modal-body">  
                    <div class="form-group">
                        <label for="foto">Upload Gambar :</label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                        <input type="hidden" name="id_tagihan" value="<?= $tagihan['id_tagihan'];?>">
                        <input type="hidden" name="kode" value="<?= $tagihan['kode'];?>">
                    </div>     

                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="submit" class="btn btn-primary pull-right" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

