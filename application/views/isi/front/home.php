<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<title>Sistem Komoditi Kementerian Perdagangan</title>
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets-front/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets-front/css/bootstrap-slider.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets-front/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets-front/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets-front/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets-front/css/custom.css">
</head>

<body>
<div id="header-holder" class="main-header">
    <div class="bg-animation">
        <div class="graphic-show">
            <img class="fix-size" src="<?php echo base_url();?>assets/assets-front/images/graphic1.png" alt="">
            <img class="img img1" src="<?php echo base_url();?>assets/assets-front/images/graphic2.png" alt="">
            <img class="img img2" src="<?php echo base_url();?>assets/assets-front/images/bahan.png" alt="">
            <img class="img img3" src="<?php echo base_url();?>assets/assets-front/images/graphic1.png" alt="">
        </div>
    </div>
    <nav id="nav" class="navbar navbar-default navbar-full">
        <div class="container-fluid">
            <div class="container container-nav">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                        <img src="<?php echo base_url();?>assets/images/logoo.png" height='100'>
                        </div>
                        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url();?>informasi"><i class="fas fa-box-open"></i> Home</a></li>
                                <li><a href="<?php echo site_url();?>informasi/about"><i class='fas fa-exclamation-circle'></i>&nbsp; Tentang Kami</a></li>
                                <li><a href="<?php echo site_url();?>informasi/bahan-wilayah"><i class='fas fa-chart-line'></i>&nbsp; Statistik Per Wilayah</a></li>
                                <li><a href="<?php echo site_url();?>informasi/bahan-komoditi"><i class='fas fa-chart-pie'></i>&nbsp; Statistik Per Komoditi</a></li>
                                <li><a href="<?php echo site_url();?>informasi/kontak"><i class="fas fa-phone-square "></i> Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="top-content" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="main-slider">
                        <div class="slide">
                            <div class="spacer"></div>
                            <div class="big-title">SISTEM INFORMASI <span>KOMODITI</span><br>DINAS PERDAGANGAN</div>
                            <p><i class="fas fa-box-open"></i> Home</p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <img class="header-graphic" src="<?php echo base_url();?>assets/assets-front/images/graphic2.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<div id="pricing" class="container-fluid">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">Web Hosting Plans</div>
                <div class="row-subtitle">Choose what's best</div>
            </div>
        </div>
        <div class="row">

        <?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>

        <?php $no=1; $i=1; foreach ($update as $p){ ?>
            <div class="col-sm-12 col-md-3">
                <div class="pricing-box pricing-unity pricing-color3">
                    <div class="pricing-content">
                        <div>
                            <img src="<?php echo base_url('assets/images/bahan/'.$p->foto) ?>" alt="" height='155' width='225'>
                        </div>
                        <div class="pricing-title"><?=$p->nm_bahan;?> <br>(Naik 20%)</div>
                        <div class="pricing-price"><?="Rp " . number_format($p->harga,0,',','.');?></div>
                        <div class="pricing-details">
                            <p><?=$p->nm_lokasi;?><br>(Update : <?php echo tgl_indo($p->tgl_harga); ?>)</p>
                        </div>
                    </div>
                </div>
            </div>

         <?php $i++; } ?>      
        </div>
    </div>
</div>

<div id="footer" class="container-fluid">
    
            <div class="col-xs-6 col-sm-4 col-md-6">
                <div class="address-holder">
                    <div class="phone"><i class="fas fa-phone"></i>(0711) 310-44</div>
                    <div class="email"><i class="fas fa-envelope"></i> disdag_sumsel@yahoo.com</div>
                    <div class="address">
                        
                        <div><b><i class="fas fa-map-marker"></i>  Dinas Perdagangan Provinsi Sumatera Selatan</b><br>
Jl. Demang Lebar Daun No. 2610<br>
Palembang - Sumatera Selatan.</div>
                    </div>
                </div>
            </div>
</div>
<script src="<?php echo base_url();?>assets/assets-front/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/assets-front/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/assets-front/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url();?>assets/assets-front/js/slick.min.js"></script>
<script src="<?php echo base_url();?>assets/assets-front/js/main.js"></script>
</body>
</html>
