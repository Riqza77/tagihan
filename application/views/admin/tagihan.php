<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= $title;?>
            <!-- <small>Tambah, Edit, Delete</small> -->
        </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tagihan Pending</li>
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
            <div class="col-md-8" style="margin-bottom: 30px">
                <form method="post" class="form-inline" action="<?= base_url('admin/pending') ?>">
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
            <div class="col-md-4 text-right">
                <div class="form-group">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>  Tambah Tagihan Baru</button>
                </div>
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
                        <th>Tanggal Tagihan</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Bukti Bayar</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                      </tr>
                      
                    </thead>
                <tbody>
                  <?php $i =1; ?>
                  <?php foreach ($tagihan  as $pk): ?>
                  <?php if($pk['status'] == 'Belum Lunas'): ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $pk['kode']; ?></td>
                      <td><?= $pk['nama']; ?></td>
                      <td><?= $pk['area']; ?></td>
                      <td><?= $pk['paket']; ?></td>
                      <td><?= date_format(new DateTime($pk['tagihan']),'d-m-Y'); ?></td>
                      <td>Rp. <?= number_format($pk['harga'],0,',','.'); ?>,-</td>
                      <?php if ($pk['bukti'] != null): ?>
                        <td style="height: 50px;width: 50px;">
                            <a href="<?=  base_url('/assets/bukti/').$pk['bukti'] ?>" target="_blank" rel="noopener noreferrer"><img style=" height: 50px;width: 50px;" src="<?=  base_url('/assets/bukti/').$pk['bukti'] ?>"></a>
                        </td>
                      <?php else: ?>
                      <td>Belum Ada Bukti</td>
                      <?php endif ?>
                      <td><small class="label bg-yellow"><?= $pk['status']; ?></small></td>

                      <td class="text-center">
                        <a href="<?=base_url('admin/ceklis_tagihan/'). $pk['id_tagihan'];?>" onclick="return confirm('Apakah Anda yakin jika pelanggan tersebut sudah melunasi?')"><button class="btn btn-success btn-sm"><i class="fa fa-fw fa-check" ></i></button></a>
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


<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content--> 
        <div class="modal-content">
            <form method="post" action="<?= base_url().'admin/pending' ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Tagihan Baru</h4>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="tagihan">Tagihan Baru:</label>
                        <input type="date" class="form-control" id="tagihan" name="tagihan" required autofocus>
                    </div> 

                    <div class="form-group">
                        <label for="aktifasi">Aktifasi:</label>
                        <input type="date" class="form-control" id="aktifasi" name="aktifasi" required>
                    </div> 

                    <div class="form-group">
                        <label for="kode">Nama Pelanggan</label>
                        <select class="form-control" id="kode" name="kode" required>
                            <option value="">-Pilih Pelanggan-</option>
                            <?php
                            if(!empty($kode))
                            {
                                foreach ($kode as $pk)
                                {
                                    ?>
                                    <option value="<?php echo $pk['kode'] ?>"><?php echo $pk['nama'] ?></option>
                            <?php
                                }
                            }
                        ?>
                        </select>
                    </div>

                        <!-- <input type="text" value="<?=$record->harga?>" class="form-control" id="harga" name="harga" required> -->
                </div>
                <div class="modal-footer">
                    <input type="Submit" value="Submit" class="btn btn-primary pull-right" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
