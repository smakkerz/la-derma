<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                
                  <h3 class='box-title'>K_TINDAKAN</h3>
                      <div class=''>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Tindakan <?php echo form_error('tindakan') ?></td>
            <td><input type="text" class="form-control" name="tindakan" id="tindakan" placeholder="Tindakan" value="<?php echo $tindakan; ?>" required="" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" required="" />
        </td>
	    <input type="hidden" name="id_tindakan" value="<?php echo $id_tindakan; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_tindakan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->