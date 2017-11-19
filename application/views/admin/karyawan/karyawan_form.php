<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>KARYAWAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nik <?php echo form_error('nik') ?></td>
            <td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
        </td>
	    <tr><td>Nama Karyawan <?php echo form_error('nama_karyawan') ?></td>
            <td><input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $nama_karyawan; ?>" />
        </td>
	    <tr><td>Email Karyawan <?php echo form_error('email_karyawan') ?></td>
            <td><input type="text" class="form-control" name="email_karyawan" id="email_karyawan" placeholder="Email Karyawan" value="<?php echo $email_karyawan; ?>" />
        </td>
	    <tr><td>Jk <?php echo form_error('jk') ?></td>
            <td><input type="text" class="form-control" name="jk" id="jk" placeholder="Jk" value="<?php echo $jk; ?>" />
        </td>
	    <tr><td>Alamat Karyawan <?php echo form_error('alamat_karyawan') ?></td>
            <td><input type="text" class="form-control" name="alamat_karyawan" id="alamat_karyawan" placeholder="Alamat Karyawan" value="<?php echo $alamat_karyawan; ?>" />
        </td>
	    <tr><td>Jabatan <?php echo form_error('jabatan') ?></td>
            <td>
              <select name="jabatan">
                <option><?php echo $jabatan; ?></option>
                <option>Owner</option>
                <option>Admin</option>
                <option>Dokter</option>
              </select>
        </td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
      </tr>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->