<!DOCTYPE html>
<!-- saved from url=(0030) -->
<html class="linux chrome webkit"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
    <meta name="Description" content="A description of your site for Google here">
    <meta name="keywords" content="Some, keywords, seperated, by, commas, here, max 10">
    <meta name="viewport" content="width=1024,initial-scale=1.00, minimum-scale=1.00">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>La-derma - Home</title> 
    
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/nav.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/tiles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/theme.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/styles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/jquery.autocomplete.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/plugin.css">
    <style>
html{background-color:#0F6D32;}

		#bgImage { position:fixed; top:0; left:0; z-index:-4; min-width:115%;min-height:100%;
					-webkit-transition:margin-left 390ms linear;
			-moz-transition:margin-left 390ms linear;
			-o-transition:margin-left 390ms;
			-ms-transition:margin-left 390ms;
			transition:margin-left 390ms;
					}
			.tile{
	-webkit-transition-property: box-shadow, margin-left,  margin-top;
	-webkit-transition-duration: 0.25s, 0.5s, 0.5s;
	-moztransition-property: box-shadow, margin-left,  margin-top;
	-moz-transition-duration: 0.25s, 0.5s, 0.5s;
	-o-transition-property: box-shadow, margin-left,  margin-top;
	-o-transition-duration: 0.25s, 0.5s, 0.5s;
	-ms-transition-property: box-shadow, margin-left,  margin-top;
	-ms-transition-duration: 0.25s, 0.5s, 0.5s;
	transition-property: box-shadow, margin-left,  margin-top;
	transition-duration: 0.25s, 0.5s, 0.5s;
	}
</style> 
    <!--[if lt IE 9]>
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/html5.js">
	<![endif]-->
	<!--[if gte IE 9]>
    <script src="http://code.jquery.com/jquery-2.0.0b2.js"></script>
    <script src="js/html5.js">
	<![endif]-->
    <!--[if !IE]>
    <script src="http://code.jquery.com/jquery-2.0.0b2.js"></script>
	<![endif]-->

    <script type="text/javascript" src="<?= base_url('Metro') ?>/jquery191.js"></script> 
    <script type="text/javascript" language="javascript" src="<?= base_url('Metro') ?>/plugins.js"></script>
    
	<script>
scale = 125;
spacing = 5;
theme = 'theme_default';
$group.titles = ["Pelayanan","Transaksi","Master Data","Laporan","Analisa"];
$group.spacingFull = [4,4,4,4,4];
$group.inactive.opacity = "1";
$group.inactive.clickable = "1";
$group.showEffect = 0;
$group.direction = "horizontal";

mouseScroll = "1";

siteTitle = 'Klinik';
siteTitleHome = 'Home';
showSpeed = 400;
hideSpeed = 300;
scrollSpeed = 400;

device = "desktop";
	scrollHeader = "1";
	disableGroupScrollingWhenVerticalScroll = "";

/*For background image*/
bgMaxScroll= "130";
bgScrollSpeed = "390";

