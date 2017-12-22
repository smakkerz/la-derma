
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Profil Pasien <?php echo $identitas; ?></h3>
        <table class="table bordered hovered striped">
	    <tr><td>Identitas</td><td><?php echo $identitas; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>User</td><td><?php echo $user; ?></td></tr>
	    <tr><td>Pass</td><td><?php echo $pass; ?></td></tr>
	    <tr><td>Sex</td><td><?php echo $sex; ?></td></tr>
	    <tr><td>Birth Date</td><td><?php echo $birth_date; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pasien') ?>" class="button default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->