<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ARUS_KAS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Transaksi <?php echo form_error('transaksi') ?></td>
            <td>
                <select name="transaksi">
                    <option>Penjualan Jasa</option>
                    <option>Penjualan Resep</option>
                    <option>Penjualan Non Resep</option>
                    <option>Lain - Lain</option>
                </select>
        </td>
	    <input type="hidden" class="form-control" name="idtransaksi" id="idtransaksi" placeholder="Idtransaksi" value="" />
	    <tr><td>Operator <?php echo form_error('IdPengguna'); 
$op = $this->ion_auth->user()->row();
        ?></td>
            <td><input type="text" class="form-control" name="IdPengguna" id="IdPengguna" placeholder="IdPengguna" value="<?php echo $op->email; ?>" disabled/>
        </td>
	    <tr><td>Waktu <?php echo form_error('waktu') ?></td>
            <td><input type="date" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
        </td>
	    <tr><td>Uang Masuk (Rp.) <?php echo form_error('masuk') ?></td>
            <td><input type="number" class="form-control" name="masuk" id="masuk" placeholder="Masuk" value="<?php echo $masuk; ?>" />
        </td>
	    <tr><td>Uang Keluar (Rp.) <?php echo form_error('keluar') ?></td>
            <td><input type="number" class="form-control" name="keluar" id="keluar" placeholder="Keluar" value="<?php echo $keluar; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </td></tr>
	    <input type="hidden" class="form-control" name="verifikasi" id="verifikasi" placeholder="Verifikasi" value="1" />
        
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('arus_kas') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->