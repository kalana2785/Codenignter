<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url('/dashboard');?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="<?= base_url('Imanger/Add');?>">
        <i class="bi bi-file-earmark-plus-fill"></i><span>Add Section</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('Imanger/Add');?>">
              <span>Add items</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('Imanger/Purchmentview');?>">
              <span>Add Purchcement</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('imanger/Purchmentorderview');?>">
             <span>Add Purchcement Order</span>
             </a>
          </li>
          
       
        </ul>
      </li><!-- End Components Nav -->

     <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-table"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
              <a href="<?= base_url('Imanger/Additems');?>">
              <i class="bi bi-circle"></i><span>Add items Request </span>
            </a>
          </li>
          <li>
             <a href="<?= base_url('Imanger/Requset');?>">
              <i class="bi bi-circle"></i><span>Unit Requset Tables</span>
            </a>
          </li>
          <li>
              <a href="<?= base_url('Imanger/Requsetre');?>">
              <i class="bi bi-circle"></i><span>Request Repair</span>
            </a>
          </li>
          <li>
              <a href="<?= base_url('Imanger/Prequset');?>">
              <i class="bi bi-circle"></i><span>Purchment Request </span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

  

      <li class="nav-heading">Other</li>

    
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('user/logout');?>">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log out</span>
        </a>
      </li><!-- End Login Page Nav -->

      
    </ul>

  </aside>