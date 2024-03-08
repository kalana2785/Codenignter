<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class imdashController extends BaseController
{
    public function index()
    {
        $dashboardModel = new DashboardModel();
        $data['dashboards'] = $dashboardModel->getDashboardData();
        return view('dashboard.php', $data);
    }
}
