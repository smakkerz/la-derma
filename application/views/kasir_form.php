
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Kasir</h3>
                <?php echo form_open('c_kasir/next'); ?>
                <table class="table table-bordered">
                	<tr>
                		<th>Kode Pasien</th>
                		<td><input type="text" name="kd_pasien" class="form-control"></td>
                	</tr>
                	<tr>
                		<th>Kode Dokter</th>
                		<td><input type="text" name="kd_dokter" class="form-control"></td>
                	</tr>
                	<tr>
                		<td colspan="2"><input type="submit" name="next" value="Selanjutnya" class="btn btn-primary"></td>
                	</tr>
                	 <!-- tgl-kodeurut-bulan-thn-LD 
                	<tr>
                		<td>Tambah Obat</td>
                		<td>
                			<select name="t_obt">
                				<?php
                					foreach ($obat as $obt) {
                				?>
                				<option value="<?= $obt->id_obat ?>"><?= $obt->nama ?></option>
                				<?php
                					}
                				?>
                			</select>
                		<input type="submit" value="Tambah"></td>
                	</tr>
                	
                	<tr>
                		<td colspan="2">
                			<table>

                			</table>
                		</td>
                	</tr>
                	-->
                </table>
                </form>

        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->