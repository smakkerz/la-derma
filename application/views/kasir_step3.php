
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Kasir</h3>
                <?php  

                    foreach ($data2 as $row) {
                            $pasien = $row->idPasien;
                            $dokter = $row->idDokter;
                            $tot_byar = $row->total_bayar;
                            $status = $row->status;
                        }    
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>No Faktur</th>
                        <td><input type="text" name="faktur" value="<?= $faktur ?>" readonly="" class="form-control"></td>
                    </tr>
                	<tr>
                		<th>Kode Pasien</th>
                		<td><input type="text" name="kd_pasien" value="<?= $pasien ?>" class="form-control" readonly></td>
                	</tr>
                	<tr>
                		<th>Kode Dokter</th>
                		<td><input type="text" name="kd_dokter" value="<?= $dokter ?>" class="form-control" readonly></td>
                	</tr>
                	 <!-- tgl-kodeurut-bulan-thn-LD  -->
                    <?php echo form_open('c_kasir/princian_add'); ?>
                    <input type="hidden" name="idtx" value="<?= $faktur ?>">
                	<tr>
                		<td>Tambah Obat</td>
                		<td>
                            <table>
                                <tr>
                                    <td><select name="t_obt" class="form-control" readonly>
                                        <?php
                                        foreach ($obat as $obt) {
                                        ?>
                                        <option value="<?= $obt->id_obat ?>"><?= $obt->nama ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                            <td><input type="number" name="qty" placeholder="Jumlah" class="form-control" readonly=""></td>
                        <td><input type="submit" value="Tambah" class="btn btn-default disabled" readonly="" ></td>
                                </tr>
                            </table>
                		</td>
                	</tr>
                	<?php echo form_close(); ?>
                	<tr>
                		<td colspan="2">
                			<table class="table">
                                <tr>
                                    <th>Kode Obat</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                $total = 0;
                                $subtotal = 0;
                                    foreach ($data3 as $row2) {
                                ?>
                                <tr>
                                    <td><?= $row2->nama ?></td>
                                    <td><?= $row2->qty ?></td>
                                    <td><?= number_format($row2->harga*$row2->qty) ?></td>
                                    <td><a href="<?= base_url('c_kasir/hapus_rincian/'.$row2->id.'/'.$faktur) ?>" class="btn btn-danger disabled">X</a></td>
                                </tr>
                                <?php
                                
                                $subtotal = $row2->harga*$row2->qty;
                                $total = $total + $subtotal;
                                    }
                                ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td colspan="2">Rp. <?= number_format($total) ?></td>
                                </tr>
                                <?= form_open('c_kasir/bayar/') ?>
                                <input type="hidden" name="idTransaksi" value="<?= $faktur ?>">
                                <tr align="right">
                                    <td colspan="2">Uang Bayar Rp.</td>
                                    <?php
                                            if ($status == "Lunas") {
                                        ?>
                                    <td><input type="number" name="byar" value="<?= $tot_byar ?>" class="form-control" readonly></td>
                                    <td align="left">
                                        
                                        <input type="submit" value="Bayar" class="btn btn-warning disabled">
                                        <?php
                                            }else{
                                        ?>
                                        <td><input type="number" name="byar" value="<?= $tot_byar ?>" class="form-control"></td>
                                        <input type="submit" value="Bayar" class="btn btn-warning">
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?= form_close() ?>
                                <tr align="right">
                                    <td colspan="2">Uang Kembali Rp.</td>
                                    <td align="left"><?= number_format($tot_byar-$total) ?></td>
                                </tr>
                                <tr align="right">
                                    <td colspan="2">Status</td>
                                    <td colspan="2" align="left"><?= $status ?></td>
                                </tr>
                			</table>
                		</td>
                	</tr>
                	
                </table>
                

        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->