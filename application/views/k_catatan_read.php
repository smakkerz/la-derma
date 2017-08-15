
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>K_catatan Read</h3>
        <table class="table table-bordered">
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td>Id Pengguna</td><td><?php echo $id_pengguna; ?></td></tr>
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>Status Catatan</td><td><?php echo $status_catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('k_catatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->