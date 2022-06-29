<?php $this->load->view('template/front/header'); ?>

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

    <?php $this->load->view('template/front/menu'); ?>

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
                <div class="row-title">Daftar Harga Komoditi</div>
                <div class="row-subtitle">Wilayah Sumatera Selatan 3 hari terakhir</div>
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
                <div class="pricing-box pricing-unity pricing-color3 ">
                    <div class="pricing-content">
                        <div>
                            <img src="<?php echo base_url('assets/images/bahan/'.$p->foto) ?>" alt="" height='155' width='225'>
                        </div>
                        <div class="pricing-title"> &nbsp;&nbsp;&nbsp;<?=$p->nm_bahan;?> &nbsp;&nbsp;&nbsp;</div>
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

<?php $this->load->view('template/front/footer'); ?>