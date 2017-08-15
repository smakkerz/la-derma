<!-- Main content -->
        <section>
          <div >
            <div>
              <div>
                <div class='box-header'>
                
                  <h3 class='box-title'>Tambah Obat</h3>
                </div>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Kategori Obat <?php echo form_error('kategori_obat') ?>
        </td>
        <td>
            <select class="form-control" name="kategori_obat" id="kategori_obat">
            <?php
                foreach ($kategori_obat_data as $kategori_obat)
                {
            ?>
                <option value="<?php echo $kategori_obat->kategori_obat; ?>"><?php echo $kategori_obat->kategori; ?></option>
            <?php
                }
                ?>
            </select>
        </td>
	    <tr><td>Deskripsi <?php echo form_error('deskripsi') ?></td>
            <td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </td>
	    <tr><td>Stock <?php echo form_error('stock') ?></td>
            <td><input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" />
        </td>
	    <tr><td>Manufaktur <?php echo form_error('manufaktur') ?></td>
            <td><input type="text" class="form-control" name="manufaktur" id="manufaktur" placeholder="Manufaktur" value="<?php echo $manufaktur; ?>" />
        </td>
	    <tr><td>Harga <?php echo form_error('harga') ?></td>
            <td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </td>
	    <tr><td>Expired <?php echo form_error('expired') ?></td>
            <td><input type="text" class="form-control" name="expired" id="expired" placeholder="Expired" value="<?php echo $expired; ?>" />
        </td>
	    <input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('k_obat') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->