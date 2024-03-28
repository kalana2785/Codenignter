<?php


namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\UserModel;

class UnitController extends BaseController
{
    public function index()
    {
            if (!session()->has('logged_user')) {
            return redirect()->to(route_to('index'));
        } else {
            $dashboardModel = new DashboardModel();
            $usermodel= new UserModel();
            // Filter all
            $data['dashboards'] = $dashboardModel->getunitDashboardData();
    
           
            
            $Userid = session()->get('logged_user');
           
                
            $data['userdata']=$usermodel->getlogindata($Userid);
      
            return view('Unit/dashboard',$data);
        }
        
    }
}
