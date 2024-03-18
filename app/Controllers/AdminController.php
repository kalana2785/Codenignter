<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\TypeModel;
use App\Models\UserModel;
use App\Models\UsergroupModel;

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

       

    }
    //filter user group and apper user add form
     public function Adduser()
     {
        $usermodel = new UserModel();
        $usergroup = new UsergroupModel();
        $usermodel->join('user_group','user.usergroup_id =user_group.ugroup_id');
        $data['user'] = $usergroup->orderby('Usergroup_name','ASC')->findAll();
        return view('Admin/Add_user',$data);
     }
     
     public function saveuser()
     {
       
        $usermodel = new UserModel();
        // Check the table items already exists
        $existinguser = $usermodel->where([
            'Email' => $this->request->getPost('email')
            
        ])->first();
    
        if ($existinguser) {
            
            return redirect()->back()->with('error', 'User already exists.');
        }
    
        
        $data = [
            'Username' => $this->request->getPost('username'),
            'Email' => $this->request->getPost('email'),
            'Password' => $this->request->getPost('password'),
            'usergroup_id' => $this->request->getPost('ug')
            
        ];
    
        $usermodel->save($data);
        return redirect()->back()->with('status', 'User Inserted Successfully');
     }
  

}
