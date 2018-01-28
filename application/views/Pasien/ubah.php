<?php
	echo form_open('C_pasien/update_action');
?>

        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              
                <h3 class='box-title'>Data Pasien</h3>
        		<table class="table table-bordered table-hovered">
	    			<tbody>
	    				<tr>
	    				<th>ID Pasien</th>
	    				<td>:</td>
	    				<td><input type="text" name="id_pasien" value="<?php echo $id_pasien; ?>" readonly class="form-control"></td>
	    			</tr>
	    			<tr>
	    				<th>Nomor Identitas</th>
	    				<td>:</td>
	    				<td><input type="text" name="identitas" value="<?php echo $identitas; ?>" readonly class="form-control"></td>
	    			</tr>
	    			<tr>
	    				<th>Nama Pasien</th>
	    				<td>:</td>
	    				<td><input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control"></td>
	    			</tr>
	    			<tr>
	    				<th>Alamat Pasien</th>
	    				<td>:</td>
	    				<td><textarea  name="alamat" class="form-control"><?php echo $alamat; ?></textarea></td>
	    			</tr>
	    			<tr>
	    				<th>Username Pasien</th>
	    				<td>:</td>
	    				<td><input type="text" name="user" value="<?php echo $user; ?>" readonly class="form-control"></td>
	    			</tr>
	    			<tr>
	    				<th>Jenis Kelamin</th>
	    				<td>:</td>
	    				<td>
	    					<select name="sex" class="form-control">
	    						<option value="<?php echo $sex ?>"><?php echo $sex; ?></option>
	    						<option>Perempuan</option>
	    						<option>Laki-Laki</option>
	    					</select>
	    			</tr>
	    			<tr>
	    				<th>Tanggal Lahir</th>
	    				<td>:</td>
	    				<td><input type="date" class="form-control" name="birth_date" value="<?php echo $birth_date; ?>"></td>
	    			</tr>
	    			<tr>
	    				<th>No Hp</th>
	    				<td>:</td>
	    				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp; ?>"></td>
	    			</tr>
	    			</tbody>
				</table>
				<button href="" class="btn btn-primary" type="submit">Ubah Data</button>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?php
	echo form_close();
?>