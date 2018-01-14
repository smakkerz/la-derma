<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class=''>
                <div class=''>
                
                  <h3 class='box-title'>USERS</h3>
                      <div class=''>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Pengguna </td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" required="" />
        </td>
	    <tr><td>Kata Sandi </td>
            <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" required="" />
        </td>
	    <tr><td>Nama Pertama </td>
            <td><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>"  required=""/>
        </td>
	    <tr><td>Nama Terakhir</td>
            <td><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" required="" />
        </td>
      </tr>
      <tr><td>Alamat</td>
            <td><textarea type="text" class="form-control" name="company" id="company" required="" ><?php echo $company; ?></textarea>
        </td>
        <tr><td>No Telepon</td>
            <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Last Name" value="<?php echo $phone; ?>" required="" />
        </td>
      </tr>
      <tr>
        <td>Grup</td>
        <td>
          <select name="groups">
            <?php foreach ($groups as $group):?>
              <option value="<?php echo $group['id'];?>">

              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
            </option>
          <?php endforeach?>
          </select>
          
        </td>
      </tr>

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->