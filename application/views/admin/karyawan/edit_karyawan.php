<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>KARYAWAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Karyawan <?php echo form_error('nama_karyawan') ?></td>
            <td><input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $nama_karyawan; ?>" />
        </td>
	    <tr><td>Email Karyawan <?php echo form_error('email_karyawan') ?></td>
            <td><input type="text" class="form-control" name="email_karyawan" id="email_karyawan" placeholder="Email Karyawan" value="<?php echo $email_karyawan; ?>" />
        </td>
	    <tr><td>Jk <?php echo form_error('jk') ?></td>
            <td><input type="text" class="form-control" name="jk" id="jk" placeholder="Jk" value="<?php echo $jk; ?>" />
        </td>
      </tr>
      <tr><td>Kata Sandi </td>
            <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
        </td>
      </tr>
	    <tr><td>Alamat Karyawan <?php echo form_error('alamat_karyawan') ?></td>
            <td><textarea class="form-control" rows="3" name="alamat_karyawan" id="alamat_karyawan" placeholder="Alamat Karyawan"><?php echo $alamat_karyawan; ?></textarea>
        </td></tr>
        <tr>
        <td>Grup</td>
        <td>

              <select name="groups">
            <?php
              $data = $this->Karyawanld_model->cek_group($email_karyawan);
                foreach ($data as $g) {
            ?>
            <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
            <?php
                }
          foreach ($groups as $group):?>
              <option value="<?php echo $group['id'];?>">

              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
            </option>
          <?php endforeach?>
              </select>
          
        </td>
      </tr>
	    <input type="hidden" name="nik" value="<?php echo $nik; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('Karyawanld') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->