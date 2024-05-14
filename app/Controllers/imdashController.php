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

class imdashController extends BaseController
{ 

    
    // Apper items in Add Form
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
        $data['dashboards'] = $dashboardModel->getDashboardData();
        
        // Surgical items
        $data['sugicals'] = $dashboardModel->getDashboardData('1');
        
        // General items
        $data['general'] = $dashboardModel->getDashboardData('2');

         
        $data['sugicalsinventory'] = $inventoryModel->getDashboardData('1');
        
        // General items
        $data['generalinventory'] = $inventoryModel->getDashboardData('2');


        $data['userdata'] = $this->userData;
        
        return view('dashboard.php', $data);
    }

    public function AddForm()
    {
        $catogoryModel = new CategoryModel();
        $data['catogory'] = $catogoryModel->orderby('Category_Name', 'ASC')->findAll();
        $data['userdata'] = $this->userData;
        
        return view('iManger/Add_items.php', $data);
    }
     
   // item add processing Form Controller
    public function store()
    {
        $dashboardModel = new DashboardModel();
    
        // Check the table items already exists
        $existingItem = $dashboardModel->where([
            'item_name' => $this->request->getPost('item_name'),
            'catogory' => $this->request->getPost('ca')
        ])->first();
    
        if ($existingItem) {
            
            return redirect()->back()->with('error', 'Item already exists.');
        }
    
        
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'catogory' => $this->request->getPost('ca'),
            'type_name' => $this->request->getPost('ty'),
            'Approval_status'=>1
            
        ];
    
        $dashboardModel->save($data);
        return redirect('dashboard')->with('status', 'Item Inserted Successfully');
    }
    
   
// Fetch the item type(jquery)
    public function action()
    {
        if($this->request->getVar('action'))
        {
            $action = $this->request->getVar('action');
            if($action == 'get_ty')
            {
                $typeModel = new TypeModel();
                $typedata= $typeModel->where('Cid',$this->request->getVar('Cid'))->findAll();
                echo json_encode($typedata);
            }
        }       
        
    }

// fetch bn number quntity 
  
public function actionquntity()
{
    if($this->request->getVar('action'))
    {
        $action = $this->request->getVar('action');
        if($action == 'get_ty')
        {
            $dashboardModel = new DashboardModel();
            $typedata= $dashboardModel->where('catogory',$this->request->getVar('Cid'))->findAll();
            echo json_encode($typedata);
        }
    }       
    
}






    //Update Items page
    //redirct edit.php
   public function edit($id = null)
   {
    $dashboardModel = new DashboardModel();
     
      $data['dashboard'] = $dashboardModel->find($id);
      $data['userdata'] = $this->userData;
    return view('iManger/edit_items',$data);

   }

   // afftr click edit,php update button
   public function update($id = null)
   {
    $dashboardModel = new DashboardModel();
    $data =[
        'item_name' => $this->request->getPost('item_name')
    ];
    $dashboardModel->update($id,$data);
    return redirect()->to(base_url('dashboard')) ->with('status', 'Item Update Successfully');

   }

   // edit quntity using join tables
   public function quntity($id = null)
{
    
    $dashboardModel = new DashboardModel();
    $demandModel = new DemandModel();

    $data['items']=$dashboardModel->join('demand','items.id =demand.Items_id ')->find($id);
    $data['userdata'] = $this->userData;
    return view('iManger/Edit_qu',$data);

        
 
}

// items update drugs edit form
public function  updatetotal($id= null)
{

    $dashboardModel = new DashboardModel();
    $inventoryModel = new InventoryModel();



    if(  $this->request->getPost('At')<=  $this->request->getPost('uq'))
    {
        return redirect()->back()->with('error', 'Quntity high please reduces.');
    }

    $existingItem = $inventoryModel->where([
        'BN_number' => $this->request->getPost('BN')
       
    ])->first();

    if ($existingItem) {
        
        return redirect()->back()->with('error', 'This Item already exists in Inventory.');
    }




    $data =[
        
        'item_id' => $this->request->getPost('item_id'),
        'BN_number' => $this->request->getPost('BN'),
        'Med_date' => $this->request->getPost('Med'),
        'Exp_date' => $this->request->getPost('Exp'),
        'In_quntity' => $this->request->getPost('uq'),
        'Approval_status' => 1
    ];
    $inventoryModel->save($data);
    
  


    return redirect()->to(base_url('dashboard')) ->with('status', 'Add Item inventory Request Successfully');
}

