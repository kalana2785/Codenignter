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
    public function AddForm()

    {     
        $catogoryModel = new CategoryModel();
        $data['catogory'] = $catogoryModel->orderby('Category_Name','ASC')->findAll();
        return view('iManger/Add_items.php', $data);

       
    }
     

    public function store()
    {
        $dashboardModels= new DashboardModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'catogory'  => $this->request->getPost('ca'),
            'quntity'  => $this->request->getPost('quantity')
        ];
        
        $dashboardModels->save($data);
        return redirect('dashboard')->with ('status','Item Inserted Successfully');

    }
    
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
   

}
