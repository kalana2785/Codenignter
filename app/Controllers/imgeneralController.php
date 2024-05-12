<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\TypeModel;
use App\Models\UserModel;
use App\Models\UnitrequestModel;
use App\Models\RepairModel;
use App\Models\RepairstageModel;
use App\Models\UnitinventoryModel;
use App\Models\PurchaseOrderModel;
use  App\Models\InventoryModel;

class imgeneralController extends BaseController
{ 
    private $userData;

    public function __construct()
    {
        

       
        if (!session()->has('logged_user')) {
            return redirect()->to(route_to('index'));
        } else {
          
            $userId = session()->get('logged_user');
            $userModel = new UserModel();
            $this->userData = $userModel->getlogindata($userId);
        }
    }

    public function index()
    {
        $dashboardModel = new DashboardModel();
        $inventoryModel = new InventoryModel();
        
        // Filter all
        $data['dashboards'] = $dashboardModel->getDashboardData('2');
        
        // Surgical items
        $data['sugicals'] = $inventoryModel->getDashboardData('1');
        
        // General items
        $data['general'] = $dashboardModel->getDashboardData('2');

        $data['userdata'] = $this->userData;
        
        return view('iManger/General/dashboard.php', $data);
    }




}