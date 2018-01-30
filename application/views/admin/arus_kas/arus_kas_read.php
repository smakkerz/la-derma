
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Arus_kas Read</h3>
        <table class="table table-bordered">
	    <tr><td>Transaksi</td><td><?php echo $transaksi; ?></td></tr>
	    <tr><td>Idtransaksi</td><td><?php echo $idtransaksi; ?></td></tr>
	    <tr><td>IdPengguna</td><td><?php echo $IdPengguna; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Masuk</td><td><?php echo $masuk; ?></td></tr>
	    <tr><td>Keluar</td><td><?php echo $keluar; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Verifikasi</td><td><?php echo $verifikasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('arus_kas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->