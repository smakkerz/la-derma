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
            <th>ID Kunjungan</th>
            <th>Tanggal Kunjungan</th>
            <th>Jam Kunjungan</th>
            <th>Pasien</th>
            <th>Dokter</th>
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
</section>
</div>