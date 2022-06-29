<?php $this->load->view('template/front/header'); ?>

<body>

<div id="header-holder" class="inner-header web-hosting-page">
<?php $this->load->view('template/front/menu'); ?>
    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">Kontak</div>
                    <div id="page-icon">
                        <div class="pricing-icon">
                            <img src="<?php echo base_url();?>assets/assets-front/images/service-icon1.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="contact-info" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">Bagaimana cara menghubungi kami ?</div>
                <div class="row-subtitle"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <div class="info-title phone-icon">Phone</div>
                    <div class="info-details"><p>Layanan pelanggan di jam Kerja setiap Senin-Jumat 08:00 s/d 16:00 Wib</p>

                    <p>Tanyakan semua informasi yang ingin anda ketahui dengan menelpon telp : (0711) 310-44</p></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="info-title chat-icon">Email</div>
                    <div class="info-details"><p>Kami siap menjawab setiap dan semua pertanyaan.</p>

                    <p>Mulai mengobrol dengan perwakilan kami dengan menghubungi Email : disdag_sumsel@yahoo.com</p></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="info-title location-icon">Alamat </div>
                    <div class="info-details"><p> <b>Dinas Perdagangan Provinsi Sumatera Selatan</b>
                    <br><br>
Jl. Demang Lebar Daun No. 2610
Palembang - Sumatera Selatan.</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/front/footer'); ?>
