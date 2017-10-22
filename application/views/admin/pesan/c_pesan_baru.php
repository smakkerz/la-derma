
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>
                  Buat Pesan Baru
                </h3>
                <hr/>
                <?= form_open('Kelola_pesan/tambah_pesan') ?>
                <table class="table table-bordered">
                  <tr>
                    <td>Judul Pesan</td>
                    <td><input type="text" name="judul" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Penerima Pesan</td>
                    <td>
                      <select name="untuk" class="form-control">
                        <?php 
                          if ($this->ion_auth->is_admin()) {
                            $users = $this->ion_auth->users()->result();
                          }elseif($this->ion_auth->in_group('Dokter')){
                            $users = $this->ion_auth->users('Pasien')->result();
                          }else{
                            $users = $this->ion_auth->users('Dokter')->result();
                          }
                          foreach ($users as $user) {
                            ?>
                            <option value="<?= $user->email ?>"><?= $user->email ?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="submit" class="btn btn-primary" value="Buat Pesan"></td>
                  </tr>
                </table>
                </form>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->