/*For responsive */
autoRearrangeTiles = "1";
autoResizeTiles = "1";
rearrangeTreshhold = 2;
pageTitles=new Array();
pageTitles['welcome.php'] = 'Welcome';
pageTitles['typography.php'] = 'Typography';
pageTitles['accordions.php'] = 'Accordions';
pageTitles['sidebars.php'] = 'Sidebars';
pageTitles['<?= base_url('Barang/index') ?>'] = 'Barang';
pageTitles['barang-inactive.php'] = 'Barang Tidak Aktif';
pageTitles['item-kit.php'] = 'Item Kit';
pageTitles['pabrik.php'] = 'Pabrik';
pageTitles['pelanggan.php'] = 'Customer';
pageTitles['supplier.php'] = 'Supplier';
pageTitles['bank.php'] = 'Bank';
pageTitles['<?= base_url('Users/index') ?>'] = 'Dokter';
pageTitles['jadwalpraktek.php'] = 'Jadwal Praktek';
pageTitles['asuransi.php'] = 'Asuransi';
pageTitles['karyawan.php'] = 'Karyawan';
pageTitles['layanan.php'] = 'Layanan';
pageTitles['instansi.php'] = 'Instansi';
pageTitles['pelengkap.php'] = 'Produk Pelengkap';
pageTitles['kemasan.php'] = 'Kemasan';
pageTitles['golongan.php'] = 'Golongan';
pageTitles['farmakoterapi.php'] = 'Farmakoterapi';
pageTitles['kelas-terapi.php'] = 'Kelas Terapi';
pageTitles['penyakit.php'] = 'Penyakit';
pageTitles['user-account.php'] = 'User Account';
pageTitles['pemesanan.php'] = 'Pemesanan';
pageTitles['penjualan.php'] = 'Penjualan Resep';
pageTitles['penjualan-nr.php'] = 'Penjualan Non Resep';
pageTitles['penerimaan.php'] = 'Penerimaan';
pageTitles['stok-opname.php'] = 'Stok Opname';
pageTitles['resep.php'] = 'Receipt';
pageTitles['retur-penerimaan.php'] = 'Retur Penerimaan';
pageTitles['retur-penjualan.php'] = 'Retur Penjualan';
pageTitles['pemeriksaan.php'] = 'Pemeriksaan';
pageTitles['inkaso.php'] = 'Inkaso';
pageTitles['defecta.php'] = 'Defecta';
pageTitles['rencana-pemesanan.php'] = 'Rencana Order';
pageTitles['pendaftaran.php'] = 'Pendaftaran';
pageTitles['uang-in-out.php'] = 'Pemasukkan Pengeluaran Uang';
pageTitles['billing.php'] = 'Pembayaran Billing';
pageTitles['arus-stok.php'] = 'Arus Stok';
pageTitles['lap-sp.php'] = 'Laporan Pemesanan';
pageTitles['lap-resep.php'] = 'Laporan Resep';
pageTitles['lap-penjualan.php'] = 'Laporan Penjualan';
pageTitles['lap-penjualan-nr.php'] = 'Laporan Penjualan Non Resep';
pageTitles['lap-penerimaan.php'] = 'Laporan Penerimaan';
pageTitles['lap-hutang.php'] = 'Laporan Hutang';
pageTitles['lap-arus-kas.php'] = 'Laporan Arus Kas';
pageTitles['lap-statistik-obat.php'] = 'Laporan Statistik Pemakaian Obat';
pageTitles['lap-analisis-abc.php'] = 'Laporan Analisa ABC';
pageTitles['expired-date.php'] = 'Laporan Expired Date';
pageTitles['lap-billing.php'] = 'Laporan Billing';
pageTitles['lap-jasa-tarif.php'] = 'Laporan Jasa Layanan';
pageTitles['lap-control.php'] = 'Laporan Control';
pageTitles['neraca.php'] = 'Neraca';
pageTitles['laba-rugi.php'] = 'Laba Rugi';
</script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/plugin.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/functions.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/main.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/combo.autocomplete.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/functions.js"></script>
<script type="text/javascript" src="<?= base_url('Metro') ?>/jquery.cookies.js"></script>    
<noscript>&lt;style&gt;#tileContainer{display:block}&lt;/style&gt;</noscript>
</head>
<body class="full desktop">
<img src="<?= base_url('Metro') ?>/metro_green.jpg" id="bgImage"><header>
	<div id="headerWrapper">
		<div id="headerCenter">
			<div id="headerTitles">
				<h1><a href="#!">Klinik La-Derma</a></h1>
		   		<h2>Sistem Informasi Management Operasional Klinik</h2>
		    </div>
		    <nav>
            	<a  href="<?= base_url('index.php/Menu') ?>"  rel="group0" id="menu1" class="navActive">
	<img src="<?= base_url('Metro') ?>/home.png" alt="home">
	Pelayanan
</a>
<a href="<?= base_url('auth/logout') ?>"   rel="group5">
        <img src="<?= base_url('Metro') ?>/logout.png" alt="Logout" align="center">
        Logout
</a>			</nav>
		</div>
    </div>
    </header>
<div id="wrapper" style="padding-top: 81px;">        
