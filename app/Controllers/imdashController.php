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
        $data['dashboards'] = $dashboardModel->getDashboardData();
        return view('dashboard.php', $data);
    }
    // Apper item Add Form
    public function AddForm()

    {     
        $catogoryModel = new CategoryModel();
        $data['catogory'] = $catogoryModel->orderby('Category_Name','ASC')->findAll();
        return view('iManger/Add_items.php', $data);
       
       
    }
     
   // Add Form Controller
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
            'type_name' => $this->request->getPost('ty')
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
// Fetch the item type
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
