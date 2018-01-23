<div id="contentWrapper" style="display: block;">
      <section id='content' style="display: block;">
          <div class="row">
              <div class="col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buat Pesan Baru</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('Pesan/kirim_baru') ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Pesan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="judul" name="judul" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Penerima Pesan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  list="penerima" name="penerima" placeholder="Penerima Pesan" required="" class="form-control col-md-7 col-xs-12">
                          <datalist id="penerima">
                              <?php
                                  foreach ($penerima as $data) {
                                      echo "<option value='$data->email'>$data->first_name $data->last_name</option>";
                                 }
                              ?>
                          </datalist>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pesan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="pesan"></textarea>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url('Pesan') ?>" class="button primary" >Cancel</a>
              <button class="button primary" type="reset">Reset</button>
                          <button type="submit" class="button success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
  <script>tinymce.init({ selector:'textarea' });</script>
</section>
</div>
