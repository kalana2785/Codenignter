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
$userIds = session()->get('logged_user');
//$unitid = $usermodel->getUserIdsByUnitId($userIds);

// Get user data
$data['userIds'] = $userIds;
//$data['unitid'] = $unitid;




return view('Unit/dashboard',$data);

    }


    
  }
  // Assuming you have defined the getUserIdsByUnitId() method in your UserModel


}
