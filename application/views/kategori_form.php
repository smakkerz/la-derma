<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                
                  <h3 class='box-title'>KATEGORI</h3>
                      <div>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kategori Obat <?php echo form_error('kategori_obat') ?></td>
            <td><input type="text" class="form-control" name="kategori_obat" id="kategori_obat" placeholder="Kategori Obat" value="<?php echo $kategori_obat; ?>" />
        </td>
	    <tr><td>Kategori <?php echo form_error('kategori') ?></td>
            <td><input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
        </td>
	     
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_obat') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->