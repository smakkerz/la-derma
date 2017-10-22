
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                  <p>
                <a href="<?= base_url('Kelola_pesan/pesan_baru') ?>" class="button warning">Kirim Pesan Baru</a>
              </p>
            </div>
        <table class="table bordered hovered">
            <thead>
              <tr>
                <th style="color: white;" colspan="5"> Kelola Pesan</th>
              </tr>
              <tr>
                <th style="color: white;">No</th>
                <th style="color: white;">Judul</th>
                <th style="color: white;">Pengirim</th>
                <th style="color: white;">Penerima</th>
                <th style="color: white;">Aksi</th>
              </tr>
            </thead>
            <tbody>
	         <?php 
           $no = 1;
            foreach ($k_pesan as $pesan) {
           ?>
           <tr>
            <td><?= $no++ ?></td>
            <td><?= $pesan->judul ?></td>
            <td><?= $pesan->dari ?></td>
            <td><?= $pesan->untuk ?></td>
            <td align="center"><a href="<?= base_url('Kelola_pesan/baca/'.$pesan->id_percakapan) ?>" class="button primary">BACA</a> <a href="<?= base_url('Kelola_pesan/hapus/'.$pesan->id_percakapan) ?>" class="button danger">Hapus</a></td>
           </tr>
           <?php
            }
           ?>
          </tbody>
        </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->