<div class="row">
            <div class="">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Laporan Transaksi</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <?php echo form_open('C_owner/laporan_tabel_priode'); ?>
                      Dari Tanggal <input type="date" name="dari" class="form-control"> sd <input type="date" name="sd" class="form-control"> <input type="submit" value="Cek" name="cek" class="btn btn-primary">
                      <?php echo form_close(); ?>
<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID Transaksi</th>
                          <th>Tanggal</th>
                          <th>Pasien</th>
                          <th>Dokter</th>
                          <th>Jenis Transaksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                          foreach ($data as $datatx) {
                        ?>
                        <tr>
                          <td><?php echo $datatx->transaksi_id; ?></td>
                          <td><?php echo $datatx->tanggal_transaksi; ?></td>
                          <td>
                          <?php
                            $pasien = $datatx->pasien_email;
                            $user = $this->db->query("SELECT first_name, last_name FROM users WHERE email='$pasien'")->row();
                            echo $user->first_name." ".$user->last_name;
                          ?></td>
                          <td>
                          <?php
                            $dokter = $datatx->dokter_email;
                            $user = $this->db->query("SELECT first_name, last_name FROM users WHERE email='$dokter'")->row();
                            echo $user->first_name." ".$user->last_name;
                          ?></td>
                          <td><?php echo $datatx->jenis; ?></td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
