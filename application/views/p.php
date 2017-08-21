<script type="text/javascript">
    function get_harga(){
        var id_obat = $("#id_obat").val();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('C_kasir/get_harga'); ?>",
            data:"id_obat="+id_obat,
            success: function(msg){
                $("#harga").html(msg);
            }
        })
    }

function hitung2() {
    var a = $(".a2").val();
    var b = $(".b2").val();
    c = a * b; //a kali b
    $(".c2").val(c);
}
function hitung3() {
    var a = $(".a3").val();
    var b = $(".b3").val();
    c = a - b; //a kali b
    $(".c3").val(c);
}
</script>
        <!-- Main content -->
       <?php 
        foreach ($rows as $data) {
        ?>
         <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Kasir</h3>
                <?php echo form_open('c_kasir/tambh'); ?>
                <input type="hidden" name="faktur" value="<?= $data->idTransaksi ?>">
                <table class="table table-bordered">
                    <tr>
                        <td>Tanggal :</td>
                        <td><?= format_tanggal($data->date) ?></td>
                        <td colspan="2">   </td>
                        <td colspan="2">No Faktur : <?= $data->idTransaksi ?></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <select class="js-example-basic-single form-control" disabled="" name="kd_pasien">
                                <option><?= $data->nama_pasien ?></option>
                                <?php
                                    foreach ($a as $pasien) {
                                ?>
                                <option value="<?= $pasien->id_pasien ?>"><?= $pasien->nama ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>
                        <td colspan="2">   </td>
                        <td colspan="3">
                            <select class="js-example-basic-single form-control" disabled="" name="kd_dokter">
                                <option><?= $data->idDokter ?></option>
                                <?php
                                    $row = $this->ion_auth->users('Dokter')->result();
                                    foreach ($row as $data) {
                                ?>
                                <option><?= $data->email ?></option>
                                <?php
                                    }
                                ?>  
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Nama Produk</td>
                        <td>
                            <select class="js-example-basic-single form-control" name="id_obat" id="id_obat" onchange="get_harga();">
                                <option>== PILIH ==</option>
                                <?php 
                                    foreach ($obat as $row) {
                                ?>
                                <option value="<?= $row->id_obat ?>"><?= $row->nama ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Jumlah Produk</td>
                        <td><input type="text" onkeyup="hitung2();" name="qty_produk" id="qty_produk" class="form-control b2" value="0"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Harga Produk</td>
                        <td><div id="harga">
                            <input type="text" onkeyup="hitung2();" name="harga" id="harga" class="form-control" value="">

                        </div></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Total Harga Produk</td>
                        <td><input type="text" name="totalharga_produk" id="totalharga_produk" class="form-control c2" value="0"></td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right"><input type="submit" name="tambah" value="Tambah" class="btn btn-primary"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Metode Pembayaran</td>
                        <td>
                            <select name="metode_pembayaran" class="form-control">
                                <option value="CASH">CASH</option>
                                <option value="BANK">BANK</option>
                                <option value="CC">Credit Card</option>
                                <option value="ASURANSI">ASURANSI</option>
                            </select>
                        </td>
                    </tr>
                    <?php echo form_close(); ?>
                    <tr>
                        <td colspan="6">
                            <table class="table">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Sub Total</th>
                                </tr>
                                <?php
                                    foreach ($rinci as $rincian) {
                                ?>
                                <tr>
                                    <td><?= $rincian->nama ?></td>
                                    <td><?= $rincian->harga ?></td>
                                    <td><?= $rincian->qty ?></td>
                                    <td><?= uang($rincian->subtotal) ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total :</td>
                                    <td><?php
                                        $mon = $this->K_kasir->sum('rincian','subtotal','idTransaksi',$this->uri->segment(3));
                                        foreach ($mon as $key) {
                                            $jumlah = $key->jml;
                                            echo uang($jumlah);
                                        }
                                     ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php echo form_open('c_kasir/bayar'); ?>
                    <input type="hidden" name="faktur" value="<?= $this->uri->segment(3) ?>">
                     <tr>
                        <td colspan="2" align="right">Metode Pembayaran</td>
                        <td>
                            <select name="metode_pembayaran" class="form-control">
                                <option value = 'Tunai'>Tunai</option>
                                <option value = 'Transfer'>Transfer</option>
                                <option value = 'Kartu Kredit'>Kartu Kredit</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Uang Bayar</td>
                        <input type="hidden" name="total" class="b3" value="<?= $jumlah ?>">
                        <td><input type="number" name="ubayar" onkeyup="hitung3()" class="form-control a3"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Uang Kembali</td>
                        <td><input type="number" name="ukembali" onkeyup="hitung3()" class="form-control c3"></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input type="submit" name="btn" value="Keluar" class="btn btn-default"></td>
                        <td colspan="3"><input type="submit" name="btn" value="Bayar" class="btn btn-default"></td>
                    </tr>
                    <?php echo form_close(); ?>
                </table>

        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <?php
        }
       ?>