// display each general item  form from inventory

public function addgeneralinventory ($id= null)
{
       
    $dashboardModel = new DashboardModel();
    $demandModel = new DemandModel();

    $data['items']=$dashboardModel->join('demand','items.id =demand.Items_id ')->find($id);
    $data['userdata'] = $this->userData;
    return view('iManger/G_inventory',$data);

}

// add general item in main inventory

public function  storegeneralinventory()
{
    $dashboardModel = new DashboardModel();
    $inventoryModel = new InventoryModel();



  

    $existingItem = $inventoryModel->where([
        'Sn_number' => $this->request->getPost('Sn_number')
       
    ])->first();

    if ($existingItem) {
        
        return redirect()->back()->with('error', 'This Item already exists in Inventory.');
    }




    $data =[
        
        'item_id' => $this->request->getPost('item_id'),
        'Sn_number' => $this->request->getPost('Sn_number'),
        'W_start' => $this->request->getPost('ws'),
        'W_end' => $this->request->getPost('we'),
        'In_quntity' => 1,
        'Approval_status' => 1
    ];
    $inventoryModel->save($data);

    return redirect()->to(base_url('dashboard')) ->with('status', 'Add Item inventory Request Successfully');
    
}








public function Requesttable ()
{
    $unitrequest = new UnitrequestModel();
    $data['request'] = $unitrequest
    ->join('items', 'unit_request.item_id = items.id')
    ->join('unit', 'unit_request.req_unit = unit.Unit_id')
    ->findAll();

    
    $data['userdata'] = $this->userData;
    return view('iManger/req_table', $data);
    
}

// add items-request table(before Approval Admin)


public function Additemsrequesttable()
{
    $inventoryModel = new InventoryModel();
    $data['dashboards'] = $inventoryModel
                        ->join('items', 'inventory_items.item_id = items.id')
                         ->where('inventory_items.Approval_status', 1)
                         ->findAll(); 
  $data['userdata'] = $this->userData;
    return view('iManger/Addreq_table', $data);
}






// apper each request items details
public function Requestitems($id ,$itemId )
{
    $unitrequest = new UnitrequestModel();
    $inventoryModel = new InventoryModel();

    $data['req'] = $unitrequest
    ->join('items', 'unit_request.item_id = items.id')
    ->join('unit', 'unit_request.req_unit = unit.Unit_id')
    ->find($id);
 
        
    $data['inventory'] = $inventoryModel
                        ->where('inventory_items.item_id', $itemId)
                        ->orderBy('BN_number', 'ASC')
                        ->findAll();
                    

 $data['Snnumber'] = $inventoryModel
                        ->where('inventory_items.item_id', $itemId)
                        ->orderBy('Sn_number', 'ASC')
                        ->findAll();

 
    $data['userdata'] = $this->userData;
    
 
    return view('iManger/view_request', $data);
}



public function updaterequest($reqNo)
{
    $unitrequest = new UnitrequestModel();
    if(  $this->request->getPost('Avqu')<=  $this->request->getPost('AddQu'))
    {
        return redirect()->back()->with('error', 'Quntity high please reduces.');
    }

    $data =[
        'itembox_name' => $this->request->getPost('itemboxname'),
        'ima_quntity' => $this->request->getPost('AddQu'),
        'status' => 2
        
    ];
    $unitrequest->update($reqNo,$data);
    
    return redirect()->back()->with('status', 'Item Successfully Add Admin Approval');
}



public function Requestrepairtable()
{
    $repairrequest = new RepairModel(); 
    $data['request'] = $repairrequest
    ->join('items', 'repair.item_id = items.id')
    ->join('unit', 'repair.Unit_id = unit.Unit_id')
    ->findAll();

    
    $data['userdata'] = $this->userData;
    return view('iManger/reqre_table', $data);
    
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

            return view('iManger/view_requestrepair', $data);

}



