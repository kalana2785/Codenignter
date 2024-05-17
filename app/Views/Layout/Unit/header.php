<header id="header" class="header fixed-top d-flex align-items-center">


<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Unit Panel</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li>



   <!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
       
        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $unituserdata->Username ;?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><<?= $unituserdata->Username ;?>></h6>
          <span>Unit-In-charger</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
 
        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?= base_url('user/logout');?>">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>
         



        <li>
          <hr class="dropdown-divider">
        </li>

        
      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>