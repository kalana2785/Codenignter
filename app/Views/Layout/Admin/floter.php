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
              <span>Add Items</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('Admin/Add-user');?>">
              <span>Add User</span>
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
            <a a href="<?= base_url('Admin/addreq');?>">
              <i class="bi bi-circle"></i><span>Add-items Request</span>
            </a>
          </li>
        <li>
            <a a href="<?= base_url('Admin/Inreq');?>">
              <i class="bi bi-circle"></i><span>Inventory Request Table</span>
            </a>
          </li>
          <li>
          <a href="<?= base_url('Admin/Drequset');?>">
              <i class="bi bi-circle"></i><span>Distribution Approval Table</span>
            </a>
          </li>
          <li>
            <a a href="<?= base_url('Admin/Repair');?>">
              <i class="bi bi-circle"></i><span>Repair Management Table</span>
            </a>
          </li>
          <li>
            <a a href="<?= base_url('Admin/purchment');?>">
              <i class="bi bi-circle"></i><span>Purchment Order Table</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->



    </ul>

  </aside>