<?php


namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\UserModel;

class UnitController extends BaseController
{
    public function index($unitId = null)
    {
        if (!session()->has('logged_user')) {
            return redirect()->to(route_to('index'));
        } else {
            $dashboardModel = new DashboardModel();
            $userModel = new UserModel();

            // Get filtered items for the unit
            $data['unitItems'] = $dashboardModel->getUnitItems($unitId);

            $userId = session()->get('logged_user');
            $data['userdata'] = $userModel->getlogindata($userId);

            return view('Unit/dashboard.php', $data);
        }
    }
}
