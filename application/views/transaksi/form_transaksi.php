<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            POS (Point of Sale) <small>Transaksi</small>
        </h2>
    </div>
</div> 
<!-- /. ROW  -->

<div class="row">
        <table class="table bordered striped">
                <?php echo form_open('transaksi', array('class'=>'form-horizontal')); ?>
                <tr>
                    <td><label class="col-sm-2 control-label"><?php echo date('Y-m-d'); ?></label></td>
                    <td>
                        <label class="col-sm-2 control-label">Jenis</label>
                            <input  name="jenis" value="<?php echo $jenis ?>" class="form-control">
                        </td>
                </tr>
                <tr>
                        <td><label class="col-sm-2 control-label">Pasien</label>
                            <input name="pasien" value="<?php echo $pasien ?>" class="form-control">
                        </td>
                        <td>
                        <label class="col-sm-2 control-label">Dokter</label>
                            <input  name="dokter" value="<?php echo $dokter ?>" class="form-control">
                    </td>
                    </tr>
<tr>
    <td colspan="2">
    <label class="col-sm-2 control-label">Kode Barang</label>
        <input list="barang" name="barang" placeholder="masukan nama barang" class="form-control" >
    <label class="col-sm-2 control-label">Quantity</label>
            <input type="text" name="qty" placeholder="QTY" class="form-control" >
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
                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th style="color: white;">No.</th>
                            <th style="color: white;">Nama Barang</th>
                            <th style="color: white;">Qty</th>
                            <th style="color: white;">Harga</th>
                            <th style="color: white;">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; $total=0; foreach ($detail as $r){ ?>
                        <tr class="gradeU">
                                <td><?php echo $no ?></td>
                                <td><?php echo $r->nama_barang.' - '.anchor('transaksi/hapusitem/'.$r->t_detail_id,'Hapus',array('style'=>'color:red;')) ?></td>
                                <td><?php if ($r->qty<1) {
                                    $qty = 1;
                                }else{
                                    $qty = $r->qty;
                                }
                                echo $qty;
                                 ?></td>
                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                <td>Rp. <?php echo number_format($qty*$r->harga,2) ?></td>
                            </tr>
                        <?php $total=$total+($qty*$r->harga);
                        $no++; } ?>
                            <tr class="gradeA">
                                <td colspan="4">T O T A L</td>
                                <td>Rp. <?php echo number_format($total,2);?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                                <!-- /. TABLE  -->
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="selesai" class="btn btn-success btn-sm">Selesai</button>
    </div>
</div>
<!-- /. ROW  -->