public function repairupdate($id =null)
{
    
    $repairrequest = new RepairModel();
    
    $data =[
        
        'status_id' => $this->request->getPost('rs')
    ];
    $repairrequest->update($id,$data);
    return redirect()->back()->with('status', 'Repair Status Updated');

}

public function Purchmentview()
{ 
    $unitinventory = new UnitinventoryModel();
        
    // Filter all
    $data['dashboards'] = $unitinventory
                        ->select('DISTINCT(unit_inventory.item_id), items.*') // Use DISTINCT to select unique item_id
                        ->join('items', 'unit_inventory.item_id = items.id')
                        ->findAll();
    
    $data['userdata'] = $this->userData;

    return view('iManger/Usageview',$data);
}


public function Itemsusage($id=null) 
{
    $unitinventory = new UnitinventoryModel();
  
    $data['inventory'] = $unitinventory
    ->join('items', 'unit_inventory.item_id = items.id')
    ->join('unit', 'unit_inventory.Unit_id = unit.Unit_id')
    ->where('item_id',$id)
    ->findAll();

    $data['userdata'] = $this->userData;
    return view('iManger/Purchment_view',$data);
}


public function Purchmentorder()
{
    $dashboardModel = new DashboardModel();
    $catogoryModel = new CategoryModel();

    // Fetch all items
    $data['dashboards'] = $dashboardModel->getDashboardData();

    // Fetch Surgical items
    $data['sugicals'] = $dashboardModel->getDashboardData('1');
            
    // Fetch General items
    $data['general'] = $dashboardModel->getDashboardData('2');

   

    $data['userdata'] = $this->userData;

    // Load the view with the data
    return view('iManger/Purchmentorderview', $data);
}
public function submitOrder()
{
    $selectedItems = $this->request->getPost('selected_items');
    if (!empty($selectedItems)) {
      
        $prefix = 'PURREQ';
        $uniqueId = uniqid();
        $numericId = hexdec(substr($uniqueId, strrpos($uniqueId, '.') + 1)); // Convert hexadecimal to decimal
        $purchaseId = $prefix . $numericId;
        
        $purchaseOrderModel = new PurchaseOrderModel();
        
 
        $insertedItems = [];
    
        foreach ($selectedItems as $itemId) {
            $data = [
                'purchase_id' => $purchaseId, // Insert common purchase ID
                'item_id' => $itemId,
            ];
           
            if ($purchaseOrderModel->save($data)) {
                $insertedItems[] = $itemId; 
            }
        }

        if (!empty($insertedItems)) {
            return redirect()->back()->with('status', 'Purchase Ordered with ID: ' . $purchaseId);
        } else {
            return redirect()->back()->with('status', 'Not inserted');
        }
    }
    
    return redirect()->back()->with('status', 'No items selected');
}


public function Requestpurchtable()
{
    $purchaseOrderModel = new PurchaseOrderModel();
    
    // Retrieve distinct purchase IDs
    $distinctRequests = $purchaseOrderModel->distinct('purchase_id')->findAll();

    // Convert the result to an associative array with purchase IDs as keys
    $data['requests'] = [];
    foreach ($distinctRequests as $request) {
        $data['requests'][$request['purchase_id']] = $request;
    }

    $data['userdata'] = $this->userData;
    return view('iManger/pur_table', $data);
}

public function Viewp($id = null)
{
  
  

   return view('iManger/Purchmentprint');
}

public function newtest($id = null)
{
    
}

// sugical distributed form
public function viewsugicaldistribute($id)
{
    $inventoryModel = new InventoryModel();
        
    // Fetch a single record based on the provided $id
    $data['inventory'] = $inventoryModel
                        ->join('items', 'inventory_items.item_id = items.id')
                        ->where('inventory_items.item_id', $id) // Replace 'your_column_name' with the actual column name
                        ->orderBy('BN_number', 'ASC')
                        ->findAll();
                    


    $data['userdata'] = $this->userData;

    return view('iManger/S_distibute', $data);
}


}
