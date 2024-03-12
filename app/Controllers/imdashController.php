<?php

namespace App\Controllers;


use App\Models\DashboardModel;
use App\Models\CategoryModel;
use App\Models\TypeModel;

class imdashController extends BaseController
{
    public function index()
    {
        $dashboardModel = new DashboardModel();

        // Get all dashboard data
        $data['dashboards'] = $dashboardModel->getDashboardData();

        // Get data with category filter (category = 1)
        $data['sugicals'] = $dashboardModel->getDashboardData('1');

        $data['general'] = $dashboardModel->getDashboardData('2');
        return view('dashboard.php', $data);
    }
    // Apper items in Add Form
    public function AddForm()

    {     
        $catogoryModel = new CategoryModel();
        $data['catogory'] = $catogoryModel->orderby('Category_Name','ASC')->findAll();
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
}
