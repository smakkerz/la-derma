<style type="text/css">
  .wrap{
  background: blue;
  width: 90%;
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
        Selamat Datang di halaman pesan.
      </div>
    </div>
    <div class="clear"></div>
    <div class="footer">
      La-Derma
    </div>
  </div>