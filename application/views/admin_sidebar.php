 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-text mx-3">PPL</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">



     <?php
        if ($title == 'Home Admin') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Admin'); ?>">
         <i class="fas fa-address-card"></i>
         <span>Dashboard Admin</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">


     <?php
        if ($title == 'List Anggota') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?>
     <a class="nav-link" href="<?= base_url('Admin/listAnggota'); ?>">
         <i class="fas fa-users"></i>
         <span>List Anggota</span></a>
     </li>


     <hr class="sidebar-divider d-none d-md-block">

     <?php
        if ($title == 'Posting') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Admin/posting'); ?>">
         <i class="fas fa-random"></i> <span>Posting</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">


 </ul>
 <!-- End  of Sidebar -->