<div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>5 Kunjungan Terakhir</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <table class="table table-bordered">
                          <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Dokter</th>
                          </tr>
                          <?php
                            foreach ($kunjungan as $dk) {
                          ?>
                          <tr>
                            <td><?php echo $dk->Tanggal; ?></td>
                            <td><?php echo $dk->Jam; ?></td>
                            <td>
                            <?php
                              $dok = $this->Pasien_login->dokter_kunjungan($dk->idDokter);
                              echo $dok;
                            ?></td>
                          </tr>
                          <?php
                            }
                          ?>
                        </table>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-8 col-sm-8 col-xs-12">



              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>5 Rekam Medis Terakhir</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <table class="table table-bordered">
                        <tr>
                          <th>Tanggal</th>
                          <th>Dokter</th>
                          <th>Tindakan</th>
                          <th>Aksi</th>
                        </tr>
                        <?php
                          foreach ($rmedis as $rm) {
                        ?>
                        <tr>
                          <td><?php echo $rm->waktu; ?></td>
                          <td><?php
                            $dok = $this->Pasien_login->dokter_kunjungan($rm->id_dokter);
                              echo $dok;
                          ?></td>
                          <td><?php echo $rm->tindakan ?></td>
                          <td><a class="btn btn-primary" href="<?php echo base_url('C_pasien/medis_detail')."/".$rm->id_rmedis ?>">Detail</a></td>
                        </tr>
                        <?php
                          }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
              
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
