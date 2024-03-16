<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\TypeModel;

class AdminController extends BaseController
{
    public function index(): string
    {   
        $dashboardModel = new DashboardModel();

        // Filter all
        $data['dashboards'] = $dashboardModel->getAdminDashboardData();

        // Sugical items
        $data['sugicals'] = $dashboardModel->getAdminDashboardData('1');

        // General items
        $data['general'] = $dashboardModel->getAdminDashboardData('2');
       

        return view('Admin/dashboard',$data);
    }

    //delete items
    public function delete($id = null)
    {
        $dashboardModel = new DashboardModel();
        $dashboardModel->Delete($id);
        return redirect()->back()->with('statusd', 'Item Deleted Successfully');

       // return redirect('dashboard')->with('statusd', 'Item Deleted Successfully');

    }
}
