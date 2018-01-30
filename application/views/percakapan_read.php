
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Percakapan Read</h3>
        <table class="table bordered">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Dari</td><td><?php echo $dari; ?></td></tr>
	    <tr><td>Untuk</td><td><?php echo $untuk; ?></td></tr>
	</table>

  <?php
        foreach ($baca as $pesan) {
                            $user = $this->ion_auth->user()->row();
                            $me = $user->email;
                            if ($pesan->dari == $me) {
                          ?>
                            <div class="mail_heading row">
                            <div class="col-md-8">
                              
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> </p>
                            </div>
                          </div>
                          
                          <div align="right">
                            <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <div class="example" data-text="blockquote">
            <blockquote class="place-right">
                <p><?php
                              echo $pesan->pesan;
                            ?></p>
                <small><?php echo date('d-M-Y H:i',strtotime($pesan->jam)); ?> - <cite title="Source Title">                                <strong><?php echo $pesan->dari; ?></strong>
</cite></small>
            </blockquote>
            </div>                
                          </div>
                          </div>
                          <?php
                            }else{
                          ?>
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <p class="date"></p>

                            </div>
                            <div class="col-md-4 text-right">
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <div class="example" data-text="blockquote">
            <blockquote >
                <p><?php
                              echo $pesan->pesan;
                            ?></p>
                <small><?php echo date('d-M-Y H:i',strtotime($pesan->jam)); ?> - <cite title="Source Title">                                <strong><?php echo $pesan->dari; ?></strong>
</cite></small>
            </blockquote>
            </div>          
                          </div>
                          <?php
                            }
                            echo "<hr/>";
                          }
                          ?>
      </div>
    </frame>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->