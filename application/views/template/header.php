<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo isset($title) ? $title : 'Abhinawa Customer Database'; ?></title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/logo-square.jpg'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css'); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="#" class="text-nowrap logo-img">
            <img src="<?= base_url('/assets/images/logos/logo-square.jpg');?>" width="180" alt="Logo" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>

        <!-- Sidebar navigation-->
        <?php
$role_id = $this->session->userdata('role_id'); // Ambil role_id dari session
?>

<!-- Sidebar navigation-->
<?php
$role_id = $this->session->userdata('role_id'); // Ambil role_id dari session
?>

<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
  <ul id="sidebarnav">
    <!-- Home -->
    <?php if (in_array($role_id, [1, 2])): // Hanya Administrator dan Manager yang bisa melihat Dashboard dan Master section ?>
      <li class="nav-small-cap">
        <i class="fas fa-home nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url('admin'); ?>" aria-expanded="false">
          <i class="fas fa-tachometer-alt"></i> <!-- Dashboard Icon -->
          <span class="hide-menu">Dashboard</span>
        </a>
      </li>

      <!-- Master Section -->
      <li class="nav-small-cap">
        <i class="fas fa-cogs nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Master</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url('service_type'); ?>" aria-expanded="false">
          <i class="fas fa-cog"></i> <!-- Service Type Icon -->
          <span class="hide-menu">Master Service Type</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url('customer_groups'); ?>" aria-expanded="false">
          <i class="fas fa-users"></i> <!-- Customer Group Icon -->
          <span class="hide-menu">Master Customer Group</span>
        </a>
      </li>
    <?php endif; ?>
    <!-- Main Data Section -->
    <li class="nav-small-cap">
      <i class="fas fa-database nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Main Data</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?= base_url('customer'); ?>" aria-expanded="false">
        <i class="fas fa-user-friends"></i> <!-- Customer List Icon -->
        <span class="hide-menu">Customer List</span>
      </a>
    </li>
    <!-- Supplier List Section (Accessible by role_id 1, 2, and 3) -->
    <?php if (in_array($role_id, [1, 2, 3])): ?>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url('supplier/view_suppliers'); ?>" aria-expanded="false">
          <i class="fas fa-truck"></i> <!-- Supplier Icon -->
          <span class="hide-menu">Supplier List</span>
        </a>
      </li>
    <?php endif; ?>
    <!-- Search Section -->
    <li class="nav-small-cap">
      <i class="fas fa-search nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Search</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?= base_url('Search'); ?>" aria-expanded="false">
        <i class="fas fa-search"></i>
        <span class="hide-menu">Global Search</span>
      </a>
    </li>

    <?php if (in_array($role_id, [1, 2])): // Hanya Administrator dan Manager yang bisa melihat Management Section ?>
      <!-- Management Section -->
      <li class="nav-small-cap">
        <i class="fas fa-user-cog nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Manajemen</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url('user'); ?>" aria-expanded="false">
          <i class="fas fa-user"></i> <!-- User Icon -->
          <span class="hide-menu">User Management</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?= base_url('auth/change_password'); ?>" aria-expanded="false">
          <i class="fas fa-key"></i> <!-- Change Password Icon -->
          <span class="hide-menu">Change Password</span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<!-- End Sidebar navigation -->

<!-- End Sidebar navigation -->

      </div>
    </aside>
    <!-- Sidebar End -->
    
    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <form action="<?= base_url('index.php/auth/logout'); ?>" method="post">
                <button type="submit" class="btn btn-primary">Logout</button>
              </form>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?= base_url('/assets/images/profile/user-1.jpg');?>" alt="User" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="#" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>