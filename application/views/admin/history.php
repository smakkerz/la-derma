<div class="fluent-menu" data-role="fluentmenu">
    <br/>
    <ul class="tabs-holder">
        <li><a href="<?php echo base_url('History/HistoryTx') ?>">Riwayat Transaksi</a></li>
        ...
        <li><a href="<?php echo base_url('History/HistoryKj') ?>">Riwayat Kunjungan</a></li>
    </ul>
</div>
<div>
    <table class="table striped bordered hovered">
        <tr>
            <td>Riwayat Transaksi</td>
        </tr>
        <tr>
            <th>Transaksi ID</th>
            <th>Tanggal Transaksi</th>
            <th>Operator ID</th>
            <th>Pasien ID</th>
            <th>Dokter ID</th>
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