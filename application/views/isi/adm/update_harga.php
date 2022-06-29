<link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet" />
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h3 class="page-title"><b><i class="far fa-money-bill-alt"></i>&nbsp; Update Harga Bahan Pokok</b></h3>
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
                            <form action="<?php echo site_url('adm/update_harga/add'); ?>" method="post">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="9"><b>No</b></th>
                                            <th><b>Nama Bahan Pangan</b></th>
                                            <th width="270"><b>Lokasi</b></th>
                                            <th width="150"><b>Harga</b></th>
                                            <th width="100"><b>Satuan</b></th>
                                            <th width="220"><b>Update Tanggal</b></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php $no = 1;
                                        $i = 1;
                                        foreach ($bahanku as $bahan) { ?>
                                            <input type="hidden" value="<?php echo $bahan->id_bahan ?>" name="id_bahan<?php echo $i; ?>" class="form-control">
                                            <tr>
                                                <td width="7" align="center"><?php echo $no++; ?></td>
                                                <td>&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/images/bahan/' . $bahan->foto) ?>" alt="" class="thumb-md rounded-circle"> &nbsp;&nbsp;&nbsp;<?php echo $bahan->nm_bahan ?></td>
                                                <td>
                                                    <select name="id_lokasi<?php echo $i; ?>" id="select" required class="custom-select">
                                                        <?php foreach ($lokasiku as $k) : ?>
                                                            <option value="<?php echo $k->id_lokasi ?>"><?php echo $k->nm_lokasi ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    Rp.<input type="number" value="0" name="harga<?php echo $i; ?>" class="form-control">
                                                </td>
                                                <td>
                                                    <select name="satuan<?php echo $i; ?>" id="select" required class="custom-select">

                                                        <option value="Kg">Kg</option>
                                                        <option value="Liter">Liter</option>
                                                        <option value="Pack">Pack</option>
                                                        <option value="Pcs">Pcs</option>
                                                        <option value="Kodi">Kodi</option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="date" value="<?= date("Y-m-d"); ?>" name="tgl<?php echo $i; ?>" class="form-control" required>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                                <p align="right">
                                    <button type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-save"></i>&nbsp; Update Harga&nbsp;&nbsp;&nbsp;
                                    </button>
                                </p>
                            </form>

                            <?php
                            function tgl_indo($tanggal)
                            {
                                $bulan = array(
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

                                return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                            }

                            ?>

                            <div class="alert alert-ku" role="alert">
                                <h6><b>
                                        <font color="#0285b4"><i class='fas fa-exclamation-circle'></i>&nbsp;Data Update Harga Pokok :
                                    </b></h6>

                                <i class='fas fa-angle-double-right'></i>&nbsp; Daftar Harga Bahan Pokok Harus di-update secara Real-time atau setiap harinya <br>
                                <i class='fas fa-angle-double-right'></i>&nbsp; Daftar Harga Bahan Pokok yang tersedia adalah untuk seluruh wilayah Kota/Kabupaten di Wilayah Sumatera Selatan</font>

                            </div>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="9"><b>No</b></th>
                                        <th><b>Nama Bahan Pangan</b></th>
                                        <th width="270"><b>Lokasi</b></th>
                                        <th width="150"><b>Harga</b></th>
                                        <th width="220"><b>Update Tanggal</b></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $no = 1;
                                    $i = 1;
                                    foreach ($update as $p) { ?>
                                        <tr>
                                            <td width="7" align="center"><?php echo $no++; ?></td>
                                            <td>&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/images/bahan/' . $p->foto) ?>" alt="" class="thumb-md rounded-circle"> &nbsp;&nbsp;&nbsp;<?php echo $p->nm_bahan ?></td>
                                            <td><?php echo $p->nm_lokasi ?></td>
                                            <td><?php echo $p->harga ?>/<?php echo $p->satuan ?></td>
                                            <td><?php echo tgl_indo($p->tgl_harga); ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
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