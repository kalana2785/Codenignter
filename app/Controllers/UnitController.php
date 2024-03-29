<?php


namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\UserModel;
use App\Models\UnitinventoryModel;

class UnitController extends BaseController
{
    public function index(): string
    {      if (!session()->has('logged_user')) {
        return redirect()->to(route_to('index'));
    } else {
        $dashboardModel = new DashboardModel();
        $usermodel= new UserModel();
        $userinventory = new UnitinventoryModel();
        // Filter all
// Fetch User_id based on Unit_id
$unitId = session()->get('logged_unit');
$userIds = $usermodel->getUserIdsByUnitId($unitId);

// Get user data
//$data['userdata'] = $usermodel->getlogindata($userIds);

// Get dashboard data for the fetched User_ids
$data['dashboards'] = $userinventory->getUnitDashboardData($userIds);

// Surgical items
$data['sugicals'] = $userinventory->getUnitDashboardData($userIds, '1');

// General items
$data['general'] = $userinventory->getUnitDashboardData($userIds, '2');



                

        return view('Unit/dashboard.php',$data);
    }


    
  }
  // Assuming you have defined the getUserIdsByUnitId() method in your UserModel


}
