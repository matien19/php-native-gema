  <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../backoffice" class="nav-link <?php if($halaman == 'dashboard'){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_data_pengguna" class="nav-link <?php if($halaman == 'data_pengguna'){echo 'active';} ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_data_periode" class="nav-link <?php if($halaman == 'data_periode'){echo 'active';} ?>">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Data Periode
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_data_dosen" class="nav-link <?php if($halaman == 'data_dosen'){echo 'active';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../ganti_pass" class="nav-link <?php if($halaman == 'ganti_pass'){echo 'active';} ?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Ganti Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../auth/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->