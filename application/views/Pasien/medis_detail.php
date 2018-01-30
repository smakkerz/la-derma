
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              
                <h3 class='box-title'>Rekam Medis Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Tindakan</td><td><?php echo $tindakan; ?></td></tr>
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>Diagnosa</td><td><?php echo $diagnosa; ?></td></tr>
	    <tr><td>Keluhan</td><td><?php echo $keluhan; ?></td></tr>
	    <tr><td>Resep</td><td><?php echo $resep; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Id Pengguna</td><td><?php echo $id_pengguna; ?></td></tr>
	    <tr><td>Id Dokter</td><td><?php echo $id_dokter; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('C_pasien/Pasien_medis') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->