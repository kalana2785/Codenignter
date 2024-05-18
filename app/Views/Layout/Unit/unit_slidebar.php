<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url('/Unit');?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="<?= base_url('Imanger/Add');?>">
        <i class="bi bi-file-earmark-plus-fill"></i><span>Request Section</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        
        <li>
            <a href="<?= base_url('unit/req');?>">
              <span>Request item</span>
            </a>
          </li>

      
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-table"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="<?= base_url('unit/repairtable');?>">
              <span>Repair Table</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('unit/requesttable');?>">
              <span>Item Request Table</span>
            </a>
          </li>

        </ul>
      </li>

   




  

    </ul>

  </aside>