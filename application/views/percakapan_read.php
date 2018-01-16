
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

  <table class="table table-bordered">
           <?php 
            $usern = $this->ion_auth->user()->row();
            $user = $usern->email;
            foreach ($baca as $pesan) {
           ?>
           <tr>
            <?php
              if ($pesan->dari == $user) {
            ?>
            <td align="right" colspan="2">
              <div>
                <b><?= $pesan->jam ?></b><br/>
                <?= $pesan->dari ?><hr/>
                <?= $pesan->pesan ?>
              </div>
            </td> 
            <?php
              }else{
            ?>
            <td colspan="2">
              <div>
                <b><?= $pesan->jam ?></b><br/>
                <?= $pesan->dari ?><hr/>
                <?= $pesan->pesan ?><hr/>
              </div>
            </td> 
            <?php
              }
            ?>
           </tr>
           <?php
            }
           ?>
        </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->