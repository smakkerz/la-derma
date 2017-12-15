                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <small>Data Barang</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('Barang/post','Tambah Data',array('class'=>'button button danger')) ?>
                                 <?php echo anchor('Kategori','Kategori Barang',array('class'=>'button button warning')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="color: white">No.</th>
                                                <th style="color: white">Nama Barang</th>
                                                <th style="color: white">Kategori</th>
                                                <th style="color: white">Harga</th>
                                                <th style="color: white">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr style="color: black;">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                                <td class="center" >
                                                    <font color="black"><?php echo anchor('barang/edit/'.$r->barang_id,'Edit'); ?> | 
                                                    <?php echo anchor('barang/delete/'.$r->barang_id,'Delete'); ?></font>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->


