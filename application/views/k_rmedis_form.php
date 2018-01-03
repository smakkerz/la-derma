<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>Rekam Medis</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Tindakan <?php echo form_error('id_tindakan') ?></td>
            <td><input  list="tindakan" name="id_tindakan" placeholder="masukan tindakan" required=""></td>
            <datalist id="tindakan">
                <?php
                    foreach ($tindakan as $data) {
                        echo "<option value='$data->id_tindakan'>$data->tindakan</option>";
                    }
                ?>
            </datalist>
	    <tr><td>Id Pasien <?php echo form_error('id_pasien') ?></td>
            <td><input list="pasien" name="id_pasien" placeholder="masukan nama pasien" class="form-control" required="">
        </td>
        <tr><td>Id Dokter <?php echo form_error('id_dokter') ?></td>
            <td><input list="dokter" name="id_dokter" placeholder="masukan nama dokter" class="form-control" required="">
        </td>
	    <tr><td>Diagnosa <?php echo form_error('diagnosa') ?></td>
            <td><textarea name="diagnosa" id="diagnosa" placeholder="Diagnosa"><?php echo $diagnosa; ?></textarea>
        </td>
	    <tr><td>Keluhan <?php echo form_error('keluhan') ?></td>
            <td><textarea name="keluhan" placeholder="Keluhan" ><?php echo $keluhan; ?></textarea>
        </td>
	    <tr><td>Resep <?php echo form_error('resep') ?></td>
            <td><textarea name="resep" placeholder="Resep" ><?php echo $resep; ?></textarea>
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><textarea type="text" name="keterangan" placeholder="Keterangan""><?php echo $keterangan; ?></textarea>
        </td>
	    
	    <input type="hidden" name="id_rmedis" value="<?php echo $id_rmedis; ?>" /> 
	    <tr><td colspan='2'><input type="submit" class="btn btn-primary" value"<?php echo $button ?>"> 
	    <a href="<?php echo site_url('K_rmedis') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <datalist id="pasien">
    <?php foreach ($this->ion_auth->users('5')->result() as $c) {
    echo "<option value='$c->email'>$c->first_name $c->last_name</option>";
    } ?>
                                    
</datalist>
<datalist id="dokter">
    <?php foreach ($this->ion_auth->users('4')->result() as $d) {
    echo "<option value='$d->email'>$d->first_name $d->last_name</option>";
    } ?>
                                    
</datalist>