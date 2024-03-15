<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;

use App\Models\TypeModel;

class AdminController extends BaseController
{
    public function index(): string
    {   
        $dashboardModel = new DashboardModel();

        // Filter all
        $data['dashboards'] = $dashboardModel->getDashboardData();

        // Sugical items
        $data['sugicals'] = $dashboardModel->getDashboardData('1');

        // General items
        $data['general'] = $dashboardModel->getDashboardData('2');
       

        return view('Admin/dashboard',$data);
    }
}
