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
                              <h3><?= $cakap->judul ?></h3>
                              <p>
                              <small>Anggota Percakapan : <br/>
                                <?= $cakap->dari ?>,
                                <?= $cakap->untuk ?></small>
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
                          <div class="btn-group">
                            <button id="compose" class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                          </div>
                            <?php
                              foreach ($pesan as $chat) {
                            ?>
                            <?php
                            $user = $this->ion_auth->user()->row();
                            $me = $user->email;
                            if ($chat->dari == $me) {
                          ?>
                            <div class="mail_heading row">
                            <div class="col-md-8">
                              
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> <?php echo date('d-M-Y H:i',strtotime($chat->jam)); ?></p>
                            </div>
                          </div>
                          
                          <div align="right">
                            <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>me</strong> (<?php echo $chat->dari; ?>) 
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <?php
                              echo $chat->pesan;
                            ?>
                          </div>
                          </div>
                          <?php
                            }else{
                          ?>
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <p class="date"> <?php echo date('d-M-Y H:i',strtotime($chat->jam)); ?></p>

                            </div>
                            <div class="col-md-4 text-right">
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong><?php echo $chat->dari; ?></strong>
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <?php
                              echo $chat->pesan;
                            ?>
                          </div>
                          <?php
                            }
                          ?>
                          <hr/>
                            <?php
                              }
                            ?>
                          
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
        <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        Balas Pesan
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
        <div id="editor" class="editor-wrapper">
          <?php
           echo form_open('Pesan/balas_pesan');
           ?>
           <input type="hidden" name="id_percakapan" value="<?= $this->uri->segment(3) ?>">
           <input type="hidden" name="dari" value="<?= $me ?>">
           <textarea name="pesan">
             
           </textarea>
           
        </div>
      </div>

      <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="submit">Kirim</button>
      </div>
    </div>
    </form>
      <script>tinymce.init({ selector:'textarea' });</script>
