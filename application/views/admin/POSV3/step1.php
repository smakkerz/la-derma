<div>
	<?php echo form_open('Pos3/step1_next'); ?>
	<table class="table hovered bordered striped">
		<tr>
			<th colspan="2">Form Transaksi La-Derma</th>
		</tr>
		<tr align="center">
			<td>Nama Dokter</td>
			<td><input list="dokter" name="dokter" placeholder="masukan nama dokter" class="form-control"></td>
		</tr>
		<tr align="center">
			<td>Nama Pasien</td>
			<td><input list="pasien" name="pasien" placeholder="masukan nama pasien" class="form-control"></td>
		</tr>
		<tr align="center">
			<td>Jenis Transaksi</td>
			<td>
				<select name="jenis">
					<option>Penjualan Jasa</option>
					<option>Penjualan Resep</option>
					<option>Penjualan Non Resep</option>
					<option>Lain-Lain</option>	
				</select>
			</td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" name="next" class="button warning" value="Selanjutnya"></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>
<datalist id="pasien">
	<?php foreach ($this->ion_auth->users('5')->result() as $c) {
	echo "<option value='$c->email'>$c->first_name $c->last_name</option>";
	} ?>
                                    
</datalist>
<datalist id="dokter">
   	<?php foreach ($this->ion_auth->users('4')->result() as $d) {
    echo "<option value='$d->email'>$d->first_name $d->last_name</option>";
    } ?>
                                    
</datalist>