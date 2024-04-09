<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\TypeModel;
use App\Models\UserModel;
use App\Models\UsergroupModel;
use App\Models\UnitrequestModel;

class AdminController extends BaseController
{
    public function index(): string
    {      if (!session()->has('logged_user')) {
        return redirect()->to(route_to('index'));
    } else {
        $dashboardModel = new DashboardModel();
        $usermodel= new UserModel();
        // Filter all
        $data['dashboards'] = $dashboardModel->getAdminDashboardData();

        // Sugical items
        $data['sugicals'] = $dashboardModel->getAdminDashboardData('1');

        // General items
        $data['general'] = $dashboardModel->getAdminDashboardData('2');
       
        
        $Userid = session()->get('logged_user');
       
            
        $data['userdata']=$usermodel->getlogindata($Userid);
  
        return view('Admin/dashboard',$data);

    }
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
        
        $existinguser = $usermodel->where([
            'Email' => $this->request->getPost('email')
            
        ])->first();
    
        if ($existinguser) {
            
            return redirect()->back()->with('error', 'User already exists.');
        }
        $password = $this->request->getPost('password');

        if (is_string($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

        
        $data = [
            'Username' => $this->request->getPost('username'),
            'Email' => $this->request->getPost('email'),
            'Password' =>$hashedPassword,
            'usergroup_id' => $this->request->getPost('ug')
            
        ];
    
        $usermodel->save($data);
        return redirect()->back()->with('status', 'User Inserted Successfully');


        } else {
    
            return redirect()->back()->withInput()->with('error', 'Invalid password');
        }
     }
  


     public function Reqtable()
{
    $unitrequest = new UnitrequestModel();
    $data['requests'] = $unitrequest
                    ->join('items', 'unit_request.item_id = items.id')
                    ->join('unit', 'unit_request.req_unit = unit.Unit_id')
                    ->findAll(); // Fetching all records
    
    return view('Admin/Adminview_request', $data);
}
  public function viewreq($id=null)
  {
    $unitrequest = new UnitrequestModel();

    $data['requests']=$unitrequest
                   ->join('items', 'unit_request.item_id = items.id')
                   ->join('unit', 'unit_request.req_unit = unit.Unit_id')
                   ->find($id);
   
    return view('Admin/Req_view',$data);
  }

}
