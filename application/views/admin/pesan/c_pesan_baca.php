<style type="text/css">
  .wrap{
  background: transparent;
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
  background: transparent;
  float: left;
  height: 100%;
  width: 75%; 
}

.wrap .footer{
  display: block;
  width: 100%;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
  border: 3px solid rgba(0,0,0,0);
  position: fixed;
bottom: 0px;
left: 0px;
text-align:right;
color:#555;
font-size:12px
}
#button-blue{
  font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  float:left;
  width: 100%;
  border: #fbfbfb solid 4px;
  cursor:pointer;
  background-color: #3B8BBA;
  color:white;
  font-size:24px;
  padding-top:22px;
  padding-bottom:22px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}
#content{
  background: white;
}
a{
  text-decoration: none;
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
        <frame>
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
                              echo $chat->pesan;
                            ?></p>
                <small><?php echo date('d-M-Y H:i',strtotime($chat->jam)); ?> - <cite title="Source Title">                                <strong><?php echo $chat->dari; ?></strong>
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
                              echo $chat->pesan;
                            ?></p>
                <small><?php echo date('d-M-Y H:i',strtotime($chat->jam)); ?> - <cite title="Source Title">                                <strong><?php echo $chat->dari; ?></strong>
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
           <input type="text" name="pesan" style="
           background: #fff;
  box-shadow: 0;
  border: 3px solid #3498db;
  color: #3498db;
  outline: none;
  padding: 13px;
  width: 40%;
           " placeholder="Ketik Pesan Disini">           
        </div>
      </div>

      <div class="compose-footer">
        <button id="send" class="button primary" type="submit">Kirim</button>
      </div>
    </div>
    </form>
      <script>tinymce.init({ selector:'textarea' });</script>

    </div>
  </div>