<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                
                  <h3 class='box-title'>K_JANJI</h3>
                      <div class=''>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Pasien <?php echo form_error('id_pasien') ?></td>
            <td><select class="js-example-basic-single form-control" name="id_pasien">
                                <option>Nama Pasien</option>
                                <?php
                                    foreach ($a as $pasien) {
                                ?>
                                <option value="<?= $pasien->identitas ?>"><?= $pasien->nama ?></option>
                                <?php
                                    }
                                ?>
                            </select>
        </td>
	    <tr><td>IdDokter <?php echo form_error('idDokter') ?></td>
            <td><select class="js-example-basic-single form-control" name="idDokter">
                                <option>Nama Dokter</option>
                                <?php
                                    $row = $this->ion_auth->users('Dokter')->result();
                                    foreach ($row as $data) {
                                ?>
                                <option value="<?= $data->email ?>"><?= $data->first_name ?> <?= $data->last_name ?></option>
                                <?php
                                    }
                                    $user = $this->ion_auth->user()->row();
    
                                ?>  
                            </select>
        </td>
	    <tr><td>Tanggal <?php echo form_error('Tanggal') ?></td>
            <td><input type="date" class="form-control" name="Tanggal" id="Tanggal" placeholder="Tanggal" value="<?php echo $Tanggal; ?>" />
        </td>
	    <tr><td>Jam <?php echo form_error('Jam') ?></td>
            <td><input type="time" class="form-control" name="Jam" id="Jam" placeholder="Jam" value="<?php echo $Jam; ?>" />
        </td>
	    <tr><td>IdPengguna <?php echo form_error('IdPengguna') ?></td>
            <td><input type="text" class="form-control" name="IdPengguna" id="IdPengguna" placeholder="IdPengguna" value="<?php echo $user->email; ?>" readonly />
        </td>
	    <input type="hidden" name="id_kj" value="<?php echo $id_kj; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_janji') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->