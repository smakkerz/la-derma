        <div id="contentWrapper" style="display: block;">
        <section id='content' style="display: block;">
<div class="fluent-menu" data-role="fluentmenu">
    <br/><a href="<?php echo base_url('History/HistoryTx') ?>" class="button warning">Riwayat Transaksi</a>
        ...
        <a href="<?php echo base_url('History/HistoryKj') ?>" class="button primary">Riwayat Kunjungan</a>
</div>
<div>
    <table class="list-data" width="100%" id="mytable">
        <tr>
            <td>Riwayat Transaksi</td>
        </tr>
        <tr>
            <th>Kode Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Operator</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Jenis Transaksi</th>
            <th>Status</th>
        </tr>
        <?php
            foreach ($get_tx as $data) {
        ?>
        <tr>
            <td><?php echo $data->transaksi_id ?></td>
            <td><?php echo $data->tanggal_transaksi ?></td>
            <td><?php echo $data->operator_id ?></td>
            <td><?php echo $data->pasien_email ?></td>
            <td><?php echo $data->dokter_email ?></td>
            <td><?php echo $data->jenis ?></td>
            <td><?php if ($data->verifikasi == 1) {
                echo "Sudah Lunas";
                }else{
                    echo "Belum Lunas";
                } ?></td>
        </tr>
        <?php
            }
        ?>
        <tr>
    </table>
</div>
</section>
</div>