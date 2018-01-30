    <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Stock Barang <small>Obat dan Produk lainnya</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                            <div class="panel-heading">
                                 <?php echo anchor('Barang/post','Tambah Data',array('class'=>'button button danger')) ?>
                                 <?php echo anchor('Kategori','Kategori Barang',array('class'=>'button button warning')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="list-data" width="100%" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr style="color: black;">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td><?php echo uang($r->harga) ?></td>
                                                <td><?php echo $r->stok ?></td>
                                                <td class="center" >
                                                    <?php echo anchor('barang/edit/'.$r->barang_id,'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'button success btn-sm')); ?> | 
                                                    <?php echo anchor('barang/delete/'.$r->barang_id,'<i class="fa fa-trash-o"></i>','title="delete" class="button danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
            </section>
        </div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>