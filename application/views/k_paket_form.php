<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>K_PAKET</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Layanan <?php echo form_error('layanan') ?></td>
            <td><input type="text" class="form-control" name="layanan" id="layanan" placeholder="Layanan" value="<?php echo $layanan; ?>" />
        </td>
	    <tr><td>Deskripsi <?php echo form_error('deskripsi') ?></td>
            <td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </td>
	    <tr><td>Harga <?php echo form_error('harga') ?></td>
            <td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </td>
	    <input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_paket') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->