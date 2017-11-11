<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div>
                
                  <h3 class='box-title'>JADWAL</h3>
                      <div>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>IdDokter <?php echo form_error('idDokter') ?></td>
            <td><select class="js-example-basic-single form-control" name="IdDokter">
                                <option>Nama Dokter</option>
                                <?php
                                    $row = $this->ion_auth->users('Dokter')->result();
                                    foreach ($row as $data) {
                                ?>
                                <option value="<?= $data->email ?>"><?= $data->first_name ?> <?= $data->last_name ?></option>
                                <?php
                                    }
                                ?>  
                            </select>
        </td>
	    <tr><td>Hari <?php echo form_error('Hari') ?></td>
            <td>
            <select name="Hari" class="form-control">
              <option>Senin</option>
              <option>Selasa</option>
              <option>Rabu</option>
              <option>Kamis</option>
              <option>Jumat</option>
              <option>Sabtu</option>
              <option>Minggu</option>
            </select>
        </td>
	    <tr><td>DariJam <?php echo form_error('DariJam') ?></td>
            <td><input type="time" class="form-control" name="DariJam" id="DariJam" placeholder="DariJam" value="<?php echo $DariJam; ?>" />
        </td>
	    <tr><td>SampaiJam <?php echo form_error('SampaiJam') ?></td>
            <td><input type="time" class="form-control" name="SampaiJam" id="SampaiJam" placeholder="SampaiJam" value="<?php echo $SampaiJam; ?>" />
        </td>
	    <input type="hidden" name="idJadwal" value="<?php echo $idJadwal; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_jadwal') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->