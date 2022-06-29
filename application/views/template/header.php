<!DOCTYPE html>
<html>

    <head>
        
        <title>Sistem Komoditi Kementerian Perdagangan</title>
        
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
        <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-muted">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a class="logo">
                        <span>
                            <img src="<?php echo base_url();?>assets/images/logo2.png" alt="" height="70">
                        </span>
                        <i>
                            <img src="<?php echo base_url();?>assets/images/logo-sm-light.png" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        
 <li><!-- <img src="<?php echo base_url();?>assets/images/cic.png" alt="" height="70" width="154">--></li>
                        
                          <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->

                                    <a class="dropdown-item d-block" href="<?php echo site_url();?>adm/user"><i class="fa fa-users m-r-5"></i> Kelola User</a>
                                    <a class="dropdown-item d-block" href="<?php echo site_url();?>adm/ubah_password"><i class="mdi mdi-settings m-r-5"></i> Ganti Password</a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="<?php echo base_url(). 'login/logout' ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                        <li class="d-none d-sm-block">
                            
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu side-menu-light">
                <div class="slimscroll-menu" id="remove-scroll">



<div class="user-details">
                        <div class="float-left mr-2">
                            <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" alt="" class="thumb-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                       <font color="#0285b4"><b><?=$this->session->userdata('nm_user') ?> </b></font>
                                    
                               
                                
                            </div>
                            
                            <p class="text-white"><font color="#0285b4">Admin</font></p>
                        </div>
                    </div>


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                          
                            <li>
                                <a href="<?php echo site_url();?>adm/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><font color=""><i class="fas fa-shipping-fast"></i></font><span> Data Master<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                <li><a href="<?php echo site_url();?>adm/jdistributor"><i class="fas fa-mars-double"></i> &nbsp;Jenis Distributor</a></li>
                                    <li><a href="<?php echo site_url();?>adm/distributor"><i class="fas fa-dolly"></i> &nbsp;Distributor</a></li>
                                    <li><a href="<?php echo site_url();?>adm/lokasi"><i class="fas fa-map-marker-alt"></i> &nbsp;Lokasi</a></li>
                                    <li><a href="<?php echo site_url();?>adm/bahan"><i class="fas fa-box-open"></i> &nbsp;Bahan Pangan</a></li>
                                </ul>
                            </li>

                             <li>
                                <a href="javascript:void(0);" class="waves-effect"><font color=""><i class="fas fa-chalkboard-teacher"></i></font><span> Komoditi<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url();?>adm/update_harga"><i class="far fa-money-bill-alt "></i> &nbsp;Update Harga</a></li>
                                    <li><a href="<?php echo site_url();?>adm/persediaan"><i class="fas fa-balance-scale"></i> &nbsp;Persediaan</a></li>
                                    </ul>
                            </li>

                             <li>
                                <a data-toggle="modal" data-target="#bb" class="waves-effect">
                                    <font color=""><i class="fas fa-percent"></i></font><span> Prediksi Harga</span>
                                </a>
                            </li>   


                             <li>
                                <a href="<?php echo site_url();?>adm/user" class="waves-effect">
                                    <font color=""><i class="fas fa-users"></i></font><span> Users</span>
                                </a>
                            </li>
                           

                            <li>
                                <a href="<?php echo site_url();?>adm/ubah_password" class="waves-effect">
                                    <font color=""><i class="fas fa-cogs"></i></font><span> Ubah Password</span>
                                </a>
                            </li> 

                                 <li>
                                <a href="<?php echo base_url(). 'login/logout' ?>" class="waves-effect">
                                    <font color=""><i class="fas fa-sign-out-alt"></i></font><span> Logout</span>
                                </a>
                            </li>                                          
                           

                           

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->


                       <!-- Modal -->
                       <div class="modal fade text-left" id="bb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Prediksi Harga Komoditas</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/prediksi'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pilih Komoditas :</label>
                          
                          <?php

                            $bahan = $this->db->query("SELECT*FROM bahan WHERE deleted=0");
                            $query = $bahan->result();

                          ?>

<select name="id_bahan" id="select" required class="custom-select">
            
            <?php foreach ($query as $k): ?>
            <option value="<?php echo $k->id_bahan ?>"><?php echo $k->nm_bahan ?></option>

<?php endforeach; ?>
            </select>

                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pilih Lokasi :</label>
                          
                          <?php

                            $bahan2 = $this->db->query("SELECT*FROM lokasi WHERE deleted=0");
                            $query2 = $bahan2->result();

                          ?>

<select name="id_lokasi" id="select" required class="custom-select">
            
            <?php foreach ($query2 as $k2): ?>
            <option value="<?php echo $k2->id_lokasi ?>"><?php echo $k2->nm_lokasi ?></option>

<?php endforeach; ?>
            </select>

                        </fieldset>


                        

                        
                       
                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-search"></i>&nbsp;Tampilkan Prediksi
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>