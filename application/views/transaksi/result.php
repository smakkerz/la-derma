<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            La Derma Skin Care <small>- Bukti Transaksi</small>
        </h2>
    </div>
</div> 
<!-- /. ROW  -->

<?php
	foreach ($data as $datatx) {
?>
<div class="row">
        <table class="table bordered striped" width="100%">
        	<tr>
        		<td colspan="2"><label class="col-sm-2 control-label">No Faktur : <?php echo $datatx->transaksi_id; ?></label></td>
        	</tr>
                <tr>
                    <td><label class="col-sm-2 control-label">Tanggal Transaksi : <?php echo date('d-m-Y',strtotime($datatx->tanggal_transaksi)) ?></label></td>
                    <td>
                        <label class="col-sm-2 control-label">Jenis Transaksi : </label>
                            <?php echo $datatx->jenis; ?>
                        </td>
                </tr>
                <tr>
                        <td><label class="col-sm-2 control-label">Pasien : </label>
                            <?php echo $datatx->pasien_email; ?>
                        </td>
                        <td>
                        <label class="col-sm-2 control-label">Dokter : </label>
                        <?php echo $datatx->dokter_email; ?>
                    </td>
                    </tr>
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
                            <th>No.</th>
                            <th>Nama Barabg</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                    <?php $no=1; $total=0; foreach ($barang as $r){ ?>
                        <tr class="gradeU">
                                <td><?php echo $no ?></td>
                                <td><?php echo $r->nama_barang ?></td>
                                <td><?php echo $r->qty ?></td>
                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                <td>Rp. <?php echo number_format($r->qty*$r->harga,2) ?></td>
                            </tr>
                        <?php $total=$total+($r->qty*$r->harga);
                        $no++; } ?>
                            <tr class="gradeA">
                                <td colspan="4">T O T A L</td>
                                <td>Rp. <?php echo number_format($total,2);?></td>
                            </tr>

                        </tbody>
                        <tfoot>
                        	<?php
                        		$url = $this->uri->segment(2);
                        		if ($url != "cetak") {
                        	?>
                        	<tr>
                        		<td colspan="5"><a class="button warning" href="<?php echo base_url('transaksi/cetak/')."/".$datatx->transaksi_id ?>">Cetak</button></td>
                        	</tr>
                        	<?php
                        		}else{
                        	?>
                        	<tr>
                        		<td colspan="5">Terimakasih telah mengunjungi La-Derma Skin Care</td>
                        	</tr>
                        	<script type="text/javascript">
                        		window.print();
                        	</script>
                        	<?php
                        		}
                        	?>
                        </tfoot>
                    </table>
                </div>
                                <!-- /. TABLE  -->
            </div>
        </div>
    </div>
</div>
<?php
	}
?>
<!-- /. ROW  -->