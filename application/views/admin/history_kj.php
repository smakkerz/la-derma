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
            <th>ID Kunjungan</th>
            <th>Tanggal Kunjungan</th>
            <th>Jam Kunjungan</th>
            <th>Pasien ID</th>
            <th>Dokter ID</th>
        </tr>
        <?php
            foreach ($get_kj as $data) {
        ?>
        <tr>
            <td><?php echo $data->id_kj ?></td>
            <td><?php echo $data->Tanggal ?></td>
            <td><?php echo $data->Jam ?></td>
            <td><?php echo $data->id_pasien ?></td>
            <td><?php echo $data->idDokter ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>