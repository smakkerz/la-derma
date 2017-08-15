<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>MENU</h3><a href="#iconku">
      <span class="glyphicon glyphicon-picture" ></span>Lihat Galeri Icon</a>
      <div id="iconku">
        <div class="galeri">
          <a href="#" class="close" title="Close">X</a>
          <h2>Galeri Icons with Font-Awesome 4.4.0</h2>
              <b class="fa fa-glass"> glass</b><b class="fa fa-apple"> apple</b><b class="fa fa-music"> music</b>
              <b class="fa fa-search"> search</b><b class="fa fa-star"> star</b><b class="fa fa-automobile"> automobile</b>
              <b class="fa fa-envelope"> envelope</b><b class="fa fa-heart"> heart</b><b class="fa fa-user"> user</b>
              <b class="fa fa-film"> film</b><b class="fa fa-th-large"> th-large</b><b class="fa fa-th-list"> th-list</b>
              <b class="fa fa-th"> th</b><b class="fa fa-android">android</b><b class="fa fa-bookmark-o"> bookmark-o</b>
              <b class="fa fa-bookmark"> bookmark</b>
              <b class="fa fa-building"> building</b><b class="fa fa-file"> file</b><b class="fa fa-cog" >cog</b>
              <b class="fa fa-circle"> circle</b><b class="fa fa-behance"> behance</b><b class="fa fa-laptop"> laptop</b>
              <b class="fa fa-bitbucket"> bitbucket</b><b class="fa fa-bolt"> bolt</b><b class="fa fa-cab"> cab</b>
              <b class="fa fa-camera-retro"> camera-retro</b><b class="fa fa-adn"> adn</b><b class="fa fa-barcode"> barcode</b>
              <b class="fa fa-calendar"> calendar</b><b class="fa fa-briefcase"> briefcase</b><b class="fa fa-car"> car</b>
              <b class="fa fa-bomb"> bomb</b><b class="fa fa-ambulance"> ambulance</b><b class="fa fa-archive"> archive</b>
              <b class="fa fa-bell"> bell</b><b class="fa fa-bullhorn"> bullhorn</b><b class="fa fa-bitcoin"> bitcoin</b>
               <b class="fa fa-btc"> btc</b><b class="fa fa-ban"> ban</b><b class="fa fa-bars"> bars</b>
              <b class="fa fa-book"> book</b><b class="fa fa-check"> check</b><b class="fa fa-tag"> tag</b>
              <b class="fa fa-pencil"> pencil</b><b class="fa fa-print"> print</b><b class="fa fa-lock"> lock</b>
              <b class="fa fa-outdent"> outdent</b><b class="fa fa-folder"> folder</b><b class="fa fa-key"> key</b>
              <b class="fa fa-flag"> flag</b><b class="fa fa-map-marker"> map-marker</b><b class="fa fa-tags"> tags</b>
              <b class="fa fa-gift"> gift</b><b class="fa fa-thumb-tack"> thumb-tack</b><b class="fa fa-cogs"> cogs</b>
              <b class="fa fa-indent"> indent</b><b class="fa fa-times"> times</b><b class="fa fa-comment"> comment</b>
              <b class="fa fa-qrcode"> qrcode</b><b class="fa fa-folder-open"> folder-open</b><b class="fa fa-inbox"> inbox</b>
              <b class="fa fa-plane"> plane</b><b class="fa fa-road"> road</b><b class="fa fa-asterisk"> asterisk</b>
              <b class="fa fa-picture-o"> picture-o</b><b class="fa fa-info"> info</b><b class="fa fa-magnet"> magnet</b>
              <b class="fa fa-comments"> comments</b><b class="fa fa-tint"> tint</b><b class="fa fa-shopping-cart"> shopping-cart</b>
              <b class="fa fa-home"> home</b><b class="fa fa-bank"> bank</b><b class="fa fa-gears"> gears</b><b class="fa fa-drupal"> drupal</b>
              <b class="fa fa-dashboard"> dashboard</b><b class="fa fa-desktop"> desktop</b><b class="fa fa-github"> github</b>
              <b class="fa fa-codepen"> codepen</b><b class="fa fa-chain"> chain</b><b class="fa fa-cube"> cube</b>
              <b class="fa fa-bug"> bug</b><b class="fa fa-globe"> globe</b><b class="fa fa-graduation-cap"> graduation-cap</b>
              <b class="fa fa-gavel"> gavel</b><b class="fa fa-flask"> flask</b><b class="fa fa-code-fork"> code-fork</b>
              <b class="fa fa-digg"> digg</b><b class="fa fa-google-plus"> google-plus</b><b class="fa fa-gamepad"> gamepad</b>
              <b class="fa fa-facebook"> facebook</b><b class="fa fa-git"> git</b><b class="fa fa-google"> google</b>
              <b class="fa fa-cubes"> cubes</b><b class="fa fa-twitter"> twitter</b><b class="fa fa-headphones"> headphones</b>
              <b class="fa fa-list"> list</b><b class="fa fa-refresh"> refresh</b>
        </div>
        </div>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td width="120">Name <?php echo form_error('name') ?></td>
            <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </td>
	    <tr><td>Link <?php echo form_error('link') ?></td>
            <td><input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
        </td>
	    <tr><td>Icon <?php echo form_error('icon') ?></td>
            <td><input type="text" class="form-control" name="icon" id="ico"n placeholder="Icon" value="<?php echo $icon; ?>" />
        </td>
	    <tr><td>Is Active <?php echo form_error('is_active') ?></td>
                <td><?php echo form_dropdown('is_active',array('1'=>'AKTIF','0'=>'TIDAK AKTIF'),$is_active,"class='form-control'");?>
        </td>
	    <tr><td>Is Parent <?php echo form_error('is_parent') ?></td>
            <td>
                <select name="is_parent" class="form-control">
                    <option value="0">YA</option>
                    <?php
                    $menu = $this->db->get('menu');
                    foreach ($menu->result() as $m){
                        echo "<option value='$m->id' ";
                        echo $m->id==$is_parent?'selected':'';
                        echo">".  strtoupper($m->name)."</option>";
                    }
                    ?>
                </select>
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->