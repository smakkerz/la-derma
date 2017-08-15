<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PASIEN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Identitas <?php echo form_error('identitas') ?></td>
            <td><input type="text" class="form-control" name="identitas" id="identitas" placeholder="Identitas" value="<?php echo $identitas; ?>" />
        </td>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td><textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </td></tr>
	    <tr><td>User <?php echo form_error('user') ?></td>
            <td><input type="text" class="form-control" name="user" id="user" placeholder="User" value="<?php echo $user; ?>" />
        </td>
	    <tr><td>Pass <?php echo form_error('pass') ?></td>
            <td><input type="text" class="form-control" name="pass" id="pass" placeholder="Pass" value="<?php echo $pass; ?>" />
        </td>
	    <tr><td>Sex <?php echo form_error('sex') ?></td>
            <td><input type="text" class="form-control" name="sex" id="sex" placeholder="Sex" value="<?php echo $sex; ?>" />
        </td>
	    <tr><td>Birth Date <?php echo form_error('birth_date') ?></td>
            <td><input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birth_date; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </td>
	    <input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasien') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->