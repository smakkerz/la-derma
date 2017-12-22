<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>Pendaftaran Pasien</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table bordered hovered striped'>
	    <tr><td>No Identitas <?php echo form_error('identitas') ?></td>
            <td><input type="text" class="input-control" name="identitas" id="identitas" placeholder="Identitas" value="<?php echo $identitas; ?>" />
        </td>
	    <td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="input-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td colspan="3"><textarea rows="5" cols="150" name="alamat" id="alamat" placeholder="Alamat" class="input-control textarea"
    data-role="input" data-text-auto-resize="true" data-text-max-height="200"><?php echo $alamat; ?></textarea>
        </td></tr>
	    <tr><td>User <?php echo form_error('user') ?></td>
            <td><input type="text" class="input-control" name="user" id="user" placeholder="User" value="<?php echo $user; ?>" />
        </td>
	    <td>Pass <?php echo form_error('pass') ?></td>
            <td><input type="text" class="input-control" name="pass" id="pass" placeholder="Pass" value="<?php echo $pass; ?>" />
        </td>
	    <tr><td>Sex <?php echo form_error('sex') ?></td>
            <td>
            <select name="sex" class="input-control">
                <option><?php echo $sex; ?></option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select></td>
	    <td>Birth Date <?php echo form_error('birth_date') ?></td>
            <td><input type="date" class="input-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birth_date; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td>
                <select name="status" class="input-control">
                    <option><?php echo $status; ?></option>
                    <option>Pasien Baru</option>
                    <option>Pasien Lama</option>
                </select>
            </td>
	    <input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" /> 
	    <td colspan='2'><button type="submit" class="button primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasien') ?>" class="button default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->