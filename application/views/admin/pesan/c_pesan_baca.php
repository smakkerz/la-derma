
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h4>
        <table class="table bordered hovered">
          <thead>
          <tr>
            <th style="background-color: black; color: white; text-align: left;">
              <?php
                    foreach ($judul as $joedoel) {
                      echo "Judul : ".$joedoel->judul;
                      echo "<br/>Pengirim : ".$joedoel->dari;
                      echo "<br/>Penerima : ".$joedoel->untuk;

                    }
              ?>
            </th>
          </tr>
        </thead>
        <tbody>
	         <?php 
            $usern = $this->ion_auth->user()->row();
            $user = $usern->email;
            foreach ($baca as $pesan) {
           ?>
            <?php
              if ($pesan->dari == $user) {
            ?>
            <tr align="right">
                <td>
                  <pre><?= $pesan->pesan ?></pre>
                  <div style="font-size: 15px"><?= $pesan->jam ?>
                  <?= $pesan->dari ?></div>
              </td>
            </tr> 
            <?php
              }else{
            ?>
            <tr>
              <td>
                <pre><?= $pesan->pesan ?></pre>
                <div style="font-size: 15px"><?= $pesan->jam ?>
                <?= $pesan->dari ?></div>
              </td>
            </tr> 
            <?php
              }
            ?>
           </tr>
           <tr>
           <?php
            }
           ?>
           <td>

           </td>
           </tr>
         </tbody>
        </table>
        <?= form_open('Kelola_pesan/kirim_pesan'); ?>
           <input type="hidden" name="id_percakapan" value="<?= $this->uri->segment(3) ?>">
           <div class="input-control text" data-role="input" style="width: 100%; height: 50px;">
            <input type="text" name="pesan" placeholder="Tulis pesan disini">
            <button class="button" type="submit"><span class="mif-compass mif-4x"></span>
            </div>
          <?= form_close() ?>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->