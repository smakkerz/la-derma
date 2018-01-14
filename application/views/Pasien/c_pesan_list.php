
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Kotak Masuk</h3>
                <h4>
                <a href="<?= base_url('C_pasien/pesan_baru') ?>" class="btn btn-default">Buat Pesan</a>
                <a href="<?= base_url('C_pasien/inbox') ?>" class="btn btn-default">Kotak Masuk</a>
                <a href="<?= base_url('C_pasien/outbox') ?>" class="btn btn-default">Kotak Keluar</a>
        <table class="table table-bordered">
	         <?php 
            foreach ($k_pesan as $pesan) {
           ?>
           <tr>
            <td>
              <div>
               Judul Pesan : <?= $pesan->judul ?><br/>
               Pengirim : <?= $pesan->dari ?> <br/>
               Penerima : <?= $pesan->untuk ?>
              </div>
            </td> 
            <td align="center"><br/><br/><a href="<?= base_url('C_pasien/baca/'.$pesan->id_percakapan) ?>" class="btn btn-primary">Balas</a></td>
           </tr>
           <?php
            }
           ?>
        </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->