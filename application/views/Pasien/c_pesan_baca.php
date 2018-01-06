        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>
                  <?php
                    foreach ($judul as $joedoel) {
                      echo $joedoel->judul;
                    }                
                  ?>
                </h3>
                <h4>
                <a href="<?= base_url('C_dokter/pesan_baru') ?>" class="btn btn-default">Buat Pesan</a>
                <a href="<?= base_url('C_dokter/inbox') ?>" class="btn btn-default">Kotak Masuk</a>
                <a href="<?= base_url('C_dokter/outbox') ?>" class="btn btn-default">Kotak Keluar</a>
        <table class="table table-bordered">
	         <?php 
            $usern = $this->ion_auth->user()->row();
            $user = $usern->email;
            foreach ($baca as $pesan) {
           ?>
           <tr>
            <?php
              if ($pesan->dari == $user) {
            ?>
            <td align="right" colspan="2">
              <div>
                <b><?= $pesan->jam ?></b><br/>
                <?= $pesan->dari ?><hr/>
                <?= $pesan->pesan ?>
              </div>
            </td> 
            <?php
              }else{
            ?>
            <td colspan="2">
              <div>
                <b><?= $pesan->jam ?></b><br/>
                <?= $pesan->dari ?><hr/>
                <?= $pesan->pesan ?><hr/>
              </div>
            </td> 
            <?php
              }
            ?>
           </tr>
           <?php
            }
           echo form_open('C_dokter/kirim_pesan');
           ?>

           <input type="hidden" name="id_percakapan" value="<?= $this->uri->segment(3) ?>">
           <tr>
             <td><textarea type="text" name="pesan" class="form-control" required=""></textarea></td><td style="width: 150px; text-align: center;"><input type="submit" value="Balas" class="btn btn-primary"></td>
           </tr>
           </form>
        </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->