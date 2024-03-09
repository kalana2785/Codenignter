<?php

namespace App\Controllers;


use App\Models\DashboardModel;

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
        return view('iManger/Add_items.php');
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

}
