<?php $this->load->view('template/front/header'); ?>

<body>

<div id="header-holder" class="inner-header web-hosting-page">
<?php $this->load->view('template/front/menu'); ?>
    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">Statistik Perwilayah</div>
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

<div id="pricing" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <form action="<?php echo site_url('informasi/statistik_wilayah'); ?>" method="post">
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" width="50%">
                                                <thead>
                                                <tr>
                                       <td>
                                        Pilih Lokasi : 
                                       <?php

$bahan2 = $this->db->query("SELECT*FROM lokasi WHERE deleted=0");
$query2 = $bahan2->result();

?>

<select name="id_lokasi" id="select" required class="form-control">

<?php foreach ($query2 as $k2): ?>
<option value="<?php echo $k2->id_lokasi ?>"><?php echo $k2->nm_lokasi ?></option>

<?php endforeach; ?>
</select>
                                       </td>
                                       <td>Pilih Tanggal : <input type="date" value="<?=date("Y-m-d");?>" name="tgl" class="form-control" required></td>
                                       <td  width="70">
                                       <button type="submit"  class="btn btn-primary">&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-search"></i>&nbsp; Filter&nbsp;&nbsp;&nbsp; <br> Harga&nbsp;&nbsp;&nbsp;
                                </button>
                                       </td>
                                </tr>
                                                </thead>
</table>
                
</form>


<div class="alert alert-ku" role="alert">
<b><font color="#0285b4"><i class='fas fa-exclamation-circle'></i>&nbsp;Daftar Harga Komiditi Per Wilayah : </b><br>
                                                  
                                                 <i class='fas fa-angle-double-right'></i>&nbsp; Lokasi :  <?php 

                                                 if(count($wilayah)>0){
                                                    echo $wilayah[0]['nm_lokasi'];
                                                 }
                                                 
                                                 
                                                 ?><br>
                                                 <i class='fas fa-angle-double-right'></i>&nbsp; Tanggal : <?php echo tgl_indo($tgl); ?></font>
                                              
                                                </div>


            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" width="50%">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Nama Bahan Pangan</b></th>
                                    <th width="350"><b>Harga</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                                <?php $no=1; $i=1;
 foreach ($update as $p){ ?>
                                <tr>
                                    <td width="25" align="center"><?php echo $no++; ?></td>
                                    <td align="left"> &nbsp;&nbsp;<?php echo $p->nm_bahan ?></td>
                                    <td align="left"><?="Rp " . number_format($p->harga,0,',','.');?></td>
                                </tr>
                                <?php $i++; } ?>  
                                                </tbody>
                                            </table>
                  


                        </div>
                    </div>
                </div>
            </div>
                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/front/footer'); ?>
