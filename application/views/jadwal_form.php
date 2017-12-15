<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>JADWAL</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>IdDokter <?php echo form_error('idDokter') ?></td>
            <td>
              <input list="dokter" name="idDokter" value="<?= $idDokter ?>">
              <datalist id="dokter">
                <?php
                foreach ($idDokter as $dokter) {
                ?>
                <option value="<?= $dokter->email ?>"><?= $dokter->last_name ?></option>
                <?php
                }
                ?>
              </datalist>
            </select>
            </td>
	    <tr><td>Hari <?php echo form_error('Hari') ?></td>
            <td><input list="hari" name="Hari" value="<?= $Hari ?>">
              <datalist id="hari">
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
                <option>Minggu</option>
              </datalist>
        </td>
        <tr>
          <td>Tanggal <?php echo form_error('tanggal') ?></td>
          <td><input type="date" name="tanggal" placeholder="Tanggal" class="form-control" id="tanggal" value="<?php echo $tanggal ?>"></td>
        </tr>
	    <tr><td>DariJam <?php echo form_error('DariJam') ?></td>
            <td><input type="time" class="form-control" name="DariJam" id="DariJam" placeholder="DariJam" value="<?php echo $DariJam; ?>" />
        </td>
	    <tr><td>SampaiJam <?php echo form_error('SampaiJam') ?></td>
            <td><input type="time" class="form-control" name="SampaiJam" id="SampaiJam" placeholder="SampaiJam" value="<?php echo $SampaiJam; ?>" />
        </td>
	    <input type="hidden" name="idJadwal" value="<?php echo $idJadwal; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('C_Jadwal') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->