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
                        <h3 class="page-title"><b><i class="fas fa-balance-scale"></i>&nbsp;Persediaan Bahan Pokok</b></h3>
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
                            <form action="<?php echo site_url('adm/persediaan/add'); ?>" method="post">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" colspan="2" align="center"></th>
                                            <th colspan="2" align="center"><b>Pilih Distributor : </b></th>
                                            <td colspan="2"><select name="id_distributor" id="select" required class="custom-select">
                                                    <?php foreach ($distributorku as $k) : ?>
                                                        <option value="<?php echo $k->id_distributor ?>"><?php echo $k->nm_distributor ?></option>
                                                    <?php endforeach; ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" align="center"><b>Pilih Lokasi : </b></th>
                                            <td colspan="2">

                                                <select name="id_lokasi" id="select" required class="custom-select">
                                                    <?php foreach ($lokasiku as $k) : ?>
                                                        <option value="<?php echo $k->id_lokasi ?>"><?php echo $k->nm_lokasi ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="9"><b>No</b></th>
                                            <th><b>Nama Bahan Pangan</b></th>
                                            <th width="200"><b>Persediaan</b></th>
                                            <th width="150"><b>Satuan</b></th>
                                            <th width="375"><b>Update Tanggal</b></th>
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
                                                    <input type="number" value="0" name="persediaan<?php echo $i; ?>" class="form-control">
                                                </td>
                                                <td>
                                                    <select name="satuan<?php echo $i; ?>" id="select" required class="custom-select">

                                                        <option value="Ton">Ton</option>
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
                                        <i class="fa fa-save"></i>&nbsp; Update Persediaan&nbsp;&nbsp;&nbsp;
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
                                        <font color="#0285b4"><i class='fas fa-exclamation-circle'></i>&nbsp;Data Persediaan Bahan Pokok :
                                    </b></h6>

                                <i class='fas fa-angle-double-right'></i>&nbsp; Persediaan Bahan Pokok Harus di-update secara Real-time atau setiap harinya <br>
                                <i class='fas fa-angle-double-right'></i>&nbsp; Persediaan Bahan Pokok yang tersedia adalah untuk seluruh wilayah Kota/Kabupaten di Wilayah Sumatera Selatan</font>

                            </div>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="9"><b>No</b></th>
                                        <th><b>Nama Bahan Pangan</b></th>
                                        <th width="270"><b>Distributor-Lokasi</b></th>
                                        <th width="150"><b>Persediaan</b></th>
                                        <th width="220"><b>Update Tanggal</b></th>
                                        <th width="9"><b>Aksi</b></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $no = 1;
                                    $i = 1;
                                    foreach ($persediaan as $p) { ?>
                                        <tr>
                                            <td width="7" align="center"><?php echo $no++; ?></td>
                                            <td>&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/images/bahan/' . $p->foto) ?>" alt="" class="thumb-md rounded-circle"> &nbsp;&nbsp;&nbsp;<?php echo $p->nm_bahan ?></td>
                                            <td><?php echo $p->nm_distributor ?> - <?php echo $p->nm_lokasi ?></td>
                                            <td><?php echo $p->persediaan ?>/<?php echo $p->satuan ?></td>
                                            <td><?php echo tgl_indo($p->update_persediaan); ?></td>
                                            <td>
                                             
                                                    <a onclick="deleteConfirm('<?php echo site_url('adm/persediaan/hapus/'.$p->id_persediaan); ?>')" href="#!" data-toggle="tooltip" class="btn btn-danger waves-effect waves-light tombol-hapus" data-original-title="Hapus"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> </span><span class="btn-text"></span></a>
                                        </a>
                                             
                                            </td>
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

 <!-- modal -->
 <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
      <h5 class="modal-title"><font color='white'>Konfirmasi Penghapusan</font></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
      <a type="button" class="btn btn-secondary" data-dismiss="modal"><font color='white'><i class="fas fa-times"></i>&nbsp;Batal</font></a>
      <a href="#" id="btn-delete" type="button" class="btn btn-danger mr-1"><i class="fas fa-trash"></i>&nbsp;Hapus</a>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  

  <script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
