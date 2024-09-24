 <!-- Left navbar links -->
 <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Assalamualaikum, <?= $_SESSION['nama'];?>  <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="../ganti_pass" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Ganti Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="../auth/logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
          </a>
         
      </li>
     
    </ul>