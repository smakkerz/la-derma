<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>K_JANJI</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Waktu Janji <?php echo form_error('waktu_janji') ?></td>
            <td><input type="text" class="form-control" name="waktu_janji" id="waktu_janji" placeholder="Waktu Janji" value="<?php echo $waktu_janji; ?>" />
        </td>
	    <tr><td>Id Pengguna <?php echo form_error('id_pengguna') ?></td>
            <td><input type="text" class="form-control" name="id_pengguna" id="id_pengguna" placeholder="Id Pengguna" value="<?php echo $id_pengguna; ?>" />
        </td>
	    <tr><td>Id Pasien <?php echo form_error('id_pasien') ?></td>
            <td><input type="text" class="form-control" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" />
        </td>
	    <input type="hidden" name="id_kj" value="<?php echo $id_kj; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_janji') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->