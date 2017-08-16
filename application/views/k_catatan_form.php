<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>K_CATATAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Catatan <?php echo form_error('catatan') ?></td>
            <td><input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
        </td>
	    <tr><td>Id Pengguna <?php echo form_error('id_pengguna') ?></td>
            <td><input type="text" class="form-control" name="id_pengguna" id="id_pengguna" placeholder="Id Pengguna" value="<?php echo $id_pengguna; ?>" />
        </td>
	    <tr><td>Id Pasien <?php echo form_error('id_pasien') ?></td>
            <td><input type="text" class="form-control" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" />
        </td>
	    <tr><td>Status Catatan <?php echo form_error('status_catatan') ?></td>
            <td><input type="text" class="form-control" name="status_catatan" id="status_catatan" placeholder="Status Catatan" value="<?php echo $status_catatan; ?>" />
        </td>
	    <input type="hidden" name="id_catatan" value="<?php echo $id_catatan; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_catatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->