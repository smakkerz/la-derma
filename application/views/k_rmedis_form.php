<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>K_RMEDIS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Tindakan <?php echo form_error('id_tindakan') ?></td>
            <td><?= cmb_dinamis("id_tindakan","k_tindakan","tindakan","id_tindakan","id_tindakan") ?>
        </td>
	    <tr><td>Id Pasien <?php echo form_error('id_pasien') ?></td>
            <td><input list="pasien" name="id_pasien" placeholder="masukan nama pasien" class="form-control">
        <datalist id="pasien">
          <?php foreach ($this->ion_auth->users('5')->result() as $c) {
            echo "<option value='$c->email'>$c->first_name $c->last_name</option>";
          } ?>                         
        </datalist>
        </td>
	    <tr><td>Diagnosa <?php echo form_error('diagnosa') ?></td>
            <td><input type="text" class="form-control" name="diagnosa" id="diagnosa" placeholder="Diagnosa" value="<?php echo $diagnosa; ?>" />
        </td>
	    <tr><td>Keluhan <?php echo form_error('keluhan') ?></td>
            <td><input type="text" class="form-control" name="keluhan" id="keluhan" placeholder="Keluhan" value="<?php echo $keluhan; ?>" />
        </td>
	    <tr><td>Resep <?php echo form_error('resep') ?></td>
            <td><input type="text" class="form-control" name="resep" id="resep" placeholder="Resep" value="<?php echo $resep; ?>" />
        </td>
	    <tr><td>Waktu <?php echo form_error('waktu') ?></td>
            <td><input type="date" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
	    <input type="hidden" name="id_rmedis" value="<?php echo $id_rmedis; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_rmedis') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->