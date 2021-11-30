<?php

$user_aktif = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$menu_materi = $this->menu_model->menu_materi();

?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/route'); ?>" class="brand-link">
        <img src="<?= base_url('assets/image/ilus.pn'); ?>" alt="Rumah" class="brand-image elevation-2 img-circle">
        <span class="brand-text font-weight-light">Rumah </span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/image/profile/') . $user_aktif['image']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('admin/route'); ?>" class="d-block"><?= $user_aktif['nama']; ?></a>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                <li class="nav-item has-treeview">
                    <a href="<?= base_url('admin/route'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>

                </li>


                <!-- Start Courses -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Artikel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <!-- <?php foreach ($menu_materi as $menu_materi) { ?>
              <li class="nav-item">
                <a href="<?= base_url('admin/artikel/category/') . $menu_materi['slug_kelas']; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?= $menu_materi['nama_kelas']; ?></p>


                </a>

              </li>
            <?php } ?> -->

                        <!-- Show All -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/artikel/show'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="font-weight-bold">Show All</p>


                            </a>

                        </li>
                        <!-- End Show All -->


                    </ul>



                </li>

                <!-- End Courses -->

                <!-- Start Edit Profile -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Edit Profile
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/profile'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Edit Profile -->


                <!-- Start Change Password -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Change Password
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/profile/changepassword'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- End Change Password -->




                <?php if ($this->session->userdata('role_id') != 2) { ?>
                    <!-- Start Classs -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                All Article
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/artikel'); ?>" class="nav-link">
                                    <i class="fa fa-table nav-icon"></i>
                                    <p>Show Article</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('admin/artikel/tambah'); ?>" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Article</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- End Class -->
                <?php } ?>






                <!-- Kelas -->
                <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-anchor"></i>
                            <p>
                                Category
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/category'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Show Category</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- End Kelas -->
                <?php } ?>







                <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <!-- Menu Administrator Hanya Admin yang bisa akses page ini-->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>
                                User Administrator
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= base_url('admin/user_list'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Administrator</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="<?= base_url('admin/user_list/user_token'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User Token</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="<?= base_url('admin/user_list/comment_list'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Comments</p>
                                </a>
                            </li>




                        </ul>
                    </li>
                    <!-- End Menu Administrator -->
                <?php } ?>




                <!-- Menu Logout Admin -->
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="far fas fa-sign-out-alt  nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
                <!--  End Menu Logout Admin -->




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-center d-flex">
                        <p class="card-title text-center text-success font-weight-bold "><?= $title; ?></p>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">