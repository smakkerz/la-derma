<!DOCTYPE html>
<!-- saved from url=(0030) -->
<html class="linux chrome webkit"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
    <meta name="Description" content="A description of your site for Google here">
    <meta name="keywords" content="Some, keywords, seperated, by, commas, here, max 10">
    <meta name="viewport" content="width=1024,initial-scale=1.00, minimum-scale=1.00">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>La-derma - Home</title> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/metro.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/nav.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/tiles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/theme.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/styles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/jquery.autocomplete.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/plugin.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('Metro') ?>/metro-icons.css">
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
    <link href="<?php echo base_url() ?>template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

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
		   		<h2>Sistem Informasi Operasional Klinik</h2>
		    </div>
		    <nav>
            	<a href="<?= base_url('Menu') ?>" rel="group0" id="menu1" >
	<img src="<?= base_url('Metro') ?>/home.png" alt="home">
	Pelayanan
</a>
<a href="<?= base_url('Pesan') ?>" rel="group1" id="menu2">
   <span class="mif-mail mif-4x"></span><br/>

    Pesan
</a>
<a href="<?= base_url('auth/logout') ?>"   rel="group2">
        <img src="<?= base_url('Metro') ?>/logout.png" alt="Logout" align="center">
        Logout
</a>			</nav>
		</div>
    </div>
    </header>
<div id="wrapper" style="padding-top: 81px;">        
    <div id="centerWrapper">
        <div id="tileContainer" class="" style="width: 1860px; height: 400px; display: block;">
            <img id="arrowLeft" class="navArrows" src="<?= base_url('Metro') ?>/arrowLeft.png" onclick="javascript:$group.goLeft();" alt="left arrow" style="display: none;">
            <img id="arrowRight" class="navArrows" src="<?= base_url('Metro') ?>/arrowRight.png" onclick="javascript:$group.goRight();" alt="right arrow" style="margin-left: 397px; opacity: 0.5; display: inline;">
             <a href="#&amp;Pelayanan" id="groupTitle0" class="groupTitle" style="margin-left: 0px; margin-top: 0px; display: block;" onclick="javascript:$group.goTo(0);"><h3>Pelayanan</h3></a>
        <a  href='<?= base_url('Pasien') ?>' class="tile tileImg group0  " style="
    margin-top:45px; margin-left:260px;
    width:125px; height:125px;
    background:#6950AB;"   data-pos='45-260-125' > 
    <img src="<?= base_url('Metro') ?>/pendaftaran2.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class='tileLabelWrapper bottom'><div class='imgDesc' >Data Pasien</div>    </div>
    </a>
        <a href="#&amp;Transaksi" id="groupTitle1" class="groupTitle" style="margin-left: 520px; margin-top: 0px; display: block;" onclick="javascript:$group.goTo(1);"><h3>Operasional</h3></a>
        <a href="#&amp;Master-Data" id="groupTitle2" class="groupTitle" style="margin-left: 1040px; margin-top: 0px; display: block;" onclick="javascript:$group.goTo(2);"><h3>Master Data</h3></a>
        <a href="#&amp;Laporan" id="groupTitle3" class="groupTitle" style="margin-left: 1560px; margin-top: 0px; display: block;" onclick="javascript:$group.goTo(3);"><h3>Laporan</h3></a>
        <a href="<?= base_url('Transaksi') ?>" class="tile tileImg group1  " style="margin-top: 45px; margin-left: 520px; width: 125px; height: 125px; background: rgb(0, 144, 0); display: block;" data-pos="45-520-125"> 
        <a href="<?= base_url('Pemesanan') ?>" class="tile tileImg group1  " style="margin-top: 45px; margin-left: 520px; width: 125px; height: 125px; background: rgb(0, 144, 0); display: block;" data-pos="45-520-125"> 
    <img src="<?= base_url('Metro') ?>/pemesanan.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Billing</div>    </div>
    </a>
        <a href="<?= base_url('Pos3') ?>" class="tile tileImg group1  " style="margin-top: 45px; margin-left: 780px; width: 125px; height: 125px; background: rgb(0, 114, 188); display: block;" data-pos="45-780-125"> 
    <img src="<?= base_url('Metro') ?>/pemesanan.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Pemesanan</div>    </div>
    </a>
        <!-- Awal Menu Pemeriksaan Pasien -->
        <a href="<?= base_url('K_rmedis') ?>" class="tile tileImg group0  " style="margin-top: 45px; margin-left: 130px; width: 125px; height: 125px; background: rgb(0, 159, 176); display: block;" data-pos="45-130-125"> 
    <img src="<?= base_url('Metro') ?>/pendaftaran.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Tindakan Dan Perawatan</div>    </div>
    </a>
            <!-- Akhir Menu Pemeriksaan Pasien -->

        <!-- Awal Menu Pendaftaran Pasien -->
        <a href="<?= base_url('Pasien/create') ?>" class="tile tileImg group0  " style="margin-top: 45px; margin-left: 0px; width: 125px; height: 125px; background: rgb(255, 0, 132); display: block;" data-pos="45-0-125"> 
    <img src="<?= base_url('Metro') ?>/pendaftaran2.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Pendaftaran Pasien</div>    </div>
    </a>
    <!-- Akhir Menu Pendaftaran Pasien -->
        <a href="<?= base_url('Barang') ?>" class="tile tileImg group1  " style="margin-top: 45px; margin-left: 650px; width: 125px; height: 125px; background: rgb(97, 64, 64); display: block;" data-pos="45-650-125"> 
    <img src="<?= base_url('Metro') ?>/penerimaan.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Produk Dan Obat</div>    </div>
    </a>
        <a href="<?= base_url('History/HistoryTx') ?>" class="tile tileImg group1  " style="margin-top: 175px; margin-left: 780px; width: 125px; height: 125px; background: rgb(21, 170, 100); display: block;" data-pos="175-780-125"> 
    <img src="<?= base_url('Metro') ?>/resep.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">History Transaksi</div>    </div>
    </a>
        <a href="<?= base_url('C_Jadwal') ?>" class="tile tileImg group1  " style="margin-top: 175px; margin-left: 520px; width: 125px; height: 125px; background: rgb(154, 15, 15); display: block;" data-pos="175-520-125"> 
    <img src="<?= base_url('Metro') ?>/expiry.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Jadwal Dokter</div>    </div>
    </a>
        <a href="<?= base_url('Hutang') ?>" class="tile tileImg group1  " style="margin-top: 175px; margin-left: 650px; width: 125px; height: 125px; background: rgb(211, 73, 39); display: block;" data-pos="175-650-125"> 
    <img src="<?= base_url('Metro') ?>/billing.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Hutang & Pembelian</div>    </div>
    </a>
    <a href="<?= base_url('Karyawanld') ?>" class="tile tileImg group2  " style="margin-top: 45px; margin-left: 1040px; width: 125px; height: 125px; background: rgb(105, 80, 171); display: block;" data-pos="45-1040-125"> 
    <img src="http://july4dev.net76.net/Metro/karyawan.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Karyawan & Dokter</div>    </div>
    </a>
    <!-- UPLOAD DATA / blm dikerjakan 
        <a href="#!/customer" class="tile tileImg group2  " style="margin-top: 305px; margin-left: 1040px; width: 125px; height: 125px; background: rgb(24, 0, 82); display: block;" data-pos="305-1040-125"> 
    <img src="<?= base_url('Metro') ?>/lap-arus-kas.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Upload Data</div>    </div>
    </a>
    -->
        <a href="<?= base_url('Arus_kas') ?>" class="tile tileImg group2  " style="margin-top: 305px; margin-left: 1040px; width: 125px; height: 125px; background: rgb(232, 100, 27); display: block;" data-pos="305-1040-125"> 
    <img src="<?= base_url('Metro') ?>/lap-arus-kas.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Arus Kas</div>    </div>
    </a>
    <!-- Backup data / blm dikerjakan
        <a href="#!/penyakit" class="tile tileImg group2  " style="margin-top: 175px; margin-left: 1300px; width: 125px; height: 125px; background: rgb(0, 112, 159); display: block;" data-pos="175-1300-125"> 
    <img src="<?= base_url('Metro') ?>/lap-abc.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Backup Data</div>    </div>
    </a>
