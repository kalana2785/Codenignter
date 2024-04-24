<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\TypeModel;
use App\Models\UserModel;
use App\Models\UsergroupModel;
use App\Models\UnitrequestModel;
use App\Models\UnitinventoryModel;
use App\Models\RepairModel;
use App\Models\RepairstageModel;

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
                    ->where('status =',2 )
                    ->findAll(); // Fetching all records
    
    return view('Admin/Adminview_request', $data);
}
  public function viewreq($id, $req_no)
  {
    $unitrequest = new UnitrequestModel();

    $data['requestview']=$unitrequest
                   ->join('items', 'unit_request.item_id = items.id')
                   ->join('unit', 'unit_request.req_unit = unit.Unit_id')
                   ->find($req_no);

  // anthour request display                  
 $data['requestviewall'] = $unitrequest
                    ->join('items', 'unit_request.item_id = items.id')
                    ->join('unit', 'unit_request.req_unit = unit.Unit_id')
                   ->where('item_id', $id)
                   ->where('req_no !=', $req_no)
                   ->where('status =',2 )
                   ->findAll();
               
                   
   
    return view('Admin/Req_view',$data);
  }
  
  public function updatereq($req_no, $item_id, $unit_no)
    {
        // Get input data from the form
        $adminq = $this->request->getPost('Adminq');
        $quntity = $this->request->getPost('quntity');

        // Validate input: admin quantity should not exceed available quantity
        if ($adminq > $quntity) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available quantity.');
        }

        // Perform update operations
        $dashboardModel = new DashboardModel();
        $unitrequest = new UnitrequestModel();
        $unitinventory = new UnitinventoryModel();

        // Update unit request with admin-approved quantity and set status to 3 (approved)
        $unitRequestData = [
            'ada_quntity' => $adminq,
            'status' => 3
        ];
        $unitrequest->update($req_no, $unitRequestData);

        // Update main inventory quantity by subtracting admin-approved quantity
        $newQuantity = $quntity - $adminq;
        $inventoryData = [
            'quntity' => $newQuantity
        ];
        $dashboardModel->update($item_id, $inventoryData);

        // Update unit inventory with admin-approved quantity
        $unitInventoryData = [
            'Quntity' => $adminq
        ];
      
       
        $builder = $unitinventory->builder();
        $builder->where('Unit_id', $unit_no);
        $builder->where('item_id', $item_id);
        
        if ($builder->update($unitInventoryData)) {
            // Update successful, redirect with success message
            return redirect()->back()->with('status', 'Quantity updated successfully.');
        } else {
            // Update failed, redirect with error message
            return redirect()->back()->with('error', 'Failed to update quantity.');
        }
       
    }
  public function Reqreptable()
  {
    $repairrequest = new RepairModel(); 
    $repairstage = new RepairstageModel();

    $data['request'] = $repairrequest
    ->join('items', 'repair.item_id = items.id')
    ->join('unit', 'repair.Unit_id = unit.Unit_id')
    ->join('repair_stage', 'repair.status_id= repair_stage.Rs_id')
    ->findAll();




      return view('Admin/Adminrepair_table', $data);


  }

  public function Requestrepiritems($id = null)
{
            $repairrequest = new RepairModel(); 
            $repairstage = new RepairstageModel();
            
            $data['reqre'] = $repairrequest
                            ->join('repair_stage', 'repair.status_id= repair_stage.Rs_id')
                            ->find($id);
                        
            $data['stage'] = $repairstage->orderby('Rs_id', 'ASC')->findAll();

            $stages = $repairstage->findAll(); 

         
            if (!empty($stages)) {
                $stages = array_column($stages, 'Stage'); 
            } else {
                
                $stages = array("Stage 1", "Stage 2", "in the Company process", "Stage 4");
            }

           
            $current_stage = $data['reqre']['Stage']; 
            $progress = array_search($current_stage, $stages) + 1; 
            $total_stages = count($stages);

            
            $data['progress'] = $progress;
            $data['total_stages'] = $total_stages;
            $data['stages'] = $stages;

            

            return view('Admin/view_requestrepair', $data);

}
 
}
