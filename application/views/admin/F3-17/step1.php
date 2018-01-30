<div id="contentWrapper" style="display: block; padding-top: 70px;">
        <section id='content' style="display: block;">
<div>
	<?php echo form_open('Pemesanan/step1_next'); ?>
	<table class="list-data" width="100%">
		<tr>
			<th colspan="2">Form Transaksi La-Derma</th>
		</tr>
		<tr align="center">
			<td>Nama Dokter</td>
			<td><input list="dokter" name="dokter" placeholder="masukan nama dokter" class="input-control iconic" required=""></td>
		</tr>
		<tr align="center">
			<td>Nama Pasien</td>
			<td><input list="pasien" name="pasien" placeholder="masukan nama pasien" class="input-control iconic" required=""></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" name="next" class="button warning" value="Selanjutnya"></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>
<table class="list-data" width="100%" id="mytable">
                                    <thead>
                                    <tr>
                                        <th colspan="7" >Daftar Pemesanan ( Lebih dari 7 Hari Belum Dibayar Akan Otomatis Terhapus )</th>
                                    </tr>
                                    <tr>
                                        <th >ID Pemesanan</th>
                                        <th >Tanggal Transaksi</th>
                                        <th >Nama Pasien</th>
                                        <th >Nama Dokter</th>
                                        <th >Total Tagihan</th>
                                        <th >Status Bayar</th>
                                        <th >Aksi</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($pemesanan as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $data->idtransaksi ?></td>
                                        <td><?= $data->waktu ?></td>
                                        <td><?php 
                                            
                                            echo $data->pasien_email;
                                         ?></td>
                                         <td><?php 
                                            
                                            echo $data->dokter_email;
                                         ?></td>
                                         <td><?php 
                                            
                                            echo uang($data->masuk);
                                         ?></td>
                                         <td><?php 
                                            if ($data->verifikasi == 0) {
                                                $stat = "Belum Lunas";
                                            }else{
                                                $stat = "LUNAS";
                                            }
                                            echo $stat;
                                         ?></td>
                                        <td>
                                            <?php 
if ($data->verifikasi == 0) {
        $invoice = "";
        $stata = "<a href='". base_url('Pemesanan/set_lunas/'.$data->id)."' class='button primary'>Accept</a>";
    }else{
        $invoice = "<a target='_blank' href='".base_url('transaksi/cetak/'.$data->idtransaksi) ."' class='button warning'>Cetak</a>";
        $stata = "<a href='".base_url('Pemesanan/set_batallunas/'.$data->id) ."' class='button danger'>Batalkan Lunas</a>";
    }
        echo $stata;
        echo "|";
        echo $invoice;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                <!-- /. ROW  -->
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
</section>
</div>
