<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class imdashController extends BaseController
{
    public function index()
    {
        $dashboard = new DashboardModel();
        $data['dashboards'] = $dashboard ->findAll(); 
        return view('dashboard.php',$data);
    }
}
