<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            POS (Point of Sale) <small>Pemesanan</small>
        </h2>
    </div>
</div> 
<!-- /. ROW  -->
<div id="contentWrapper" style="display: block; padding-top: 70px;">
        <section id='content' style="display: block;">
<div class="row">
        <table class="list-data" width="100%">
                <?php echo form_open('Pemesanan/step2', array('class'=>'form-horizontal')); ?>
                <tr>
                    <td colspan="2"><label class="col-sm-2 control-label"><?php echo date('Y-m-d'); ?></label></td>
                </tr>
                <tr>
                        <td><label class="col-sm-2 control-label">Pasien</label>
                            <input name="pasien" value="<?php echo $pasien ?>" class="input-control iconic">
                        </td>
                        <td>
                        <label class="col-sm-2 control-label">Dokter</label>
                            <input  name="dokter" value="<?php echo $dokter ?>" class="input-control iconic">
                    </td>
                    </tr>
<tr>
    <td colspan="2">
    <label class="col-sm-2 control-label">Kode Barang</label>
        <input list="barang" name="barang" placeholder="masukan nama barang" class="input-control iconic" >
    <label class="col-sm-2 control-label">Quantity</label>
            <input type="text" name="qty" placeholder="QTY" class="input-control iconic" >
    </td colspan="2">
</tr>
<tr>
    <td colspan="2">
        <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah Barang</button>
    </td>
</tr>                                   
<datalist id="barang">
    <?php foreach ($barang->result() as $b) {
        echo "<option value='$b->barang_id'>$b->nama_barang</option>";
    } ?>
</datalist>
        </div>
    </div>
                        <!-- /. PANEL  -->
</div>


<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="list-data" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barabg</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; $total=0; foreach ($detail as $r){ ?>
                        <tr class="gradeU">
                                <td><?php echo $no ?></td>
                                <td><?php echo $r->nama_barang.' - '.anchor('Pemesanan/hapusitem/'.$r->t_detail_id,'Hapus',array('style'=>'color:red;')) ?></td>
                                <td><?php 
                                    if ($r->qty<1) {
                                        $qty = 1;
                                    }else{
                                        $qty = $r->qty;
                                    }
                                    echo $qty;
                                 ?></td>
                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                <td><?php echo uang($qty*$r->harga) ?></td>
                            </tr>
                        <?php $total=$total+($qty*$r->harga);
                        $no++; } ?>
                            <tr class="gradeA">
                                <td colspan="4">T O T A L</td>
                                <td><?php echo uang($total);?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                                <!-- /. TABLE  -->
            </div>
        </div>
    </div>
    <div id="contentWrapper" style="display: block; padding-top: 70px;">
        <section id='content' style="display: block;">
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="selesai" class="button success btn-sm">Selesai</button>
    </div>
</div>
<!-- /. ROW  -->
 <table class="list-data" width="100%" id="mytable">
                                    <thead>
                                    <tr>
                                        <th colspan="7" style="color: white;">Daftar Pemesanan ( Lebih dari 7 Hari Belum Dibayar Akan Otomatis Terhapus )</th>
                                    </tr>
                                    <tr>
                                        <th>ID Pemesanan</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Total Tagihan</th>
                                        <th>Status Bayar</th>
                                        <th>Aksi</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($pemesanan as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $data->idtransaksi ?></td>
                                        <td><?= $data->waktu ?></td>
                                        <td><?php 
                                            
                                            echo $data->pasien_email;
                                         ?></td>
                                         <td><?php 
                                            
                                            echo $data->dokter_email;
                                         ?></td>
                                         <td><?php 
                                            
                                            echo uang($data->masuk);
                                         ?></td>
                                         <td><?php 
                                            if ($data->verifikasi == 0) {
                                                $stat = "Belum Lunas";
                                            }else{
                                                $stat = "LUNAS";
                                            }
                                            echo $stat;
                                         ?></td>
                                        <td>
    <?php 
    if ($data->verifikasi == 0) {
        $invoice = "";
        $stata = "<a href='". base_url('Pemesanan/set_lunas/'.$data->id)."' class='button primary'>Accept</a>";
    }else{
        $invoice = "<a href='".base_url('transaksi/cetak/'.$data->id) ."' class='button warning'>Cetak</a>";
        $stata = "<a href='".base_url('Pemesanan/set_batallunas/'.$data->id) ."' class='button danger'>Batalkan Lunas</a>";
    }
        echo $stata;
        echo "|";
        echo $invoice;
    ?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                <!-- /. ROW  -->