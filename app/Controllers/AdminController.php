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
use App\Models\PurchaseOrderModel;
use App\Models\PurchmentRequestModel;
use  App\Models\InventoryModel;

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
   
    // inventory Manger request inventory request 

    public function Additemsrequest()
    {   
      
        $inventoryModel = new InventoryModel();
        $usermodel= new UserModel();
       
        $data['Inventory'] = $inventoryModel
                                    ->join('items', 'inventory_items.item_id = items.id')
                                    ->where('inventory_items.Approval_status', 1)
                                    ->findAll(); 
                                   

        $Userid = session()->get('logged_user');
       
            
        $data['userdata']=$usermodel->getlogindata($Userid);



        return view('Admin/Inventory_request.php', $data);
    }
    
    // inventory Manger Add request view table
    public function Addreqtable()
    {
        $dashboardModel = new DashboardModel();
      
        $data['Inventory'] = $dashboardModel->where('Approval_status', 1)->findAll();
        
        return view('Admin/Additem_req', $data);
    }

  // view update demand quntity

   public function viewdemandform()
   {
    $demandmodel= new DemandModel();
    $dashboardModel = new DashboardModel();
    $id=$this->request->getPost('id');
    $data =[
            
        'Items_id' => $id , 
        'overstock_value' => $this->request->getPost('demandQ')

        
    ];
    $demandmodel->Save($data);

    $data =[
            
        'Approval_status' => 2 
        

        
    ];
    $dashboardModel->update($id,$data);
    
    
    return redirect()->back()->with('status', 'Item Successfully Add Demand Quntity');
   }






    // inventory req view form
 
    public function Inventoryreqview($id=null)
    {

        $inventoryModel = new InventoryModel(); 
        $usermodel= new UserModel(); 
        $data['Inventory'] = $inventoryModel
                                    ->join('items', 'inventory_items.item_id = items.id')
                                    ->join('demand','inventory_items.item_id =demand.Items_id')
                                    ->find($id);
                                   
         $Userid = session()->get('logged_user');
       
            
         $data['userdata']=$usermodel->getlogindata($Userid);                     
    
          return view('Admin/inventroy_reqview',$data);



    }

    // update inventory(after approval inventory req)

 
    public function Inventoryupdate($id=null)
    {
       
        $inventoryModel = new InventoryModel();
        $dashboardModel = new DashboardModel();
       
         $inv_id= $this->request->getPost('Inv_id');

        if(  $this->request->getPost('Overstock_value')<=  $this->request->getPost('Total_request'))
        {
            return redirect()->back()->with('error', 'This Request not match Inventory level.');
        }
    
        $data =[
            
           
            'Approval_status' => 2

            
        ];

      

        
        $inventoryModel->update($inv_id,$data);


        $data =[
            
           
            'quntity' => $this->request->getPost('Total_request'),
            'Re_quntity'=> $this->request->getPost('Total_request')
            
        ];
        $dashboardModel->update($id,$data);
        
        return redirect()->back()->with('status', 'Item Successfully Add Inventory');
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

        $existingItem = $unitinventory->where([
            'item_id' => $item_id,
            'Unit_id' =>$unit_no
        ])->first();
        
        // upadate quntity if avaliable in inventory
        if ($existingItem && $existingItem['item_id'] == $item_id && $existingItem['Unit_id'] == $unit_no) {
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

        // add the new inventory request
        else
        {
               
        $data = [
            'item_id' => $item_id,
            'Unit_id' =>$unit_no,
            'Quntity' => $adminq
            
            
        ];
    
        $unitinventory->save($data);

         
        return redirect()->back()->with('status', 'Quantity Added successfully.');


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
 
public function Requestpurchtable()
{
    $purchaseOrderModel = new PurchaseOrderModel();
    
    $distinctRequests = $purchaseOrderModel->distinct('purchase_id')->findAll();

    // Convert the result to an associative array with purchase IDs as keys
    $data['requests'] = [];
    foreach ($distinctRequests as $request) {
        $data['requests'][$request['purchase_id']] = $request;
    }


  
  
    return view('Admin/pur_table', $data);
}

public function Viewp($id = null)
{
 
    $Purchment = new PurchaseOrderModel();

  
    $data['reqpu'] = $Purchment
         ->join('items', 'purchase_order_items.item_id = items.id')
        ->where('purchase_id', $id)
        ->findAll(); 

   
    return view('Admin/Purchmentprint', $data);
}

public function Approvalpuc($purshmentId)
{
    $Purchment = new PurchaseOrderModel();
  

    $data =[
        
       
        'Pu_status' => 2
        
    ];
    $Purchment->where('purchase_id', $purshmentId)->update($data);
    
    return redirect()->back()->with('status', 'Item Successfully  Approval');
}

}
