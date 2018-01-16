<style type="text/css">
  .wrap{
  background: blue;
  width: 99%;
  margin: 10px auto;
}

/*bagian header*/
.wrap .header{
  background: black;
  /*height: 50px;*/
  padding: 2px 10px;
}

/*akhir header*/

/*bagian menu*/
.wrap .menu{
  background: yellow;
}

.wrap .menu ul{
  padding: 0;
  margin: 0;
  background: yellow;
  overflow: hidden;
}

.wrap .menu ul li{
  float: left;
  list-style-type: none;
  padding: 10px;
}
/*akhir menu*/

.clear{
  clear: both;
}

.badan{
  height: 450px;
}
/*bagian sidebar*/
.wrap .badan .sidebar{
  background: white;
  color: black;
  float: left;  
  width: 25%;
  height: 100%;
}

/*akhir sidebar*/

.wrap .badan .content{
  background: grey;
  float: left;
  height: 100%;
  width: 75%; 
}

.wrap .footer{
  background: black;
  color: white;
  width: 100%;
  padding: 10px;
}
</style>
<br/>

<div class="wrap">
    <div class="header">      
      <h1><a href="<?php echo base_url('Pesan/baru') ?>" class="button success" >Kirim Pesan</a>
</h1>
    </div>
    <div class="badan">     
      <div class="sidebar">
        <ul>
          <?php
          foreach ($list_percakapan as $cakap) {
          ?>
          <li><a href="<?php echo base_url('Pesan/chat'); ?>/<?php echo $cakap->id_percakapan ?>"><?php echo $cakap->judul ?></a></li>
          <?php
          }
          ?>        
        </ul>
      </div>
      <div class="content">
        <?php
        foreach ($pesan as $chat) {
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
                            echo "<hr/>";
                          }
                          ?>
      </div>
    </div>
    <div class="clear"></div>
    <div class="footer">
      <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        Balas Pesan
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

    </div>
  </div>