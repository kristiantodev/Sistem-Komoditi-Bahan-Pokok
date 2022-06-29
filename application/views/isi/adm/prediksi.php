<link href="<?php echo base_url();?>assets/style.css" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h3 class="page-title"><b><i class="fas fa-percent"></i>&nbsp; Prediksi Harga Bahan Pokok</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Kementerian Perdagangan Sumatera Selatan</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                                        
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                           <div class="row">
                                <div class="col-12">
                            <div class="card m-b-20">
                                        <div class="card-body">
                                        
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



                  <div class="alert alert-ku" role="alert">
                                                    <h6><b><font color="#0285b4"><i class='fas fa-exclamation-circle'></i>&nbsp;Hasil Prediksi Harga : </b></h6>
                                                    <table>
                                                        <tr>
                                                            <td rowspan="2"><img src="<?php echo base_url('assets/images/bahan/'.$prediksiResult[0]['foto']) ?>" alt="" height="125"></td>
                                                            <td> &nbsp;&nbsp;&nbsp; <i class='fas fa-angle-double-right'></i>  Komoditi <b><?php echo $prediksiResult[0]['nm_bahan'] ?></b></td>
                                                        </tr>
                      
                                                        <tr>
                                                        <td> &nbsp;&nbsp;&nbsp; <i class='fas fa-angle-double-right'></i> Lokasi <b><?php echo $prediksiResult[0]['nm_lokasi'] ?></b></td>
</tr>

</table>
                                                  
                                                
                                                 </font>
                                              
                                                </div>

                  <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="150"><b>Tanggal </b></th>
                                    <th width="150"><b>Harga</b></th>
                                    <th width="220"><b>Prediksi Harga</b></th>
                                    <th width="220"><b>Mean Absolute Percentage Error</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                            
                                                <?php
                                                $no=0;
                                                $countData = count($prediksiResult);
                   if(count($prediksiResult)>0){
                     for($i=0;$i<count($prediksiResult);$i++){ 

                        
                        
                        
                        ?>
                                 <tr>
                                 <td><?php echo tgl_indo($prediksiResult[$i]['tgl_harga']); ?></td>
                                 <td><?="Rp " . number_format($prediksiResult[$i]['harga'],0,',','.');?></td>
                                    <td><?php 
                                    
                        if($i >=3){
                            $predisiHarga=($prediksiResult[$i-1]['harga']+$prediksiResult[$i-2]['harga']+$prediksiResult[$i-3]['harga'])/3;
                            echo "Rp " . number_format($predisiHarga,0,',','.');
                        }?></td>

                        <td>

                        <?php 
                                    
                        if($i >=3){
                            $predisiHarga=($prediksiResult[$i-1]['harga']+$prediksiResult[$i-2]['harga']+$prediksiResult[$i-3]['harga'])/3;
                            $mape = (($prediksiResult[$i]['harga']-$predisiHarga)/$prediksiResult[$i]['harga']);
                            if($mape < 0){
                                echo "0 %";
                            }else{
                                echo number_format($mape*100,2)." %";
                            }
                           
                        }?>

                        </td>
                                </tr>

<?php    
}
}

?>

<tr bgcolor="87CEFA">
    <td><b>
    <?php
    $date = $prediksiResult[$countData-1]['tgl_harga'];
    $date1 = str_replace('-', '/', $date);
    $tomorrow = date('Y-m-d',strtotime($date1 . "+1 days"));
    echo tgl_indo($tomorrow);
?>
</b>
    </td>
    <td>-</td>
    <td><b>
    <?php 
                                    
        if($i >=3){
         $predisiHarga=($prediksiResult[$countData-1]['harga']+$prediksiResult[$countData-2]['harga']+$prediksiResult[$countData-3]['harga'])/3;
         echo "Rp " . number_format($predisiHarga,0,',','.');
        }
                                    ?>

    </b></td>
</tr>

 
 
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    

        

                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->