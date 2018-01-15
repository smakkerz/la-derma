            <div class="page-title">
              <div class="title_left">
                <h3>Pesan </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pesan Pengguna</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <a href="<?php echo base_url('Pesan/baru') ?>" class="btn btn-sm btn-success btn-block" >COMPOSE</a>
                        <?php
                          foreach ($list_percakapan as $cakap) {
                        ?>
                        <a href="<?php echo base_url('Pesan/chat'); ?>/<?php echo $cakap->id_percakapan ?>">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                            </div>
                            <div class="right">
                              <h3><?= $cakap->judul ?> </small></h3>
                              <p>
                              <small>Anggota Percakapan : <br/>
                                <?= $cakap->untuk ?>,
                                <?= $cakap->dari ?></small>
                              </p>
                            </div>
                          </div>
                        </a>
                        <?php
                          }
                        ?>
                        
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              Selamat datang di halaman pesan.
                            </div>
                          </div>
                        </div>
                      </div>
                            
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->