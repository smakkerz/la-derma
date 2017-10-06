                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <small>Transaksi</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('transaksi', array('class'=>'form-horizontal')); ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Barang</label>
                                        <div class="col-sm-10">
                                          <input list="barang" name="barang" placeholder="masukan nama barang" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Quantity</label>
                                        <div class="col-sm-10">
                                          <input type="text" name="qty" placeholder="QTY" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pasien</label>
                                        <div class="col-sm-10">
                                          <input list="pasien" name="pasien" placeholder="masukan nama pasien" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Dokter</label>
                                        <div class="col-sm-10">
                                          <input list="dokter" name="dokter" placeholder="masukan nama dokter" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" name="selesai" class="btn btn-success btn-sm">Selesai</button>
                                        </div>
                                    </div>
                                </form>

                                <datalist id="barang">
                                    <?php foreach ($barang->result() as $b) {
                                        echo "<option value='$b->nama_barang'>";
                                    } ?>
                                    
                                </datalist>
                                <datalist id="pasien">
                                    <?php foreach ($user->result() as $c) {
                                        echo "<option value='$c->email'>$c->first_name $c->last_name</option>";
                                    } ?>
                                    
                                </datalist>
                                <datalist id="dokter">
                                    <?php foreach ($user->result() as $d) {
                                        echo "<option value='$d->email'>$d->first_name $d->last_name</option>";
                                    } ?>
                                    
                                </datalist>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>


                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barabg</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0; foreach ($detail as $r){ ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang.' - '.anchor('transaksi/hapusitem/'.$r->t_detail_id,'Hapus',array('style'=>'color:red;')) ?></td>
                                                <td><?php echo $r->qty ?></td>
                                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                                <td>Rp. <?php echo number_format($r->qty*$r->harga,2) ?></td>
                                            </tr>
                                        <?php $total=$total+($r->qty*$r->harga);
                                        $no++; } ?>
                                            <tr class="gradeA">
                                                <td colspan="4">T O T A L</td>
                                                <td>Rp. <?php echo number_format($total,2);?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /. TABLE  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->