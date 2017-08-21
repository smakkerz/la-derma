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
</script>
<script>
function hitung2() {
    var a = $(".a2").val();
    var b = $(".b2").val();
    c = a * b; //a kali b
    $(".c2").val(c);
}
</script>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div>
                <div class='box-header'>
                <h3 class='box-title'>Kasir</h3>
                <?php echo form_open('c_kasir/tmbh'); ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Tanggal :</td>
                        <td><?= format_tanggal(date('Y-m-d')) ?></td>
                        <td colspan="2">   </td>
                        <td colspan="2">No Faktur : <?= $this->K_kasir->faktur() ?></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <select class="js-example-basic-single form-control" name="kd_pasien">
                                <option>Nama Pasien</option>
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
                            <select class="js-example-basic-single form-control" name="kd_dokter">
                                <option>Nama Dokter</option>
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
                    <?php echo form_close(); ?>
                    <tr>
                        <td colspan="6">
                            <table class="table" align="center">
                                <tr>
                                    <td align="center">-DATA MASIH KOSONG-</td>
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