<?php


namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\UserModel;
use App\Models\UnitinventoryModel;
use App\Models\UnitrequestModel;
use App\Models\RepairModel;
use App\Models\RepairstageModel;
use App\Models\CategoryModel;

class UnitController extends BaseController
{
   

    private $userData;
    

    public function index()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to(route_to('index'));
        } else {
            $dashboardModel = new DashboardModel();
            $usermodel = new UserModel();
            $userinventory = new UnitinventoryModel();
            
            // Fetch User_id based on Unit_id
            $userIds = session()->get('logged_user');
            $userData = [];
    
            foreach ($userIds as $unitId) {
                $results = $userinventory->select('items.id, items.item_name,unit_inventory.Unit_id, SUM(unit_inventory.Quntity) as total_quantity')
                                         ->join('items', 'unit_inventory.item_id = items.id')
                                         ->join('category', 'unit_inventory.C_id = category.Cid')
                                         ->where('unit_inventory.Unit_id', $unitId)
                                         ->groupBy('items.id')
                                         ->findAll();
                $userData = array_merge($userData, $results);
            }
    
            $data['userData'] = $userData;
    
            $Unituserid = session()->get('login_user');
    
            $this->userData = $usermodel->getlogindata($Unituserid);
            $data['unituserdata'] = $this->userData;
    
            return view('Unit/dashboard', $data);
        }
    }
    
    
  

// items request page

public function req()
{

    $dashboardModel = new DashboardModel();
    $usermodel= new UserModel();
    $catogoryModel= new CategoryModel();
    $userinventory = new UnitinventoryModel();
   

    $data['inventory'] = $catogoryModel->orderBy('Category_Name', 'ASC')
                                         ->findAll();
  



    // filter unit-id
      $Unituserid = session()->get('login_user');
      $data['unitid'] = $usermodel->find($Unituserid);
           
      
     $this->userData =$usermodel->getlogindata($Unituserid);
     $data['unituserdata'] = $this->userData;
   
    return view('Unit/req.php', $data);
}


// view item details
public function unititemfull($id,$unitId)
{
    $userinventory = new UnitinventoryModel();
    $data['unititems'] = $userinventory->join('items','unit_inventory.item_id = items.id')
                                      ->join('inventory_items','unit_inventory.item_id = inventory_items.item_id')
                                       ->where('unit_inventory.item_id',$id)
                                       ->where('unit_inventory.Unit_id',$unitId)
                                        ->findAll();


     return view('Unit/item_table.php', $data);

}










public function request()
{

  $unitrequest = new UnitrequestModel(); 


$data = [
    'item_id' => $this->request->getPost('item_id'),
    'req_unit' => $this->request->getPost('unit'),
    'itembox_name'=>'SID000',
    'req_quntity' => $this->request->getPost('Quntity')

  
];

$unitrequest->save($data);
return redirect()->back()->withInput()->with('status', 'Item Request Successfully');


}

public function reqre($id = null)
{
    $userinventory = new UnitinventoryModel();
    $usermodel= new UserModel();
 
    $data['unititems'] = $userinventory->join('items','unit_inventory.item_id = items.id')->find($id);
    $Unituserid = session()->get('login_user');
       
            
     $this->userData =$usermodel->getlogindata($Unituserid);
     $data['unituserdata'] = $this->userData;
   
    return view('Unit/reqre.php', $data); 
}

public function requestre()
{

  $repairrequest = new RepairModel(); 

  $existingItem = $repairrequest->where([
    'item_id' => $this->request->getPost('item_id'),
    'Unit_id' => $this->request->getPost('unit')
])->first();

if ($existingItem) {
    
    return redirect()->back()->with('error', 'Item Repair request already Process.');
}

else{

$data = [
    'item_id' => $this->request->getPost('item_id'),
    'repair_snnum'=>$this->request->getPost('Sn_number'),
    'Unit_id' => $this->request->getPost('unit'),
    'Comment' => $this->request->getPost('RepairD'),

    
    'status_id'=> 1
  
];

$repairrequest->save($data);
return redirect()->back()->withInput()->with('status', 'Item Repair Request Successfully');

}
}

public function repairtab()
{
   


    $repairrequest = new RepairModel(); 
    $repairstage = new RepairstageModel();
    $usermodel= new UserModel();
    
    $userIds = session()->get('logged_user');
    
    $data['request'] = $repairrequest 
               ->join('items', 'repair.item_id = items.id')
               ->join('repair_stage', 'repair.status_id= repair_stage.Rs_id')
                ->whereIn('Unit_id', $userIds)
                ->findAll();
    $Unituserid = session()->get('login_user');
       
            
   $this->userData =$usermodel->getlogindata($Unituserid);
   $data['unituserdata'] = $this->userData;
    
    return view('Unit/repairreq_table', $data);
    

                
                   
                    
          

            
         
    
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

            $data['userdata'] = $this->userData;

            return view('Unit/view_requestrepair', $data);

}

// table of item request


}
