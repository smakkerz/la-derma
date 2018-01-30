
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>K_janji Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>IdDokter</td><td><?php echo $idDokter; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $Tanggal; ?></td></tr>
	    <tr><td>Jam</td><td><?php echo $Jam; ?></td></tr>
	    <tr><td>IdPengguna</td><td><?php echo $IdPengguna; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('k_janji') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->