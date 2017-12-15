
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Jadwal Read</h3>
        <table class="table table-bordered">
	    <tr><td>IdDokter</td><td><?php echo $idDokter; ?></td></tr>
	    <tr><td>Hari</td><td><?php echo $Hari; ?>, <?php echo $Tanggal ?></td></tr>
	    <tr><td>DariJam</td><td><?php echo $DariJam; ?></td></tr>
	    <tr><td>SampaiJam</td><td><?php echo $SampaiJam; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('c_jadwal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->