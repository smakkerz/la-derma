<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil Dokter <small><?= $user->first_name ?> <?= $user->last_name?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <h3><?= $user->first_name.' '.$user->last_name ?></h3>

                      <ul class="list-unstyled user_data"><li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Dokter
                        </li>
                        <li><i class="fa fa-envelope user-profile-icon"></i> <?= $user->email ?>
                        </li>
                        <li><i class="fa fa-phone user-profile-icon"></i> <?= $user->phone ?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pesan</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Jadwal</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Janji</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                            <?php
                              foreach ($pesan as $pesan_data) {
                           ?>
                              <li>
                                <div class="message_wrapper">
                                  <h4 class="heading"><?php echo $pesan_data->dari ?></h4>
                                  <blockquote class="message"><?php echo $pesan_data->judul ?></blockquote>
                                  <br />
                                  <p class="url">
                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <a href="<?php echo base_url('Kelola_pesan/baca/'.$pesan_data->id_percakapan) ?>"><i class="fa fa-paperclip"></i> Baca Pesan </a>
                                  </p>
                                </div>
                              </li>
                              <?php
                                }
                              ?>
                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
                            <!-- start user projects -->
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Hari</th>
                                  <th>Dari Jam</th>
                                  <th>Sampai Jam</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                  foreach ($jadwal as $jadwal_data) {
                                ?>
                                <tr>
                                  <td><?php echo $no++?></td>
                                  <td><?php echo $jadwal_data->Hari ?></td>
                                  <td><?php echo $jadwal_data->DariJam ?></td>
                                  <td><?php echo $jadwal_data->SampaiJam ?></td>
                                </tr>
                                <?php
                                  }
                                ?>
                              </tbody>
                            </table>
                            <!-- end user projects -->
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Jam</th>
                                  <th>Nama Pasien</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                  foreach ($janji as $janji_data) {
                                ?>
                                <tr>
                                  <td><?php echo $no++?></td>
                                  <td><?php echo $janji_data->Tanggal ?></td>
                                  <td><?php echo $janji_data->Jam ?></td>
                                  <td><?php echo $janji_data->id_pasien ?></td>
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
            </div>
          </div>
        </div>
        <!-- /page content -->
