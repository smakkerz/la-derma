
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
                <a href="<?= base_url('c_pesan/pesan_baru') ?>" class="btn btn-default">Buat Pesan</a>
                <a href="<?= base_url('c_pesan') ?>" class="btn btn-default">Kotak Masuk</a>
                <a href="<?= base_url('c_pesan/outbox') ?>" class="btn btn-default">Kotak Keluar</a>
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
            <td align="right">
              <div>
                <b><?= $pesan->jam ?></b><br/>
                <?= $pesan->dari ?><hr/>
                <?= $pesan->pesan ?>
              </div>
            </td> 
            <?php
              }else{
            ?>
            <td>
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
           echo form_open('c_pesan/kirim_pesan');
           ?>
           <input type="hidden" name="id_percakapan" value="<?= $this->uri->segment(3) ?>">
           <tr>
             <td><input type="text" name="pesan" class="form-control"><input type="submit" value="Balas" class="btn btn-primary"></td>
           </tr>
           </form>
        </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->