<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\DemandModel;
use App\Models\TypeModel;
use App\Models\UserModel;
use App\Models\UnitrequestModel;

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
        
        // Filter all
        $data['dashboards'] = $dashboardModel->getDashboardData();
        
        // Surgical items
        $data['sugicals'] = $dashboardModel->getDashboardData('1');
        
        // General items
        $data['general'] = $dashboardModel->getDashboardData('2');

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
            'quntity' => $this->request->getPost('quantity'),
            'type_name' => $this->request->getPost('ty'),
            'Sn_number' => $this->request->getPost('sn'),
            'BN_number' => $this->request->getPost('BN'),
            'Med_date' => $this->request->getPost('Med'),
            'Exp_date' => $this->request->getPost('Exp'),
            'W_start' => $this->request->getPost('ws'),
            'W_end' => $this->request->getPost('we')
            
        ];
    
        $dashboardModel->save($data);
        return redirect('dashboard')->with('status', 'Item Inserted Successfully');
    }
    
    // this is testing Conroller
    public function testveiw()
    {
        $dashboardModel= new DashboardModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'catogory'  => $this->request->getPost('ca'),
            'quntity'  => $this->request->getPost('quantity')
        ];
        
        $dashboardModel->save($data);

       

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
    if(  $this->request->getPost('At')<=  $this->request->getPost('uq'))
    {
        return redirect()->back()->with('error', 'Quntity high please reduces.');
    }

    $data =[
        
        'quntity' => $this->request->getPost('uq')+$this->request->getPost('Avaliable_total')
    ];
    $dashboardModel->update($id,$data);
    return redirect()->to(base_url('dashboard')) ->with('status', 'Item quntity Update Successfully');
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
// apper each request items details
public function Requestitems($id = null)
{
    $unitrequest = new UnitrequestModel();
     
    $data['req'] = $unitrequest
    ->join('items', 'unit_request.item_id = items.id')
    ->join('unit', 'unit_request.req_unit = unit.Unit_id')
    ->find($id);


    
 
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
        
        'ima_quntity' => $this->request->getPost('AddQu')
    ];
    $unitrequest->update($reqNo,$data);
    
    return redirect()->back()->with('status', 'Item Successfully Add Admin Approval');
}


}