-->
        <a href="<?= base_url('Kelola_pesan') ?>" class="tile tileImg group2  " style="margin-top: 45px; margin-left: 1300px; width: 125px; height: 125px; background: rgb(0, 114, 188); display: block;" data-pos="45-1300-125"> 
    <img src="<?= base_url('Metro') ?>/pesan.png" width="80" style="margin-left:-40.5px; margin-top: -33.5px; max-height:55px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Kelola Pesan</div>    </div>
    </a>
        <a href="<?= base_url('Users') ?>" class="tile tileImg group2  " style="margin-top: 45px; margin-left: 1170px; width: 125px; height: 125px; background: rgb(190, 30, 74); display: block;" data-pos="45-1170-125"> 
    <img src="<?= base_url('Metro') ?>/karyawan.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">User Akun</div>    </div>
    </a>

    <!-- Pendapatan Jasa / blm dikerjakan
        <a href="#!/layanan" class="tile tileImg group2  " style="margin-top: 175px; margin-left: 1040px; width: 125px; height: 125px; background: rgb(24, 0, 82); display: block;" data-pos="175-1040-125"> 
    <img src="<?= base_url('Metro') ?>/lap-resep.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Pendapatan Jasa</div>    </div>
    </a>

    -->
        <a href="<?= base_url('Laporan_pemasukan') ?>" class="tile tileImg group3  " style="margin-top: 45px; margin-left: 1560px; width: 125px; height: 125px; background: rgb(95, 95, 95); display: block;" data-pos="45-1560-125"> 
    <img src="<?= base_url('Metro') ?>/chart.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Laporan Masuk</div>    </div>
    </a>

        <a href="<?= base_url('Laporan_pengeluaran') ?>" class="tile tileImg group3  " style="margin-top: 45px; margin-left: 1690px; width: 125px; height: 125px; background: rgb(69, 119, 164); display: block;" data-pos="45-1690-125"> 
    <img src="<?= base_url('Metro') ?>/lap-sp.png" width="125" style="margin-left:-62.5px; margin-top: -62.5px; max-height:125px;">
    <div class="tileLabelWrapper bottom"><div class="imgDesc">Laporan Keluar</div>    </div>
    </a>
            </div> 
<div id="subNavWrapper" style="display: none;"></div>
    <div id="contentWrapper" style="display: none;">   		    
	   		            <div id="content">	        	
					        </div>
    	    		</div>
            </div>
	<footer>
		© mycss        | <a href="http://sekawan.net76.net/" target="_blank">Klinik</a>
    </footer>
    </div> 
<div id="catchScroll"></div>

</body></html>