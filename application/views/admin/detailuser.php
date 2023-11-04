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
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detail Data Pelanggan</h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" >
                            <i class="fa fa-minus"></i></button>
                         <!--  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button> -->
                        </div>
                    </div><!-- /.box-header -->

                  
              <div class="box-body">
                <table style="font-size : 20px; margin-left: 20px">
                  <tr>            
                      <td>Nama Lengkap</td>
                      <td style="padding-left: 20px;">: </td>
                      <td style="padding-left: 20px;"> <?= $ehe[0]->nama?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Kode Pelanggan</td>
                      <td style="padding-left: 20px;padding-top: 10px">: </td>
                      <td style="padding-left: 20px;padding-top: 10px"> <?= $ehe[0]->kode?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Nomor Handphone/WA</td>
                      <td style="padding-left: 20px;padding-top: 10px">: </td>
                      <td style="padding-left: 20px;padding-top: 10px"> +62 <?= $ehe[0]->no_hp?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Alamat</td>
                      <td style="padding-left: 20px;padding-top: 10px">: </td>
                      <td style="padding-left: 20px;padding-top: 10px"> <?= $ehe[0]->alamat?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Data Paket Saat Ini</td>
                      <td style="padding-left: 20px;padding-top: 10px">: </td>
                      <td style="padding-left: 20px;padding-top: 10px"> <?= $ehe[0]->paket?></td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Harga Paket Saat Ini</td>
                      <td style="padding-left: 20px;padding-top: 10px">: </td>
                      <td style="padding-left: 20px;padding-top: 10px"> Rp. <?= number_format($ehe[0]->harga,0,',','.'); ?>,-</td>
                      
                  </tr>
                  <tr>            
                      <td style="padding-top: 10px">Data Area Saat Ini</td>
                      <td style="padding-left: 20px;padding-top: 10px">: </td>
                      <td style="padding-left: 20px;padding-top: 10px"> <?= $ehe[0]->area?></td>
                      
                  </tr>

                </table>
              </div>
                </div>
            </div>

        </div>    
    </section>
    
</div>
