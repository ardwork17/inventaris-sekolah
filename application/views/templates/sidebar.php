 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <i class="fas fa-school"></i> <!-- untuk mengganti gambar judul-->
         </div>
         <div class="sidebar-brand-text mx-3">INVENTARIS SEKOLAH</div> <!-- untuk judul website-->
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider"> <!-- menampilkan garis-->

     <!-- Heading -->
     <div class="sidebar-heading">
         Admin
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/index/'); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Home</span></a>

         <a class="nav-link" href="<?= base_url('admin/barang/'); ?>">
             <i class="fas fa-fw fa-folder"></i>
             <span>Data barang</span></a>

         <a class="nav-link" href=<?= base_url('admin/peminjaman/'); ?>>
             <i class="fas fa-fw fa-people-carry"></i>
             <span>Peminjaman</span></a>
         <a class="nav-link" href=<?= base_url('admin/laporan/'); ?>>
             <i class="fas fa-fw fa-folder"></i>
             <span>Laporan</span></a>
     </li>

     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Pilihan
     </div>
     <li class="nav-item">

         <!-- <a class="nav-link" href="#">
             <i class="fas fa-fw fa-question"></i>
             <span>Bantuan</span></a> -->

         <a class="nav-link" href="<?= base_url('auth/logout/'); ?>" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Keluar</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->