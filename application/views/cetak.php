
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/print/style.css">
        <script src="<?= base_url() ?>assets/print/script.js"></script>
    </head>
    <body>
        <?php 
            $mon = $this->K_kasir->sum('rincian','subtotal','idTransaksi',$this->uri->segment(3));
                foreach ($mon as $key) {
                    $jumlah = $key->jml;
                }
        foreach ($rows as $data) { 
        ?>
        <header>
            <h1>Invoice</h1>
            <address>
                <p><?= $data->nama_pasien ?></p>
                <p><?= $data->alamat ?></p>
            </address>
        </header>
        <article>
            <table class="meta">
                <tr>
                    <th><span >Invoice #</span></th>
                    <td><span ><?= $data->idTransaksi ?></span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span ><?= format_tanggal($data->date) ?></span></td>
                </tr>
                <tr>
                    <th><span >Billing</span></th>
                    <td><?= uang($jumlah) ?></span></td>
                </tr>
            </table>
            <table>
                <thead>
                    <tr>
                        <th><span >Item</span></th>
                        <th><span >Description</span></th>
                        <th><span >Rate</span></th>
                        <th><span >Quantity</span></th>
                        <th><span >Price</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($rinci as $rincian) {
                    ?>
                    <tr>
                        <td><span ><?= $rincian->nama ?></span></td>
                        <td><span ><?= $rincian->deskripsi ?></span></td>
                        <td><span ><?= uang($rincian->harga) ?></span></td>
                        <td><span ><?= $rincian->qty ?></span></td>
                        <td><span><?= uang($rincian->subtotal) ?></span></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
            <table>
                <tr>
                    <th><span >Total</span></th>
                    <td><span><?= uang($jumlah) ?></span></td>
                </tr>
                <tr>
                    <th><span >Status</span></th>
                    <td><span ><?= $data->status_tx ?></span></td>
                </tr>
            </table>
        </article>
        <?php } ?>
    </body>
</html>
<script type="text/javascript">window.print()</script>